<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Element
 *
 * Lets you determine whether an array index is set and whether it has a value.
 * If the element is empty it returns FALSE (or whatever you specify as the default value.)
 *
 * @access	public
 * @param	string
 * @param	array
 * @param	mixed
 * @return	mixed	depends on what the array contains
 */
if ( ! function_exists('frontBanner'))
{
	function frontBanner()
	{
		$CI =& get_instance();
		$CI->load->model('banner_model');
		
		return $CI->banner_model->get_banner_details();
	}
}




if ( ! function_exists('frontProfileDetails'))
{
	function frontProfileDetails()
	{
		$CI =& get_instance();
		$CI->load->model('user_model');
		
		return $CI->user_model->get_user_details($CI->session->userdata('userid'));
	}
}



if ( ! function_exists('frontNewsDetails'))
{
	function frontNewsDetails()
	{
		$CI =& get_instance();
		$CI->load->model('newsfeed_model');
		
		return $CI->newsfeed_model->get_latest_newsfeed();
	}
}



if ( ! function_exists('frontMainCatDetails'))
{
	function frontMainCatDetails()
	{
		$CI =& get_instance();
		$CI->load->model('category_model');
		
		return $CI->category_model->get_categories_front($CI->session->userdata('userid'));
	}
}

/* End of file array_helper.php */
/* Location: ./system/helpers/array_helper.php */