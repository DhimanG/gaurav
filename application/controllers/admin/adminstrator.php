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
 

class Adminstrator extends CI_Controller {

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
		
		$arrData['adminDetails']	= $this->admin_model->get_admin_details();

		$arrData['middle'] = 'admin/adminstrator/listadminstrator';
		$this->load->view('admin/template',$arrData);
	}

	/**
	* add
	*
	* This help to add adminstrator
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	
	public function add()
	{
		/*echo "<pre>";
		print_r($_POST);
		echo "</pre>";
		
		*/
		if ($this->input->post('cmdSubmit')){
			
			$this->form_validation->set_rules('adminstratorname', 'Username','trim|required');
			
			if ($this->form_validation->run() == TRUE){
				
				$date = date("Y-m-d");  
	
				$arrInsertData["adminUserName"]	    	= $this->input->post('adminstratorname');
				$arrInsertData["adminUserEmail"]	    = $this->input->post('email');
				$arrInsertData["adminUserPassword"]		= md5($this->input->post('password'));
				$arrInsertData["adminUserCreatedOn"]	= $date;
				$arrInsertData["adminUserModifiedOn"]	= $date;
							
				$insertedFlag	= $this->admin_model->save_admin($arrInsertData);
				
				if ($insertedFlag){
					
					$this->session->set_flashdata('success', 'Admin Added Successfully !!');
					redirect('admin/adminstrator');
	
				}else{
					
					$this->session->set_flashdata('error', 'Failed to Add admin !!');
					redirect('admin/adminstrator/add');				
				}
			}
		}
		
		$arrData['middle'] = 'admin/adminstrator/add';
		$this->load->view('admin/template',$arrData);
	}


	/**
	* edit
	*
	* This help to edit adminstrator
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	
	public function edit($iAdminId)
	{	
		if ($this->input->post('email')){
			
			$date = date("Y-m-d");
						
			$UpdateData["adminUserEmail"]		= $this->input->post('email');
			$UpdateData["adminUserModifiedOn"]	= $date;
			
			if($this->input->post('password')!='' && $this->input->post('password')==$this->input->post('confirm_password'))
				$UpdateData["adminUserPassword"]= md5($this->input->post('password'));
			
			$updateFlag	= $this->admin_model->update_admin($iAdminId,$UpdateData);
			
			if ($updateFlag){
				$this->session->set_flashdata('success', 'Administrator updated Successfully !!');
				redirect('admin/adminstrator');
			}else{
				$this->session->set_flashdata('error', 'Failed to updated Administrator !!');
				redirect('admin/adminstrator/edit/.$iAdminId');
			}
		}
		
		$arrData['arrAdminDetails']	= $this->admin_model->get_admin_details($iAdminId);
		$arrData['middle'] = 'admin/adminstrator/edit';
		$this->load->view('admin/template',$arrData);
	}
	
	/**
	* AdminNameValidation
	*
	* This wil display adminstrator
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	
	public function AdminNameValidation()
	{	
		$userName = $_GET['adminstratorname'];
		
		$this->db->where('adminUserName ', $userName); 
		
		$objQuery = $this->db->get('safedoc_admin_user');
		$arrData = $objQuery->result_array();
		
		if($arrData)
			echo 'false';
		else
			echo 'true';
	}
}