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
 

class Cms extends CI_Controller {

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
		
		$this->load->model('cms_model');
		$this->load->model('advertise_model');
	}

	
	/**
	* index
	*
	* This help to view mutual of current logged in user
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	
	public function index()
	{	
	}
	
	/**
	* index
	*
	* This help to view mutual of current logged in user
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	
	public function view($iCmsId)
	{	
		if ($this->input->post('hidval')){
			$name		= $this->input->post('txtName');
			$address	= $this->input->post('txtAddress');
			$phone		= $this->input->post('txtPhone');
			$email		= $this->input->post('txtEmail');
			$requirment	= $this->input->post('requirement');
			
			if($this->input->post('hidval') == 'advertise'){
					
				$date = date("Y-m-d");

				$arrData["company_name"]	= $name;
				$arrData["address"]			= $address;
				$arrData["Phone"]			= $phone;
				$arrData["email_id"]		= $email;
				$arrData["Requirement"]		= $requirment;
				$arrData["added_date"]		= $date;

				$insertedFlag = $this->advertise_model->save($arrData);

				if ($insertedFlag){
				
					$this->session->set_flashdata('success', 'Wil get back to Soon!!');
					redirect('cms/view/3');

				}else{
					
					$this->session->set_flashdata('error', 'Failed , Please try After Some time !!');
					redirect('cms/view/3');				
				}
			}

			if($this->input->post('hidval') == 'contact'){
				
				$this->load->library('email');
			
				$config['mailtype'] = 'html';
				$this->email->initialize($config);
			
				$this->email->from('info@safedoc.com', 'Safe Docs');
				$this->email->to('info@srvmedia.com');
					
				$this->email->subject('Contact Safedoc');
				$emailData ='Query on Safedoc, Below are the details';
				$emailData .= br(1);
				$emailData .='Name '.$name;
				$emailData .= br(1);
				$emailData .='Adress '.$address;
				$emailData .= br(1);
				$emailData .='phone '.$phone;
				$emailData .= br(1);
				$emailData .='Query '.$requirment;

				$this->email->message($emailData);
			
				//$this->email->send();

				if ($this->email->send()){
				
					$this->session->set_flashdata('success', 'Wil get back to Soon!!');
					redirect('cms/view/4');

				}else{
					
					$this->session->set_flashdata('error', 'Failed , Please try After Some time !!');
					redirect('cms/view/4');				
				}
			}
		}

		$arrData['cmsDetails']	= $this->cms_model->get_cms_details($iCmsId);
		
		$arrData['middle'] = 'viewcms';
		$this->load->view('cms_template',$arrData);
	}

}