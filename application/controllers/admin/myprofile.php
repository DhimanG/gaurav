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
 

class Myprofile extends CI_Controller {

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
		
		if($this->session->userdata('logged_in') == FALSE) {
			redirect('admin/login');
			break;
		}
		$this->load->model('admin_model');
		$this->load->library('form_validation');
	}

	
	/**
	* index
	*
	* This wil display adminstrator
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	
	public function index()
	{	
		//if ($this->input->post('cmdSubmit')){
		if ($this->input->post('email')){
			
			$date = date("Y-m-d");
			
			$id		= $this->input->post('id');
			
			$UpdateData["adminUserEmail"]		= $this->input->post('email');
			$UpdateData["adminUserModifiedOn"]	= $date;
			
			if($this->input->post('password')!='' && $this->input->post('password')==$this->input->post('confirm_password'))
				$UpdateData["adminUserPassword"]= md5($this->input->post('password'));
			
			$updateFlag	= $this->admin_model->update_admin($id,$UpdateData);
			
			if ($updateFlag){
				$this->session->set_flashdata('success', 'Profile updated Successfully !!');
				redirect('admin/myprofile');
			}else{
				$this->session->set_flashdata('error', 'Failed to updated Profile !!');
				redirect('admin/myprofile');
			}
		}
		
		$userId = $this->session->userdata['adminUserid'];
		$arrData['arrAdminDetails']	= $this->admin_model->get_admin_details($userId);
		$arrData['middle'] = 'admin/myprofile/edit';
		$this->load->view('admin/template',$arrData);
	}
	
	/**
	* EmailValidation
	*
	* This wil display adminstrator
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	
	public function EmailValidation($userId='')
	{	
		$email = $_GET['email'];
		
		if ($userId!='')
			$this->db->where('adminUserID !=', $userId); 
		
		$this->db->where('adminUserEmail', $email); 
		
		$objQuery = $this->db->get('safedoc_admin_user');
		$arrData = $objQuery->result_array();
		
		if($arrData)
			echo 'false';
		else
			echo 'true';
	}
}