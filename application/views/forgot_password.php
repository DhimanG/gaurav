<script type="text/javascript">
		$(document).ready(function(){
			$("#frmForgotPassword").validate();
			
			
			$('#cmdSubmit').click(function() {
				  $('#frmForgotPassword').submit();
			});

		});
	</script>
<div class="mid_contain_right"><!--start_mid_contain_right-->
	<?php
	if ($this->session->flashdata('error')){ 
	?> 
	<!-- Notification -->
			<h4 class="errormsg"><?php echo $this->session->flashdata('error'); ?></h4>
	<!-- /Notification -->
	<?php
	}
	?>
	
	<span><img src="<?php echo base_url(); ?>public/images/lock.png" width="43" height="56px" alt="" /></span>
    <h2>Forgot Password</h2>
    
    <div class="login_box">
    	<?php
		$attributes = array('id' => 'frmForgotPassword');
		
		$dataName = array(
		  'name'        => 'userEmail',
		  'id'          => 'userEmail',
		  'class'		=> 'required email'
		);

		echo form_open(site_url('forgot_password'),$attributes);
		?>
		<div class="login_box_in">
    	<p><label for="userEmail"> Email Id :</label></p>
			<?php echo form_input($dataName); ?>
        </div>
		<ul>
		<li>
			<a href="<?php echo site_url("login"); ?>">Login</a>
		</li>
		<li>
			<a href="<?php echo site_url("signup"); ?>">Sign Up</a>
		</li>
		</ul>
        <div class="buttun_log">
        	<a id="cmdSubmit">Submit</a>
        </div>
		<?php
		echo form_close();
		?>
    </div>
</div><!--end_mid_contain_right-->