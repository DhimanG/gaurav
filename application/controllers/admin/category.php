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
 

class Category extends CI_Controller {

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

		$this->load->model('category_model');
	
	}

	
	/**
	* index
	*
	* This help to list all the categories
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	
	public function index()
	{
		$arrParentCat		= array();
		$arrParentCat['0']	= '---';

		$arrData['categoryDetails']	= $this->category_model->get_category_details();
		
		foreach($arrData['categoryDetails'] as $catDetails){
			$arrParentCat[$catDetails['docCategoryId']]	= $catDetails['docCategoryName'];
		}
		$arrData['arrParentCat']	= $arrParentCat;
		$arrData['middle']			= 'admin/category/listcategory';
		$this->load->view('admin/template',$arrData);		
	}


	/**
	* add
	*
	* This help to add category
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	
	public function add()
	{
		$catDetails = array();
		
		if ($this->input->post('cmdSubmit')){
			
			$date = date("Y-m-d");

			$arrData["docCategoryName"]			= $this->input->post('catname');
			$arrData["docCategoryParentId"]		= $this->input->post('mainCat');
			$arrData["docCategoryCreatedOn"]	= $date;
			$arrData["docCategoryModifiedOn"]	= $date;
						
			$insertedFlag	= $this->category_model->save_category($arrData);
			
			if ($insertedFlag){
				
				$this->session->set_flashdata('success', 'Category Added Successfully !!');
				redirect('admin/category');

			}else{
				
				$this->session->set_flashdata('error', 'Failed to Add Category !!');
				redirect('admin/category/add');				
			}
		}
		$categoryDetails	= $this->category_model->get_category_details('0','0');
		
		$catDetails[0] = "---";
		
		foreach($categoryDetails as $category){
			$catDetails[$category['docCategoryId']] = $category['docCategoryName'];
		}
		
		$arrData['catDetails'] = $catDetails ;
		$arrData['middle'] = 'admin/category/add';
		$this->load->view('admin/template',$arrData);
	}


	/**
	* edit
	*
	* This help to edit category
	* 
	* @author	Sunil Silumala
	* @access	public
	* @param	iCategoryId
	* @return	void
	*/
	
	public function edit($iCategoryId)
	{
		$catDetails = array();

		$arrData['categoryDetails']	= $this->category_model->get_category_details($iCategoryId);
		
		$categoryDetails	= $this->category_model->get_category_details('0','0');
		
		$catDetails[0] = "---";
		
		foreach($categoryDetails as $category){
			$catDetails[$category['docCategoryId']] = $category['docCategoryName'];
		}
		
		$arrData['catDetails'] = $catDetails ;

		if ($this->input->post('cmdSubmit')){
			
			$date = date("Y-m-d");

			$UpdateData["docCategoryName"]			= $this->input->post('catname');
			$UpdateData["docCategoryModifiedOn"]	= $date;
						
			$updateFlag	= $this->category_model->update_category($iCategoryId,$UpdateData);
			
			if ($updateFlag){
				
				$this->session->set_flashdata('success', 'category updated Successfully !!');
				redirect('admin/category');

			}else{
				
				$this->session->set_flashdata('error', 'Failed to updated category !!');
				redirect('admin/category/edit/'.$iCountryId);				
			}

		}
		
		$arrData['middle'] = 'admin/category/edit';
		$this->load->view('admin/template',$arrData);
	}
}