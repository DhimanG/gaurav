<?php 
 /*class Example extends CI_Controller{
  function __construct(){
   parent::__construct();
  }
  function index(){
   $fb_config = array(
    'appID' => '667435426636439',
    'secret'=> '1e73498efb461a4a0a9d3c7decadf16c'
   );
   $this->load->library('facebook',$fb_config);
   $user = $this->facebook->getUser();
   if($user){
    try{
     $data['user_profile'] = $this->facebook->api('/me');
    }
    catch (FacebookApiException $e){
     $user = null;
    }
   }
   if($user){
    $data = $this->facebook->getLogoutUrl();
   }else{
    $data  = $this->facebook->getLoginUrl();
   }
   $this->load->view('example_view',$data);
  }
 } */
 
 class Example extends CI_Controller {

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {

        $fb_config = array(
            'appId'  => '561885653907144',
            'secret' => '880c40d8d9e5bf82d669a9ecc30fd118'
        );

        $this->load->library('facebook/facebook', $fb_config);

        $user = $this->facebook->getUser();

        if ($user) {
            try {
                $data['user_profile'] = $this->facebook->api('/me');
            } catch (FacebookApiException $e) {
                $user = null;
            }
        }

        if ($user) {
            $data['logout_url'] = $this->facebook->getLogoutUrl();
        } else {
            $data['login_url'] = $this->facebook->getLoginUrl();
        }

        $this->load->view('test_view',$data);
    }
        
   
 }
?>