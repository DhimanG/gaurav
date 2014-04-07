<?php
  
  class Log_in extends CI_Controller{
    function __construct(){
      parent::__construct();
      $this->load->model('spiffcity/login_model');
    }
    function login(){      
      $this->form_validation->set_rules('username','required');
      $this->form_validation->set_rules('password','required');
      $resultvalid = $this->form_validation->run();
      if($resultvalid == true){
        if(isset($_POST)){
          $arrData['userid'] = $this->input->post('username');
          $arrData['password'] = md5($this->input->post('password'));
          $signinFlag = $this->login_model->signin($arrData);
          if($signinFlag == true){
            $id = $this->login_model->get_id($arrData['userid']);
            
            $this->session->set_userdata('username',$arrData['userid']);
            $this->session->set_userdata('spiff_id',$id);
            $this->session->set_userdata('fbstatus',false);
            $this->session->set_userdata('logged_in',true);  
            $this->session->set_flashdata('success', 'User loggedin  Successfully !!');
            redirect('spiffcity/popular');
          }
          else{            
           $this->session->set_flashdata('success', 'Invalid Username and Password  !!');
           header('location:'.base_url().'spiffcity/home');           
          }
        }
      }  
    } 
  }
?>