<?php 
/**
* Safe Doc
*
* @package		Safe Doc
* @subpackage   controller
* @author		Sunil Silumala
* @copyright	Copyright (c) 2012 - 2013 
* @since		Version 1.0
*/
 

class Documents extends CI_Controller {
	/**
	* __construct
	*
	* Calls parent constructor
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	function __construct()
	{
		
		parent::__construct();
		if($this->session->userdata('logged_user_in') == FALSE) {
			redirect('login');
			break;
		}
		$this->load->model('category_model');
		$this->load->model('document_model');
		$this->load->model('user_model');
		$this->load->model('sms_model');
		$this->load->helper('html');

		if($this->user_model->chk_users_paid_status($this->session->userdata('userid'))){
			$this->session->set_flashdata('error', 'your demo period expired, please subscribe');
			redirect(base_url()."payments/package");
		}
	}

	
	/**
	* index
	*
	* This help to view Documents of current logged in user
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	
	public function index()
	{
		
		// Fetching child category and making key => value array to fill category name
		$arrChildCategory = $this->category_model->get_all_category();
		
		foreach($arrChildCategory as $category){
			
			$catDetails[$category['docCategoryId']] = $category['docCategoryName'];
		}
		$arrData['catDetails'] = $catDetails ;
		
		$arrData['documentDetails']	= $this->document_model->get_user_document_details($this->session->userdata('userid'));
		$arrData['tabIndex'] = '1';
		$arrData['middle'] = 'documents/viewdocuments';
		$this->load->view('template',$arrData);
	}
	
	
	/**
	* viewother
	*
	* This help to view Documents of current logged in user for category 10 "Others"
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	
	public function viewother()
	{
		
		// Fetching child category and making key => value array to fill category name
		$arrChildCategory = $this->category_model->get_all_category();
		
		foreach($arrChildCategory as $category){
			$catDetails[$category['docCategoryId']] = $category['docCategoryName'];
		}
		$arrData['catDetails'] = $catDetails ;
			
		$arrData['documentDetails']	= $this->document_model->get_user_document_details($this->session->userdata('userid'), 10);
		$arrData['tabIndex'] = '1';		
		$arrData['middle'] = 'documents/viewOtherDocuments';
		$this->load->view('template',$arrData);
	}

	/**
	* add
	*
	* This help to add user Documents
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	
	public function add()
	{
		if ($this->input->post('cmdSubmit')){
			
			/* For image upload */
			$config['max_size']	= '100000000';
			$config['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'/public/upload/user'.$this->session->userdata('userid').'/documents/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|tiff|bmp|pdf|doc';
			
			if(! is_dir($config['upload_path']) ) {
				mkdir($config['upload_path'], 0777);
				chmod($config['upload_path'], 0777);
			}
				
			if ($_FILES['documentImage']['name'] != '')
			{
				$this->load->library('upload',$config);
				//$this->upload->do_upload('documentImage');
				if(!$this->upload->do_upload('documentImage'))
				 {
					// If there is any error
					
					 $this->session->set_flashdata('error', $this->upload->display_errors());
					  redirect(base_url()."documents/add");
				}

				$arrData["documentImage"] = $this->upload->file_name;
				
				//want to create thumbnail
				$data = $this->upload->data();
				
                $image_data = $this->upload->data(); //get image data
                $config = array(
                    'source_image' => $data['full_path'], //get original image
                    'new_image' => $data['file_path'] . '/thumb', //save as new image //need to create thumbs first
                    'maintain_ratio' => true,
                    'width' => 180,
                    'height' => 119
                );
				if(! is_dir($config['new_image']) ) {
					mkdir($config['new_image'], 0777);
					chmod($config['new_image'], 0777);
				}
			
                $this->load->library('image_lib', $config); //load library
                $this->image_lib->resize(); //do whatever specified in config
                
			}
			$date = date("Y-m-d");
			
			$arrData["documentUserId"]		= $this->session->userdata('userid');
			$arrData["documentCategoryId"]	= $this->input->post('documentCategoryId');
			
			$arrMainCat	= $this->category_model->get_parent_id($this->input->post('documentCategoryId'));

			$arrData["docCategoryParentId"] = $arrMainCat[0]['docCategoryParentId'];
			
			$arrData["documentCreatedOn"]	= $date;
			$arrData["documentModifiedOn"]	= $date;
			
			
				$arrData["documentName"]		= $this->input->post('documentName');
				$arrData["documentYearPassing"]	= $this->input->post('documentYearPassing');
				$arrData["documentSubjectName"]	= $this->input->post('documentSubjectName');
				$arrData["documentBoard"]		= $this->input->post('documentBoard');
				$arrData["documentMarks"]		= $this->input->post('documentMarks');
				$arrData["documentPercentage"]	= $this->input->post('documentPercentage');
				$arrData["documentRemarks"]		= $this->input->post('documentRemarks');
			
				$arrData["documentNumber"]			= $this->input->post('documentNumber');
				$arrData["documentExpiryDate"]		= $this->input->post('documentExpiryDate');
				
				if(isset($_POST['documentAlertMe']))
					$arrData["documentAlertDate"]	= $this->input->post('documentAlertDate');
			
			
			$insertedFlag	= $this->document_model->save_document($arrData);
			
			if ($insertedFlag){
				$this->session->set_flashdata('success', 'Documents Added Successfully !!');
				redirect('documents');
			}else{
				$this->session->set_flashdata('error', 'Failed to Add Documents !!');
				redirect('documents/add');				
			}
			
		}
		else{
			// Fetching child category to fill dropdown box.
			
			$arrChildCategpry = $this->category_model->get_all_child_category($this->session->userdata('userid'));
			//$catDetails[0] = '--';
			foreach($arrChildCategpry as $category){
				//$catDetails[$category['docCategoryId']] = $category['docCategoryName'];
			}
			
			$catDetailsnew	= $this->category_model->get_categories_front($this->session->userdata('userid'));
			
			foreach($catDetailsnew[0] as $mainCatId => $mainCat){
				$catDetails[$mainCatId] = $mainCat;
				if (array_key_exists($mainCatId, $catDetailsnew)) {

					foreach($catDetailsnew[$mainCatId] as $categoryId => $category){

						$catDetails[$categoryId] = "--".$category;
					}
				}
			}
			$arrData['tabIndex'] = '1';
			$arrData['catDetails'] = $catDetails ;
			$arrData['middle'] = 'documents/adddocuments';
			$this->load->view('template',$arrData);
		}
	}

	/**
	* edit
	*
	* This help to edit user Documents
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	
	public function edit($iDocumentId)
	{
		if ($this->input->post('cmdSubmit')){
			/* For image upload */
			$config['max_size']	= '100000000';
			$config['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'/public/upload/user'.$this->session->userdata('userid').'/documents/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|tiff|bmp|pdf|doc';
			
			if(! is_dir($config['upload_path']) ) {
				mkdir($config['upload_path'], 0777);
				chmod($config['upload_path'], 0777);
			}
				
			if ($_FILES['documentImage']['name'] != '')
			{
				$this->load->library('upload',$config);
				//$this->upload->do_upload('documentImage');
				
				if(!$this->upload->do_upload('documentImage'))
				 {
					// If there is any error
					
					 $this->session->set_flashdata('error', $this->upload->display_errors());
					 redirect(base_url()."documents/edit/".$iDocumentId);
				}

				$arrData["documentImage"] = $this->upload->file_name;
				
				 //want to create thumbnail
				$data = $this->upload->data();
				
				$prev_file = $this->input->post('prev_image');
				
				// Unlink the image from documents folder
				if( $prev_file !='' && file_exists($config['upload_path'].$prev_file))
					unlink($config['upload_path'].$prev_file);	
					
                $image_data = $this->upload->data(); //get image data
                $config = array(
                    'source_image' => $data['full_path'], //get original image
                    'new_image' => $data['file_path'] . 'thumb/', //save as new image //need to create thumbs first
                    'maintain_ratio' => true,
                    'width' => 180,
                    'height' => 119
                );
				if(! is_dir($config['new_image']) ) {
					mkdir($config['new_image'], 0777);
					chmod($config['new_image'], 0777);
				}
			
                $this->load->library('image_lib', $config); //load library
                $this->image_lib->resize(); //do whatever specified in config
                
               // Unlink the image from documents folder
				if( $prev_file !='' && file_exists($config['new_image'].$prev_file))
					unlink($config['new_image'].$prev_file);	
			}
			$date = date("Y-m-d");
			
			$arrData["documentModifiedOn"]	= $date;
			
			
			$arrData["documentName"]		= $this->input->post('documentName');
			$arrData["documentYearPassing"]	= $this->input->post('documentYearPassing');
			$arrData["documentSubjectName"]	= $this->input->post('documentSubjectName');
			$arrData["documentBoard"]		= $this->input->post('documentBoard');
			$arrData["documentMarks"]		= $this->input->post('documentMarks');
			$arrData["documentPercentage"]	= $this->input->post('documentPercentage');
			$arrData["documentRemarks"]		= $this->input->post('documentRemarks');
		
			$arrData["documentNumber"]			= $this->input->post('documentNumber');
			$arrData["documentExpiryDate"]		= $this->input->post('documentExpiryDate');
			
			if(isset($_POST['documentAlertMe']))
				$arrData["documentAlertDate"]	= $this->input->post('documentAlertDate');
			else
				$arrData["documentAlertDate"]	= '';
			
			$updatedFlag	= $this->document_model->update_document( $this->input->post('documentId'), $arrData);
			
			if ($updatedFlag){
				$this->session->set_flashdata('success', 'Documents Updated Successfully !!');
				
				if($this->input->post('documentCategoryId') =='10')
					redirect('documents/viewother');
				else
					redirect('documents');
			}else{
				$this->session->set_flashdata('error', 'Failed to Updated Documents !!');
				redirect('documents/add');				
			}
			
		}
		else{
			if($iDocumentId!=''){
				$userId	= $this->session->userdata('userid');
				
				if(!$this->user_model->chk_otp_status($userId)){
					$otp =  $this->user_model->encrypt();
					$updateUserData["OTP"]	= $otp;
					$this->user_model->update_user_details($userId,$updateUserData);
					
					$arrUserDetails = $this->user_model->get_user($userId);
					
					$recipient = $arrUserDetails[0]['userMobile'];
					$smsNotify	= $arrUserDetails[0]['notificationBySMS'];

					$emailNotify	= $arrUserDetails[0]['notificationByEmail'];
					$userMail		= $arrUserDetails[0]['userEmail'];
					
					
					#if($smsNotify == '1'){
						$body = $this->config->item('template_otp');
						eval("\$body = \"$body\";");
						
						$body = "Your OTP for edit/delete the document is ".$otp."-SAFEDC";
						
						$this->sms_model->sms_notification($recipient,$body);
					#}
					
					/* Sending Mail*/
					$this->load->library('email');

					$config['mailtype'] = 'html';
					$this->email->initialize($config);

					$this->email->from('your@example.com', 'Safe Docs');
					$this->email->to($userMail);

					$this->email->subject('Your OTP - SafeDoc');

					$emailData = "Dear ".$this->session->userdata('username').",".br(2);
					$emailData .= "Your OTP for edit/delete the document is ".$otp;
					
					$this->email->message($emailData);
						
					if ($this->email->send())
					{
						$this->session->set_flashdata('success', 'Please check your mail and SMS for OTP !!');
					}else{
						$this->session->set_flashdata('error', 'Failed to mail OTP!!');
					}
					
					redirect('documents/optpassword');
				}
				
				
				$arrData['documentDetailsArr']	= $this->document_model->get_document_details($iDocumentId);
				
				if($arrData['documentDetailsArr'])
				{
					//Fetching category details.
					$arrData['categoryDetail']	= $this->category_model->get_category_details($arrData['documentDetailsArr'][0]['documentCategoryId']);
				}
				
				$arrMainCat	= $this->category_model->get_parent_id($arrData['documentDetailsArr'][0]['documentCategoryId']);
				
				$arrData['parentId'] = $arrMainCat[0]['docCategoryParentId'];

				$arrData['tabIndex'] = '1';
				$arrData['middle'] = 'documents/editdocuments';
				$this->load->view('template',$arrData);
			}else{
				redirect('documents');
			}
		}
	}
	
	/**
	* view
	*
	* This help to edit user Documents
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
		
	public function view($iDocumentId)
	{
		if($iDocumentId!=''){
			$arrData['documentDetailsArr']	= $this->document_model->get_document_details($iDocumentId);
			
			if ($arrData['documentDetailsArr']) {
				//Fetching category details.
				$arrData['categoryDetail']	= $this->category_model->get_category_details($arrData['documentDetailsArr'][0]['documentCategoryId']);
			}
			$arrData['tabIndex'] = '1';
			//$arrData['middle'] = 'documents/detaildocuments';
			$this->load->view('documents/detaildocuments',$arrData);
		}else{
			redirect('documents');
		}
	}
	
	/**
	* Delete
	*
	* This help to delete user Documents
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
		
	public function delete($iDocumentId)
	{	
		if($iDocumentId!=''){
			
			
			$userId	= $this->session->userdata('userid');
				
			if(!$this->user_model->chk_otp_status($userId)){
				$otp =  $this->user_model->encrypt();
				$updateUserData["OTP"]	= $otp;
				$this->user_model->update_user_details($userId,$updateUserData);
				
				$arrUserDetails = $this->user_model->get_user($userId);
				
				$recipient = $arrUserDetails[0]['userMobile'];
				$smsNotify	= $arrUserDetails[0]['notificationBySMS'];

				$emailNotify	= $arrUserDetails[0]['notificationByEmail'];
				$userMail		= $arrUserDetails[0]['userEmail'];
				
				
				if($smsNotify == '1'){
					$body = $this->config->item('template_otp');
					eval("\$body = \"$body\";");
					
					$body = "Your OTP for edit/delete the document is ".$otp."-SAFEDC";

					$this->sms_model->sms_notification($otp,$recipient,$body);
				}
				
				/* Sending Mail*/
				$this->load->library('email');

				$config['mailtype'] = 'html';
				$this->email->initialize($config);

				$this->email->from('your@example.com', 'Safe Docs');
				$this->email->to($userMail);

				$this->email->subject('Your OTP - SafeDoc');

				$emailData = "Dear ".$this->session->userdata('username').",".br(2);
				$emailData .= "Your OTP for edit/delete the document is ".$otp;
				
				$this->email->message($emailData);
					
				if ($this->email->send())
				{
					$this->session->set_flashdata('success', 'Please check your mail for OTP !!');
				}else{
					$this->session->set_flashdata('error', 'Failed to mail OTP!!');
				}
				
				redirect('documents/optpassword');
			}
			
			
			$arrData['documentDetailsArr']	= $this->document_model->get_document_details($iDocumentId);
			
			$image = $arrData['documentDetailsArr'][0]['documentImage'];
			
			$imgPath = $_SERVER['DOCUMENT_ROOT'].'/public/upload/user'.$this->session->userdata('userid').'/documents/';
			$thumbPath = $_SERVER['DOCUMENT_ROOT'].'/public/upload/user'.$this->session->userdata('userid').'/documents/thumb/';
			
			if( $image !='' && file_exists($imgPath.$image))
					unlink($imgPath.$image);	
			
			if( $image !='' && file_exists($thumbPath.$image))
					unlink($thumbPath.$image);	
			
			$delete = $this->document_model->delete_document($iDocumentId);
		
			if ($delete)
				$this->session->set_flashdata('success', 'Document deleted Successfully !!');
			else
				$this->session->set_flashdata('error', 'Failed to delete Document !!');
				
			redirect('documents');
		}else{
			redirect('documents');
		}
	}

	/**
	* ajaxContent
	*
	* This help to load respective fields on basis of category change.
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	public function ajaxContent()
	{
		if(isset($_POST['id'])){
			
			
			$arrMainCat	= $this->category_model->get_parent_id($_POST['id']);

			$arrData['id']	= $_POST['id'];
			$arrData['parentId'] = $arrMainCat[0]['docCategoryParentId'];
			
			$this->load->view('documents/ajaxContent',$arrData);
		}else{
			redirect('profile');
		}
	}
	
	/**
	* ajaxMailDocument
	*
	* This is to mail single doc.
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	public function ajaxMailDocument()
	{
		if(isset($_POST['id'])){
			
			// Fetching document details
			$id	= $_POST['id'];
			$arrDocument	= $this->document_model->get_document_details($id);
			
			//Fetching category details.
			$catId = $arrDocument[0]['documentCategoryId'];
			$arrCategory	= $this->category_model->get_category_details($catId);
			$categoryName	= $arrCategory[0]['docCategoryName'];
			
			// Fetching user data
			$userId = $arrDocument[0]['documentUserId'];
			#$this->load->model('user_model');
			#$arrUser = $this->user_model->get_user_details($userId);
			
			#$userMail = $arrUser[0]['userEmail'];
			$userMail	= $_POST['email'];

			/* Sending Mail*/
			$this->load->library('email');
			
			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			
			$this->email->from('info@safedoc.com', 'Safe Docs');
			$this->email->to($userMail);
			
			$this->email->subject('Your '.$categoryName.' document');
			
			$emailData = $categoryName .' Document '.br(3);
			if($catId == '4' || $catId == '5' || $catId == '6')
			{
				$emailData .=' <table cellspacing="2" cellpadding="2" width="80%" align="left" border="1" style="border-collapse:collapse;">
								<tr>
									<td align="right" width="30%">Name as on the certificate  </td>
									<td align="left"  width="70%">'.$arrDocument[0]['documentName'].'</td>
								</tr>
								<tr>
									<td align="right">Year of Passing  </td>
									<td align="left">'.$arrDocument[0]['documentYearPassing'].'</td>
								</tr>
								<tr>
									<td align="right">Subject Name </td>
									<td align="left">'.$arrDocument[0]['documentSubjectName'].'</td>
								</tr>
								<tr>
									<td align="right">Name of the Board </td>
									<td align="left">'.$arrDocument[0]['documentBoard'].'</td>
								</tr>
								<tr>
									<td align="right">Total Marks </td>
									<td align="left">'.$arrDocument[0]['documentMarks'].'</td>
								</tr>
								<tr>
									<td align="right">Percentage of marks obtained(Total) </td>
									<td align="left">'.$arrDocument[0]['documentPercentage'].'</td>
								</tr>
								<tr>
									<td align="right">Remarks  </td>
									<td align="left">'.$arrDocument[0]['documentRemarks'].'</td>
								</tr>
							</table>';
			}
			elseif($catId == '7' || $catId == '8')
			{
				if ($catId == '7')
					$name = "Passport Number";
				else 
					$name = "Driving License Number";
				
				$emailData .=' <table cellspacing="2" cellpadding="2" width="80%" align="left" border="1" style="border-collapse:collapse;">
								<tr>
									<td align="right" width="30%">'.$name.'</td>
									<td align="left" width="70%">'.$arrDocument[0]['documentNumber'].'</td>
								</tr>
								<tr>
									<td align="right">Expiry Date </td>
									<td align="left">'.$arrDocument[0]['documentExpiryDate'].'</td>
								</tr>';
				if($arrDocument[0]['documentAlertDate']!='0000-00-00')
				{
					$emailData .='<tr>
									<td align="right"> Alert Date </td>
									<td align="left">'.$arrDocument[0]['documentAlertDate'].'</td>
								</tr>';
				}
							
				$emailData .= '</table>';
			}
			elseif($catId == '9')
			{
				
				$emailData .=' <table cellspacing="2" cellpadding="2" width="80%" align="left" border="1" style="border-collapse:collapse;">
								<tr>
									<td align="right" width="30%">Pancard Number </td>
									<td align="left" width="70%">'.$arrDocument[0]['documentNumber'].'</td>
								</tr>
							</table>';
			}
			
			$emailData .= br(3).' Find attached image of your document';
			
			$docAttach =  $_SERVER['DOCUMENT_ROOT']."/public/upload/user".$userId."/documents/".$arrDocument[0]['documentImage'];
			$this->email->message($emailData);
			$this->email->attach($docAttach);
			
			if ($this->email->send())
			{
				echo "Sent successfully!!";
			}
			
		}else{
			redirect('documents');
		}
	}
	
	
	/**
	* ajaxMailALLDocument
	*
	* This is to mail All doc.
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	public function ajaxMailALLDocument()
	{ 
		if($this->session->userdata('userid')!=''){
			// Fetching document details
			$userId	=$this->session->userdata('userid');
			// Fetching user data
			$this->load->model('user_model');
			$arrUser = $this->user_model->get_user_details($userId);
			
			$userMail = $arrUser[0]['userEmail'];

			$arrDocumentDetails	= $this->document_model->get_user_document_details($userId);
			$emailData ='';
			
			foreach($arrDocumentDetails as $arrDocument){
				//Fetching category details.
				$catId = $arrDocument['documentCategoryId'];
				$arrCategory	= $this->category_model->get_category_details($catId);
				$categoryName	= $arrCategory[0]['docCategoryName'];
				
				// For leaving space in the begining of new doc.
				if($emailData!='')
					$emailData .= br(2).$categoryName .' Document '.br(1);
				else
					$emailData .= $categoryName .' Document '.br(1);
					
				if($catId == '4' || $catId == '5' || $catId == '6')
				{
					$emailData .=' <table cellspacing="2" cellpadding="2" width="80%" align="left" border="1" style="border-collapse:collapse;">
									<tr>
										<td align="right" width="30%">Name as on the certificate  </td>
										<td align="left"  width="70%">'.$arrDocument['documentName'].'</td>
									</tr>
									<tr>
										<td align="right">Year of Passing  </td>
										<td align="left">'.$arrDocument['documentYearPassing'].'</td>
									</tr>
									<tr>
										<td align="right">Subject Name </td>
										<td align="left">'.$arrDocument['documentSubjectName'].'</td>
									</tr>
									<tr>
										<td align="right">Name of the Board </td>
										<td align="left">'.$arrDocument['documentBoard'].'</td>
									</tr>
									<tr>
										<td align="right">Total Marks </td>
										<td align="left">'.$arrDocument['documentMarks'].'</td>
									</tr>
									<tr>
										<td align="right">Percentage of marks obtained(Total) </td>
										<td align="left">'.$arrDocument['documentPercentage'].'</td>
									</tr>
									<tr>
										<td align="right">Remarks  </td>
										<td align="left">'.$arrDocument['documentRemarks'].'</td>
									</tr>
								</table>'.br(3);
				}
				elseif($catId == '7' || $catId == '8')
				{
					if ($catId == '7')
						$name = "Passport Number";
					else 
						$name = "Driving License Number";
					
					$emailData .=' <table cellspacing="2" cellpadding="2" width="80%" align="left" border="1" style="border-collapse:collapse;">
									<tr>
										<td align="right" width="30%">'.$name.'</td>
										<td align="left" width="70%">'.$arrDocument['documentNumber'].'</td>
									</tr>
									<tr>
										<td align="right">Expiry Date </td>
										<td align="left">'.$arrDocument['documentExpiryDate'].'</td>
									</tr>';
					if($arrDocument['documentAlertDate']!='0000-00-00')
					{
						$emailData .='<tr>
										<td align="right"> Alert Date </td>
										<td align="left">'.$arrDocument['documentAlertDate'].'</td>
									</tr>';
					}
								
					$emailData .= '</table>'.br(3);
				}
				elseif($catId == '9')
				{
					
					$emailData .=' <table cellspacing="2" cellpadding="2" width="80%" align="left" border="1" style="border-collapse:collapse;">
									<tr>
										<td align="right" width="30%">Pancard Number </td>
										<td align="left" width="70%">'.$arrDocument['documentNumber'].'</td>
									</tr>
								</table>'.br(3);
				}
				
				$docAttach =  $_SERVER['DOCUMENT_ROOT']."/public/upload/user".$userId."/documents/".$arrDocument['documentImage'];
				$this->email->attach($docAttach);
			}
			
			$emailData .= br(3).' Find attached image of your document';
			
			/* Sending Mail*/
			$this->load->library('email');
			
			$config['mailtype'] = 'html';
			/// $config['protocol'] = 'sendmail';
			$this->email->initialize($config);
			
			$this->email->from('your@example.com', 'Safe Docs');
			$this->email->to($userMail);
			//$this->email->cc('another@another-example.com');
			//$this->email->bcc('them@their-example.com');
			
			$this->email->subject('Your documents');
				
				
			$this->email->message($emailData);
			if ($this->email->send())
			{
				echo "Sent successfully!!";
			}
		}else{
			redirect('documents');
		}
	}
	
	/**
	* search
	*
	* This is to search doc.
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	public function search()
	{
		
		$search = $this->input->post('txtSearch');
		
		// Fetching child category and making key => value array to fill category name
		$arrChildCategory = $this->category_model->get_all_category();
		
		foreach($arrChildCategory as $category){
			$catDetails[$category['docCategoryId']] = $category['docCategoryName'];
		}
		$arrData['catDetails'] = $catDetails ;
		
		$this->db->like('documentName', $search); 
		$this->db->where('documentUserId', $this->session->userdata('userid')); 
		
		$objQuery = $this->db->get('safedoc_document');
		$arrData['documentDetails']	= $objQuery->result_array();
		
		//echo $this->db->last_query(); die;
		
		$arrData['tabIndex'] = '1';
		$arrData['middle'] = 'documents/viewdocuments';
		$this->load->view('template',$arrData);
	}

	/**
	* email
	*
	* This is to email selected documents
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	public function email()
	{
		
		if($this->input->post('subcat')){
			$userId	=$this->session->userdata('userid');
			
			/* 
				// No need of fetching users email id as now there is facility to enter email id in texrbox
			$this->load->model('user_model');
			$arrUser = $this->user_model->get_user_details($userId);
			
			$userMail = $arrUser[0]['userEmail'];
			*/
			$userMail= $this->input->post('txtToEmail');
			
			$categories	= $this->input->post('subcat');
			$catId	= array();
			
			foreach($categories as $key => $value ){
				$catId[] = $value;
			}
			$arrDocument	= $this->document_model->get_user_doc_cat($this->session->userdata('userid'),$catId);
					
			$emailData = '';
			foreach($arrDocument as $document ){
				
				$catId = $document['documentCategoryId'];
				$arrCategory	= $this->category_model->get_category_details($catId);
				$categoryName	= $arrCategory[0]['docCategoryName'];

				// For leaving space in the begining of new doc.
				if($emailData!='')
					$emailData .= br(2).$categoryName .' Document '.br(1);
				else
					$emailData .= $categoryName .' Document '.br(1);
					
				if($catId == '4' || $catId == '5' || $catId == '6')
				{
					$emailData .=' <table cellspacing="2" cellpadding="2" width="80%" align="left" border="1" style="border-collapse:collapse;">
									<tr>
										<td align="right" width="30%">Name as on the certificate  </td>
										<td align="left"  width="70%">'.$document['documentName'].'</td>
									</tr>
									<tr>
										<td align="right">Year of Passing  </td>
										<td align="left">'.$document['documentYearPassing'].'</td>
									</tr>
									<tr>
										<td align="right">Subject Name </td>
										<td align="left">'.$document['documentSubjectName'].'</td>
									</tr>
									<tr>
										<td align="right">Name of the Board </td>
										<td align="left">'.$document['documentBoard'].'</td>
									</tr>
									<tr>
										<td align="right">Total Marks </td>
										<td align="left">'.$document['documentMarks'].'</td>
									</tr>
									<tr>
										<td align="right">Percentage of marks obtained(Total) </td>
										<td align="left">'.$document['documentPercentage'].'</td>
									</tr>
									<tr>
										<td align="right">Remarks  </td>
										<td align="left">'.$document['documentRemarks'].'</td>
									</tr>
								</table>'.br(3);
				}
				elseif($catId == '7' || $catId == '8')
				{
					if ($catId == '7')
						$name = "Passport Number";
					else 
						$name = "Driving License Number";
					
					$emailData .=' <table cellspacing="2" cellpadding="2" width="80%" align="left" border="1" style="border-collapse:collapse;">
									<tr>
										<td align="right" width="30%">'.$name.'</td>
										<td align="left" width="70%">'.$document['documentNumber'].'</td>
									</tr>
									<tr>
										<td align="right">Expiry Date </td>
										<td align="left">'.$document['documentExpiryDate'].'</td>
									</tr>';
					if($document['documentAlertDate']!='0000-00-00')
					{
						$emailData .='<tr>
										<td align="right"> Alert Date </td>
										<td align="left">'.$document['documentAlertDate'].'</td>
									</tr>';
					}
								
					$emailData .= '</table>'.br(3);
				}
				elseif($catId == '9')
				{
					
					$emailData .=' <table cellspacing="2" cellpadding="2" width="80%" align="left" border="1" style="border-collapse:collapse;">
									<tr>
										<td align="right" width="30%">Pancard Number </td>
										<td align="left" width="70%">'.$document['documentNumber'].'</td>
									</tr>
								</table>'.br(3);
				}else{
					
					$emailData .=' <table cellspacing="2" cellpadding="2" width="80%" align="left" border="1" style="border-collapse:collapse;">
									<tr>
										<td align="right" width="30%">Document Name</td>
										<td align="left" width="70%">'.$document['documentName'].'</td>
									</tr>
								</table>'.br(3);
				}
				
				$docAttach =  $_SERVER['DOCUMENT_ROOT']."/public/upload/user".$userId."/documents/".$document['documentImage'];
				$this->email->attach($docAttach);
			}

			/* Sending Mail*/
			$this->load->library('email');
			
			$config['mailtype'] = 'html';
			/// $config['protocol'] = 'sendmail';
			$this->email->initialize($config);
			
			$this->email->from('your@example.com', 'Safe Docs');
			$this->email->to($userMail);
			//$this->email->cc('another@another-example.com');
			//$this->email->bcc('them@their-example.com');
			
			$this->email->subject('Your documents');
				
				
			$this->email->message($emailData);
			if ($this->email->send())
			{
				$this->session->set_flashdata('success', 'Mail Sent Successfully !!');
				redirect('documents');
			}else{
				$this->session->set_flashdata('error', 'Failed to send mail!!');
				redirect('documents');
			}

		}

		$arrData['catDetails']	= $this->category_model->get_categories_front($this->session->userdata('userid'));
		
		$this->load->view('documents/email',$arrData);	
	}

	/**
	* addcategory
	*
	* This is to add category
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	public function addcategory()
	{
		$this->form_validation->set_rules('catName', 'category Name','trim|required');
		
		if ($this->form_validation->run() == True)
        {
			$strErrorMessage = '';
			
			$date = date("Y-m-d");

			$arrData["docCategoryName"]			= $this->input->post('catName');
			$arrData["docCategoryParentId"]		= $this->input->post('mainCat');
			$arrData["docCategoryUserId"]		= $this->session->userdata('userid');
			$arrData["docCategoryCreatedOn"]	= $date;
			$arrData["docCategoryModifiedOn"]	= $date;
						
			$insertedFlag	= $this->category_model->save_category($arrData);
			
			if ($insertedFlag){
				
				$this->session->set_flashdata('success', 'Category Added Successfully !!');
				redirect('documents/viewcategory');

			}else{
				
				$this->session->set_flashdata('error', 'Failed to Add Category !!');
				redirect('documents/addcategory');				
			}

			if(validation_errors() != "")
			{
				$strErrorMessage = validation_errors();
			}


			$arrData["error_message"] = $strErrorMessage;

			$arrData['middle'] = 'documents/addcategory';
			$this->load->view('template',$arrData);	
		}
		
		
		$catDetails	= $this->category_model->get_categories_front($this->session->userdata('userid'));
		$mainCat	= array();
		$mainCat[0] = "---";

		foreach( $catDetails[0] as $key => $value){
			$mainCat[$key] = $value;
		}

		$arrData['mainCat'] = $mainCat;
		$arrData['tabIndex'] = '1';
		$arrData['middle'] = 'documents/addcategory';
		$this->load->view('template',$arrData);	
	}

	
	/**
	* addcategory
	*
	* This is to add category
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	public function viewcategory()
	{
		$arrParentCat		= array();
		$arrParentCat['0']	= '---';
		$arrData['categoryDetails']	= $this->category_model->get_user_category($this->session->userdata('userid'));
		
		$categoryDetails	= $this->category_model->get_category_details();

		foreach($categoryDetails as $catDetails){
			$arrParentCat[$catDetails['docCategoryId']]	= $catDetails['docCategoryName'];
		}
		$arrData['arrParentCat']	= $arrParentCat;
		$arrData['tabIndex'] = '1';		
		$arrData['middle'] = 'documents/viewcategory';
		$this->load->view('template',$arrData);	
	}
	
	/**
	* editcategory
	*
	* This is to edit category
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	public function editcategory($iCatId)
	{
		$validCat	= $this->category_model->checkIfValidCat($iCatId);

		if(!$validCat){
			redirect('documents');
		}
		
		$this->form_validation->set_rules('catName', 'category Name','trim|required');
		
		if ($this->form_validation->run() == True)
        {
			$strErrorMessage = '';
			
			$date = date("Y-m-d");

			$arrUpdateData["docCategoryName"]			= $this->input->post('catName');
			$arrUpdateData["docCategoryModifiedOn"]		= $date;
			
			$updateFlag = $this->category_model->update_category($iCatId,$arrUpdateData);
			
			if ($updateFlag){
				
				$this->session->set_flashdata('success', 'category updated Successfully !!');
				redirect('documents');

			}else{
				
				$this->session->set_flashdata('error', 'Failed to updated category !!');
				redirect('documents'.$iCountryId);				
			}

		}

		$arrChildCategory = $this->category_model->get_category_details();
		$catDetails = array();
		$catDetails[0] = 'No Parent';
		foreach($arrChildCategory as $category){
			$catDetails[$category['docCategoryId']] = $category['docCategoryName'];
		}
		
		$arrData['allCatDetails'] = $catDetails ;
		
		$arrData['catDetails']	= $this->category_model->get_category_details($iCatId);
		$arrData['tabIndex'] = '1';		
		$arrData['middle'] = 'documents/editcategory';
		$this->load->view('template',$arrData);	
		
	}

	/**
	* deletecategory
	*
	* This is to edit category
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	public function deletecategory($iCatId)
	{
		$validCat	= $this->category_model->checkIfValidCat($iCatId);

		if(!$validCat){
			redirect('documents/viewcategory');
		}
		
		
		if($this->category_model->chk_cat_as_doc($iCatId)){
			$this->session->set_flashdata('error', 'cannot delete this category as document');
			redirect('documents/viewcategory');
		}
		
		
		$deleteFlag = $this->category_model->delete_catgory($iCatId);
		
		if ($deleteFlag){
			
			$this->session->set_flashdata('success', 'category deleted Successfully !!');
			redirect('documents/viewcategory');

		}else{
			
			$this->session->set_flashdata('error', 'Failed to delete category !!');
			redirect('documents/viewcategory');				
		}

		
	}
	
	/**
	* deletecategory
	*
	* This is to edit category
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	public function optpassword()
	{
		$userId = $this->session->userdata('userid');

		
		$this->form_validation->set_rules('password', 'OTP Password','trim|required');
		
		if ($this->form_validation->run() == True)
        {
			if($this->user_model->chk_otp_valid($userId,$this->input->post('password'))){
				
				$updateUserData["OTP"]			= '';
				$updateUserData["ActiveOPT"]	= '1';
				$this->user_model->update_user_details($userId,$updateUserData);
				
				$this->session->set_flashdata('success', 'now you can edit documents !!');
				redirect('documents');

			}else{
				$this->session->set_flashdata('error', 'please enter correct otp!!');
				redirect('documents/optpassword');
			}
		}

		if(!$this->user_model->chk_otp_status($userId)){
			$arrData['middle'] = 'documents/optpassword';
			$this->load->view('template',$arrData);	
		}
	}
}