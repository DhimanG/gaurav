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

class Payment_model extends CI_Model{
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
	
	function readPropertyFileData($s11) {
		//echo $s11;
		$process_file_array=array();
		$fp = @fopen($s11, 'r');
		if ($fp) {
			$array = explode("\n", fread($fp, filesize($s11)));
		}
		$array_count=count($array);
		//echo "<pre>";
		//print_r($array);
		//exit;
		for($i=0;$i<$array_count;$i++) {
			$array_str=explode("=",$array[$i]);
			//echo $array_str[1];
			//exit;
			$process_file_array[]=$array_str[1];
		}
		return $process_file_array;
		
	}

	function ShowError($error)
	{
		 echo "<p>
		 <span style='coloe:red; font size:16px;'>Error:<br></span>".$error;
	}
	

	/**
	 * save
	 *
	 * This is used to save notification of user
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   Integer-$iUserId.
	 * @return void
	 */
	 
	function save($arrData)
    {
		if($this->db->insert('safedoc_payment', $arrData)){
			return true;
		}else{
			return false;
		}
	}


	/**
	 * update
	 *
	 * This is used to update user details by id
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   Integer-$iPaymentId, Array - $arrData.
	 * @return void
	 */
	 
	function update($iPaymentId,$arrData)
    {
		$this->db->where('paymentId',$iPaymentId);

		if($this->db->update('safedoc_payment', $arrData))
		{
			//echo $this->db->last_query();
			return true;
		}
		else
		{
				return false;
		}	
	}


	/**
	 * get_notification_details
	 *
	 * This is used to get notification information
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   Integer-$iUserId.
	 * @return void
	 */
	 
	function get_latest_paymentId($iUserId)
    {
		$this->db->select('paymentId');
		$this->db->where('paymentUserId',$iUserId);
		$this->db->order_by("paymentId", "desc");
		$this->db->limit(1);
		$objQuery = $this->db->get('safedoc_payment');
		echo $this->db->last_query();
		return $objQuery->result_array();
	}
	
}