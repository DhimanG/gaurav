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
 * This is cron Model
 *
 * @author		Sunil Silumala
 * @package		Safe Doc
 * @subpackage	Model
 */

class cron_model extends CI_Model{
	
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
		$this->load->model('user_model');
		$this->load->helper('html');
	}
	
	
	/**
	 * send_demo_user_mail
	 *
	 * This is used to mail to demo user
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   string-$username, string-$userMail
	 * @return void
	 */
	function send_demo_user_mail($username,$userMail){
		$emailData = '';
		
		/* Sending Mail*/
		$this->load->library('email');
		
		$config['mailtype'] = 'html';
		$this->email->initialize($config);
		
		$this->email->from('your@example.com', 'Safe Docs');
		$this->email->to($userMail);
				
		$this->email->subject('Demo user');
		
		$emailData .='Dear '.$username;
		$emailData .= br(2);
		$emailData .= 'You are demo user please subscribe';

		$this->email->message($emailData);
		
		if ($this->email->send())
		{
			return true;
		}else{
			return false;
		}
	}


	/**
	 * send_package_expired_user_mail
	 *
	 * This is used to mail to demo user
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   string-$username, string-$userMail
	 * @return void
	 */
	function send_package_expired_user_mail($username,$userMail){
		$emailData = '';
		
		/* Sending Mail*/
		$this->load->library('email');
		
		$config['mailtype'] = 'html';
		$this->email->initialize($config);
		
		$this->email->from('your@example.com', 'Safe Docs');
		$this->email->to($userMail);
				
		$this->email->subject('demo period expired');
		
		$emailData .='Dear '.$username;
		$emailData .= br(2);
		$emailData .= 'Your demo Period expired please subscribe package';

		$this->email->message($emailData);
		
		if ($this->email->send())
		{
			return true;
		}else{
			return false;
		}
	}


	
	/**
	 * send_mail_notify
	 *
	 * This is used to mail to demo user
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   string-$username, string-$userMail
	 * @return void
	 */
	function send_mail_notify($arrdata){
		$emailData = '';
		
		/* Sending Mail*/
		$this->load->library('email');
		
		$config['mailtype'] = 'html';
		$this->email->initialize($config);
		
		$this->email->from('your@example.com', 'Safe Docs');
		$this->email->to($arrdata['useremail']);
				
		$this->email->subject('Increase in fund('.$arrdata['FundName'].')');
		
		$emailData .='Dear '.$arrdata['username'];
		$emailData .= br(2);
		$emailData .= 'There is Increase in Fund for '.$arrdata['FundName'];
		$emailData .= br(1);
		$emailData .= 'Current Nav: '.$arrdata['mutualfundsNAV'];

		$this->email->message($emailData);
		
		if ($this->email->send())
		{
			return true;
		}else{
			return false;
		}
	}


	/**
	 * send_mail_alert
	 *
	 * This is used to mail to demo user
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   string-$username, string-$userMail
	 * @return void
	 */
	function send_mail_alert($arrdata){

		$emailData = '';
		
		/* Sending Mail*/
		$this->load->library('email');
		
		$config['mailtype'] = 'html';
		$this->email->initialize($config);
		
		$this->email->from('your@example.com', 'Safe Docs');
		$this->email->to($arrdata['userEmail']);
				
		$this->email->subject('Alert Notification');
		
		$emailData .='Dear '.$arrdata['userName'];
		$emailData .= br(2);
		$emailData .= 'This Alert Notification You have set for document name: '.$arrdata['documentName'];
		$emailData .= br(1);

		$this->email->message($emailData);
		
		if ($this->email->send())
		{
			return true;
		}else{
			return false;
		}
	}

}