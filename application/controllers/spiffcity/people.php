<?php
 class People extends CI_Controller{
  function __construct(){
   parent::__construct();
    if($this->session->userdata('logged_in') == false){
      $this->facebook->destroySession();
      $this->session->sess_destroy();
      redirect('spiffcity/home');
    }
  }
  function index(){
   $this->load->view('spiffcity/people');
  }
 }
?>