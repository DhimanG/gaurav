<?php
  /*
  *@Redeem Controller 
  *@package Spiffcity
  */
 class Redeem extends CI_Controller{
  /*
  *@method void __construct  used to call parent constructor
  */
  function __construct(){
   parent::__construct();
    if($this->session->userdata('logged_in') == false){
      $this->facebook->destroySession();
      $this->session->sess_destroy();
      redirect('spiffcity/home');
    }
   $this->load->model('spiffcity/coupons_model');
  }
  /*
  *@method void index default controller function used to load view redeem . 
  */
  function index(){
   $arrData['coupons'] = $this->coupons_model->get_coupons_details();
   $this->load->view('spiffcity/dashboard/dashboard_navbar');
   $this->load->view('spiffcity/dashboard/redeem',$arrData);
   $this->load->view('spiffcity/dashboard/dashboard_footer');
  }
  /*
  *@method array get_coupon_details used to get selected coupon details from database and load popoup model-card view
  */
  function get_coupon_details(){
    $coupon_id = $this->input->post('coupon_id');
    $data['coupon'] = $this->coupons_model->get_selected_coupon_details($coupon_id);
    $this->load->view('spiffcity/dashboard/model-card',$data);
  }
  /*
  *show cart details function used to show cart contents with its details.
  *return void 
  */
  function show_cart(){
    $this->load->view('spiffcity/dashboard/dashboard_navbar');
    $this->load->view('spiffcity/dashboard/cart');
    $this->load->view('spiffcity/dashboard/dashboard_footer');
  }
 }
?>