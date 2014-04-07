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
 

class Advertise extends CI_Controller {
	
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
		$this->load->model('advertise_model');
	}

	/**
	* index
	*
	* This wil display adminstrator
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	
	public function index()
	{
		
		$arrData['advertiseDetails']	= $this->advertise_model->get_advertise();

		$arrData['middle'] = 'admin/advertise/list';
		$this->load->view('admin/template',$arrData);
	}

}