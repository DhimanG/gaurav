  <?php
 class Sp_coupons_model extends CI_Model{
  
  public function get_coupons_details($id = 0){
   $arrData = array();
   if($id != 0){
    $this->db->where('id',$id);
   }
   
   $this->db->select('id,title,img,description,Price');
   $objQuery = $this->db->get('sp_coupons');
   return $objQuery->result_array();
  }
  
  public function update_coupon($id,$updatedata){
   $this->db->where('id',$id);
   if($this->db->update('sp_coupons',$updatedata)){
    return true;
   }
   else
   {
    return false;
   } 
  }
  public function add_coupon($arrInsertData){
   if($this->db->insert('sp_coupons',$arrInsertData)){
    return true;
   }
   else
   {
    return false;
   }
  }
 } 
?>