<?php
  /*
  *Spiffcity
  *@Invite controller
  *@author Gaurav
  *@access public
  */
    require_once APPPATH.'libraries/facebook.php';

    class Invite extends CI_Controller{
    /*
    *__construct
    *
    *calls parent constructor    
    */
    function __construct(){
      parent::__construct();
      if($this->session->userdata('logged_in') == false){
        $this->facebook->destroySession();
        $this->session->sess_destroy();
        redirect('spiffcity/home');
      }
      $this->load->model('spiffcity/invitation_model');
    }
    /*
    * Index function  
    *@return void
    *@access public
    */
    function index(){      
      $this->load->view("spiffcity/dashboard/dashboard_navbar");
      $this->load->view("spiffcity/dashboard/invitation");
      $this->load->view("spiffcity/dashboard/dashboard_footer");
    }
    /*
    * Invite_friends
    * @return array used to invite user's facebook friends to join spiffcity. 
    * @access public
    */
    function invite_friends(){     
      $this->load->library('facebook');        
      $user = $this->facebook->getUser();       
      if($user){
        try{
          $data['user_friends'] = $this->facebook->api('/me/friends');
          $this->load->view('spiffcity/dashboard/fb_friends',$data);
        }catch(FacebookApiException $e){
          error_log($e);
          $user = NULL;
        }		
      }     
    }
    /*
    *Send_invitation used to send invitation to user's friends by email
    *@return void
    */
    function send_invitation(){
      if($this->input->post('user_email') !== ''){
        $data['receiver_email'] = $this->input->post("user_email");
        $subject = $this->input->post("user_email_subject");
        $from = "gaurav.dhiman@wwindia.com";
        $name = $this->session->userdata('username');
        $data['sender_id'] = $this->session->userdata('spiff_id');
        //print_r($data['sender_id']);exit;
        $data['token'] = md5($name);
        $data['created_date'] = date("Y-m-d H:i:s");        
        $emails = explode(',',$data['receiver_email']);
        foreach($emails as $email){          
          $this->email->from($from,$name);
          $this->email->to($email);        
          $this->email->subject($subject);
          $link = '<p> Click on the below link to go to Spiffcity.. <br> <a href="http://180.149.246.126/gaurav/spiffcity/?token='.$data['token'].'">http://180.149.246.126/gaurav/spiffcity/?token='.$data['token'].'</a></p>';
          $this->email->message('I like Get Spiffed Come and share your App Passion.',$link);
          
          $send = $this->email->send();
          if($send){
            $result = $this->invitation_model->save_email_invitation($data);
            $this->session->set_flashdata("success","Invitation send successfully..");
            redirect('spiffcity/invite');
          }
        }
      }
    }   
  }
?>