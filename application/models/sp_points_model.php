<?php
  class Sp_points_model extends CI_Model
 {
 function get_points_details($id = 0){
		
		$arrData = array();
		
		if($id != 0 ){
			$this->db->where('id', $id);  
		}
		
		$this->db->select('id,Title,spiff_points,value');
		
		$objQuery = $this->db->get('sp_points');
		
		return $objQuery->result_array();

	}
	function update_points($id,$updateData){
		$this->db->where('id',$id);
		if($this->db->update('sp_points',$updateData)){
				return true;
		}
		else{
				return false;
		}
	}
	
	function save_point($arrInsertData){
						
		if($this->db->insert('sp_points', $arrInsertData)){
			return true;
		}else{
			return false;
		}

	}
	
 }
?>