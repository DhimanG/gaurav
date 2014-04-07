<?php
/**
 * Safe Doc
 *
 * @Description  This class is used to interact with the admin table using Codeignitor db core class. All the Data Insert,Retrival and Update operations related to admin are performed here.
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
 * This is Admin Model
 *
 * @author		Sunil Silumala
 * @package		Safe Doc
 * @subpackage	Model
 */

class Admin_model extends CI_Model{
	
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
	 * verifyUser
	 *
	 * This is for Verification of the User
	 * 
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   string $u, string $pw
	 * @return	void
	 */
	function verifyUser($u,$pw){

		// Set the Select parameter to return adminID and adminName column values of admin table
		$this->db->select('adminUserID,adminUserName');

		// Sets the where constraint to fetch the record having adminName as the username ($u) passed by the user 
		$this->db->where('adminUserName',$u);

		// Sets the where constraint to fetch the record having adminPassword as the password ($pw) passed by the user. The password is encrypted using MD5 algorithm and is saved in the database in the encrypted format
		$this->db->where('adminUserPassword',MD5($pw));

		// Sets the limit constraint to fetch 1 record
		$this->db->limit(1);

		// Fetch record from the admin table
		$Q = $this->db->get('safedoc_admin_user');

		// Count if there are any rows returned 
		if ($Q->num_rows() > 0){

			// Return the result in the form of an array
			$row = $Q->row_array();

			// This allows the user with correct login details to log into the site and a session is set
			$ses_user = array("adminUsername"=>$row['adminUserName'],"adminUserid"=>$row['adminUserID'],"logged_in"=>TRUE);
			$this->session->set_userdata($ses_user);
		}else{
			
			// This will give an error message to the user for incorrect login or password details.
			$ses_user = array("adminUsername"=>"","adminUserid"=>0,"logged_in"=>FALSE);
			$this->session->set_userdata($ses_user);
			$this->session->set_flashdata('error', 'Sorry, your username or password is incorrect!');
		}		
	}


	/**
	 * save_admin
	 *
	 * This is used to save admin details
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   array-$arrData
	 * @return void
	 */
	function save_admin($arrData){
		
		if($this->db->insert('safedoc_admin_user', $arrData)){
			return true;
		}else{
			return false;
		}

	}


	/**
	 * update_admin
	 *
	 * This is used to update country details
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   array-$arrData, integer-$iNewfeedId
	 * @return void
	 */
	function update_admin($iAdminId,$arrData){
		
		$this->db->where('adminUserID',$iAdminId);
		if($this->db->update('safedoc_admin_user', $arrData))
		{
				return true;
		}
		else
		{
				return false;
		}	
	}

	/**
	 * get_admin_details
	 *
	 * This is used to get admin details
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   integer-$iAdmin 
	 * @return void
	 */
	function get_admin_details($iAdmin = 0){
		
		$arrData = array();
		
		if($iAdmin != 0 ){
			$this->db->where('adminUserID', $iAdmin); 
		}
		
		$this->db->select('adminUserID,adminUserName,adminUserPassword,adminUserEmail');
		
		$objQuery = $this->db->get('safedoc_admin_user');
		
		//$this->db->last_query();
		
		return $objQuery->result_array();

	}
	
}


?>