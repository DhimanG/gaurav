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

class Advertise_model extends CI_Model{
	
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
	 * safedoc_advertise
	 *
	 * This is used to save advertise details
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   array-$arrData
	 * @return void
	 */
	function save($arrData){
		
		if($this->db->insert('safedoc_advertise', $arrData)){
			return true;
		}else{
			return false;
		}

	}


	/**
	 * get_advertise
	 *
	 * This is used to get advertise
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   
	 * @return void
	 */
	function get_advertise(){
		
		$arrData = array();
		
		
		$this->db->select('company_name,address,Phone,email_id,Requirement');
		
		$objQuery = $this->db->get('safedoc_advertise');
		
		//$this->db->last_query();
		
		return $objQuery->result_array();

	}


}

?>