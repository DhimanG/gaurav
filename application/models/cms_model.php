<?php
/**
 * Safe Doc
 *
 * @Description  This class is used to interact with the cms table using Codeignitor db core class. All the Data Insert,Retrival and Update operations related to cms are performed here.
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
 * This is cms Model
 *
 * @author		Sunil Silumala
 * @package		Safe Doc
 * @subpackage	Model
 */

class Cms_model extends CI_Model{
	
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
	 * get_cms_details
	 *
	 * This is used to get cms details
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   integer-$iCmsId 
	 * @return void
	 */
	function get_cms_details($iCmsId = 0){
		
		$arrData = array();
		
		if($iCmsId != 0 ){
			$this->db->where('cmsId', $iCmsId); 
		}
		
		$this->db->select();
		
		$objQuery = $this->db->get('safedoc_cms');
		
		//$this->db->last_query();
		
		return $objQuery->result_array();

	}

	/**
	 * update_cms
	 *
	 * This is used to update cms details
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   array-$arrData, integer-$iCmsId
	 * @return void
	 */
	function update_cms($iCmsId,$arrData){
		
		$this->db->where('cmsId',$iCmsId);

		if($this->db->update('safedoc_cms', $arrData))
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