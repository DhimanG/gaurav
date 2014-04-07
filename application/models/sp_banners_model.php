<?php
 class Sp_banners_model extends CI_Model{
  function __construct(){
   parent::__construct();
  }
  function get_spbanner_details($id = 0){
		
		$arrData = array();
		
		if($id != 0 ){
			$this->db->where('id', $id); 
		}
		
		$this->db->select('id,title,img');
		
		$objQuery = $this->db->get('sp_banner');
		
		//$this->db->last_query();
		
		return $objQuery->result_array();

	}
	
	function save_banner($arrInsertData){
		if($this->db->insert('sp_banner',$arrInsertData)){
			return true;
		}
		else{
			return false;
		}
	}
  
 
	public function update_banner($id,$updatedata){
   $this->db->where('id',$id);
   if($this->db->update('sp_banner',$updatedata)){
    return true;
   }
   else
   {
    return false;
   } 
  }
	}

?>