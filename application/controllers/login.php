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
 

class Login extends CI_Controller {

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
		if ($this->input->post('loginName')){
			$userName = $this->input->post('loginName');
			$password = $this->input->post('loginPass');

			$this->user_model->verifyUser($userName,$password);

			if ($this->session->userdata('logged_user_in')=== TRUE){
				redirect('profile');
			}else{
				redirect('login');
			}
		}
		
		$arrData['middle'] = 'login';
		$this->load->view('signup_template',$arrData);
	}
}