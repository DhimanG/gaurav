<?php
/**
 * Safe Doc
 *
 * @Description  This class is used to interact with the country table using Codeignitor db core class. All the Data Insert,Retrival and Update operations related to country are performed here.
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
 * This is country Model
 *
 * @author		Sunil Silumala
 * @package		Safe Doc
 * @subpackage	Model
 */

class Country_model extends CI_Model{
	
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
	 * save_country
	 *
	 * This is used to save country details
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   array-$arrData
	 * @return void
	 */
	function save_country($arrData){
		
		if($this->db->insert('safedoc_country', $arrData)){
			return true;
		}else{
			return false;
		}

	}


	/**
	 * get_country_details
	 *
	 * This is used to get country details
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   integer-$iCountryId 
	 * @return void
	 */
	function get_country_details($iCountryId = 0){
		
		$arrData = array();
		
		if($iCountryId != 0 ){
			$this->db->where('countryId', $iCountryId); 
		}
		
		$this->db->select('countryId,countryName');
		
		$objQuery = $this->db->get('safedoc_country');
		
		//$this->db->last_query();
		
		return $objQuery->result_array();

	}


	/**
	 * update_country
	 *
	 * This is used to update country details
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   array-$arrData, integer-$iCountryId
	 * @return void
	 */
	function update_country($iCountryId,$arrData){
		
		$this->db->where('countryId',$iCountryId);

		if($this->db->update('safedoc_country', $arrData))
		{
				return true;
		}
		else
		{
				return false;
		}	
	}
	
	/**
	 * delete_country
	 *
	 * This is used to delete country details
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   array-$arrData, integer-$iCountryId
	 * @return void
	 */
	function delete_country($iCountryId){
		
		// $this->db->where('countrysId',$iCountryId);
		if($this->db->delete('safedoc_country', array('countryId' => $iCountryId)))
		{
				return true;
		}
		else
		{
				return false;
		}	
	}
	
	/**
	 * multi_delete_country
	 *
	 * This is used to delete multiple country details
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   array-$arrData, integer-$iCountryId
	 * @return void
	 */
	// We are not using this function as deleting company need to chk in profile table too.
	function multi_delete_country($arriNewfeedId){
		
		$this->db->where_in('countryId', $arriNewfeedId);
		if($this->db->delete('safedoc_country'))
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