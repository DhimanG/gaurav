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
 
/* 
	there are only 5 fields in this module.
	So no Delete and Add functionality is given
*/

class Payment extends CI_Controller {
	
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

		$this->load->model('payment_details_model');
	}

	
	/**
	* index
	*
	* This wil display banner page
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	
	public function index()
	{ 
		$arrData['paymentDetails']	= $this->payment_details_model->get_details();
		
		$arrData['middle'] = 'admin/payment/list';
		$this->load->view('admin/template',$arrData);
	}


	/**
	* add
	*
	* This wil display banner page
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	
	public function add()
	{ 
		$this->form_validation->set_rules('paymentname', 'Name', 'required|trim');
		$this->form_validation->set_rules('amount', 'Amount', 'required|trim');
		$this->form_validation->set_rules('period', 'Period', 'required|trim');

		if ($this->form_validation->run() == TRUE)
		{
			$insertData["name"]			= $this->input->post('paymentname');
			$insertData["amount"]		= $this->input->post('amount');
			$insertData["period"]		= $this->input->post('period');
			$insertData["CreatedOn"]	= date('Y-m-d');

			$insertflag = $this->payment_details_model->save_payment($insertData);

			if($insertflag){
				$this->session->set_flashdata('success', 'Payment Inserted Successfully !!');
				redirect('admin/payment');
			}else{
				$this->session->set_flashdata('error', 'Failed to Inserted Payment !!');
				redirect('admin/payment/add/');	
			}
			
		}
		
		
		$arrData['middle'] = 'admin/payment/add';
		$this->load->view('admin/template',$arrData);
	}

	public function edit($ipaymentId){
		
		$this->form_validation->set_rules('paymentname', 'Name', 'required|trim');
		$this->form_validation->set_rules('amount', 'Amount', 'required|trim');
		$this->form_validation->set_rules('period', 'Period', 'required|trim');

		if ($this->form_validation->run() == TRUE)
		{
			$updateData["name"]			= $this->input->post('paymentname');
			$updateData["amount"]		= $this->input->post('amount');
			$updateData["period"]		= $this->input->post('period');
			$updateData["ModifiedOn"]	= date('Y-m-d');

			$insertflag = $this->payment_details_model->update_payment($ipaymentId,$updateData);

			if($insertflag){
				$this->session->set_flashdata('success', 'Payment updated Successfully !!');
				redirect('admin/payment');
			}else{
				$this->session->set_flashdata('error', 'Failed to update Payment !!');
				redirect('admin/payment/edit/'.$ipaymentId);	
			}
			
		}
		
		$arrData['paymentDetails']	= $this->payment_details_model->get_details($ipaymentId);
		
		$arrData['middle'] = 'admin/payment/edit';
		$this->load->view('admin/template',$arrData);
	}

}