<?php
 class Home_model extends CI_Model{
  /*
  *@method boolean register() used to register the user data 
  *@param array $arrData user details from user input 
  *@return boolean true for successful registration and false for failed.
  *
  */
  function register($arrData){
    if($this->db->insert('sp_users',$arrData)){
     return true;
    }
    else{
     return false;
    }
  }  
  function chk_username_availability($usr){
    $this->db->where("userid",$usr);   
    $result = $this->db->get('sp_users');
    if($result->num_rows()>0){
     return false;
    }else{
     return true;
    }
  }
  function check_email($email){
    $this->db->where("email",$email);
    $result = $this->db->get('sp_users');
    if($result->num_rows()>0){
     return false;
    }else{
     return true;
    }
  }
  function fb_logins($user){
    $this->db->where("fb_id",$user["userid"]);   
    $query = $this->db->get("sp_users");
    if($query->num_rows() == 0){
     if($this->db->insert('sp_users',$user)){
      return true;
     }
     else{
      return false;
     }    
    }
    else{
     return false;
    }
  }
  function get_id($new_userData){
    $this->db->where('userid',$new_userData['userid']);
    $result=$this->db->get('sp_users');
    if($result->num_rows()>0){
     return $result->result_array();
    }
  }
  
  
  /*
   * @method boolean check_if_fb_user_exists(), This function returns true if a user with given fb_user_id exists in users table otherwise returns false
   * @param string $fb_user_id, facebook user id
   * @return boolean 
  */
  function check_if_fb_user_exists($fb_id){
    $this->db->where("fb_id",$fb_id);
    $id_exits = $this->db->get('sp_users');
    if($id_exits->num_rows()>0){      
      return true;
    }else{
      return false;
    }
  }
  
  
  function create_new_fb_user($fb_user_data){
    $user_insert = $this->db->insert('sp_users',$fb_user_data);
    if($user_insert){
     return true;
    }else{
     return false;
    }
  } 
  
  
  function get_user_by_fb_user_id($fb_id){
    $this->db->where('fb_id',$fb_id);
    $fb_user_details = $this->db->get('sp_users');
    if($fb_user_details){
      return $fb_user_details->result_array();
    }else{return false;}
  }
  
 }
?>