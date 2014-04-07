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
 

class User extends CI_Controller {

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
		
		if($this->session->userdata('logged_in') == FALSE) {
			redirect('admin/login');
			break;
		}

		$this->load->model('user_model');
	}

	
	/**
	* index
	*
	* This wil display user page
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	
	public function index()
	{
		$arrData['userDetails']	= $this->user_model->get_user_details();
		
		$arrData['middle'] = 'admin/user/listuser';
		$this->load->view('admin/template',$arrData);
	}
	
	/**
	* view
	*
	* This wil display user info
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	
	public function view($iUserId)
	{
		$arrData['userDetails']	= $this->user_model->get_user_details($iUserId);
		
		// Fetching country details
		$this->load->model('country_model');
		$arrData['arrCountry']	= $this->country_model->get_country_details($arrData['userDetails'][0]['userCountryId']);
		
		// Fetching Notification Info
		$arrData['NotifiDetails']	= $this->user_model->get_notification_details($iUserId);
		
		$arrData['middle'] = 'admin/user/detailuser';
		$this->load->view('admin/template',$arrData);
	}
	
	/**
	* paymentHistory
	*
	* This wil display user payment history
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	
	public function paymentHistory($iUserId)
	{
		$this->db->where('paymentUserId',$iUserId);
		$this->db->where('paymentStatus','1');
		
		$objData = $this->db->get('safedoc_payment');
		$arrData['paymentHistory']	= $objData->result_array();
		$this->load->view('admin/user/paymenthistory',$arrData);
			
		// When payment will be on monthly then it will come, 
		// so dnt delete this 
		/*
		if($iUserId!='')
		{
			$arrData['userArr'] = $this->user_model->get_user_details($iUserId);
			
			$this->db->where('paymentUserId',$iUserId);
			$this->db->where('paymentStatus','1');
			
			$objData = $this->db->get('safedoc_payment');
			$arrData['paymentHistory']	= $objData->result_array();
			
			$arrData['middle'] = 'admin/user/paymenthistory';
			$this->load->view('admin/template',$arrData);
		}
		else{
			redirect('admin/user');
		}*/
	}
}