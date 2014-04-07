<?php
/**
 * Safe Doc
 *
 * @Description  This class is used to interact with the Document table using Codeignitor db core class. All the Data Insert,Retrival and Update operations related to document are performed here.
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
 * This is document Model
 *
 * @author		Sunil Silumala
 * @package		Safe Doc
 * @subpackage	Model
 */

class Document_model extends CI_Model{
	
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
	 * save_document
	 *
	 * This is used to save document details
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   array-$arrData
	 * @return void
	 */
	function save_document($arrData){
		
		if($this->db->insert('safedoc_document', $arrData)){
			return true;
		}else{
			return false;
		}

	}


	/**
	 * get_document_details
	 *
	 * This is used to get document details
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   integer-$iDocumentId 
	 * @return void
	 */
	function get_document_details($iDocumentId = 0){
		
		$arrData = array();
		
		if($iDocumentId != 0 ){
			$this->db->where('documentId', $iDocumentId); 
			$this->db->where('documentUserId', $this->session->userdata('userid'));
		}
		
		$this->db->select();
		$objQuery = $this->db->get('safedoc_document');
		
		//echo $this->db->last_query();
		
		return $objQuery->result_array();
	}

	/**
	 * get_user_document_details
	 *
	 * This is used to get document details based on user id
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   integer-$iDocumentId 
	 * @return void
	 */
	function get_user_document_details($iUserId, $iCategoryId = ''){
		
		$arrData = array();
		$this->db->where('documentUserId', $iUserId); 
		
		if ($iCategoryId !='')
			$this->db->where('documentCategoryId', $iCategoryId); 
		
		
		$this->db->select();
		$objQuery = $this->db->get('safedoc_document');
		
		//$this->db->last_query();
		
		return $objQuery->result_array();
	}


	/**
	 * update_document
	 *
	 * This is used to update document details
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   array-$arrData, integer-$iDocumentId
	 * @return void
	 */
	function update_document($iDocumentId,$arrData){
		
		$this->db->where('documentId',$iDocumentId);

		if($this->db->update('safedoc_document', $arrData))
		{
			return true;
		}
		else
		{
			return false;
		}	
	}
	
	/**
	 * delete_document
	 *
	 * This is used to delete document details
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   array-$arrData, integer-$iDocumentId
	 * @return void
	 */
	function delete_document($iDocumentId){
		
		// $this->db->where('documentsId',$iDocumentId);
		if($this->db->delete('safedoc_document', array('documentId' => $iDocumentId)))
		{
				return true;
		}
		else
		{
				return false;
		}	
	}


	/**
	 * get_user_doc_cat
	 *
	 * This is used to delete document details
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   string-$catIds, integer-$iUserId
	 * @return array
	 */
	function get_user_doc_cat($iUserId,$catIds){
		
		$this->db->select();
		
		$this->db->where('documentUserId', $iUserId); 
		
		$this->db->where_in('documentCategoryId', $catIds); 

		$objQuery = $this->db->get('safedoc_document');
		
		//echo $this->db->last_query();
		
		return $objQuery->result_array();
	}
	
	/**
	 * get_document
	 *
	 * This is used document details
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   date-$date
	 * @return array
	 */
	function get_document($date){
		
		$this->db->select('*');
		$this->db->from('safedoc_document');
		$this->db->join('safedoc_user','safedoc_user.userId = safedoc_document.documentUserId');
		$this->db->join('safedoc_notifications','safedoc_user.userId = safedoc_notifications.notificationUserId');
		$this->db->where('documentAlertDate', $date);
		//$this->db->where('documentUserId', $iUserId);

		$objQuery = $this->db->get();
		//echo $this->db->last_query();

		return $objQuery->result_array();
	}
	
}


?>