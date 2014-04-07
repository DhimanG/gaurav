<?php
  class Login_model extends CI_Model{
    function signin($arrData){
      $this->db->where('userid',$arrData['userid']);
      $this->db->where('password',$arrData['password']);
      $result = $this->db->get('sp_users');
      if($result->num_rows()>0){
       return true;
      }else{
       return false;
      }   
    }
    function get_id($userid){
      $this->db->select('id');
      $this->db->where('userid',$userid);
      $query = $this->db->get('sp_users');
      if($query){
        return $query->row()->id;
      }else{
        return $query='0';
      }
    }
  }
?>