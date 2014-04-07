<?php
  /*
  *@Coupons Controller model 
  *@access public
  */
 class Coupons_model extends CI_Model{
  /*
  *@method array or boolean get_coupons_details used to get coupons details from database.
  */
  function get_coupons_details(){
   $coupons = $this->db->get('sp_coupons');
   if($coupons){
    return $coupons->result_array();
   }else{
    return false;
   }
  }
  /*
  *@method array or boolean get_selected_coupon_details  used to get details of selected coupon from database using coupon id..
  */
  function get_selected_coupon_details($coupon_id){
    $this->db->where('id',$coupon_id);
    $query = $this->db->get('sp_coupons');
    if($query){
      return $query->row();
    }else{
      return false;
    }
  }
 }
?>