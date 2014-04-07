<?php
/**
 * Safe Doc
 *
 * @Description  This class is used to interact with the fund table using Codeignitor db core class. All the Data Insert,Retrival and Update operations related to fund are performed here.
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
 * This is fund Model
 *
 * @author		Sunil Silumala
 * @package		Safe Doc
 * @subpackage	Model
 */

class fund_model extends CI_Model{
	
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
	 * save_fund
	 *
	 * This is used to save fund details
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   array-$arrData
	 * @return void
	 */
	function save_fund($arrData){
		
		if($this->db->insert('safedoc_mutualfunds', $arrData)){
			return true;
		}else{
			return false;
		}

	}


	/**
	 * get_fund_details
	 *
	 * This is used to get fund details
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   integer-$iCompanyId 
	 * @return void
	 */
	function get_fund_details($iFundId = 0){
		
		$arrData = array();
		
		if($iFundId != 0 ){
			$this->db->where('mutualfundsId', $iFundId); 
		}
		
		//$this->db->select('mutualCompanyId,mutualCompanyName');
		
		$objQuery = $this->db->get('safedoc_mutualfunds');
		
		//$this->db->last_query();
		
		return $objQuery->result_array();

	}


	/**
	 * update_fund
	 *
	 * This is used to update fund details
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   array-$arrData, integer-$iCompanyId
	 * @return void
	 */
	function update_fund($iFundId,$arrData){
		
		$this->db->where('mutualfundsId',$iFundId);

		if($this->db->update('safedoc_mutualfunds', $arrData))
		{
				return true;
		}
		else
		{
				return false;
		}	
	}
	
	/**
	 * delete_fund
	 *
	 * This is used to delete fund details
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   array-$arrData, integer-$iCompanyId
	 * @return void
	 */
	function delete_fund($iFundId){
		
		// $this->db->where('fundsId',$iCompanyId);
		if($this->db->delete('safedoc_mutualfunds', array('mutualfundsId' => $iFundId)))
		{
				return true;
		}
		else
		{
				return false;
		}	
	}
	
	/**
	 * multi_delete_fund
	 *
	 * This is used to delete multiple fund details
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   array-$arrData, integer-$iCompanyId
	 * @return void
	 */
	// Not using this now as there is delete constrain.
	// Commented by rima
	/*function multi_delete_fund($arriFundId){
		
		$this->db->where_in('mutualfundsId', $arriFundId);
		if($this->db->delete('safedoc_mutualfunds'))
		{
				return true;
		}
		else
		{
				return false;
		}	
	}*/
	
	/**
	 * get_fund_detailsOnCompanyId
	 *
	 * This is used to get fund details
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   integer-$iCompanyId 
	 * @return void
	 */
	function get_fund_detailsOnCompanyId($iFundId = 0){
		
		$arrData = array();
		
		if($iFundId != 0 ){
			$this->db->where('mutualfundsCompanyId', $iFundId); 
		}
		
		//$this->db->select('mutualCompanyId,mutualCompanyName');
		
		$objQuery = $this->db->get('safedoc_mutualfunds');
		
		//$this->db->last_query();
		
		return $objQuery->result_array();

	}

	/**
	 * update_by_fund_code
	 *
	 * This is used to update fund details
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   array-$arrData, integer-$ifundsCode
	 * @return void
	 */
	function update_by_fund_code($ifundsCode,$arrData){
		
		$this->db->where('mutualfundsCode',$ifundsCode);

		if($this->db->update('safedoc_mutualfunds', $arrData))
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