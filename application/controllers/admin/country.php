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
 

class Country extends CI_Controller {

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

		$this->load->model('country_model');
	}

	
	/**
	* index
	*
	* This help to list all the countries
	* 
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
				$userData = $this->chkCountryIdInUserTable($delete);
				if(!$userData)
				{
					$deleteData = $this->country_model->delete_country($delete);
				}
				else
				{
					$Country = $this->country_model->get_country_details($delete);
					$notDeleteName .= $Country[0]['countryName'].", ";
				}
				
			}
			
			if($notDeleteName != '')
				$notDeleteName = "<br/> Countries ".substr($notDeleteName,0,-2)." cannot be deleted as it is used in other table.";
					
			/// $multiDelete = $this->country_model->multi_delete_country($this->input->post('delete'));
			
			if ($deleteData)
				$this->session->set_flashdata('success', 'Country deleted Successfully !!'.$notDeleteName);
			else
				$this->session->set_flashdata('error', 'Failed to delete Country !!'.$notDeleteName);
			
			// We are redirecting coz it has $_POST and so while refreshing everytime it will ask for resending data.
			// To avoid this we are redirecting it.
			redirect('admin/country');
		}
		
		$arrData['countryDetails']	= $this->country_model->get_country_details();
		
		$arrData['middle'] = 'admin/country/listcountry';
		$this->load->view('admin/template',$arrData);		
	}


	/**
	* add
	*
	* This help to add country
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	
	public function add()
	{
		
		if ($this->input->post('cmdSubmit')){
			
			$date = date("Y-m-d");

			$arrData["countryName"]			= $this->input->post('countryname');
			$arrData["countryCreatedOn"]	= $date;
			$arrData["countryModifiedOn"]	= $date;
						
			$insertedFlag	= $this->country_model->save_country($arrData);
			
			if ($insertedFlag){
				
				$this->session->set_flashdata('success', 'country Added Successfully !!');
				redirect('admin/country');

			}else{
				
				$this->session->set_flashdata('error', 'Failed to Add country !!');
				redirect('admin/country/add');				
			}
		}

		
		$arrData['middle'] = 'admin/country/add';
		$this->load->view('admin/template',$arrData);
	}


	/**
	* edit
	*
	* This help to edit country
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	
	public function edit($iCountryId)
	{
		$arrData['countryDetailsArr']	= $this->country_model->get_country_details($iCountryId);
		
		if ($this->input->post('cmdSubmit')){
			
			$date = date("Y-m-d");

			$UpdateData["countryName"]			= $this->input->post('countryname');
			$UpdateData["countryModifiedOn"]	= $date;
						
			$updateFlag	= $this->country_model->update_country($iCountryId,$UpdateData);
			
			if ($updateFlag){
				
				$this->session->set_flashdata('success', 'country updated Successfully !!');
				redirect('admin/country');

			}else{
				
				$this->session->set_flashdata('error', 'Failed to updated country !!');
				redirect('admin/country/edit/'.$iCountryId);				
			}

		}

		$arrData['middle'] = 'admin/country/edit';
		$this->load->view('admin/template',$arrData);
	}
	
		
	/**
	* delete
	*
	* This help to delete Country
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	
	public function delete($iCountryId)
	{
		// As country id is used in user table, need to chk it b4 deleting
		$userData = $this->chkCountryIdInUserTable($iCountryId);
		
		if(!$userData)
		{
			$delete = $this->country_model->delete_country($iCountryId);
			
			if ($delete)
				$this->session->set_flashdata('success', 'Country deleted Successfully !!');
			else
				$this->session->set_flashdata('error', 'Failed to delete Country !!');
		}
		else
		{
			$this->session->set_flashdata('error', 'Can\'t delete this country. It is used in User table.');
		}
		redirect('admin/country');
	}
	
	// This  function to check if country id is used in user table or not
	public function chkCountryIdInUserTable($iCountryId)
	{
		$this->db->select();
		$this->db->where('userCountryId', $iCountryId); 
		$query = $this->db->get('safedoc_user');
		
		return $query->result_array();
		
	}
	
}