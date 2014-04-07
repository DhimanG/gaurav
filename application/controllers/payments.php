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
 

class Payments extends CI_Controller {

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
		if($this->session->userdata('logged_user_in') == FALSE) {
			redirect('login');
			break;
		}

		$this->load->model('user_model');
		$this->load->model('cron_model');
		$this->load->model('portfolio_model');
		$this->load->model('document_model');
		$this->load->model('payment_model');
		$this->load->model('user_model');	
		$this->load->model('payment_details_model');
	}
	
	/**
	* index
	*
	* 
	* 
	* @author	
	* @access	public
	* @return	
	*/
	function index(){
		
	
		if($_SERVER['REQUEST_METHOD']==='POST'){
			
			if($_POST['txtTxnAmount'] != '0'){
			
			$arrPackage	= $this->payment_details_model->get_details_price($_POST['txtTxnAmount']);
			
			$packageId	= $arrPackage[0]['payment_details_id'];
			$amount		= $arrPackage[0]['amount'];
			
			//$packageId = '5';
			
			set_time_limit(900);	//-----set maximum script execution time in seconds


			//---Set Property file Path

			$property_path= $_SERVER['DOCUMENT_ROOT']."/public/payments/MerchantDetails.properties";  //Modify this url with the path of your property file.


			//---Read Property file
					$property_data_array=$this->payment_model->readPropertyFileData($property_path);
					
					if(count($property_data_array)<5)
					{
						$this->payment_model->ShowError("Invald Proerty File");
						die();
					}

					$txtBillerId=$property_data_array[0];
					$txtResponseUrl=$property_data_array[1];
					$txtCRN=$property_data_array[2];
					$txtCheckSumKey=$property_data_array[3];
					$CheckSumGenUrl=trim($property_data_array[4]);
					$TPSLUrl=$property_data_array[5];


			//---Create String using property data 
					$txtBillerIdStr="txtBillerid=".trim($txtBillerId)."&";
					$txtResponseUrl="txtResponseUrl=".trim($txtResponseUrl)."&";
					$txtCRN="txtCRN=".trim($txtCRN)."&";
					$txtCheckSumKey="txtCheckSumKey=".trim($txtCheckSumKey);
							
					$Proper_string=$txtBillerIdStr.$txtResponseUrl.$txtCRN.$txtCheckSumKey;

			//Encrypting values
			$transaction = $_POST['txtTranID'];
			$market = $_POST['txtMarketCode'];
			$account = $_POST['txtAcctNo'];
			$transaction_amount = $_POST['txtTxnAmount'];
			$bankcode = $_POST['txtBankCode'];

			$txtVals = trim($transaction) . trim($market) . trim($account) . trim($transaction_amount) . trim($bankcode);
			$txt_encrypt = base64_encode($txtVals);
			$txt_encrypt = md5(base64_encode($txtVals));
			
			$txtKey = $property_data_array[3];
			$txtForEncode = trim($txt_encrypt) . trim($property_data_array[3]);
			$txtPostid = md5($txtForEncode);

			// Creating string for $Postid.
			$txtPostid="txtPostid=".$txtPostid;


			//---Read form data 

			$pp=array();
			foreach( $_POST as $key => $value){
				if(trim($value)=="")
				{
					 $this->payment_model->ShowError("Invalid Input");
					 die();
				}
				$v="$key=".trim($value);
				array_push($pp,$v);
			}

			//---create string using form data

			$UserDataString=implode("&",$pp);

			//print_r($UserDataString);

			//print_r($UserDataString);


			$PostData=trim($UserDataString).trim("&").trim($Proper_string).trim("&").trim($txtPostid);

			//die();


			//-----Curl main Function Start


			 define('POST', $CheckSumGenUrl);
			 define('POSTVARS', $PostData);  // POST VARIABLES TO BE SENT
			 
			 // INITIALIZE ALL VARS
			 
			 if($_SERVER['REQUEST_METHOD']==='POST') {  // REQUIRE POST OR DIE
				 $ch = curl_init(POST);
				 curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 1);
				 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, False);
				 curl_setopt($ch, CURLOPT_CAINFO, getcwd() . $_SERVER['DOCUMENT_ROOT'].'/public/payments/keystoretekp.pem'); //Setting certificate path
				 curl_setopt ($ch, CURLOPT_SSLCERTPASSWD, 'changeit');
				 curl_setopt($ch, CURLOPT_POST      ,1);
				 //curl_setopt($ch, CURLOPT_TIMEOUT  ,10); // Not required. Don't use this.
				 curl_setopt($ch, CURLOPT_REFERER  ,'http://safedoc.phpdevelopment.co.in/payments'); //Setting header URL: 
				 curl_setopt($ch, CURLOPT_POSTFIELDS    ,POSTVARS);
				 curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1); 
				 curl_setopt($ch, CURLOPT_HEADER      ,0);  // DO NOT RETURN HTTP HEADERS 
				 curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1); // RETURN THE CONTENTS OF THE CALL
				 
				$Received_CheckSum_Data = curl_exec($ch);
				curl_close($ch);

				//echo "<br>CheckSum=".$Received_CheckSum_Data;

				//if(!is_numeric($Received_CheckSum_Data)){ // Validating whether the Receieved value is numeric.

				//	echo "<br>" .  $Received_CheckSum_Data;
				//	exit;

				//}

				//re-defining the variables without & and variables.

				$txtBillerIdStr=$txtBillerId;
				$txtResponseUrl=$property_data_array[1];
				$txtCRN=$property_data_array[2];
				$txtCheckSumKey=$property_data_array[5];

				if(strlen(trim($Received_CheckSum_Data))>0)
					 {
					//################# read post data to variable ###############

						$txtTranID=$_POST['txtTranID'];
						$txtMarketCode=$_POST['txtMarketCode'];
						$txtAcctNo=$_POST['txtAcctNo'];
						$txtTxnAmount=$_POST['txtTxnAmount'];
						$txtBankCode=$_POST['txtBankCode'];

						//################# read post data end ###############



					//###########  Create msg String ###########################
					  $ParamString=trim($txtBillerId)."|".trim($txtTranID)."|NA|NA|".trim($txtTxnAmount)."|".trim($txtBankCode)."|NA|NA|".trim($txtCRN)."|NA|NA|NA|NA|NA|NA|NA|".trim($txtMarketCode)."|".trim($txtAcctNo)."|NA|NA|NA|NA|NA|".trim($txtResponseUrl);

					$finalUrlParam=$ParamString."|".$Received_CheckSum_Data;
					
					 

					 //----Create dyanamic form and submit to payment gatway

					echo "
						  <form id='subFrm' name='subFrm' method='post' action='".$TPSLUrl."'>
							  <input type='hidden' name='msg' value='".$finalUrlParam."'>
							  </form>
						  <script>
						document.subFrm.submit();
						 </script>
					  ";	
					  }
					  else
					  {
						$this->payment_model->ShowError("Failed to retrieve Key!! Try Again !!");
						 die();
					 }
				 
				} else die('<br><br>###################  Hacking attempt Logged!');
			}else{
				$userId	= $this->session->userdata('userid');
				$updateUserData['userDemoFlag']		= '1';
				$arrDataAdd['show_demo']		= '0';
				$userUpdateFlag = $this->user_model->update_user_details($userId,$updateUserData);
				redirect(base_url()."profile");
			}
		}else{
			
			redirect(base_url()."profile");
		}

	}


	/**
	* package
	* @author	
	* @access	public
	* @return	
	*/
	function package(){
		
		$arrData['arrUser']= $this->user_model->chk_show_demo_status($this->session->userdata('userid'));
		$arrData['paymentDetails']	= $this->payment_details_model->get_details();
		$arrData['middle'] = 'payments/package';
		$this->load->view('template',$arrData);
	}
	
	/**
	* package
	* @author	
	* @access	public
	* @return	
	*/
	function thankyou(){
		
		//Initializing session
		session_start();

		//Storing $_REQUEST['msg'] in session.
		$_SESSION['msg'] = $_REQUEST['msg'];

		if($_REQUEST['msg'] != '') {
			
			$msg=trim($_REQUEST['msg']);
			$msg_array=explode("|",$msg);

		//---Set Property file Path
		$property_path= $_SERVER['DOCUMENT_ROOT']."/public/payments/MerchantDetails.properties";  //Modify this url with the path of your property file.
			
		//---Read Property file
				$property_data_array=$this->payment_model->readPropertyFileData($property_path);

				if(count($property_data_array)<5)
				{
					$this->payment_model->ShowError("Invald Proerty File");
					die();
				}

				$txtBillerId=$property_data_array[0];
				$txtResponseUrl=$property_data_array[1];
				$txtCRN=$property_data_array[2];
				$txtCheckSumKey=$property_data_array[3];
				$CheckSumGenUrl=trim($property_data_array[4]);
				$TPSLUrl=$property_data_array[5];


				$txtResponseKey = $msg_array[0] ."|".$msg_array[1] ."|".$msg_array[2] ."|".$msg_array[3] ."|".$msg_array[4] ."|".$msg_array[5] ."|".$msg_array[6] ."|".$msg_array[7] ."|".$msg_array[8] ."|".$msg_array[9] ."|".$msg_array[10] ."|".$msg_array[11] ."|".$msg_array[12] ."|".$msg_array[13] ."|".$msg_array[14] ."|".$msg_array[15] ."|".$msg_array[16] ."|".$msg_array[17] ."|".$msg_array[18] ."|".$msg_array[19] ."|".$msg_array[20] ."|".$msg_array[21] ."|".$msg_array[22] ."|".$msg_array[23] ."|".$msg_array[24] ."|".$txtCheckSumKey;	


		//Contatinating values.
		$txtResponseKey = "txtResponseKey=" . $txtResponseKey;


		//-----Curl main Function Start

		 define('POST', $CheckSumGenUrl);
		 define('POSTVARS', $txtResponseKey);  // POST VARIABLES TO BE SENT
		 
		// INITIALIZE ALL VARS
		 

		 if($_SERVER['REQUEST_METHOD']==='POST') {  // REQUIRE POST OR DIE
		 $ch = curl_init(POST);
		 curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 1);
		 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, False);
		 curl_setopt($ch, CURLOPT_CAINFO, getcwd() . $_SERVER['DOCUMENT_ROOT'].'/public/payments/keystoretekp.pem'); //Setting certificate path
		 curl_setopt ($ch, CURLOPT_SSLCERTPASSWD, 'changeit');
		 curl_setopt($ch, CURLOPT_POST      ,1);
		 //curl_setopt($ch, CURLOPT_TIMEOUT  ,10); // Not required. Don't use this.
		 curl_setopt($ch, CURLOPT_REFERER  ,'http://safedoc.phpdevelopment.co.in/payments/thankyou'); //Setting header URL
		 curl_setopt($ch, CURLOPT_POSTFIELDS    ,POSTVARS);
		 curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1); 
		 curl_setopt($ch, CURLOPT_HEADER      ,0);  // DO NOT RETURN HTTP HEADERS 
		 curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1); // RETURN THE CONTENTS OF THE CALL
		 
		$Received_CheckSum_Data = curl_exec($ch);
		curl_close($ch);

		$session_val = $_SESSION['msg'];
		$return_array = explode("|",$session_val);


			 //Validate Checksum
			
			if(trim($Received_CheckSum_Data) == trim($return_array[25])){

					//echo "<br>Response return from payment gatway.<br>";
					//echo "<pre>";
					//print_r($return_array);
					
					//echo "<br>";

					if(trim($return_array[14])=='0300')
					{


						$messgae  = "Success";	
						$messgae .= "<BR>Thank You for payment";

						$userId	= $this->session->userdata('userid');
						$date	= date("Y-m-d");
						$updateUserData["userPaidFlag"]		= '1';
						$updateUserData["isActive"]			= '1';
						$updateUserData["userUpdatedOn"]	= $date;
						
						
						$insertUserData["paymentStatus"]	= '1';

						$arrPackage	= $this->payment_details_model->get_details_price($_POST['txtTxnAmount']);
						
						$period		= $arrPackage[0]['period'];
						if(is_numeric($period)){
							$expireDate	= date("Y-m-d", strtotime(date("Y-m-d", strtotime($date)) . " +$period days"));
							$updateUserData["expire_date"]	= $expireDate;
						}
						
						

						$userUpdateFlag = $this->user_model->update_user_details($userId,$updateUserData);

					}
					else
					{
						$insertUserData["paymentStatus"]	= '0'; 
						//echo "<BR>";
						$messgae = "Transaction Failed.";	
					}

				}else{
					$insertUserData["paymentStatus"]	= '0'; 
					$messgae = "Checksum verification failed. Fake transaction detected!";
					
				}

				$userId	= $this->session->userdata('userid');
				$date	= date("Y-m-d");
				$insertUserData["paymentUserId"]	= $userId;
				$insertUserData["packageId"]		= $return_array[1];
				$insertUserData["paymentAmount"]	= $return_array[4];
				$insertUserData["TxnreferenceNo"]	= $return_array[2];
				$insertUserData["BankReferenceNo"]	= $return_array[3];
				$insertUserData["paymentCreatedOn"]	= $date;
				
				#$date = strtotime(date("Y-m-d", strtotime($date)) . " +365 days");

				$userInsertFlag = $this->payment_model->save($insertUserData);

			 } else {
				//echo "<PRE> Invalid Response !";
			}

			
		}
		$arrData['value'] = $messgae;
		$arrData['middle'] = 'payments/thankyou';
		$this->load->view('template',$arrData);
	}


	

}