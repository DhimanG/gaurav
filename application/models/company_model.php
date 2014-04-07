<?php
/**
 * Safe Doc
 *
 * @Description  This class is used to interact with the company table using Codeignitor db core class. All the Data Insert,Retrival and Update operations related to company are performed here.
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
 * This is company Model
 *
 * @author		Sunil Silumala
 * @package		Safe Doc
 * @subpackage	Model
 */

class Company_model extends CI_Model{
	
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
	 * save_company
	 *
	 * This is used to save company details
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   array-$arrData
	 * @return void
	 */
	function save_company($arrData){
		
		if($this->db->insert('safedoc_mutual_company', $arrData)){
			return true;
		}else{
			return false;
		}

	}


	/**
	 * get_company_details
	 *
	 * This is used to get company details
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   integer-$iCompanyId 
	 * @return void
	 */
	function get_company_details($iCompanyId = 0){
		
		$arrData = array();
		
		if($iCompanyId != 0 ){
			$this->db->where('mutualCompanyId', $iCompanyId); 
		}
		
		$this->db->select('mutualCompanyId,mutualCompanyName');
		
		$objQuery = $this->db->get('safedoc_mutual_company');
		
		//$this->db->last_query();
		
		return $objQuery->result_array();

	}


	/**
	 * update_company
	 *
	 * This is used to update company details
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   array-$arrData, integer-$iCompanyId
	 * @return void
	 */
	function update_company($iCompanyId,$arrData){
		
		$this->db->where('mutualCompanyId',$iCompanyId);

		if($this->db->update('safedoc_mutual_company', $arrData))
		{
				return true;
		}
		else
		{
				return false;
		}	
	}
	
	/**
	 * delete_company
	 *
	 * This is used to delete company details
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   array-$arrData, integer-$iCompanyId
	 * @return void
	 */
	function delete_company($iCompanyId){
		
		// $this->db->where('companysId',$iCompanyId);
		if($this->db->delete('safedoc_mutual_company', array('mutualCompanyId' => $iCompanyId)))
		{
				return true;
		}
		else
		{
				return false;
		}	
	}
	
	/**
	 * multi_delete_company
	 *
	 * This is used to delete multiple company details
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   array-$arrData, integer-$iCompanyId
	 * @return void
	 */
	function multi_delete_company($arriNewfeedId){
		
		$this->db->where_in('mutualCompanyId', $arriNewfeedId);
		if($this->db->delete('safedoc_mutual_company'))
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