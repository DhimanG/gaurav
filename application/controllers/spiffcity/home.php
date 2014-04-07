<?php
  require_once APPPATH.'libraries/facebook.php';
  require_once APPPATH.'libraries/Twitteroauth.php';
  /*
  *Home Controller
  *@author Gaurav
  *@package Controller
  *@Subpackage Spiffcity 
  */
  class Home extends CI_Controller{
    /*
    *@method __construct used to call parent constructor.
    */
    function __construct(){
      parent :: __construct();   
      $this->load->model('spiffcity/home_model');
      $this->load->library('form_validation');
      if($this->session->userdata('logged_in') == true){
        redirect('spiffcity/popular');
      }
    }
    /*
    *@method index default function used to handle user logging in/out through facebook.
    */
    function index(){
      
      $this->load->library('facebook');
      $user = $this->facebook->getUser();
      if ($user) {
        
        try {
          $data['user_profile'] = $this->facebook->api('/me');          
          $new_userData['userid']  = $data['user_profile']["username"];
          $new_userData['first_name'] = $data['user_profile']["first_name"];
          $new_userData['last_name'] = $data['user_profile']["last_name"];
          
          if(isset($fbData["email"])){
           $new_userData['email'] = $data['user_profile']["email"];
          }
          else{
           $new_userData['email'] = "";
          }
          $new_userData['fb_id'] = $data['user_profile']["id"];
          $fb_id = $data['user_profile']["id"];    
          $new_userData['created_date'] = date('Y-m-d H:i:s');
          $new_userData['active'] = '1';
          $user_exits = $this->home_model->check_if_fb_user_exists($fb_id);
          
          if($user_exits == true){
           $fb_user_spiffData = $this->home_model->get_user_by_fb_user_id($fb_id);     
          }
          else{
           $query = $this->home_model->create_new_fb_user($new_userData);     
          }
          $this->session->set_userdata('spiff_id',$fb_user_spiffData[0]['id']);
          $this->session->set_userdata('username',$data['user_profile']["username"]);
          $this->session->set_userdata('fbstatus',true);
          $this->session->set_userdata('logged_in',true);
          $this->session->set_userdata('auth_token', $fbData["auth_token"]);
          $this->facebook->setAccessToken($fbData["auth_token"]);
        } catch (FacebookApiException $e) {
          $user = null;
        }
      }
      if ($user) {
        $data['logout_url'] = $this->facebook->getLogoutUrl(array( 'next' => base_url() . 'spiffcity/logout/' ));
        redirect('spiffcity/popular');  
      }else {
        $data['login_url'] = $this->facebook->getLoginUrl();
        $this->load->view('spiffcity/home',$data);
      } 
    }   
   
    /*
    *@method signup used for user registration.
    *@return void and redirect to popular page and logged in the user.
    */
   function signup(){
     $this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[sp_users.email]');
     $this->form_validation->set_rules('username','Username','trim|required|is_unique[sp_users.userid]');
     $this->form_validation->set_rules('password','required');
     $resultvalid = $this->form_validation->run();
     
     if($resultvalid == true){
      if(isset($_POST)){
       $arrData['email']    = $this->input->post('email');
       $arrData['userid']   = $this->input->post('username');
       $arrData['password'] = md5($this->input->post('password'));
       $date = date("y-m-d");
       $arrData['modified_date']  = $date;
       $arrData['created_date']  = $date;       
       $registerFlag = $this->home_model->register($arrData);
       
       if($registerFlag == true){
        $id = $this->home_model->get_id($arrData['userid']);
        $this->session->set_userdata('username',$arrData['userid']);
        $this->session->set_userdata('spiff_id',$id);
        $this->session->set_userdata('fbstatus',false);
        $this->session->set_userdata('logged_in',true);                
        header('location:'.base_url().'spiffcity/popular');
       }
       else{
        header('location:'.base_url().'spiffcity/home');
       }
      }    
     }
     else{
      $this->session->set_flashdata('success', 'nop  !!');
      header('location:'.base_url().'spiffcity/home');
     }
    }
    /*
    *@method oauth for twitter login and stores the details into database. 
    *@return void
    */
    public function oauth()
    {
      $this->load->library('Twitteroauth');
      $this->config->load('twitter');
      // The TwitterOAuth instance  
      $twitteroauth = new TwitterOAuth('6nATx2rGQICStvDlqnF0g', 'MesNqVpZ7p6iKtW6giAAtOHY2K4srdpImkl8NLwtlM');  
      // Requesting authentication tokens, the parameter is the URL we will be redirected to  
      $request_token = $twitteroauth->getRequestToken('http://local.spiffcity.in/twitter_oauth.php');  
        
      // Saving them into the session  
      $_SESSION['oauth_token'] = $request_token['oauth_token'];  
      $_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];  
        
      // If everything goes well..  
      if($twitteroauth->http_code==200){  
          // Let's generate the URL and redirect  
          $url = $twitteroauth->getAuthorizeURL($request_token['oauth_token']); 
          header('Location: '. $url); 
      } else { 
          // It's a bad idea to kill the script, but we've got to know when there's an error.  
          die('Something wrong happened.');  
    }  
      
    }
    
    function social_currency_engine(){
      $this->load->view('spiffcity/social_currency_engine');
    }
    /*
    *@method check_username_availability used to check whether username availabile for registration or not.
    *@return json
    */
    function check_username_availability(){
      $usr = $this->input->post('user');   
      $result = $this->home_model->chk_username_availability($usr);
      header('Content-Type: application/json');
      echo json_encode( array("success" => $result));exit;
    }
    /*
    *@method check_email_availability used to check whether email availabile for registration or not.
    *@return json
    */
    function check_email_availability(){
      $email = $this->input->post('user_email');   
      $result = $this->home_model->check_email($email);
      header('Content-Type: application/json');
      echo json_encode( array("success" => $result));exit;
    } 
    /*
    *@method fb_login used to provide login through facebook using facebook php sdk.
    *@return array and redirect to popular page 
    */
    function fb_login(){
      $fbData = $this->input->post();
      $new_userData['userid']  = $fbData["userdata"]["username"];
      $new_userData['first_name'] = $fbData["userdata"]["first_name"];
      $new_userData['last_name'] = $fbData["userdata"]["last_name"];
      
      if(isset($fbData["email"])){
       $new_userData['email'] = $fbData["userdata"]["email"];
      }
      else{
       $new_userData['email'] = "";
      }
      $new_userData['fb_id'] = $fbData["userdata"]["id"];
      $fb_id = $fbData["userdata"]["id"];    
      $new_userData['created_date'] = date('Y-m-d H:i:s');
      $new_userData['active'] = '1';
      $user_exits = $this->home_model->check_if_fb_user_exists($fb_id);
      
      if($user_exits == false){
       $fb_user_spiffData = $this->home_model->get_user_by_fb_user_id($fb_id);     
      }
      else{
       $query = $this->home_model->create_new_fb_user($new_userData);     
      }
      $this->session->set_userdata('username',$fbData["userdata"]["first_name"]);
      $this->session->set_userdata('fbstatus',true);
      $this->session->set_userdata('logged_in',true);
      $this->session->set_userdata('auth_token', $fbData["auth_token"]);
      $this->facebook->setAccessToken($fbData["auth_token"]);
      header('Content-Type: application/json');
      echo json_encode(array("success" => true));exit;   
    }   
  }
?>