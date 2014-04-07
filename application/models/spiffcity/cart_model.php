<?php
  /*
  *Cart_model 
  */
  class Cart_model extends CI_Model{
    /*
    *get_cart_details to selected product details from database.
    *@return array if query processed successfully or boolean if query not processed. 
    *@param $product_id unique id to identify product.
    */
    function get_cart_details(){
      $query = $this->db->get('shopping_cart');
      if($query){
        return $query->result_array();
      }else{
        return false;
      }
    }
    /*
    *
    *
    */
    function add_cart($add){
      $this->db->where('option',$add['option']);
      $this->db->where('name',$add['name']);
      $query = $this->db->get('shopping_cart');
      if($query->num_rows()>0){
        $pre = $query->result_array();
        //print_r($add[0]['qty']);exit;
        $add['qty'] = $pre[0]['qty'] + 1;
        $add['name'] = $pre[0]['name'];
        $add['price'] = $pre[0]['price'];
        $add['option'] = $pre[0]['option'];
        if($this->db->update('shopping_cart',$add)){
          return true;
        }else{
          return false;
        }
      }
      else{
        if($this->db->insert('shopping_cart',$add)){
            return true;
        }else{
          return false;
        }
      }  
      
    }
    /*
    *
    *
    */
    function update_cart(){
      $this->db->where();
      $this->db->update();
    }
    /*
    *
    *
    */
    function remove_cart(){
      $this->db->where();
      $this->db->update();
    }
  }
?>