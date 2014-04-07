<?php
/**
 * Safe Doc
 *
 * @Description  This class is used to interact with the Category table using Codeignitor db core class. All the Data Insert,Retrival and Update operations related to Category are performed here.
 *
 * @package		Safe Doc
 * @subpackage  Model
 * @author		Sunil Silumala
 * @copyright	Copyright (c) 2012 - 2013
 * @since		Version 1.0
 */
 
// ------------------------------------------------------------------------

/**
 *
 * This is Category Model
 *
 * @author		Sunil Silumala
 * @package		Safe Doc
 * @subpackage	Model
 */

class Category_model extends CI_Model{
	
	// --------------------------------------------------------------------

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
		// Initialization of class
		parent::__construct();
	}
	
	/**
	 * save_category
	 *
	 * This is used to save category details
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   array-$arrData
	 * @return void
	 */
	function save_category($arrData){
		
		if($this->db->insert('safedoc_doc_category', $arrData)){
			return true;
		}else{
			return false;
		}

	}


	/**
	 * get_category_details
	 *
	 * This is used to get category details
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   integer-$icategoryId 
	 * @return void
	 */
	function get_category_details($iCategoryId = 0,$iParentCatId = -1){
		
		$arrData = array();
		
		if($iCategoryId != 0 ){
			$this->db->where('docCategoryId', $iCategoryId); 
		}
		
		if($iParentCatId != -1 ){
			$this->db->where('docCategoryParentId', $iParentCatId);
		}
		
		if($iCategoryId == 0 ){
			$this->db->where('docCategoryUserId', '0'); 
		}

		$this->db->select('docCategoryId,docCategoryName,docCategoryParentId');
		
		$objQuery = $this->db->get('safedoc_doc_category');
		
		//$this->db->last_query();
		
		return $objQuery->result_array();

	}


	/**
	 * update_category
	 *
	 * This is used to update category details
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   array-$arrData, integer-$iCountryId
	 * @return void
	 */
	function update_category($iCategoryId,$arrData){
		
		$this->db->where('docCategoryId',$iCategoryId);

		if($this->db->update('safedoc_doc_category', $arrData))
		{
				return true;
		}
		else
		{
				return false;
		}	

	}
	
	/**
	 * get_all_child_category
	 *
	 * This is used to get child category
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   integer-$icategoryId 
	 * @return void
	 */
	function get_all_child_category($userId = 0){
		
		$arrData = array();
		
		$this->db->select();
		
		if($userId != 0){
			$where = "docCategoryParentId != '0' AND docCategoryUserId = '0' OR docCategoryParentId != '0' AND docCategoryUserId = '".$userId."'";
			$this->db->where($where);
		}else{
			$this->db->where('docCategoryParentId !=','0');
		}
		
		
		$objQuery = $this->db->get('safedoc_doc_category');
		
		//echo $this->db->last_query();
		return $objQuery->result_array();
	}

	
	/**
	 * get_categories_front
	 *
	 * This is used to get categories with child category
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   integer-$icategoryId 
	 * @return void
	 */

	function get_categories_front($userId = 0){
		
		$catArr	= array();

		$this->db->select('docCategoryId,docCategoryName,docCategoryParentId');
		
		if($userId != 0){
			$where = "docCategoryUserId = '0' OR docCategoryUserId = '".$userId."'";
			$this->db->where($where);
		}else{
			$this->db->where('docCategoryUserId','0');
		}

		$objQuery = $this->db->get('safedoc_doc_category');
		
		//echo $this->db->last_query();

		$resultArray	= $objQuery->result_array();	
		
		foreach($resultArray as $result){
			
			$catArr[$result['docCategoryParentId']][$result['docCategoryId']]	= $result['docCategoryName'];  
		}

		return $catArr;
	}
	

	/**
	 * get_parent_id
	 *
	 * This is used to get parent id
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   integer-$icategoryId 
	 * @return void
	 */
	function get_parent_id($iCategoryId){
		
		$arrData = array();
		
		$this->db->select('docCategoryParentId');
		$this->db->where('docCategoryId', $iCategoryId); 
		$objQuery = $this->db->get('safedoc_doc_category');
		
		//echo $this->db->last_query();
		
		return $objQuery->result_array();

	}


	/**
	 * get_user_category
	 *
	 * This is used to get user category details
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   integer-$icategoryId 
	 * @return void
	 */
	function get_user_category($iUserId){
		
		$arrData = array();
		
		$this->db->select('docCategoryId,docCategoryName,docCategoryParentId,docCategoryUserId');
		$this->db->where('docCategoryUserId', $iUserId); 
		$objQuery = $this->db->get('safedoc_doc_category');
		
		//$this->db->last_query();
		
		return $objQuery->result_array();

	}

	/**
	 * checkIfValidCat
	 *
	 * This is used to check valid category
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   integer-$icategoryId 
	 * @return void
	 */
	function checkIfValidCat($icategoryId){
		
		$arrData = array();
		
		$this->db->select('docCategoryId,docCategoryName,docCategoryParentId,docCategoryUserId');
		$this->db->where('docCategoryId', $icategoryId); 
		$this->db->where('docCategoryUserId', $this->session->userdata('userid'));
		$objQuery = $this->db->get('safedoc_doc_category');
		
		//$this->db->last_query();
		
		if($objQuery->result_array()){
			return true;
		}else{
			return false;
		}

	}

	/**
	 * get_all_category
	 *
	 * This is used to get all category
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   integer-$icategoryId 
	 * @return void
	 */
	function get_all_category(){
		
		$arrData = array();
		
		$this->db->select();
		
		$objQuery = $this->db->get('safedoc_doc_category');
		
		//echo $this->db->last_query();
		return $objQuery->result_array();
	}


	/**
	 * chk_cat_as_doc
	 *
	 * This is used to check whether category as document or not
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   integer-$icategoryId 
	 * @return void
	 */
	function chk_cat_as_doc($icategoryId){
		
		$arrData = array();
		
		$this->db->select('documentId');
		$this->db->where('documentCategoryId', $icategoryId); 
		$objQuery = $this->db->get('safedoc_document');
		
		//echo $this->db->last_query();
		if($objQuery->result_array()){
			return true;
		}else{
			return false;
		}
	}


	/**
	 * delete_catgory
	 *
	 * This is used to delete category details
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   integer-$icategoryId
	 * @return void
	 */
	function delete_catgory($icategoryId){
		
		if($this->db->delete('safedoc_doc_category', array('docCategoryId' => $icategoryId)))
		{
				return true;
		}
		else
		{
				return false;
		}	
	}
		
}

?>