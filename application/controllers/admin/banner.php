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

class Banner extends CI_Controller {

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

		$this->load->model('banner_model');
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
		$arrData['bannerDetails']	= $this->banner_model->get_banner_details();
		
		$arrData['middle'] = 'admin/banner/listbanner';
		$this->load->view('admin/template',$arrData);
	}
	
	
	/**
	* edit
	*
	* This help to edit Banner
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	
	public function edit($iBannerId)
	{
		$arrData['bannerDetailsArr']	= $this->banner_model->get_banner_details($iBannerId);
		
		if ($this->input->post('cmdSubmit')){
			
			/* For image upload */
			$prev_file = $this->input->post('prev_image');
			$config['max_size']	= '500';
			$config['upload_path'] = './public/upload/banner/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
				
			if($_POST['bannerType']=='code')
			{
				$UpdateData["bannerCode"]		= $this->input->post('bannerCode');
				
				// Here we will check if previously it is image, than we will delete image and its entry from DB
				$UpdateData["bannerImage"] = '';
				$UpdateData["bannerLink"] = '';
				
				// Unlink the image
				if( $prev_file !='' && file_exists($config['upload_path'].$prev_file))
					unlink($config['upload_path'].$prev_file);	
			}
			else
			{
				$UpdateData["bannerLink"]		= $this->input->post('bannerLink');
				$UpdateData["bannerCode"]		= '';
				
				if ($_FILES['bannerImage']['name'] != '')
				{
					$this->load->library('upload',$config);
					$this->upload->do_upload('bannerImage'); // "bannerImage" -> this is field name.
					
					$UpdateData["bannerImage"] = $this->upload->file_name;
					
					if( $prev_file !='' && file_exists($config['upload_path'].$prev_file))
						unlink($config['upload_path'].$prev_file);
				}
				/*elseif (isset($_POST['deleteImage'])) // we will delete file
				{
					if($prev_file!='' && file_exists($config['upload_path'].$prev_file))
						unlink($config['upload_path'].$prev_file);
						
					$UpdateData["bannerImage"] = '';
				}*/
			}
			
			$date = date("Y-m-d");
			$UpdateData["bannerModifiedOn"]	= $date;
			
			$updateFlag	= $this->banner_model->update_banner($iBannerId,$UpdateData);
			
			if ($updateFlag){
				$this->session->set_flashdata('success', 'Banner updated Successfully !!');
				redirect('admin/banner');
			}else{
				$this->session->set_flashdata('error', 'Failed to updated Banner !!');
				redirect('admin/banner/edit/'.$iBannerId);
			}
		}
		
		$arrData['middle'] = 'admin/banner/edit';
		$this->load->view('admin/template',$arrData);
	}
	
}