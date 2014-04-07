<?php
/*
* Spiffcity
*@package   Spiffcity
*@subpackage model
*@Uers_model model
*/

 class Users_model extends CI_Model{
  /*
  * get_profile_data
  * This function used to get logged in user profile data from database.
  *return array or boolean
  *input variable $userid unique username of user
  */
  function get_profile_data($userid){
    $this->db->where('userid',$userid);
    $query = $this->db->get('sp_users');
    if($query){
      return $query->result_array();
    }else{
      return false;
    }
  }
  /*
  * Update_profile 
  * This function used to update the user profile
  *return boolean
  *input  array $user_data
  */
  function update_profile($user_data){
    $this->db->where('userid',$user_data['userid']);
      //print_r($user_data);exit;
    $query = $this->db->update('sp_users',$user_data);
          //print_r($query);exit;

    if($query == 1){
      return true;
    }else{
      echo "1111";exit;
      return false;
    }
  }
  /*
  *Change_password
  *This function used to change the users password
  *return boolean
  *input userid,new password and current password
  */
  function change_password($update_data){
    $this->db->where('userid',$update_data['userid']);      
    $query = $this->db->update('sp_users',$update_data);
    if($query){
      return true;
    }else{
      return false;
    }
  }
  /*
  *Get password
  *This function is used to get password of logged in user.
  *return encrpyted password
  *input userid 
  */
  function get_password($userid){
    $this->db->select('password');
    $this->db->where('userid',$userid);
    $password = $this->db->get('sp_users');
    if($password){
      return $password->result_array();
    }else{
      return false;
    }
  }
 }
?>