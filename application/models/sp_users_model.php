<?php
 class Sp_users_model extends CI_Model
 {
 function get_users_details($id = 0){
		
		$arrData = array();
		
		if($id != 0 ){
			$this->db->where('id', $id); 
		}
		
		$this->db->select('id,userid,first_name,last_name,password,email');
		
		$objQuery = $this->db->get('sp_users');
		
		//$this->db->last_query();
		
		return $objQuery->result_array();

	}
	
	function save_user($arrInsertData){
					
		if($this->db->insert('sp_users', $arrInsertData)){
			return true;
		}else{
			return false;
		}

	}
	
	function update_user($id,$UpdateData){
		
		$this->db->where('id',$id);
		if($this->db->update('sp_users', $UpdateData))
		{
				return true;
		}
		else
		{
				return false;
		}	
	}
 }
?>