<?php
  /*
  *Friends model
  *@access public
  *@return void
  */
  class Friends_model extends CI_model{
    /*
    *Get_friends used to get logged in user's friends details
    *@access public
    *@return array or boolaen false
    *@param $userid  logged in user unique id.
    */
    function get_friends($userid){
      $this->db->where('user_id',$userid);
      $query = $this->db->get('sp_friendlist');
      if($query){
        return $query->result_array();
      }else{
        return false;
      }
    }
    /*
    *Add friends used to add friends in database table sp_friendlist.
    *@access public
    *return boolean
    *@param array 
    */
    function add_friend($friend){
      $this->db->where('user_id',$userid);
      $query = $this->db->insert('sp_friendlist',$friend);
      if($query){
        return true ;
      }else{
        return false;
      }
    }
  }
?>