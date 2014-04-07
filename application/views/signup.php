		<script type="text/javascript">
		$(document).ready(function(){
			$("#frmSignup").validate({
		
				rules: {
					password: {
						required: true,
					},
					confirm_password: {
						required: true,
						equalTo: "#password"
					},
				},

				messages: {
					password: {

					},
					confirm_password: {
						equalTo: "Please enter the same password as above"
					},
				}

			});

			/*$('#cmdSignUp').click(function() {
				  $('#frmSignup').submit();
			});
*/
		});
		
function getCaptcha(){
	var urlstring = "<?php echo site_url() ?>"+'signup/reCaptcha/'; 
	$.ajax({ type:'POST', 
		url:urlstring, 
		///data:dataString,
		success:function(data) { 
			$('.captcha').html(data); 
		} 
	});

}

</script>
<div class="mid_contain_sign"><!--start_mid_contain_right-->
	<?php
	if ($this->session->flashdata('error')){ 
	?>
	<!-- Notification -->
			<h4 class="errormsg"><?php echo $this->session->flashdata('error'); ?></h4>
	<!-- /Notification -->
	<?php
	}
	
	if($error_message){
	?>
	<!-- Notification -->
			<h4 class="errormsg"><?php echo $error_message; ?></h4>
	<!-- /Notification -->
	<?php
	}
	?>
	
	<span><img src="<?php echo base_url(); ?>public/images/signup.jpg" width="58" height="48" alt="" /></span>
	<h2>Sign Up</h2>
	
	<div class="sign_up">
		<?php
		$attributes = array('id' => 'frmSignup');
		
		echo form_open(site_url('signup'),$attributes);
	
		?>
		<div class="sign_up_in">
			<p><label for="loginName"> Username :</label></p>
			<?php
			$valName	= (($userUName != '') ? $userUName : '');
			
			$dataName = array(
			  'name'        => 'loginName',
			  'id'          => 'loginName',
			  'class'		=> 'required',
			  'value'		=> $valName
			);
			?>
			<?php echo form_input($dataName); ?>
	    </div>
	    
	    <div class="sign_up_in">
			<p><label for="email"> E-mail :</label></p>
			<?php
			$dataemail = array(
				  'name'        => 'email',
				  'id'          => 'email',
				  'class'		=> 'small required email',
				  'value'		=> (($userEmail != '') ? $userEmail : '')
				);
			?>
			<?php echo form_input($dataemail); ?>
	    </div>
	    <div class="sign_up_in">
			<p><label for="phoneNumber"> Phone no :</label></p>
			<?php
			$dataName = array(
			  'name'        => 'phoneNumber',
			  'id'          => 'phoneNumber',
			  'class'		=> 'required number',
			  'value'		=> (($userMobile != '') ? $userMobile : ''),
			  'maxlength'	=>	'10'
			);
			?>
			<?php echo form_input($dataName); ?>
	    </div>
		<div class="sign_up_in">
			<p><label for="password"> Password :</label></p>
			<?php
			$datapassword = array(
				  'name'        => 'password',
				  'id'          => 'password',
				  'class'		=> 'small password'
				);
			?>
			<?php echo form_password($datapassword); ?>
	    </div>
	    <div class="sign_up_in">
			<p><label for="confirm_password"> Re-enter password  :</label></p>
			<?php
			$dataconfirmpassword = array(
				  'name'        => 'confirm_password',
				  'id'          => 'confirm_password',
				  'class'		=> 'small password'
				);
			?>
			<?php echo form_password($dataconfirmpassword); ?>
	    </div>
		<div class="sign_up_in">
			<?php
			$dataCaptcha = array(
				'id'		=>'captcha',
				'name'		=>'captcha',
				'style'		=>'width:130px;',
				'class'		=> 'required'
			);
			?>
			<p><label for="captcha"> Access Code :</label></p>
			<?php echo form_input($dataCaptcha); ?>
	    </div>
	    <div class="sign_up_in">
			<p>&nbsp;</p>
			<div class="captcha"><?php echo $captchaImage; ?></div>
			<br/><p>&nbsp;</p><a href="#" onclick="getCaptcha();"><img src="<?php echo base_url(); ?>public/images/reloade.png" alt="reload" /> </a>
	    </div>

	
		<div class="clear"></div>
	    <!--<div class="buttun_log"><a id="cmdSignUp">Sign Up</a></div>-->
	    <div>
	    <?php
	    	
       		$dataSubmit = array(
			  'name'        => 'cmdSubmit',
			  'id'          => 'cmdSubmit',
			  'class'		=> 'buttun_submit'
			);
       		echo form_submit($dataSubmit, 'Sign Up');
       	?>
       	</div>
	<?php
		echo form_close();
	?>
	</div>	
</div><!--end_mid_contain_right-->