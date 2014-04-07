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
 

class Logout extends CI_Controller {

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
		$this->load->model('user_model');
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
		$userId = $this->session->userdata('userid');

		$updateUserData["OTP"]			= '';
		$updateUserData["ActiveOPT"]	= '0';
		$this->user_model->update_user_details($userId,$updateUserData);

		$this->session->sess_destroy();
		redirect('login');
	}
}