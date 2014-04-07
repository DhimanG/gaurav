<?php
  /*
  *Invitation model
  *@author gaurav
  *@access public
  *return void
  */
  class Invitation_model extends CI_Model{
    /*
    *Get_invitation used to get invitation data from database
    *@access public
    *@return array or boolean
    *@param sender_id senders unique id 
    */
     function get_invitation_data($userid){
      $this->db->where('sender_id',$userid);
      $query = $this->db->get('sp_invitation');
      if($query){
        return true;
      }else{
        return false;
      }
    }
    /*
    *Save_email_invitation used to save invitation to database
    *@access public
    *@return array or boolean
    *@param array containing sender_id,token,receiver_email,created_date
    */
    function save_email_invitation($data){
      if($this->db->insert('sp_invitation',$data)){
        return true;
      }else{
        return false;
      }
    }
  }
?>  