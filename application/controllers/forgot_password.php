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
 

class Forgot_password extends CI_Controller {

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
		if($this->session->userdata('logged_user_in') == TRUE) {
			redirect('profile');
			break;
		}
		$this->load->model('user_model');
		$this->load->model('sms_model');
		$this->load->helper('html');
	}

	
	/**
	* index
	*
	* This help to check if User credentials are correct
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	
	public function index()
	{
		if ($this->input->post('userEmail')){
			
			$email = $this->input->post('userEmail');
			
			if ($email!='')
			{
				$userData = $this->user_model->get_user_by_email($email);
				
				if ($userData){
					$password =  $this->user_model->encrypt();
					
					/// Upating data in DB
					$updateUserData["userPassword"]	= md5($password);
					$this->user_model->update_user_details($userData[0]['userId'],$updateUserData);
					
					/* Sending Mail*/
					$this->load->library('email');
					
					$config['mailtype'] = 'html';
					$this->email->initialize($config);
					
					$this->email->from('info@safedoc.com', 'Safe Docs');
					$this->email->to($email);
					
					$this->email->subject('Password for SafeDocs');
					
					$emailData  = "Dear ".$userData[0]['userName'].br(3);
					$emailData .= "Your user name is : ". $userData[0]['userUName'].br(2);
					$emailData .= "Your New Password is : ". $password;
					
					$this->email->message($emailData);


					if( $userData[0]['notificationBySMS'] == '1'){
						
						$recipient = $userData[0]['userMobile'];

						$body = $this->config->item('template_change');
						
						eval("\$body = \"$body\";");
						
						
						$this->sms_model->sms_notification($recipient,$body);
					}
					
					if ($this->email->send())
					{
						$this->session->set_flashdata('success', 'Your password has been sent to your email id. !!');
						redirect('login');
					}
				}else{
					
					$this->session->set_flashdata('error', 'Email id not found !!');
					redirect('forgot_password');				
				}
			}else
			{
				$this->session->set_flashdata('error', 'Please enter Email id !!');
				redirect('forgot_password');
			}
			
		}
		$arrData['middle'] = 'forgot_password';
		$this->load->view('signup_template',$arrData);
	}
}