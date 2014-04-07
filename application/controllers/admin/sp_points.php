<?php
 class Sp_points extends CI_Controller{
		
		
  function __construct()
  {
			
   parent::__construct();
   if($this->session->userdata('logged_in') == FAlSE)
			{
				
    redirect("admin/login");
    break;
			
   }
   
   $this->load->model('sp_points_model');
   $this->load->library('form_validation');
			
  }
		public function index()
		{
			
			$arrData['pointsDetails']	= $this->sp_points_model->get_points_details();	
			$arrData['middle'] = 'admin/sp_points/listpoints';
			$this->load->view('admin/template',$arrData);
		}
		
		
		public function editpoints($id){
		
			if($this->input->post('Submit')){
				
				$date =  date('y-m-d') ;
				$updateData['Title'] = $this->input->post('Title') ;
				$updateData['spiff_points'] = $this->input->post('spiff_points');
				$updateData['value'] = $this->input->post('value');
				$updateData['modified_date'] = $date;
				
				$updateFlag = $this->sp_points_model->update_points($id,$updateData);
				if ($updateFlag){
					$this->session->set_flashdata('success', 'Sp_Points updated Successfully !!');
					redirect('admin/sp_points');
				}
				else{
					$this->session->set_flashdata('error', 'Failed to updated Sp_Points !!');
					redirect('admin/sp_points/editpoints/.$id');
				}
			}
			$arrData['pointDetails'] = $this->sp_points_model->get_points_details($id);
			$arrData['middle'] = 'admin/sp_points/editpoints';
			$this->load->view('admin/template',$arrData);
	 }
 	
	
		public function addpoint(){
	
			$arrData['middle'] = 'admin/sp_points/addpoint';
			$this->load->view('admin/template',$arrData);
			
			if ($this->input->post('cmdSubmit')){
			
				$post_data = $this->input->post();
				$date = date("Y-m-d");
				$arrInsertData["Title"]	      		= $post_data['Title'];
				$arrInsertData["spiff_points"]	 = $post_data['spiff_points'];
				$arrInsertData["value"]     				= $post_data['value'];
				$arrInsertData["created_date"]		= $date;
				$arrInsertData["modified_date"]	= $date;
				
				$insertedFlag	= $this->sp_points_model->save_point($arrInsertData);
				if ($insertedFlag){
						$this->session->set_flashdata('success', 'Sp_Point Added Successfully !!');
						redirect('admin/sp_points');
				}else{
						$this->session->set_flashdata('error', 'Failed to Add Sp_Point !!');
						redirect('admin/sp_points/addpoint');				
				}
		 }
									
			
		}
		
	}
?>