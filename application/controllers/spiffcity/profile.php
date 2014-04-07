<?php
/*
* Spiffcity
*@package   spiffcity
*@subpackage  dashboard
*@Profile controller
*/
  class Profile extends CI_Controller{
    /*
    * __construct
    *
    * Calls parent constructor
    * @author Gaurav
    * @access public
    * @return void
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
    *
    * Used to show profile data of logged in user...
    * @access public
    * @return void
    */
    function index(){
      //print_r($this->session->userdata('spiff_id'));exit; 
      if($this->session->userdata('logged_in') == true){
        $userid = $this->session->userdata('username');
        $data["profile_data"] = $this->users_model->get_profile_data($userid);
        $data["invited"] = $this->invitation_model->get_invitation_data($userid);
        //print_r($data['profile_data']);exit;          
        if($data !== false){
          //print_r($profile_data);          
          $this->load->view('spiffcity/dashboard/dashboard_navbar');
          $this->load->view('spiffcity/dashboard/profile',$data);
          $this->load->view('spiffcity/dashboard/dashboard_footer',$data);
        }
        else{
          print_r("sdfsdf");exit();
          $this->session->set_Flashdata('success','your Logged out please Login.. ');
          header('location;'.base_url().'spiffcity/home');
        }
      }
    }
    /*
    * Edit_profile
    *
    * This helps to edit profile of logged in user...
    * @access public
    * @return array and redirect if success then  profile else home 
    */
    function edit_profile(){
      //echo "<pre>";print_r($_FILES);exit;
      if(isset($_POST)){
        
        $user_data['userid'] = $this->session->userdata('username');        
        $username  = $this->input->post('fullname');                
        //$name = explode(" ",$username);
        $user_data['first_name'] = $this->input->post('first_name');
        $user_data['last_name'] = $this->input->post('last_name')       ;
        $user_data['dob'] = $this->input->post('dob');
        if($_FILES){
          $config['upload_path'] = 'Assets/spiffcity/profile';
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
            $user_data['img'] = $this->upload->file_name;      
          }
          else{
            $error = $this->upload->display_error('<p>','</p>');
            print_r($error);
          }
        }else{echo "esle";exit;}
        $user_data['email'] = $this->input->post('email');
        $user_data['zip_code'] = $this->input->post('zip_code');
        $user_data['modified_date'] = date("Y-m-d H:i:s");
        $edited_profile = $this->users_model->update_profile($user_data);
        if($edited_profile){
          redirect('spiffcity/profile');
        }else{
          $this->load->view('spiffcity/dashboard/dashboard_navbar');
          $this->load->view('spiffcity/dashboard/dashboard');
          $this->load->view('spiffcity/dashboard/dashboard_footer');
        }        
      }else{
        $this->session->set_flashdata('success',"invalid enteries please enter valid data");        
      }
    }
    /*
    *Edit password
    * This helps user to change its password for spiffcity.
    * @access public
    * @return array 
    */
    function change_password(){
      $update_data['userid'] = $this->session->userdata('username');
      $cpassword = md5($this->input->post('cpassword'));
      $update_data['password'] = md5($this->input->post('new_password'));
      $previous_password = $this->users_model->get_password($update_data['userid']);
      //$id="gaurav";
      //$previous_password = $this->users_model->get_password($id);
      //print_r(md5($previous_password[0]['password']));exit;
      if($previous_password[0]['password'] == $cpassword || $previous_password[0]['password'] == ' '){
        $change_password = $this->users_model->change_password($update_data);
        $data['profile_data'] = $this->users_model->get_profile_data($update_data['userid']);
        if($change_password){
          $this->session->set_flashdata('success',"Changed password Successfully..");
          $this->load->view('spiffcity/dashboard/dashboard_navbar');
          $this->load->view('spiffcity/dashboard/profile',$data);
          $this->load->view('spiffcity/dashboard/dashboard_footer');
        }else{
          $this->session->set_flashdata('success',"invalid enteries pl;ease enter valid data...");
          $this->load->view('spiffcity/dashboard/dashboard_navbar');
          $this->load->view('spiffcity/dashboard/profile',$data);
          $this->load->view('spiffcity/dashboard/dashboard_footer');
        }
      }else{echo "bc";exit;}
    }    
  }
?>

