<?php
 class Sp_banners extends CI_Controller {
  
  function __construct()
  {
   parent::__construct();
   
   if($this->session->userdata('logged_in') == FALSE) {
    redirect('admin/login');
    break;
   }
   $this->load->model('sp_banners_model');
  }
  public function index(){
   $arrData['bannerDetails']=$this->sp_banners_model->get_spbanner_details();
   $arrData['middle']='admin/sp_banners/sp_listbanner';
   $this->load->view('admin/template',$arrData);
  }

  public function addbanner(){
   if ($this->input->post('cmdSubmit')){
     $post_data = $this->input->post();
     $date = date("Y-m-d");
     $arrInsertData["title"]	      = $post_data['title'];
     $arrInsertData["img"]	       = $post_data['img'];
     
     $arrInsertData["created_date"]	= $date;
     $arrInsertData["modified_date"]= $date;
     $insertedFlag	= $this->sp_banners_model->save_banner($arrInsertData);
     if ($insertedFlag){
       $this->session->set_flashdata('success', 'Sp_Banner Added Successfully !!');
       redirect('admin/sp_banners');
     }else{
       $this->session->set_flashdata('error', 'Failed to Add Sp_Banner !!');
       redirect('admin/sp_banners/addbanner');				
     }
   }
   $arrData['middle'] = 'admin/sp_banners/addbanner';
   $this->load->view('admin/template',$arrData);
   
  }
  

 public function edit($id)
 {
  
  if ($this->input->post('Submit')){
 
   /* For image upload 
   $prev_file = $this->input->post('prev_image');
   $config['max_size']	= '500';
   $config['upload_path'] = './public/upload/banner/';
   $config['allowed_types'] = 'gif|jpg|png|jpeg';
     
   $UpdateData["img"]		= '';
  
   if ($_FILES['img']['name'] != '')
   {
    $this->load->library('upload',$config);
    $this->upload->do_upload('img'); // "img" -> this is field name.
    
    $UpdateData["img"] = $this->upload->file_name;
    
    if( $prev_file !='' && file_exists($config['upload_path'].$prev_file))
     unlink($config['upload_path'].$prev_file);
   }*/
    
  $date = date("Y-m-d");
  $updatedata['title'] = $this->input->post('title');
  $updatedata['img']   = $this->input->post('img');
  $UpdateData["modified_date"]	= $date;
 
  $updateFlag	= $this->sp_banners_model->update_banner($id,$UpdateData);
   
   if ($updateFlag){
    $this->session->set_flashdata('success', 'Sp_Banner updated Successfully !!');
    redirect('admin/sp_banners');
   }else{
    $this->session->set_flashdata('error', 'Failed to update Sp_Banner !!');
    redirect('admin/sp_banners/edit/'.$id);
   }   
   
  }
   
  $arrData['bannerDetails']	= $this->sp_banners_model->get_spbanner_details($id);
  $arrData['middle']='admin/sp_banners/edit';
  $this->load->view('admin/template',$arrData);
  
  }
  
  
 }
?>


