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
 

class Activate extends CI_Controller {

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
		$this->load->helper('captcha');
		$this->load->model('user_model');
	}

	
	/**
	* account
	*
	* This help to activate account
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	
	public function account($username,$key)
	{
		$userDeatils = $this->user_model->activate_user($username,$key);
		
		if($userDeatils[0]['isActive']	== '1'){
			$this->session->set_flashdata('error', 'Your Account already activated, please login');
			redirect('login');
		}

		if($userDeatils){
			
			$arrData['isActive'] = '1';
			$iUserId = $userDeatils[0]['userId'];
			$this->user_model->update_user_details($iUserId,$arrData);
			$ses_user = array("username"=>$userDeatils[0]['userUName'],"userid"=>$userDeatils[0]['userId'],"name"=>$userDeatils[0]['userUName'],"logged_user_in"=>TRUE);
					
			$this->session->set_userdata($ses_user);

			redirect('payments/package');
		}else{
			$this->session->set_flashdata('error', 'Failed to activate account, please click on correct link');

			redirect('login');
		}
	}
}

?>