<?php
  /*
  *Sp_points Model
  *@package model
  *@subpackage spiffcity
  */
  class Sp_points extends CI_Model {
    /*
    *@method get_points used to get points details from database.
    */
    function get_points(){
      $query = $this->db->get('sp_points');
      if($query){
        return $query->result_array();
      }else{
        return false;  
      }
    }
  }
?>