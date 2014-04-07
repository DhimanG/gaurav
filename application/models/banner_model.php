<?php
/**
 * Safe Doc
 *
 * @Description  This class is used to interact with the Banner table using Codeignitor db core class. All the Data Insert,Retrival and Update operations related to country are performed here.
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
 * This is Banner Model
 *
 * @author		Sunil Silumala
 * @package		Safe Doc
 * @subpackage	Model
 */

class Banner_model extends CI_Model{
	
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
	 * get_banner_details
	 *
	 * This is used to save country details
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   integer-$iNewfeedId 
	 * @return void
	 */
	function get_banner_details($bannerId = 0){
		
		$arrData = array();
		
		if($bannerId != 0 ){
			$this->db->where('bannerId', $bannerId); 
		}
		
		$this->db->select('bannerId,bannerTitle,bannerImage,bannerLink,bannerCode');
		
		$objQuery = $this->db->get('safedoc_banner');
		
		//$this->db->last_query();
		
		return $objQuery->result_array();

	}


	/**
	 * update_banner
	 *
	 * This is used to update country details
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   array-$arrData, integer-$iNewfeedId
	 * @return void
	 */
	function update_banner($iNewfeedId,$arrData){
		
		$this->db->where('bannerId',$iNewfeedId);
		if($this->db->update('safedoc_banner', $arrData))
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