<?php
 class Test extends CI_Controller{
  function __construct()
    {
        parent::__construct();
    }

    function index()
    {     

        $this->load->library('facebook/facebook');

        $user = $this->facebook->getUser();

        if ($user) {
            try {
                $data['user_profile'] = $this->facebook
                    ->api('/me');
            } catch (FacebookApiException $e) {
                $user = null;
            }
        }

        if ($user) {
            $data['logout_url'] = $this->facebook
                ->getLogoutUrl();
        } else {
            $data['login_url'] = $this->facebook
                ->getLoginUrl();
        }

        $this->load->view('test_view',$data);
    }
 function loginByFacebook(){
      $this->load->library('fb_connect');
      $param['redirect_uri']=site_url("test/facebook");
      redirect($this->fb_connect->getLoginUrl($param));
}

function facebook() {
      $this->load->library('fb_connect');
      if (!$this->fb_connect->user_id) {
          //Handle not logged in,
      } else {
         $fb_uid = $this->fb_connect->user_id;
         $fb_usr = $this->fb_connect->user;
         //Hanlde user logged in, you can update your session with the available data
         //print_r($fb_usr) will help to see what is returned
      }
	}
 
 
 
 
 
 
 
 }
 
?>