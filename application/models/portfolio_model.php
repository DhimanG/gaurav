<?php
/**
 * Safe Doc
 *
 * @Description  This class is used to interact with the Portfolio table using Codeignitor db core class. All the Data Insert,Retrival and Update operations related to protfolio are performed here.
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
 * This is protfolio Model
 *
 * @author		Sunil Silumala
 * @package		Safe Doc
 * @subpackage	Model
 */

class Portfolio_model extends CI_Model{
	
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
	 * save_protfolio
	 *
	 * This is used to save protfolio details
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   array-$arrData
	 * @return void
	 */
	function save_protfolio($arrData){
		
		if($this->db->insert('safedoc_protfolio', $arrData)){
			return true;
		}else{
			return false;
		}

	}


	/**
	 * get_portfolio_details
	 *
	 * This is used to get protfolio details
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   integer-$iPortfolioId 
	 * @return void
	 */
	function get_portfolio_details($iPortfolioId = 0){
		
		$arrData = array();
		
		if($iPortfolioId != 0 ){
			$this->db->where('portfolioId', $iPortfolioId); 
		}
		
		$this->db->select();
		$objQuery = $this->db->get('safedoc_protfolio');
		
		//$this->db->last_query();
		
		return $objQuery->result_array();
	}

	/**
	 * get_user_protfolio_details
	 *
	 * This is used to get protfolio details based on user id
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   integer-$iPortfolioId 
	 * @return void
	 */
	function get_user_protfolio_details($iUserId){
		
		$arrData = array();
		$this->db->where('portfolioUserId', $iUserId); 
		$this->db->select();
		$objQuery = $this->db->get('safedoc_protfolio');
		
		//$this->db->last_query();
		
		return $objQuery->result_array();
	}


	/**
	 * update_protfolio
	 *
	 * This is used to update protfolio details
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   array-$arrData, integer-$iPortfolioId
	 * @return void
	 */
	function update_protfolio($iPortfolioId,$arrData){
		
		$this->db->where('portfolioId',$iPortfolioId);

		if($this->db->update('safedoc_protfolio', $arrData))
		{
			return true;
		}
		else
		{
			return false;
		}	
	}
	
	/**
	 * delete_protfolio
	 *
	 * This is used to delete protfolio details
	 *
	 * @author	Sunil Silumala
	 * @access	public
	 * @param   array-$arrData, integer-$iPortfolioId
	 * @return void
	 */
	function delete_portfolio($iPortfolioId){
		
		// $this->db->where('protfoliosId',$iPortfolioId);
		if($this->db->delete('safedoc_protfolio', array('portfolioId' => $iPortfolioId)))
		{
				return true;
		}
		else
		{
				return false;
		}	
	}


	function getDetails(){
		
		$this->db->select('*');
		$this->db->from('safedoc_protfolio');
		$this->db->join('safedoc_mutualfunds','safedoc_mutualfunds.mutualfundsId= safedoc_protfolio.portfolioMutualFundId');
		$objQuery = $this->db->get();
		//echo $this->db->last_query();

		return $objQuery->result_array();
	}
}


?>