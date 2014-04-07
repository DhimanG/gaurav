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
 

class Dashboard extends CI_Controller {

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
	}

	
	/**
	* index
	*
	* This wil display dashboard page
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	
	public function index()
	{
			/*echo"<pre>";
			print_r($_POST); 
			echo"</pre>";*/
			if ($this->input->post('cmbData') && $this->input->post('cmbData') =='year'){
				$arrData['selectedValue'] = 'year';
				$toDate ='';
				for($i=3,$j=0;$i>=0;$i--,$j++)
				{
					if($toDate =='')
						$fromDate 	= date('Y-m-d',mktime(0, 0, 0, date("m")-($i*3+3), date("d"), date("y")) );
					else
						$fromDate 	= $toDate;
						
					$toDate		= date('Y-m-d',mktime(0, 0, 0, date("m")-($i*3), date("d"), date("y")) );
					
					$this->db->where('paymentCreatedOn >=',$fromDate);
					$this->db->where('paymentCreatedOn <=',$toDate);
					$this->db->where('paymentStatus','1');
					$this->db->select_sum('paymentAmount');
					
					$objData = $this->db->get('safedoc_payment');
					$data = $objData->result_array();
					
					$arrData['date'][$j] 	= $fromDate."&nbsp;to&nbsp;".$toDate;
					$arrData['amount'][$j] 	= $data[0]['paymentAmount'];
					
					if($i==3)
						$arrData['fromDate'] = $fromDate;
					
					if($i==0)
						$arrData['toDate'] =  $toDate;
				} 
			}
			elseif ($this->input->post('cmbData') && $this->input->post('cmbData') =='quater'){
				$arrData['selectedValue'] = 'quater';
				$toDate ='';
				for($i=2,$j=0;$i>=0;$i--,$j++)
				{
					if($toDate =='')
						$fromDate 	= date('Y-m-d',mktime(0, 0, 0, date("m")-($i+1), date("d"), date("y")) );
					else
						$fromDate 	= $toDate;
						
					$toDate		= date('Y-m-d',mktime(0, 0, 0, date("m")-($i), date("d"), date("y")) );
					
					$this->db->where('paymentCreatedOn >=',$fromDate);
					$this->db->where('paymentCreatedOn <=',$toDate);
					$this->db->where('paymentStatus','1');
					$this->db->select_sum('paymentAmount');
					
					$objData = $this->db->get('safedoc_payment');
					$data = $objData->result_array();
					//echo $this->db->last_query();
					$arrData['date'][$j] 	= $fromDate."&nbsp;to&nbsp;".$toDate;
					$arrData['amount'][$j] 	= $data[0]['paymentAmount'];
					
					if($i==2)
						$arrData['fromDate'] = $fromDate;
					
					if($i==0)
						$arrData['toDate'] =  $toDate;
				} 
			}
			elseif ($this->input->post('cmbData') && $this->input->post('cmbData')=='month'){
				$arrData['selectedValue'] = 'month';
				$toDate ='';
				for($i=21,$j=0;$i>=0;$i=$i-7,$j++)
				{
					if($toDate =='')
						$fromDate 	= date('Y-m-d',mktime(0, 0, 0, date("m"), date("d")-($i+7), date("y")) );
					else
						$fromDate 	= $toDate;
						
					$toDate		= date('Y-m-d',mktime(0, 0, 0, date("m"), date("d")-$i, date("y")) );
					
					$this->db->where('paymentCreatedOn >=',$fromDate);
					$this->db->where('paymentCreatedOn <=',$toDate);
					$this->db->where('paymentStatus','1');
					$this->db->select_sum('paymentAmount');
					
					$objData = $this->db->get('safedoc_payment');
					$data = $objData->result_array();
					
					$arrData['date'][$j] 	= $fromDate."&nbsp;to&nbsp;".$toDate;
					$arrData['amount'][$j] 	= $data[0]['paymentAmount'];
					
					if($i==21)
						$arrData['fromDate'] = $fromDate;
					
					if($i==0)
						$arrData['toDate'] =  $toDate;
				} 
			}
			else
			{
				for($i=6,$j=0;$i>=0;$i--,$j++)
				{
					$arrData['selectedValue'] = 'week';
					$date 	= date('Y-m-d',mktime(0, 0, 0, date("m"), date("d")-$i, date("y")) );
					
					$this->db->where('paymentCreatedOn',$date);
					$this->db->where('paymentStatus','1');
					$this->db->select_sum('paymentAmount');
					
					$objData = $this->db->get('safedoc_payment');
					$data = $objData->result_array();
					
					$arrData['date'][$j] 	= $date;
					$arrData['amount'][$j] 	= $data[0]['paymentAmount'];
					
					if($i==6)
						$arrData['fromDate'] = $date;
					
					if($i==0)
						$arrData['toDate'] = $date;
					
						
					/*$this->db->select('(SELECT SUM(paymentAmount) FROM safedoc_payment WHERE paymentCreatedOn="'.$date.'")');
					$query = $this->db->get('safedoc_payment');
					$arrData['paymentHistory']	= $query->result_array();*/
				}
			}
		/*foreach ($arrData['date'] as $key)
			echo $key."<br/>";
		
		foreach ($arrData['amount'] as $key)
			echo $key."<br/>";
		die;*/
		$arrData['middle'] = 'admin/dashboard';
		$this->load->view('admin/template',$arrData);
	}
}