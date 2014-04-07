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
		
		if($this->session->userdata('logged_in') == FALSE) {
			redirect('admin/login');
			break;
		}

		$this->load->model('cms_model');
	///	$this->load->helper('ckeditor');
	}

	
	/**
	* index
	*
	* This help to list all the countries
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	
	public function index()
	{
		$arrData['cmsDetails']	= $this->cms_model->get_cms_details();
		
		$arrData['middle'] = 'admin/cms/listcms';
		$this->load->view('admin/template',$arrData);		
	}

	/**
	* edit
	*
	* This help to edit cms
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	
	public function edit($iCmsId)
	{
		$arrData['cmsDetails']	= $this->cms_model->get_cms_details($iCmsId);
		
		if ($this->input->post('cmdSubmit')){
			
			$date = date("Y-m-d");

			$UpdateData["cmsTitle"]			= $this->input->post('cmsTitle');
			$UpdateData["cmsContent"]		= $this->input->post('cmsContent');
			$UpdateData["cmsKeyword"]		= $this->input->post('cmsKeyword');
			$UpdateData["cmsDescription"]	= $this->input->post('cmsDescription');
			$UpdateData["cmsUpdatedDate"]	= $date;
						
			$updateFlag	= $this->cms_model->update_cms($iCmsId,$UpdateData);
			
			if ($updateFlag){
				
				$this->session->set_flashdata('success', 'cms updated Successfully !!');
				redirect('admin/cms');

			}else{
				
				$this->session->set_flashdata('error', 'Failed to updated cms !!');
				redirect('admin/cms/edit/'.$iCmsId);				
			}

		}
		$arrData['middle'] = 'admin/cms/edit';
		$this->load->view('admin/template',$arrData);
	}

	/**
	* view
	*
	* This help to list all the countries
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	
	public function view($iCmsID)
	{
		if($iCmsID!='')
		{
			$arrData['cmsDetails']	= $this->cms_model->get_cms_details($iCmsID);
		
			$arrData['middle'] = 'admin/cms/detail';
			$this->load->view('admin/template',$arrData);		
		}else{
			redirect('admin/cms');
		}
	}

}