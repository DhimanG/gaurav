<?php
  /*
  *Spiffcity
  *
  *Activities Controller
  *@package Spiffcity
  */
  class Activities extends CI_Controller{
    /*
    *__construct
    *calls parent constructor
    *return void 
    */
    function __construct(){
      parent::__construct();
      if($this->session->userdata('logged_in') == false){
        $this->facebook->destroySession();
        $this->session->sess_destroy();
        redirect('spiffcity/home');
      }
      $this->load->model('spiffcity/crowdcast_model');
    }
    /*
    *Index
    *@access public
    *@return void
    */
    function index(){
      $id = $this->session->userdata('spiff_id');
      $data= $this->crowdcast_model->get_users_all_activities_data($id);
      //echo "<pre>"; print_r($data);exit;
      
      //$activities = array_merge(array_keys($data),array_keys($data['comments']));
      //$activities = array_unique($activities);
      //
      ////$size1 = count($data['comments']);
      ////$size2 = count($data['likes']);
      ////if($size1 > $size2){
      ////  $size = $size1;
      ////}else{
      ////  $size = $size2;
      ////}
      ////
      ////for( $i=0; $i<$size; $i++){
      ////  if($data['comments'][$i]->id !== $data['likes'][$i]->id){
      ////    $activities[$i] = 
      ////  }
      ////}
      //
      //
      //echo"<pre>";print_r($activities['comments']);exit;

      if($data){
        
        $this->load->view("spiffcity/dashboard/dashboard_navbar");
        $this->load->view("spiffcity/dashboard/activities",$data);
        $this->load->view("spiffcity/dashboard/dashboard_footer");
      }
      else{
        echo '<script>alert("You dont have any post data ...");</script>';
        $this->load->view("spiffcity/dashboard/dashboard_navbar");
        $this->load->view("spiffcity/dashboard/activities");
        $this->load->view("spiffcity/dashboard/dashboard_footer");
      }
    }
  }
?>
