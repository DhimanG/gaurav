<?php
  /*
  *Sp_users Controller  used to add,edit and delete users.
  *@package Admin
  */
  class Sp_users extends CI_Controller{
    /*
    *@method __construct used to call parent constructor
    */
    function __construct()
    {			
     parent::__construct();
     if($this->session->userdata('logged_in') == FAlSE){				
      redirect("admin/login");
      break;			
     }			
     $this->load->model('sp_users_model');
     $this->load->library('form_validation');			
    }
    /*
    *@method void index used to get users details from database and displaying them.
    */
		public function index()
		{			
			$arrData['usersDetails']	= $this->sp_users_model->get_users_details();	
			$arrData['middle'] = 'admin/sp_users/listusers';
			$this->load->view('admin/template',$arrData);
		}
		/*
		*@method edituser used to edit user details and display changes.
		*/
		public function edituser($id)
		{			
			if ($this->input->post('cmdSubmit')){				
				
        $date = date("Y-m-d");							
				$UpdateData["email"]		= $this->input->post('email');
				$UpdateData["modified_date"]	= $date;
        
				if($this->input->post('password')!='' && $this->input->post('password') == $this->input->post('confirm_password'))
					$UpdateData["password"]= md5($this->input->post('password'));
				
				$updateFlag	= $this->sp_users_model->update_user($id,$UpdateData);
				
				if ($updateFlag){
					$this->session->set_flashdata('success', 'Sp_User updated Successfully !!');
					redirect('admin/sp_users');
				}else{
					$this->session->set_flashdata('error', 'Failed to updated Sp_User !!');
					redirect('admin/sp_users/edituser/.$id');
				}
			}
			$arrData['usersDetails']	= $this->sp_users_model->get_users_details($id);
			$arrData['middle'] = 'admin/sp_users/edituser';
			$this->load->view('admin/template',$arrData);
		}
    /*
    *@method array adduser used to add user into database.
    */
		public function adduser()
		{
      if ($this->input->post('cmdSubmit')){
        $post_data = $this->input->post();
        $date = date("Y-m-d");
        $arrInsertData["userid"]	      = $post_data['userid'];
        $arrInsertData["email"]	       = $post_data['email'];
        $arrInsertData["password"]     = md5($post_data['password']);
        $arrInsertData["created_date"]	= $date;
        $arrInsertData["modified_date"]= $date;
        $insertedFlag	= $this->sp_users_model->save_user($arrInsertData);
        if ($insertedFlag){
          $this->session->set_flashdata('success', 'Sp_User Added Successfully !!');
          redirect('admin/sp_users');
        }else{
          $this->session->set_flashdata('error', 'Failed to Add Sp_User !!');
          redirect('admin/sp_users/adduser');				
        }
      }
      $arrData['middle'] = 'admin/sp_users/adduser';
      $this->load->view('admin/template',$arrData);
		}	
		/*
		*@method boolean userNameValidation used to validate username must be unique.
		*/
		public function userNameValidation()
		{	
			$userName = $_GET['userid'];
			
			$this->db->where('userid ', $userName); 
			
			$objQuery = $this->db->get('sp_users');
			$arrData = $objQuery->result_array();
			
			if($arrData)
				echo 'false';
			else
				echo 'true';
		}
	}
?>