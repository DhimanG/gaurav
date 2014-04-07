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
 

class Signup extends CI_Controller {

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
		if($this->session->userdata('logged_user_in') == TRUE) {
			redirect('profile');
			break;
		}
		$this->load->helper('captcha');
		$this->load->model('user_model');
		$this->load->model('sms_model');
		$this->load->helper('html');

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
		// $this->form_validation->set_rules('loginName', 'username','trim|required');
		$this->form_validation->set_rules('captcha', 'Security Code','trim|required|callback_check_captcha');
				
		if ($this->form_validation->run() == FALSE)
        {
			$strErrorMessage = '';
			
			$arrData['userUName']		= $this->input->post('loginName');
			$arrData['userEmail']		= $this->input->post('email');
			$arrData['userMobile']		= $this->input->post('phoneNumber');
			$arrData['userPassword']	= $this->input->post('password');

			$vals = array(
				'img_path'		=> './captcha/',
				'img_url'		=> base_url().'captcha/',
				'img_width'		=> '200',
				'img_height'	=> '50',
				'font_path'     => './system/fonts/texb.ttf'
				);

			$cap = create_captcha( $vals );
			$arrData['captchaImage']	= $cap['image'];
			
			$arrCaptchaData = array(
				'captcha_time' => $cap['time'],
				'word' => $cap['word']
			);
			
			$this->session->set_userdata($arrCaptchaData);
			
			if(validation_errors() != "")
			{
				$strErrorMessage = validation_errors();
			}

			$arrData["error_message"] = $strErrorMessage;
			
			$arrData['middle'] = 'signup';
			$this->load->view('signup_template',$arrData);
			// $this->load->view('signup',$arrData);

		}else{
			
			$userUName	= $this->input->post('loginName');

			if($this->user_model->chk_username_exists($userUName,$this->input->post('email'))){
				
				$strErrorMessage = "Username or Email address Already used";
				
				$vals = array(
				'img_path'		=> './captcha/',
				'img_url'		=> base_url().'captcha/',
				'img_width'		=> '147',
				'img_height'	=> '37',
				'font_path'     => './system/texb.ttf'
				);

				$cap = create_captcha( $vals );
				$arrData['captchaImage']	= $cap['image'];
				
				$arrCaptchaData = array(
					'captcha_time' => $cap['time'],
					'word' => $cap['word']
				);
				
				$this->session->set_userdata($arrCaptchaData);

				$arrData["error_message"]	= $strErrorMessage;
				
				$arrData['userUName']		= $this->input->post('loginName');
				$arrData['userEmail']		= $this->input->post('email');
				$arrData['userMobile']		= $this->input->post('phoneNumber');
				$arrData['userPassword']	= $this->input->post('password');

				$arrData['middle'] = 'signup';
				$this->load->view('signup_template',$arrData);
				// $this->load->view('signup',$arrData);

			}else{
				
				$date	= date("Y-m-d");
				
				$username	= $this->input->post('loginName');
				$encrypted_string =  $this->user_model->encrypt();
				
				$encrypted_string = md5($encrypted_string);

				$arrDataAdd['userUName']		= $this->input->post('loginName');
				$arrDataAdd['userEmail']		= $this->input->post('email');
				$arrDataAdd['userMobile']		= $this->input->post('phoneNumber');
				$arrDataAdd['userPassword']		= md5($this->input->post('password'));
				
				$arrDataAdd['userDemoFlag']		= '0';
				$arrDataAdd['userPaidFlag']		= '0';
				$arrDataAdd['userCreatedOn']	= $date;
				$arrDataAdd['userUpdatedOn']	= $date;
				$arrDataAdd['isActive']			= '0';
				$arrDataAdd['show_demo']		= '1';
				$arrDataAdd['activationkey']	= $encrypted_string;
				

				if($this->user_model->save_user_details($arrDataAdd)){
					
					$lastInsertedId	= $this->db->insert_id();
					
					// Need to insert data in notification table to:
					$addUserNotify['notificationUserId'] 	= $lastInsertedId;
					$addUserNotify['notificationByEmail'] 	= '0';
					$addUserNotify['notificationBySMS'] 	= '0';
					$addUserNotify['notificationCreatedOn'] = $date;
					$addUserNotify['notificationModifiedOn'] = $date;
					
					$this->user_model->save_notification($addUserNotify);
					
					// This allows the user with correct login details to log into the site and a session is set
					
					$path	= $_SERVER["DOCUMENT_ROOT"]."/public/upload/user".$lastInsertedId;
		
					if( !is_dir($path)){
						mkdir($path);
						chmod($path,0777);
					}

					$documentPath	= $path."/documents";
					
					if( !is_dir($documentPath)){
						mkdir($documentPath);
						chmod($documentPath,0777);
					}
					
					$thumbDocPath	= $documentPath."/thumb";
					
					if( !is_dir($thumbDocPath)){
						mkdir($thumbDocPath);
						chmod($thumbDocPath,0777);
					}

					$profilePath	= $path."/profile";
					
					if( !is_dir($profilePath)){
						mkdir($profilePath);
						chmod($profilePath,0777);
					}

					$thumbProfilePath	= $profilePath."/thumb";

					if( !is_dir($thumbProfilePath)){
						mkdir($thumbProfilePath);
						chmod($thumbProfilePath,0777);
					}
					
					
					$emailData = '';

					$link = base_url().'activate/account/'.$username.'/'.$encrypted_string;
					
					/* Sending Mail*/
					$this->load->library('email');
					
					$config['mailtype'] = 'html';
					$this->email->initialize($config);
					
					$this->email->from('your@example.com', 'Safe Docs');
					$this->email->to($this->input->post('email'));
					
					$this->email->subject('Please confirm your email address');
					
					$emailData .='Dear '.$username;
					$emailData .= br(2);
					$emailData .= '<h2>Safe Doc</h2>';
					$emailData .= br(1);
					$emailData .= '<a href="'.$link.'">Click here</a> to confirm your email address.';
					$emailData .= br(1);
					$emailData .= '<p>If the above link does not work, you can paste the following address into your browser</p>:';
					$emailData .= "$link";
					$emailData .= br(1);
					$emailData .= 'Thank You';
					$this->email->message($emailData);
					
					$this->email->send();
					$this->session->set_flashdata('error', 'Please check your inbox to activate your account');
					
					$recipient = $this->input->post('phoneNumber');
					$password = $this->input->post('password');
					$body = $this->config->item('template_Signup');
					
					eval("\$body = \"$body\";");
					
					$this->sms_model->sms_notification($recipient,$body);
					
					//$ses_user = array("username"=>$userUName,"userid"=>$lastInsertedId,"name"=>$userUName,"logged_user_in"=>TRUE);
					
					//$this->session->set_userdata($ses_user);
					
					//redirect(base_url()."payments/package");
					
				
					redirect('login');
										
				}else{
					redirect('signup');
				
				}
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
    
    /**
	* reCaptcha
	*
	* This help to recreate captcha
	* 
	* @author	Sunil Silumala
	* @access	public
	* @return	void
	*/
	public function reCaptcha()
    {
			$vals = array(
				'img_path'		=> './captcha/',
				'img_url'		=> base_url().'captcha/',
				'img_width'		=> '200',
				'img_height'	=> '50',
				'font_path'     => './system/fonts/texb.ttf'
				);

			$cap = create_captcha( $vals );
			$arrData['captchaImage']	= $cap['image'];
			
			$arrCaptchaData = array(
				'captcha_time' => $cap['time'],
				'word' => $cap['word']
			);
			
			$this->session->set_userdata($arrCaptchaData);
			
			echo $arrData['captchaImage'];
    }		
}