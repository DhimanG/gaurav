<?php
  /*  
  * Spiffcity
  *@package spiffcity
  *@Friends controller
  */
  class Friends extends CI_Controller{

    /*
    *__construct
    *
    *@calls parent constructor
    *@author Gaurav
    *@return void
    */
    function __construct(){
      parent::__construct();
      if($this->session->userdata('logged_in') == false){
        $this->facebook->destroySession();
        $this->session->sess_destroy();
        redirect('spiffcity/home');
      }
      $this->load->model('spiffcity/friends_model');
    }
    /*
    *default function Index
    *@access public
    *@return void or redirect or load views
    */
    function index(){
      $this->load->view("spiffcity/dashboard/dashboard_navbar");
      $this->load->view("spiffcity/dashboard/friends");
      $this->load->view("spiffcity/dashboard/dashboard_footer");
    }
    
  }
?>

