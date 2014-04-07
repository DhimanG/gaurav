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

class User_model extends CI_Model{
	
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
		$this->db->select('userId,userUName,userName,userPaidFlag,isActive');

		// Sets the where constraint to fetch the record having adminName as the username ($u) passed by the user 
		$this->db->where('userUName',$u);

		// Sets the where constraint to fetch the record having adminPassword as the password ($pw) passed by the user. The password is encrypted using MD5 algorithm and is saved in the database in the encrypted format
		$this->db->where('userPassword',MD5($pw));

		// Sets the limit constraint to fetch 1 record
		$this->db->limit(1);

		// Fetch record from the admin table
		$Q = $this->db->get('safedoc_user');
		
		$arrData =  $Q->result_array();
		
		
		// Count if there are any rows returned 
		if ($Q->num_rows() > 0){

			if($arrData[0]['isActive']	== 0){
				$ses_user = array("username"=>"","userid"=>0,"name"=>"","logged_user_in"=>FALSE);
				$this->session->set_userdata($ses_user);
				$this->session->set_flashdata('error', 'Your Account not activated, Please check your mailbox');

			}else{

				// Return the result in the form of an array
				$row = $Q->row_array();

				// This allows the user with correct login details to log into the site and a session is set
				$ses_user = array("username"=>$row['userUName'],"userid"=>$row['userId'],"name"=>$row['userName'],"logged_user_in"=>TRUE,"paid"=>$row['userPaidFlag']);
				$this->session->set_userdata($ses_user);
			}
		}else{
			
			// This will give an error message to the user for incorrect login or password details.
			$ses_user = array("username"=>"","userid"=>0,"name"=>"","logged_user_in"=>FALSE);
			$this->session->set_userdata($ses_user);
			$this->session->set_flashdata('error', 'Sorry, your username or password is incorrect!');
		}		
	}


	/**
	 * get_user_details
	 *
	 * This is used to get details of user by id
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   Integer-$iUserId
	 * @return array
	 */
	 
	function get_user_details($iUserId='')
    {
		$arrData = array();
		$this->db->select('userId,userName,userUName,userDOB,userEducation,userWork,userCountryId,userAboutMySelf,userEmail,userMobile,userCity,profile_image_path_thumb,profile_image_path_original,userPaidFlag,userDemoFlag,userCreatedOn,userUpdatedOn');
		
		if($iUserId!='')
			$this->db->where('userId', $iUserId); 
		
		$objQuery = $this->db->get('safedoc_user');
		
		//echo $this->db->last_query();
		
		return $objQuery->result_array();
	}


	/**
	 * update_user_details
	 *
	 * This is used to update user details by id
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   Integer-$iUserId, Array - $arrData.
	 * @return void
	 */
	 
	function update_user_details($iUserId,$arrData)
    {
		$this->db->where('userId',$iUserId);

		if($this->db->update('safedoc_user', $arrData))
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
	 * update_user_notification
	 *
	 * This is used to update user notification by id
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   Integer-$iUserId, Array - $arrData.
	 * @return void
	 */
	 
	function update_user_notification($iUserId,$arrData)
    {
		$this->db->where('notificationUserId',$iUserId);

		if($this->db->update('safedoc_notifications', $arrData))
		{
				return true;
		}
		else
		{
				return false;
		}	
	}


	/**
	 * chk_notification_exists
	 *
	 * This is used to check if notication for user already exists or not
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   Integer-$iUserId.
	 * @return void
	 */
	 
	function chk_notification_exists($iUserId)
    {
		$this->db->select('notificationUserId');

		$this->db->where('notificationUserId',$iUserId);
		
		$objQuery = $this->db->get('safedoc_notifications');

		if($objQuery->result_array())
		{
				return true;
		}
		else
		{
				return false;
		}	
	}

	/**
	 * save_notification
	 *
	 * This is used to save notification of user
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   Integer-$iUserId.
	 * @return void
	 */
	 
	function save_notification($arrData)
    {
		if($this->db->insert('safedoc_notifications', $arrData)){
			return true;
		}else{
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
	 
	function get_notification_details($iUserId)
    {
		$this->db->select('notificationByEmail,notificationBySMS');

		$this->db->where('notificationUserId',$iUserId);
		
		$objQuery = $this->db->get('safedoc_notifications');
		
		//echo $this->db->last_query();

		return $objQuery->result_array();
		
	}

	/**
	 * chk_username_exists
	 *
	 * This is used to check if username exists or not
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   string-$userUName.
	 * @return void
	 */
	 
	function chk_username_exists($userUName,$userEmail)
    {
		$this->db->select('userId');

		$this->db->where('userUName',$userUName);

		$this->db->or_where('userEmail', $userEmail); 

		$objQuery = $this->db->get('safedoc_user');

		if($objQuery->result_array())
		{
				return true;
		}
		else
		{
				return false;
		}	
	}

	/**
	 * save_user_details
	 *
	 * This is used to save user information
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   array-$arrData.
	 * @return void
	 */
	 
	function save_user_details($arrData)
    {
		if($this->db->insert('safedoc_user', $arrData)){
			return true;
		}else{
			return false;
		}
	}
	
	
	/**
	 * get_user_by_email
	 *
	 * This is used to get details of user by id
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   Integer-$iUserId
	 * @return array
	 */
	 
	function get_user_by_email($iEmailId)
    {
		$arrData = array();
		
		
		$this->db->select('userId,userName,userUName,userEmail,notificationUserId,notificationByEmail,notificationBySMS,userMobile');
		$this->db->from('safedoc_user');
		$this->db->join('safedoc_notifications','safedoc_notifications.notificationUserId= safedoc_user.userId');
		$this->db->where('userEmail', $iEmailId);
		$objQuery = $this->db->get();
		
		//echo "---".$this->db->last_query();
		
		return $objQuery->result_array();
	}


	/**
	* @function Name : encrypt
	*
	* Encrypt thencryptede message
	* @author : Gaurav Goel
	* @access : public
	* @param  : $txtmsg=>Message in text format.
	* @return : $encrypted_msg=> encrypted msg
	*/
    public function encrypt()
    {
	     $chars = "abcdefghijkmnopqrstuvwxyz023456789";	    
	     srand((double)microtime()*1000000);
	    
	    $i = 0;	    
	    $pass = "";
	        
	    while ($i <= 7)
	    {
	        $num = rand() % 33;
	        $tmp = substr($chars, $num, 1);
	        $pass = $pass.$tmp;
	        $i++;
	    }
	    
	    return $pass;

    }
	
	/**
	 * get_demo_user
	 *
	 * This is used to get details of user by id
	 *
	 * @author	Sunil Silumala
	 * @param	Date- $date
	 * @access	public
	 * @return array
	 */
	 
	function get_demo_user($date = '')
    {
		$arrData = array();
		$this->db->select('userId,userName,userUName,userEmail,userPaidFlag,userDemoFlag,userCreatedOn,userUpdatedOn');
		
		
		$this->db->where('userDemoFlag','1'); 
		
		if($date){
			$this->db->where('userCreatedOn',$date);
		}

		$objQuery = $this->db->get('safedoc_user');
		
		//$this->db->last_query();
		
		return $objQuery->result_array();
	}


	/**
	 * get_user_package_expired
	 *
	 * This is used to get details of those user those expired.
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @return array
	 */
	 
	function get_user_package_expired()
    {
		$arrData = array();
		$this->db->select('userId,userName,userUName,userEmail,userPaidFlag,userDemoFlag,userCreatedOn,userUpdatedOn,lastPaymentDate');
		
		
		$this->db->where('userPaidFlag','1'); 
		
		$objQuery = $this->db->get('safedoc_user');
		
		//$this->db->last_query();
		
		return $objQuery->result_array();
	}
	
	/**
	 * get_user
	 *
	 * This is used to get user details
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @return array
	 */
	 
	function get_user($userId){
		
		$this->db->select('*');
		$this->db->from('safedoc_user');
		$this->db->join('safedoc_notifications','safedoc_notifications.notificationUserId= safedoc_user.userId');
		$this->db->where('userId', $userId);
		$this->db->where('isActive', 1);

		$objQuery = $this->db->get();
		
		//echo $this->db->last_query();

		return $objQuery->result_array();
	}
	
	/**
	 * activate_user
	 *
	 * 
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @return array
	 */
	function activate_user($username,$activationkey){

		$this->db->select('*');
		$this->db->from('safedoc_user');
		$this->db->where('userUName',$username); 
		$this->db->where('activationkey',$activationkey); 
		
		$objQuery = $this->db->get();
		//echo $this->db->last_query();

		return $objQuery->result_array();
	}

	/**
	 * get_otp_status
	 *
	 * this is used to staus of otp
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param integer-$iUserId
	 * @return void
	 */
	function chk_otp_status($iUserId){
		
		$this->db->select('*');
		$this->db->from('safedoc_user');
		$this->db->where('userId',$iUserId); 
		$this->db->where('ActiveOPT',1); 
		
		$objQuery = $this->db->get();
		//echo $this->db->last_query();

		if($objQuery->result_array()){
			return true;
		}else{
			return false;
		}
	}

	/**
	 * chk_otp_valid
	 *
	 * this is used to check if otp password is valid or not
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param integer-$iUserId
	 * @return void
	 */
	function chk_otp_valid($iUserId,$strotpPassword){
		
		$this->db->select('*');
		$this->db->from('safedoc_user');
		$this->db->where('userId',$iUserId); 
		$this->db->where('OTP',$strotpPassword); 
		
		$objQuery = $this->db->get();
		//echo $this->db->last_query();

		if($objQuery->result_array()){
			return true;
		}else{
			return false;
		}
	}

	
	/**
	 * chk_users_paid_status
	 *
	 * this is used to if user demo period expired and user is paid user
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param integer-$iUserId
	 * @return void
	 */
	function chk_users_paid_status($iUserId){
		$this->db->select('*');
		$this->db->from('safedoc_user');
		$this->db->where('userId',$iUserId); 
		$this->db->where('userDemoFlag',0); 
		$this->db->where('userPaidFlag',0); 
		
		$objQuery = $this->db->get();

		//echo $this->db->last_query();

		if($objQuery->result_array()){
			return true;
		}else{
			return false;
		}
		 	
	}
	
	/**
	 * chk_show_demo_status
	 *
	 * this is used to if user demo period expired and user is paid user
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param integer-$iUserId
	 * @return void
	 */
	function chk_show_demo_status($iUserId){
		$this->db->select('*');
		$this->db->from('safedoc_user');
		$this->db->where('userId',$iUserId); 
		$this->db->where('show_demo','1'); 
		$objQuery = $this->db->get();
		//echo $this->db->last_query();
		
		return $objQuery->result_array();
	}

	function get_package_expiry_user($date){
		
		$this->db->select('*');
		$this->db->from('safedoc_user');
		$this->db->where('expire_date',$date); 
		$this->db->where('userPaidFlag','1'); 
		$this->db->where('isActive','1'); 
		
		$objQuery = $this->db->get();
		 	
		echo $this->db->last_query();
		
		return $objQuery->result_array();
	}


}
?>