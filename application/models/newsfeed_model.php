<?php
/**
 * Safe Doc
 *
 * @Description  This class is used to interact with the Newsfeed table using Codeignitor db core class. All the Data Insert,Retrival and Update operations related to country are performed here.
 *
 * @package		Safe Doc
 * @subpackage  Model
 * @author		Sunil Silumala
 * @copyright	Copyright (c) 2012 - 2013
 * @since		Version 1.0
 */
 
// ------------------------------------------------------------------------

/**
 *
 * This is Newsfeed Model
 *
 * @author		Sunil Silumala
 * @package		Safe Doc
 * @subpackage	Model
 */

class Newsfeed_model extends CI_Model{
	
	// --------------------------------------------------------------------

	/**
	 * __construct
	 *
	 * Calls parent constructor
	 * @author	Sunil Silumala
	 * @access	public
	 * @return	void
	 */
	function __construct()
	{
		// Initialization of class
		parent::__construct();
	}
	
	/**
	 * save_newsfeed
	 *
	 * This is used to save newsfeed details
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   array-$arrData
	 * @return void
	 */
	function save_newsfeed($arrData){
		
		if($this->db->insert('safedoc_newsfeeds', $arrData)){
			return true;
		}else{
			return false;
		}

	}


	/**
	 * get_newsfeed_details
	 *
	 * This is used to fetches newsfeed details
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   integer-$iNewfeedId 
	 * @return void
	 */
	function get_newsfeed_details($newsfeedId = 0){
		
		$arrData = array();
		
		if($newsfeedId != 0 ){
			$this->db->where('newsfeedsId', $newsfeedId); 
		}
		
		$this->db->select('newsfeedsId,newsfeedTitle,newsfeedDescription');
		
		$objQuery = $this->db->get('safedoc_newsfeeds');
		
		//$this->db->last_query();
		
		return $objQuery->result_array();

	}


	/**
	 * update_newsfeed
	 *
	 * This is used to update newsfeed details
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   array-$arrData, integer-$iNewfeedId
	 * @return void
	 */
	function update_newsfeed($iNewfeedId,$arrData){
		
		$this->db->where('newsfeedsId',$iNewfeedId);
		if($this->db->update('safedoc_newsfeeds', $arrData))
		{
				return true;
		}
		else
		{
				return false;
		}	
	}
	
	/**
	 * delete_newsfeed
	 *
	 * This is used to delete newsfeed details
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   array-$arrData, integer-$iNewfeedId
	 * @return void
	 */
	function delete_newsfeed($iNewfeedId){
		
		// $this->db->where('newsfeedsId',$iNewfeedId);
		if($this->db->delete('safedoc_newsfeeds', array('newsfeedsId' => $iNewfeedId)))
		{
				return true;
		}
		else
		{
				return false;
		}	
	}
	
	/**
	 * multi_delete_newsfeed
	 *
	 * This is used to delete multiple newsfeed details
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   array-$arrData, integer-$iNewfeedId
	 * @return void
	 */
	function multi_delete_newsfeed($arriNewfeedId){
		
		$this->db->where_in('newsfeedsId', $arriNewfeedId);
		if($this->db->delete('safedoc_newsfeeds'))
		{
				return true;
		}
		else
		{
				return false;
		}	
	}


	/**
	 * get_latest_newsfeed
	 *
	 * This is used to get latest news
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   integer-$iNewfeedId 
	 * @return void
	 */
	function get_latest_newsfeed(){
		
		$this->db->select('newsfeedsId,newsfeedTitle,newsfeedDescription');
		// $this->db->limit(1);
		$this->db->order_by("newsfeedCreatedOn", "desc"); 
		
		$objQuery = $this->db->get('safedoc_newsfeeds');
		
		//$this->db->last_query();
		
		return $objQuery->result_array();

	}
}

?>