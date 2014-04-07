<?php 
/**
* Safe Doc
*
* @package		Safe Doc
* @subpackage   controller
* @author		Sunil Silumala
* @copyright	Copyright (c) 2012 - 2013 
* @since		Version 1.0
*/
 

class Login extends CI_Controller {

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
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->helper('captcha');
		$this->load->library('form_validation');
    }

	
	/**
	* index
	*
	* This help to check if User credentials are correct
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	
	public function index()
	{
		
		//$this->form_validation->set_rules('captcha', 'Security Code','trim|required|callback_check_captcha');
		$this->form_validation->set_rules('captcha', 'Security Code','trim|required');
		if ($this->form_validation->run() == FALSE)
        {
			$strErrorMessage = '';
			
			$vals = array(
			'img_path'		=> './captcha/',
			'img_url'		=> base_url().'captcha/',
			'img_width'		=> '115',
			'img_height'	=> '30',
			'font_path'     => './system/texb.ttf'
			);

			$cap = create_captcha( $vals );
			$arrData['captchaImage']	= $cap['image'];
			
			$arrCaptchaData = array(
				'captcha_time' => $cap['time'],
				'word' => $cap['word']
			);

			$this->session->set_userdata($arrCaptchaData);

			
			if($this->session->userdata('logged_in') == TRUE) {
				redirect('admin/dashboard','refresh');
				break;
			}
			
			if(validation_errors() != "")
			{
				$strErrorMessage = validation_errors();
			}
			$arrData["error_message"] = $strErrorMessage;

			$this->load->view('admin/login',$arrData);
		}else{
			
			
			$userName = $this->input->post('loginName');
			$password = $this->input->post('loginPass');

			$this->admin_model->verifyUser($userName,$password);

			if ($this->session->userdata('logged_in')=== TRUE){
				redirect('admin/dashboard','refresh');
			}else{
				redirect('admin');
			}
			
		}
	}

	/**
	* check_captcha
	*
	* This help to check whethre captcha is enter is correct or not
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	public function check_captcha()
    {
        $expiration = time()-7200; // Two hour limit
        $cap=$this->input->post('captcha');
        if(strtolower($this->session->userdata('word'))== strtolower($cap)
            AND $this->session->userdata('captcha_time')> $expiration)
        {
			$this->session->userdata('word');
            return true;
        }
        else{
            $this->form_validation->set_message('check_captcha', 'Security code does not match.');
            return false;
        }
    }
}