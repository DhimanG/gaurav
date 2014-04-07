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
 

class Newsfeed extends CI_Controller {

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

		$this->load->model('newsfeed_model');
	}

	
	/**
	* index
	*
	* This wil display newsfeed page
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
			$multiDelete = $this->newsfeed_model->multi_delete_newsfeed($this->input->post('delete'));
			
			if ($multiDelete)
				$this->session->set_flashdata('success', 'Newsfeed deleted Successfully !!');
			else
				$this->session->set_flashdata('error', 'Failed to delete Newsfeed !!');
			
			// We are redirecting coz it has $_POST and so while refreshing everytime it will ask for resending data.
			// To avoid this we are redirecting it.
			redirect('admin/newsfeed');
		}
		
		$arrData['newsfeedDetails']	= $this->newsfeed_model->get_newsfeed_details();
		
		$arrData['middle'] = 'admin/newsfeed/listnewsfeed';
		$this->load->view('admin/template',$arrData);
	}
	
	/**
	* add
	*
	* This help to add newsfeeds
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	public function add()
	{
		if ($this->input->post('cmdSubmit')){
			$date = date("Y-m-d");

			$arrData["newsfeedTitle"]			= $this->input->post('newsfeedTitle');
			$arrData["newsfeedDescription"]		= $this->input->post('newsfeedDescription');
			$arrData["newsfeedCreatedOn"]		= $date;
			$arrData["newsfeedModifiedOn"]		= $date;
						
			$insertedFlag	= $this->newsfeed_model->save_newsfeed($arrData);
			
			if ($insertedFlag){
				
				$this->session->set_flashdata('success', 'Newsfeed Added Successfully !!');
				redirect('admin/newsfeed');

			}else{
				
				$this->session->set_flashdata('error', 'Failed to Add Newsfeed !!');
				redirect('admin/newsfeed/add');				
			}
		}
		
		$arrData['middle'] = 'admin/newsfeed/add';
		$this->load->view('admin/template',$arrData);
	}
	
	/**
	* edit
	*
	* This help to edit Newsfeed
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	
	public function edit($iNewsfeedId)
	{
		$arrData['newsfeedDetailsArr']	= $this->newsfeed_model->get_newsfeed_details($iNewsfeedId);
		
		if ($this->input->post('cmdSubmit')){
			
			$date = date("Y-m-d");

			$UpdateData["newsfeedTitle"]		= $this->input->post('newsfeedTitle');
			$UpdateData["newsfeedDescription"]	= $this->input->post('newsfeedDescription');
			$UpdateData["newsfeedModifiedOn"]	= $date;
						
			$updateFlag	= $this->newsfeed_model->update_newsfeed($iNewsfeedId,$UpdateData);
			
			if ($updateFlag){
				
				$this->session->set_flashdata('success', 'Newsfeed updated Successfully !!');
				redirect('admin/newsfeed');

			}else{
				$this->session->set_flashdata('error', 'Failed to updated Newsfeed !!');
				redirect('admin/newsfeed/edit/'.$iNewsfeedId);
			}
		}

		$arrData['middle'] = 'admin/newsfeed/edit';
		$this->load->view('admin/template',$arrData);
	}
	
	
	/**
	* delete
	*
	* This help to delete Newsfeed
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	
	public function delete($iNewsfeedId)
	{
		$delete = $this->newsfeed_model->delete_newsfeed($iNewsfeedId);
		
		if ($delete)
			$this->session->set_flashdata('success', 'Newsfeed deleted Successfully !!');
		else
			$this->session->set_flashdata('error', 'Failed to delete Newsfeed !!');
		
		redirect('admin/newsfeed');
	}
	
}