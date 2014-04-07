<?php 
/**
* Safe Doc
*
* @package		Safe Doc
* @subpackage   controller
* @author		Sunil Silumala
* @copyright	Copyright (c) 2012 - 2013 
* @since		Version 1.0
*/
 

class Cron extends CI_Controller {

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
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('cron_model');
		$this->load->model('portfolio_model');
		$this->load->model('document_model');
		
		
	}
	

	/**
	* demonotifications
	*
	* This will send notificationsto user that demo period is completed
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	function demonotifications(){
		
		$currentDate = date("Y-m-d");
		
		$userDeatails	= $this->user_model->get_demo_user();
		
		foreach($userDeatails as $user){
			
			$username	= $user['userUName'];
			$userMail	= $user['userEmail'];
			
			$start_ts = strtotime($user['userCreatedOn']);
			$end_ts = strtotime($currentDate);

			$diff = $end_ts - $start_ts;

			$days	= round($diff / 86400);

			if($days == 10){
				
				$flagMailSent	= $this->cron_model->send_demo_user_mail($username,$userMail);
				if($flagMailSent){
					
				}
			}
		}
	}


	/**
	* renewalnotifications
	*
	* This will send notificationsto to user that 30 days completed
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	function renewalnotifications(){
		
		$currentDate = date("Y-m-d");

		$userDeatails	= $this->user_model->get_demo_user();
		
		foreach($userDeatails as $user){
			
			$username	= $user['userUName'];
			$userMail	= $user['userEmail'];
			
			$start_ts = strtotime($user['userCreatedOn']);
			$end_ts = strtotime($currentDate);

			$diff = $end_ts - $start_ts;

			$days	= round($diff / 86400);

			if($days == 30){
				
				
				$flagMailSent	= $this->cron_model->send_package_expired_user_mail($username,$userMail);
				if($flagMailSent){
					
					$iUserId					= $user['userId'];
					$updateData['userDemoFlag']	= '0';
					$arrDataAdd['isActive']		= '0';
					$this->user_model->update_user_details($iUserId,$updateData);
				}
			}
		}
	}


	/**
	* navnotification
	*
	* This will send notification if there is increase in NAV price
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	function navnotification(){
		
		$portfolioArr	= $this->portfolio_model->getDetails();
	
		foreach($portfolioArr as $portfolio){
			
			if($portfolio['portfolioNotifyPrice'] == "" || $portfolio['portfolioNotifyPrice'] == "0.00"){
				$navPercentageValue	=($portfolio['portfolioPurchaseNAV']*$portfolio['portfolioNotifyPercentIncrease'])/100;
				
				$portfolioNotifyPercentIncrease = $portfolio['portfolioPurchaseNAV'] + $navPercentageValue;
			}else{
				$portfolioNotifyPercentIncrease = $portfolio['portfolioNotifyPrice'];
			}

			//echo "<br>---Notify: ".$portfolioNotifyPercentIncrease;
			//echo "<br>---Nav: ".$portfolio['mutualfundsNAV'];
			//echo "<br>";

			if($portfolio['mutualfundsNAV'] > $portfolioNotifyPercentIncrease){
				
				$userDeatails		= $this->user_model->get_user($portfolio['portfolioUserId']);
				$notifyEmail		= $userDeatails[0]['notificationByEmail'];
				$notifySms			= $userDeatails[0]['notificationBySMS'];
				
				$arrData['FundName']			= $portfolio['mutualfundsName'];
				$arrData['username']			= $userDeatails[0]['userName'];
				$arrData['useremail']			= $userDeatails[0]['userEmail'];

				$arrData['NotifyPercentage']	= $portfolioNotifyPercentIncrease;
				$arrData['mutualfundsNAV']		= $portfolio['mutualfundsNAV'];
				
				if($notifyEmail == '1'){
					$flagMailSent	= $this->cron_model->send_mail_notify($arrData);
				}

				if($notifySms == '1'){
					
					$recipient = $documents['userMobile'];
					
					$fundName		= $portfolio['mutualfundsName'];
					$navIncrease	= $portfolio['mutualfundsNAV'];
					
					$body = $this->config->item('template_nav');
					
					eval("\$body = \"$body\";");
					
					$this->sms_model->sms_notification($recipient,$body);

				}
			}
		}

	}

	/**
	* alertnotification
	*
	* This will send alertnotification date they specified
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	function alertnotification(){
				
		$date = date('Y-m-d',strtotime('+15 days',strtotime(date('Y-m-d'))));
		
		$arrDocuments	= $this->document_model->get_document($date);
		
		$arrData = array();

		foreach($arrDocuments as $documents){
			
			
			$arrData['documentAlertDate']	= $documents['documentAlertDate'];
			$arrData['userName']			= $documents['userName'];
			$arrData['userEmail']			= $documents['userEmail'];
			$arrData['documentName']		= $documents['documentName'];

			
			$notifyEmail		= $documents['notificationByEmail'];
			$notifySms			= $documents['notificationBySMS'];
			
			if($notifyEmail == '1'){
					$flagMailSent	= $this->cron_model->send_mail_alert($arrData);
			}

			if($notifySms == '1'){
					
					$recipient = $documents['userMobile'];
					
					$docName = $documents['documentName'];
					$date = $documents['documentAlertDate'];

					$body = $this->config->item('template_expire');
					
					eval("\$body = \"$body\";");
					
					$this->sms_model->sms_notification($recipient,$body);
			}

		}

	}

	/**
	* expirynotification
	*
	* This will send alertnotification date they specified
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	function expirynotification(){
				
		$date = date('Y-m-d',strtotime('+15 days',strtotime(date('Y-m-d'))));
		
		$arrUsers	= $this->user_model->get_package_expiry_user($date);
		
		
		foreach($arrUsers as $users){
			$emailData = '';
		
			/* Sending Mail*/
			$this->load->library('email');
			
			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			
			$this->email->from('info@safedoc.com', 'Safe Docs');
			$this->email->to($users['userEmail']);
					
			$this->email->subject('Alert Notification');

			$emailData .='Dear '.$users['userName'];
			$emailData .= br(2);
			$emailData .= 'Your Package about expire in 15 days';
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


	/**
	* alertnotification
	*
	* This will send alertnotification date they specified
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	function expirednotification(){
				
		$date = date('Y-m-d');
		
		$arrUsers	= $this->user_model->get_package_expiry_user($date);
		
		foreach($arrUsers as $users){
			$emailData = '';
		
			/* Sending Mail*/
			$this->load->library('email');
			
			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			
			$this->email->from('info@safedoc.com', 'Safe Docs');
			$this->email->to($users['userEmail']);
					
			$this->email->subject('Alert Notification');

			$emailData .='Dear '.$users['userName'];
			$emailData .= br(2);
			$emailData .= 'Your Package is expired';
			$emailData .= br(1);
			$emailData .= 'Please Renew it';

			$this->email->message($emailData);
			
			if ($this->email->send())
			{
				$iUserId					= $users['userId'];
				$updateData['userPaidFlag']	= '0';
				$this->user_model->update_user_details($iUserId,$updateData);
			}else{
				return false;
			}
		}

	}
	
}