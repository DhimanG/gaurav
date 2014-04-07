<?php
 class Sp_coupons extends CI_Controller{
  function __construct()
  {
			
   parent::__construct();
   if($this->session->userdata('logged_in') == FAlSE)
			{
				
    redirect("admin/login");
    break;
			
   }			
   $this->load->model('sp_coupons_model');
   $this->load->library('form_validation');
  }
  public function index(){
   $arrData['couponsDetails']	= $this->sp_coupons_model->get_coupons_details();	
			$arrData['middle'] = 'admin/sp_coupons/listcoupons';
			$this->load->view('admin/template',$arrData);
  }
  public function editcoupons($id){
   //echo "<pre>"; print_r($_POST);echo "</pre>";
   
   if($this->input->post('cmdSubmit')){
    $date=date("y-m-d");
    $updatedata['title'] = $this->input->post('title');
    $updatedata['img'] = $this->input->post('img');
    $updatedata['description'] = $this->input->post('description');
    $updatedata['Price'] = $this->input->post('Price');
    $updatedata['modified_date'] = $date;
    
    $updateFlag = $this->sp_coupons_model->update_coupon($id,$updatedata);
    if ($updateFlag){
					$this->session->set_flashdata('success', 'Sp_Coupon updated Successfully !!');
					redirect('admin/sp_coupons');
				}else{
					$this->session->set_flashdata('error', 'Failed to updated Sp_Coupon !!');
					redirect('admin/sp_coupons/editcoupons/.$id');
				}
    
   }
   $arrData['couponDetails'] = $this->sp_coupons_model->get_coupons_details($id);
   $arrData['middle'] = 'admin/sp_coupons/editcoupons';
   $this->load->view('admin/template',$arrData);
  }
  
  public function addcoupon(){
   $arrData['middle'] = 'admin/sp_coupons/addcoupon';
   $this->load->view('admin/template',$arrData);

   if($this->input->post('cmdSubmit')){
    
    $date=date("y-m-d");
    $arrInsertData['title'] = $this->input->post('title');
    $config['upload_path'] = 'Assets/spiffcity/coupons';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $config['max_size'] = '5000';
    $config['max_width']  = '2000';
    $config['max_height']  = '2000';  
    $config['encrypt_name'] = TRUE;
    $config['remove_spaces'] = TRUE;
    
    $this->load->library('upload', $config);
    //$field_name = "photo";
    $uploaded = $this->upload->do_upload('userfile');
//print_r($uploaded);exit;
    if($uploaded){
      $arrInsertData['img'] = $this->upload->file_name;      
    }
    else{
      $this->session->set_flashdata('success', 'Enable to load image Image must be gif|jpg|png|jpeg format !!');
			redirect('admin/sp_coupons');
    }
    $arrInsertData['description']    = $this->input->post('description');
    $arrInsertData['points']         = $this->input->post('points');
    $arrInsertData['Price']          = $this->input->post('Price');
    $arrInsertData['likes']          = $this->input->post('likes');
    $arrInsertData['modified_date']  = $date;
    $arrInsertData['created_date']   = $date;
    
    $arrInsertFlag = $this->sp_coupons_model->add_coupon($arrInsertData);
    if ($arrInsertFlag){
					$this->session->set_flashdata('success', 'Sp_Coupon Added Successfully !!');
					redirect('admin/sp_coupons');
				}else{
					$this->session->set_flashdata('error', 'Failed to Add  Sp_Coupon !!');
					redirect('admin/sp_coupons/addcoupon/');
				}
    
   }
   
  }
  
 }
?>