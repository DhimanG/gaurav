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
		
		if($this->session->userdata('logged_user_in') == FALSE) {
			redirect('login');
			break;
		}
		
		$this->load->model('company_model');
		$this->load->model('fund_model');
		$this->load->model('portfolio_model');
		$this->load->model('user_model');

		if($this->user_model->chk_users_paid_status($this->session->userdata('userid'))){
			$this->session->set_flashdata('error', 'your demo period expired, please subscribe');
			redirect(base_url()."payments/package");
		}
	}

	
	/**
	* index
	*
	* This help to view mutual of current logged in user
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	
	public function index()
	{
		$arrData['portfolioDetails']	= $this->portfolio_model->get_user_protfolio_details($this->session->userdata('userid'));
		
		// Fetchin Fund data
		$arrFund = $this->fund_model->get_fund_detailsOnCompanyId();
		
		
		$fundNavPriceArr	= array();

		foreach($arrFund as $fund){
			$fundDetails[$fund['mutualfundsId']] = $fund['mutualfundsName'];
			$fundNavPriceArr[$fund['mutualfundsId']] = $fund['mutualfundsNAV'];
		}

		$arrData['fundNavPriceArr'] = $fundNavPriceArr;
		$arrData['fundDetails'] = $fundDetails;
		$arrData['tabIndex'] = '2';
		$arrData['middle'] = 'mutual/listmutual';
		$this->load->view('template',$arrData);
	}

	
	/**
	* detail
	*
	* This help to edit user mutual
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	
	public function detail($iPortfolioId)
	{
		
		$arrData['documentDetailsArr']	= $this->portfolio_model->get_portfolio_details($iPortfolioId);

		// Fetchin Fund data
		$arrFund = $this->fund_model->get_fund_detailsOnCompanyId();
		
		
		$fundNavPriceArr	= array();

		foreach($arrFund as $fund){
			$fundDetails[$fund['mutualfundsId']] = $fund['mutualfundsName'];
			$fundNavPriceArr[$fund['mutualfundsId']] = $fund['mutualfundsNAV'];
		}

		$arrData['fundNavPriceArr'] = $fundNavPriceArr;
		$arrData['fundDetails'] = $fundDetails;

		
		$arrData['tabIndex'] = '2';
		//$arrData['middle'] = 'mutual/viewmutual';
		$this->load->view('mutual/viewmutual',$arrData);
	}

	/**
	* edit
	*
	* This help to edit user mutual
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	
	public function edit($iPortfolioId)
	{
		if ($this->input->post('cmdSubmit')){
			
			$date = date("Y-m-d");
			
			$arrData["portfolioMutualCompanyId"]		= $this->input->post('portfolioMutualCompanyId');
			$arrData["portfolioMutualFundId"]			= $this->input->post('portfolioMutualFundId');
			$arrData["portfolioUnits"]					= $this->input->post('portfolioUnits');
			$arrData["portfolioPurchaseDate"]			= $this->input->post('portfolioPurchaseDate');
			$arrData["portfolioPurchaseNAV"]			= $this->input->post('portfolioPurchaseNAV');
			$arrData["portfolioNotifyPercentIncrease"]	= $this->input->post('portfolioNotifyPercentIncrease');
			$arrData["portfolioModifiedOn"]				= $date;
			$arrData["portfolioNotifyPrice"] = $this->input->post('increasePrice');

			$insertedFlag	= $this->portfolio_model->update_protfolio($iPortfolioId, $arrData);
			
			if ($insertedFlag){
				$this->session->set_flashdata('success', 'Portfolio Updated Successfully !!');
				redirect('mutual');
			}else{
				$this->session->set_flashdata('error', 'Failed to Updated Portfolio !!');
				redirect('mutual/add');				
			}
		}
		if($iPortfolioId!=''){
			$arrData['documentDetailsArr']	= $this->portfolio_model->get_portfolio_details($iPortfolioId);
			
			// Fetching child category to fill dropdown box.
			$arrCompany = $this->company_model->get_company_details();
			
			$companyDetails[''] = '--';
			foreach($arrCompany as $company){
				$companyDetails[$company['mutualCompanyId']] = $company['mutualCompanyName'];
			}
			$arrData['companyDetails'] = $companyDetails;
			
			$arrFund = $this->fund_model->get_fund_detailsOnCompanyId($arrData['documentDetailsArr'][0]['portfolioMutualCompanyId']);
			$fundDetails[''] = '--';
			foreach($arrFund as $fund){
				$fundDetails[$fund['mutualfundsId']] = $fund['mutualfundsName'];
			}
			$arrData['fundDetails'] = $fundDetails;
			$arrData['tabIndex'] = '2';
			$arrData['middle'] = 'mutual/editmutual';
			$this->load->view('template',$arrData);
		}
	}


	/**
	* add
	*
	* This help to add user mutual
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	
	public function add()
	{
		if ($this->input->post('cmdSubmit')){
			
			$date = date("Y-m-d");
			
			$arrData["portfolioUserId"]					= $this->session->userdata('userid');
			$arrData["portfolioMutualCompanyId"]		= $this->input->post('portfolioMutualCompanyId');
			$arrData["portfolioMutualFundId"]			= $this->input->post('portfolioMutualFundId');
			$arrData["portfolioUnits"]					= $this->input->post('portfolioUnits');
			$arrData["portfolioPurchaseDate"]			= $this->input->post('portfolioPurchaseDate');
			$arrData["portfolioPurchaseNAV"]			= $this->input->post('portfolioPurchaseNAV');
			$arrData["portfolioNotifyPercentIncrease"]	= $this->input->post('portfolioNotifyPercentIncrease');
			// $arrData["mutualfundsupadtedDate"]			= $this->input->post('mutualfundsupadtedDate');
			$arrData["portfolioCreatedOn"]				= $date;
			$arrData["portfolioModifiedOn"]				= $date;
			$arrData["portfolioNotifyPrice"] = $this->input->post('increasePrice');
			
			$insertedFlag	= $this->portfolio_model->save_protfolio($arrData);
			
			if ($insertedFlag){
				$this->session->set_flashdata('success', 'Portfolio Added Successfully !!');
				redirect('mutual');
			}else{
				$this->session->set_flashdata('error', 'Failed to Add Portfolio !!');
				redirect('mutual/add');				
			}
		}
		// Fetching child category to fill dropdown box.
		$arrCompany = $this->company_model->get_company_details();
		
		$companyDetails[''] = '--';
		foreach($arrCompany as $company){
			$companyDetails[$company['mutualCompanyId']] = $company['mutualCompanyName'];
		}
		$arrData['companyDetails'] = $companyDetails;
		
		$fundDetails[''] = '--';
		$arrData['fundDetails'] = $fundDetails;
		$arrData['tabIndex'] = '2';
		$arrData['middle'] = 'mutual/addmutual';
		$this->load->view('template',$arrData);
	}

	/**
	* view
	*
	* This help to view user mutual
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	
	public function view()
	{
		
		$arrData['middle'] = 'mutual/viewmutual';
		$this->load->view('template',$arrData);
	}
	
	/**	* Delete
	*
	* This help to delete user Portfolio
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
		
	public function delete($iPortfolioId)
	{
		if($iPortfolioId!=''){
			$delete = $this->portfolio_model->delete_portfolio($iPortfolioId);
		
			if ($delete)
				$this->session->set_flashdata('success', 'Portfolio deleted Successfully !!');
			else
				$this->session->set_flashdata('error', 'Failed to delete Portfolio !!');
				
			redirect('mutual');
		}else{
			redirect('mutual');
		}
	}

		
	/**
	* ajaxMutualFund
	*
	* This help to load mutual fund based on company id.
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	public function ajaxMutualFund()
	{
		if(isset($_POST['id'])){
			// Fetching Fund based on Company
			$fundDetails = '';
			$arrFund = $this->fund_model->get_fund_detailsOnCompanyId($_POST['id']);
			
			$fundDetails[''] = '--';
			foreach($arrFund as $fund){
				$fundDetails[$fund['mutualfundsId']] = $fund['mutualfundsName'];
			}
			$arrData['fundDetails'] = $fundDetails;
			$this->load->view('mutual/ajaxMutualFund',$arrData);
		}else{
			redirect('mutual');
		}
	}
	
}