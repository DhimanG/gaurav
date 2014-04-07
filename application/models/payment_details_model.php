<?php
/**
 * Safe Doc
 *
 * @Description  This class is used to interact with the Portfolio table using Codeignitor db core class. All the Data Insert,Retrival and Update operations related to protfolio are performed here.
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
 * This is protfolio Model
 *
 * @author		Sunil Silumala
 * @package		Safe Doc
 * @subpackage	Model
 */

class Payment_details_model extends CI_Model{
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

	function get_details($Id = 0){
		
		$arrData = array();
		
		if($Id != 0 ){
			$this->db->where('payment_details_id', $Id); 
		}
		
		$this->db->select('payment_details_id,name,amount,period');
		
		$objQuery = $this->db->get('safedoc_payment_details');
		
		//$this->db->last_query();
		
		return $objQuery->result_array();
	}

	/**
	 * save_payment
	 *
	 * This is used to save payment details
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   array-$arrData
	 * @return void
	 */
	function save_payment($arrData){
		
		if($this->db->insert('safedoc_payment_details', $arrData)){
			return true;
		}else{
			return false;
		}

	}


	/**
	 * update_payment
	 *
	 * This is used to update payment details
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   array-$arrData
	 * @return void
	 */
	function update_payment($iPaymentId,$arrData){
		
		$this->db->where('payment_details_id',$iPaymentId);

		if($this->db->update('safedoc_payment_details', $arrData))
		{
				return true;
		}
		else
		{
				return false;
		}	
	}

	function get_details_price($price){
		
		$arrData = array();
		
		
		
		
		
		$this->db->select('payment_details_id,name,amount,period');
		$this->db->where('amount', $price); 
		$objQuery = $this->db->get('safedoc_payment_details');
		
		//$this->db->last_query();
		
		return $objQuery->result_array();
	}

}