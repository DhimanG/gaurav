<?php
  require_once APPPATH.'libraries/facebook.php';
  /*
  *Popular Controller
  *@package spiffcity
  */
  class Popular extends CI_Controller{
    function __construct(){
      parent :: __construct();
      $this->config->load('facebook');
      $this->load->model('spiffcity/crowdcast_model');
   }
   /*
  *@method default index function used to check whether is logged in by facebook or spiffcity crediatals.
  *@param  $logged_in to check user is logged in or not
  *@param $fbstatus to check user is logged in from facebook or not.
  *@param $user stores facebook user id
  *@param array stores facebook logged in user details.
  *@return nothing just load the spiffcity popular page.  
  */
  function  index(){
    
    $logged_in = $this->session->userdata('logged_in');    
    if($logged_in ==false){
      redirect('spiffcity/home');
    }
    $fbstatus = $this->session->userdata('fbstatus');
    if($fbstatus == true){      
      $this->load->library('facebook');
      $user = $this->facebook->getUser();
      if ($user) {
        try {
          $data['user_profile'] = $this->facebook->api('/me?fields=id,name,photos,email');
          //echo "<pre>";print_r($data['user_profile']);exit;
        } catch (FacebookApiException $e) {
          $user = null;
        }
      }
      if ($user) {        
        $data['logout_url'] = $this->facebook->getLogoutUrl(array( 'next' => base_url() . 'spiffcity/logout/' ));
        $userid = $this->crowdcast_model->get_fbuser_userid($user);
        $data['crowdcast_data'] = $this->crowdcast_model->getcrowdcast_data($userid[0]['id']);
       //echo "<pre>";print_r($query->result());exit;

        //$data['crowdcast_likes'] = $this->crowdcsat_model->get_crowdcast_likes();
        $this->load->view('spiffcity/popular',$data);
      } else {
        $this->session->sess_destroy();
        $data['login_url'] = $this->facebook->getLoginUrl();
        redirect('spiffcity/home');
      }      
    }
    else{
      $spiff_id = $this->session->userdata('spiff_id');      
      $data['crowdcast_data'] = $this->crowdcast_model->getcrowdcast_data($spiff_id);
      $this->load->view('spiffcity/popular',$data);
    }
  }
  /*
  *@method  array add_post() used to share the post of the logged in user
  */
  function add_post(){
    if($_POST){
      $insertData['title']       = $this->input->post('title');
      $insertData['description'] = $this->input->post('description');
      $insertData['user_id']     = $this->session->userdata('spiff_id');
     //print_r($_FILES['userfile']);exit;
      if(!$_FILES['userfile']['name'] == ''){
        $config['upload_path'] = 'Assets/spiffcity/crowdcast';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '5000';
        $config['max_width']  = '2000';
        $config['max_height']  = '2000';  
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;
        
        $this->load->library('upload', $config);
        //$field_name = "photo";
        $uploaded = $this->upload->do_upload('userfile');
        //print_r($uploaded);exit;
        if($uploaded){
          $insertData['img'] = $this->upload->file_name;      
        }
        else{
          $error = $this->upload->display_error('<p>','</p>');
          print_r($error);
        }
      }  
      $insertData['created_date'] = date("Y-m-d H:i:s");
      $insertData['modified_date'] = date("Y-m-d H:i:s");
      $insertData['active'] = 1;
      $query_result = $this->crowdcast_model->insert_post($insertData);
      if($query_result){
        $data['crowdcast_data'] = $this->crowdcast_model->getcrowdcast_data($insertData['user_id']);
        redirect("spiffcity/popular");
      }else{
        echo "Try Again !!!";
      }
    }else{
      echo '<script>alert("Failed to add Please try it again..")</script>';
    }
  }
  /*
  *@method json used to share user's comment
  */
  function share_comments(){    
    $comment_data['comments'] = $this->input->post('comments');
    $comment_data['user_id']  = $this->input->post('user_id');
    $comment_data['crowdcast_id'] = $this->input->post('crowdcast_id');
    $result_query = $this->crowdcast_model->add_comments($comment_data);    
    header('Content-Type: application/json');
    echo json_encode( array("success" => $result_query));exit;
  }
  /*
  *@method array get_crowdcast_details used to get comments of the selected post from crowdcast_comments table 
  */
  function get_crowdcast_details(){
    $crowdcast_id = $this->input->post('crowdcast_id');    
    $crowdcast_data = $this->crowdcast_model->get_selected_crowdcast_data($crowdcast_id);
    //echo "<pre>";print_r($crowdcast_data);exit();    
    $this->load->view('spiffcity/crowdcast_modal',$crowdcast_data);    
  }
  /*
  *@method json share_like used to share like by user
  */
  function share_like(){
    $likes_data['crowdcast_id'] = $this->input->post('crowdcast_id');
    $likes_data['user_id']      = $this->input->post('user_id');
    $likes_data['created_date'] = date("Y-m-d H:i:s");
    
    $likes_query_result = $this->crowdcast_model->add_likes($likes_data);
    header('Content-Type: application/json');
    echo json_encode(array("success" => $likes_query_result));exit;
  }
  /*
  *@method json share unlike the post
  */
  function unlike(){
    $unlike_data = $this->input->post('crowdcast_id');
    $unlike_query = $this->crowdcast_model->unlike_post($unlike_data);
    header('Content-type: application/json');
    echo json_encode(array("success" => $unlike_query));exit;
  }
 }
?>