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
 * This is sms Model
 *
 * @author		Sunil Silumala
 * @package		Safe Doc
 * @subpackage	Model
 */

class Sms_model extends CI_Model{
	
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
		$this->smsUser		= $this->config->item('smsUser');
		$this->smsPassword	= $this->config->item('smsPassword');
		$this->smsType		= $this->config->item('smsType');
		$this->smsMask		= $this->config->item('smsMask');
		$this->smsLink		= $this->config->item('smsLink');

	}
	
	/**
	 * sms_notification
	 *
	 * This is used send sms notification
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   array-$arrData
	 * @return void
	 */
	function sms_notification($recipient,$body){
	

	$data = "UserName=".$this->smsUser
    . "&Password=".$this->smsPassword
    . "&Type=".$this->smsType
    . "&To=".$recipient
    . "&Mask=".$this->smsMask
    . "&Message=".$body;
	
	  $cUrl = curl_init();
	  curl_setopt($cUrl, CURLOPT_URL, $this->smsLink);
	  curl_setopt($cUrl, CURLOPT_HEADER, 'Content-type: application/x-www-form-urlencoded');
	  curl_setopt($cUrl, CURLOPT_POST, 1);
	  curl_setopt($cUrl, CURLOPT_POSTFIELDS, $data);
	  curl_setopt($cUrl, CURLOPT_TIMEOUT, 30);
	  curl_setopt($cUrl, CURLOPT_RETURNTRANSFER, true);
	  curl_exec($cUrl);

	  $code = curl_getinfo($cUrl, CURLINFO_HTTP_CODE);
	

	}

}