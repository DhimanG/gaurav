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
 

class Mutual extends CI_Controller {

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

		$this->load->model('company_model');
		$this->load->model('fund_model');
	}

	
	/**
	* index
	*
	* This help to list all mutual company
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	
	public function index()
	{
		// Multi-delet part here
		if ($this->input->post('delete'))
		{
			$notDeleteName = '';
			$deleteData = true;
			
			foreach ($this->input->post('delete') as $delete)
			{
				$fundData = $this->chkCompanyIdInMutualFundTable($delete);
				if(!$fundData)
				{
					$deleteData = $this->company_model->delete_company($delete);
				}
				else
				{
					$Company = $this->company_model->get_company_details($delete);
					$notDeleteName .= $Company[0]['mutualCompanyName'].", ";
				}
				
			}
			
			if($notDeleteName != '')
				$notDeleteName = "<br/> Company ".substr($notDeleteName,0,-2)." cannot be deleted as it is used in other table.";
					
			/// $multiDelete = $this->country_model->multi_delete_country($this->input->post('delete'));
			
			if ($deleteData)
				$this->session->set_flashdata('success', 'Company deleted Successfully !!'.$notDeleteName);
			else
				$this->session->set_flashdata('error', 'Failed to delete Company !!'.$notDeleteName);
			
			// We are redirecting coz it has $_POST and so while refreshing everytime it will ask for resending data.
			// To avoid this we are redirecting it.
			redirect('admin/mutual/listcompany');
		}
		
		$arrData['middle'] = 'admin/mutual/listcompany';
		$this->load->view('admin/template',$arrData);
	}

	/**
	* addcompany
	*
	* This help to add to add company
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	
	public function addcompany()
	{
		if ($this->input->post('cmdSubmit')){
			$date = date("Y-m-d");
			
			$arrData["mutualCompanyName"]		= $this->input->post('mutualCompanyName');
			$arrData["mutualCompanyCreatedOn"]	= $date;
			$arrData["mutualCompanyModifiedOn"]	= $date;
						
			$insertedFlag	= $this->company_model->save_company($arrData);
			
			if ($insertedFlag){
				
				$this->session->set_flashdata('success', 'Company Added Successfully !!');
				redirect('admin/mutual/listcompany');

			}else{
				
				$this->session->set_flashdata('error', 'Failed to Add Company !!');
				redirect('admin/mutual/addcompany');				
			}
		}
		
		$arrData['middle'] = 'admin/mutual/addcompany';
		$this->load->view('admin/template',$arrData);
		
	}
	
	/**
	* editcompany
	*
	* This help to add to add company
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	
	public function editcompany($iCompanyId)
	{
		if ($this->input->post('cmdSubmit')){
			$date = date("Y-m-d");
			
			$arrData["mutualCompanyName"]		= $this->input->post('mutualCompanyName');
			$arrData["mutualCompanyModifiedOn"]	= $date;
						
			$insertedFlag	= $this->company_model->update_company($iCompanyId, $arrData);
			
			if ($insertedFlag){
				
				$this->session->set_flashdata('success', 'Company Updated Successfully !!');
				redirect('admin/mutual/listcompany');

			}else{
				
				$this->session->set_flashdata('error', 'Failed to Update Company !!');
				redirect('admin/mutual/addcompany');				
			}
		}
		
		$arrData['companyDetailsArr']	= $this->company_model->get_company_details($iCompanyId);
		
		$arrData['middle'] = 'admin/mutual/editcompany';
		$this->load->view('admin/template',$arrData);
		
	}
	
	
	/**
	* listcompany
	*
	* This help to list company
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	
	public function listcompany()
	{
		$arrData['arrCompany']	= $this->company_model->get_company_details();
		
		$arrData['middle'] = 'admin/mutual/listcompany';
		$this->load->view('admin/template',$arrData);
	}
	
	
		/**
	* deletecompany
	*
	* This help to delete Company
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	
	public function deletecompany($iCompanyId)
	{
		// As country id is used in user table, need to chk it b4 deleting
		$Data = $this->chkCompanyIdInMutualFundTable($iCompanyId);
		
		if(!$Data)
		{
			$delete = $this->company_model->delete_company($iCompanyId);
			
			if ($delete)
				$this->session->set_flashdata('success', 'Company deleted Successfully !!');
			else
				$this->session->set_flashdata('error', 'Failed to delete Company !!');
		}
		else
		{
			$this->session->set_flashdata('error', 'Can\'t delete this company. It is used in Mutual Fund Table.');
		}
		redirect('admin/mutual/listcompany');
	}
	
	// This  function to check if company id is used in mutual fund table or not
	public function chkCompanyIdInMutualFundTable($iCompanyId)
	{
		$this->db->select();
		$this->db->where('mutualfundsCompanyId', $iCompanyId); 
		$query = $this->db->get('safedoc_mutualfunds');
		
		return $query->result_array();
	}
	
	/**
	* addfunds
	*
	* This help to add funds for company
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	
	public function addfunds()
	{
		if ($this->input->post('cmdSubmit')){
			$date = date("Y-m-d");

			$mutualfundsUpdateDate	= date("Y-m-d",strtotime($this->input->post('mutualfundsupadtedDate')));

			$arrData["mutualfundsCompanyId"]		= $this->input->post('mutualfundsCompanyId');
			$arrData["mutualfundsName"]				= $this->input->post('mutualfundsName');
			$arrData["mutualfundsCode"]				= $this->input->post('mutualfundsCode');
			$arrData["mutualfundsNAV"]				= $this->input->post('mutualfundsNAV');
			$arrData["mutualfundsRepurchasePrice"]	= $this->input->post('mutualfundsRepurchasePrice');
			$arrData["mutualfundsSalesPrice"]		= $this->input->post('mutualfundsSalesPrice');
			$arrData["mutualfundsUpdateDate"]		= $mutualfundsUpdateDate;
			$arrData["mutualfundsCreatedOn"]		= $date;
			//$arrData["mutualfundsModifiedsOn"]	= '';
						
			$insertedFlag	= $this->fund_model->save_fund($arrData);
			
			if ($insertedFlag){
				
				$this->session->set_flashdata('success', 'Fund Added Successfully !!');
				redirect('admin/mutual/listfund');

			}else{
				
				$this->session->set_flashdata('error', 'Failed to Add Fund !!');
				redirect('admin/mutual/addcompany');				
			}
		}
		
		$arrCompany = $this->company_model->get_company_details();
		foreach($arrCompany as $company){
			$companyDetails[$company['mutualCompanyId']] = $company['mutualCompanyName'];
		}
		$arrData['company'] = $companyDetails ;
		
		$arrData['middle'] = 'admin/mutual/addfunds';
		$this->load->view('admin/template',$arrData);
	}

	/**
	* listfunds
	*
	* This help to list funds of the company
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	
	public function listfund()
	{
		// Multi-delet part here
		// Not using this as there is constrain in deleting.
		// Commented by rima
		/*if ($this->input->post('delete'))
		{
			$multiDelete = $this->fund_model->multi_delete_fund($this->input->post('delete'));
			
			if ($multiDelete)
				$this->session->set_flashdata('success', 'Fund deleted Successfully !!');
			else
				$this->session->set_flashdata('error', 'Failed to delete Fund !!');
			
			// We are redirecting coz it has $_POST and so while refreshing everytime it will ask for resending data.
			// To avoid this we are redirecting it.
			redirect('admin/mutual/listfund');
		}
		*/
		$arrData['arrFund']	= $this->fund_model->get_fund_details();
		
		$arrCompany = $this->company_model->get_company_details();
		foreach($arrCompany as $company){
			$companyDetails[$company['mutualCompanyId']] = $company['mutualCompanyName'];
		}
		$arrData['company'] = $companyDetails ;
		
		$arrData['middle'] = 'admin/mutual/listfund';
		$this->load->view('admin/template',$arrData);
	}
	
	/**
	* editfund
	*
	* This help to update funds info
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	
	public function editfund($iFundId)
	{
		if ($this->input->post('cmdSubmit')){
			$date = date("Y-m-d");
			
			$mutualfundsUpdateDate	= date("Y-m-d",strtotime($this->input->post('mutualfundsupadtedDate')));

			$arrData["mutualfundsCompanyId"]		= $this->input->post('mutualfundsCompanyId');
			$arrData["mutualfundsName"]				= $this->input->post('mutualfundsName');
			$arrData["mutualfundsCode"]				= $this->input->post('mutualfundsCode');
			$arrData["mutualfundsNAV"]				= $this->input->post('mutualfundsNAV');
			$arrData["mutualfundsRepurchasePrice"]	= $this->input->post('mutualfundsRepurchasePrice');
			$arrData["mutualfundsSalesPrice"]		= $this->input->post('mutualfundsSalesPrice');
			$arrData["mutualfundsUpdateDate"]		= $mutualfundsUpdateDate;
			$arrData["mutualfundsModifiedsOn"]		= $date;

			$updatedFlag	= $this->fund_model->update_fund($iFundId, $arrData);
			
			if ($updatedFlag){
				$this->session->set_flashdata('success', 'Fund Updated Successfully !!');
				redirect('admin/mutual/listfund');
			}else{
				$this->session->set_flashdata('error', 'Failed to Update Fund !!');
				redirect('admin/mutual/addcompany');				
			}
		}
		
		$arrData['arrFund']	= $this->fund_model->get_fund_details($iFundId);
		
		$arrCompany = $this->company_model->get_company_details();
		foreach($arrCompany as $company){
			$companyDetails[$company['mutualCompanyId']] = $company['mutualCompanyName'];
		}
		$arrData['company'] = $companyDetails ;
			
		$arrData['middle'] = 'admin/mutual/editfunds';
		$this->load->view('admin/template',$arrData);
	}
	
	/**
	* deletefund
	*
	* This help to delete Fund
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	
	public function deletefund($iFundId)
	{
		// Checking id particular fund id is used in portfolio table. If yes, deletion of that fund is not allowed.
		$this->load->model('portfolio_model');
		$this->db->where('portfolioMutualFundId',$iFundId);
		$objQuery = $this->db->get('safedoc_protfolio');
		$arrPortfolio =  $objQuery->result_array();

		if(!$arrPortfolio) // if no data in portfolio.
		{
			$delete = $this->fund_model->delete_fund($iFundId);
			
			if ($delete)
				$this->session->set_flashdata('success', 'Fund deleted Successfully !!');
			else
				$this->session->set_flashdata('error', 'Failed to delete Fund !!');
		}
		else
			$this->session->set_flashdata('error', 'Can\'t delete this mutual fund. It is used in Portfolio table !!');
		redirect('admin/mutual/listfund');
	}

	/**
	* readtxt
	*
	* This help to read txt
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	
	public function runprocess()
	{
		$arrData['middle'] = 'admin/mutual/runprocess';
		$this->load->view('admin/template',$arrData);
	}

	public function readtxt(){
		
		$textPath	= $this->config->item('TextFileLink');

		$file_handle = fopen($textPath, "rb");

		while (!feof($file_handle) ) {

			$line_of_text = fgets($file_handle);
			$parts = explode('=', $line_of_text);

			$values	= explode(';',$parts[0]);
			
			$cntValues	= count($values);

			if($cntValues == 8){
				
				$mutualfundsCode	= $values[0];
				
				if(is_numeric($mutualfundsCode)){
					$dateUpdate	=	date('Y-m-d',strtotime($values[7]));
					
					$updateData['mutualfundsNAV']				= $values[4];
					$updateData['mutualfundsRepurchasePrice']	= $values[5];
					$updateData['mutualfundsSalesPrice']		= $values[6];
					$updateData['mutualfundsUpdateDate']		= $dateUpdate;
					
					$flag	= $this->fund_model->update_by_fund_code($mutualfundsCode,$updateData);

				}
			}
			
		}

		fclose($file_handle);
		
		if ($flag)
			$this->session->set_flashdata('success', 'Process run Successfully !!');
		else
			$this->session->set_flashdata('error', 'Process Failed please try again!!');

		redirect('admin/mutual/runprocess');
	}
	

}