<?php
  /*
  *Logout Controller
  *@package spiffcity
  */
  class Logout extends CI_Controller{
    /*
    * __construct
    * @method void used to call parent constructor.
    */
     function __construct(){
       parent::__construct();
     }
     /*
     * Index
     * @method array used to get user's profile data from database and displaying it.
     */
     function index(){
       $this->load->library('facebook');
       $user = $this->facebook->getuser();
       if($user){               
          $logout = $this->facebook->getLogoutUrl(array('next'=>base_url(). 'spiffcity/home'));
          $this->facebook->destroySession();
          $this->session->sess_destroy();
          header("Location:$logout");
       }
       else{
          $this->facebook->destroySession();
          $this->session->sess_destroy();
          $this->cart->destroy();
          redirect('spiffcity/home');
       }
     }     
  }
?>