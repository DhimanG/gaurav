<?php
  /*
  * Spiffcity
  * Dashboard Controller
  * @package spiffcity
  */
  class Dashboard extends CI_Controller{
    /*
    * __construct
    * @method void used to call parent constructor.
    */
    function __construct(){
      parent::__construct();
      if($this->session->userdata('logged_in') == false){
        $this->facebook->destroySession();
        $this->session->sess_destroy();
        redirect('spiffcity/home');
      }      
      $this->load->model('spiffcity/users_model');
      $this->load->model('spiffcity/invitation_model');

    }
    /*
    * Index
    * @method array used to get user's profile data from database and displaying it.
    */
    function index(){
      $userid = $this->session->userdata('username');
      $data['profile_data'] = $this->users_model->get_profile_data($userid);
      $data["invited"] = $this->invitation_model->get_invitation_data($userid);
      if($data){
        $this->load->view('spiffcity/dashboard/dashboard_navbar');
        $this->load->view('spiffcity/dashboard/dashboard',$data);
        $this->load->view('spiffcity/dashboard/dashboard_footer');
      }
    }
  }
?>