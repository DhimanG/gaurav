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
 

class Profile extends CI_Controller {

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
		$this->load->model('user_model');
		$this->load->model('sms_model');
		$this->load->model('country_model');
	}

	
	/**
	* index
	*
	* This help to view profile of current logged in user
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	
	public function index()
	{
		
		$userId	= $this->session->userdata('userid');
		
		$arrData['userDetails']		= $this->user_model->get_user_details($userId);
		$arrData['NotifiDetails']	= $this->user_model->get_notification_details($userId);
		$countryDetailsArr			= $this->country_model->get_country_details();
		$countryArr = array();
		
		foreach($countryDetailsArr as $country){
			$countryArr[$country['countryId']]	= $country['countryName'];
		}
		
		//Fetching payment history
		$arrData['paymentHistory'] ='';
		//if($this->session->userdata('paid') == '1') { 
			$this->db->where('paymentUserId',$userId);
			$this->db->where('paymentStatus','1');
			
			$objData = $this->db->get('safedoc_payment');
			$arrData['paymentHistory']	= $objData->result_array();
		//}
					
		$arrData['countryArr'] = $countryArr;
		$arrData['tabIndex'] = '0';
		$arrData['middle'] = 'profile/viewprofile';
		$this->load->view('template',$arrData);
	}


	/**
	* edit
	*
	* This help to edit user profile
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	
	public function edit()
	{
		
		
		$userId	= $this->session->userdata('userid');
		$this->form_validation->set_rules('userName', 'Username','trim|required');
		
		if ($this->form_validation->run() == TRUE){
			
			$userDetails = $this->user_model->get_user_details($userId);
			
			
			$config['max_size']	= '100000000';
			$config['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'/public/upload/user'.$this->session->userdata('userid').'/profile/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|tiff|bmp';
			
			if(! is_dir($config['upload_path']) ) {
				mkdir($config['upload_path'], 0777);
				chmod($config['upload_path'], 0777);
			}
			
			if ($_FILES['userfile']['name'] != '')
			{
				
				$this->load->library('upload',$config);
				//$this->upload->do_upload('userfile');
				if(!$this->upload->do_upload('userfile'))
				 {
					// If there is any error
					
					 $this->session->set_flashdata('error', $this->upload->display_errors());
					  redirect(base_url()."profile/edit");
				}
				
				//$arrData["userfile"] = $this->upload->file_name;
				
				 //want to create thumbnail
				$data = $this->upload->data();
				
				$config = array(
                    'source_image' => $data['full_path'], //get original image
                    'new_image' => $data['file_path'] . '/thumb', //save as new image //need to create thumbs first
                    'maintain_ratio' => true,
                    'width' => '148',
                    'height' => '95',
					'create_thumb' => TRUE,
					'thumb_marker' => '_142X94'
                );
				
				if(! is_dir($config['new_image']) ) {
					mkdir($config['new_image'], 0777);
					chmod($config['new_image'], 0777);
				}

                $this->load->library('image_lib', $config); //load library
                $this->image_lib->resize(); //do whatever specified in config

				$this->image_lib->resize();
        		
					
				$thumbPath	= $data['raw_name']."_142X94".$data['file_ext'];
				$fullPath	= $data['file_name'];
				
				$updateUserData["profile_image_path_original"]			= $fullPath;
				$updateUserData["profile_image_path_thumb"]				= $thumbPath;

				$thumbprevious		= $userDetails[0]['profile_image_path_thumb'];
				$profileprevious	= $userDetails[0]['profile_image_path_original'];
				
				$config['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'/public/upload/user'.$this->session->userdata('userid').'/profile/';

				if($profileprevious != "" && file_exists($config['upload_path'].$profileprevious)){
					unlink($config['upload_path'].$profileprevious);
				}
				if($thumbprevious != "" && file_exists($config['upload_path'].'thumb/'.$thumbprevious)){
					unlink($config['upload_path'].'thumb/'.$thumbprevious);
				}
			}

			$date	= date("Y-m-d");
	
			$updateUserData["userName"]			= $this->input->post('userName');
			$updateUserData["userEducation"]	= $this->input->post('userEducation');
			$updateUserData["userWork"]			= $this->input->post('userWork');
			$updateUserData["userCountryId"]	= $this->input->post('userCountry');
			$updateUserData["userAboutMySelf"]	= $this->input->post('userMyself');
			$updateUserData["userCity"]			= $this->input->post('userCity');
			$updateUserData["userEmail"]		= $this->input->post('useremail');
			$updateUserData["userMobile"]		= $this->input->post('dataPhone');
			$updateUserData["userUpdatedOn"]	= $date;
			// Converting date format to 'Y-m-d' to store in database
			/*echo $this->input->post('userDOB')." <br/>";
			echo strtotime($this->input->post('userDOB'))."<br/>";
			echo */$dob =date('Y-m-d',strtotime($this->input->post('userDOB')));
			$updateUserData["userDOB"]	= $dob;
			
			
			if($this->input->post('chkEmail')){
				$updateUserNotifi["notificationByEmail"] = '1';
			}else{
				$updateUserNotifi["notificationByEmail"] = '';
			}
			
			if($this->input->post('chkMessage')){
				$updateUserNotifi["notificationBySMS"] = '1';
			}else{
				$updateUserNotifi["notificationBySMS"] = '';
			}
			
			
			$updateUserNotifi["notificationModifiedOn"]	= $date;

			$userUpdateFlag = $this->user_model->update_user_details($userId,$updateUserData);
			$this->session->set_userdata('name',$updateUserData["userName"]);
			
			if($this->user_model->chk_notification_exists($userId)){
				$this->user_model->update_user_notification($userId,$updateUserNotifi);
			}else{
				
				$updateUserNotifi['notificationUserId']		= $userId;
				$updateUserNotifi["notificationCreatedOn"]	= $date;

				$this->user_model->save_notification($updateUserNotifi);
			}
			
			if($userUpdateFlag){
				redirect('profile');	
			}else{
				redirect('profile/edit');
			}
		}

		$arrData['userDetails'] = $this->user_model->get_user_details($userId);
		$arrData['userId'] = $userId;
		$arrData['NotifiDetails']	= $this->user_model->get_notification_details($userId);
		
		$countryDetailsArr	= $this->country_model->get_country_details();
		$countryArr['0']	= '--Select Country--';
		foreach($countryDetailsArr as $country){
			$countryArr[$country['countryId']]	= $country['countryName'];
		}

		$arrData['countryArr'] = $countryArr;
		$arrData['tabIndex'] = '0';
		$arrData['middle'] = 'profile/editprofile';
		$this->load->view('template',$arrData);
	}
	/**
	* change_password
	*
	* This help to change user pwd
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	
	public function change_password()
	{	
		
		
		if ($this->input->post('cmdSubmit')){
			$userId	= $this->session->userdata('userid');
			$userArr = $this->user_model->get_user($userId);
		
			$date	= date("Y-m-d");
			
			$updateUserData["userPassword"]		= md5($this->input->post('password'));
			$updateUserData["userUpdatedOn"]	= $date;
			
			$userUpdateFlag = $this->user_model->update_user_details($this->session->userdata('userid'),$updateUserData);
			

			if( $userArr[0]['notificationBySMS'] == '1'){
						
				$recipient	= $userArr[0]['userMobile'];
				$password	= $this->input->post('password');
				$body		= $this->config->item('template_change');
				
				eval("\$body = \"$body\";");
						
				$this->sms_model->sms_notification($recipient,$body);
			}

			if ($userUpdateFlag){
				$this->session->set_flashdata('success', 'Password Updated Successfully !!');
				redirect('profile/change_password');
			}else{
				$this->session->set_flashdata('error', 'Failed to Update Password !!');
				redirect('profile/change_password');				
			}
		}
		
		

		$arrData['middle'] = 'profile/changepassword';
		$this->load->view('template',$arrData);
	}
	
	// this is not used currently, bt if the renewal is on monthly basis, then we need it.
	/**
	* payment_history
	*
	* This wil display user payment history
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	
	public function payment_history()
	{
		$iUserId = $this->session->userdata['userid'];
		if($iUserId!='')
		{
			$arrData['userArr'] = $this->user_model->get_user_details($iUserId);
			
			$this->db->where('paymentUserId',$iUserId);
			$this->db->where('paymentStatus','1');
			
			$objData = $this->db->get('safedoc_payment');
			$arrData['paymentHistory']	= $objData->result_array();
			
			$arrData['middle'] = 'profile/paymenthistory';
			$this->load->view('template',$arrData);
		}
	}
	
}