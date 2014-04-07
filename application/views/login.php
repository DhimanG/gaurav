	<script type="text/javascript">
	$(document).ready(function(){
		
		$("#frmlogin").validate();

		/*$('#cmdlogin').click(function() {
		  $('#frmlogin').submit();
		});
*/
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
	
	<?php
	if ($this->session->flashdata('success')){ 
	?> 
	<!-- Notification -->
			<h4 class="success"><?php echo $this->session->flashdata('success'); ?></h4>
	<!-- /Notification -->
	<?php
	}
	?>
	
	<span><img src="<?php echo base_url(); ?>public/images/lock.png" width="43" height="56px" alt="" /></span>
	<h2>Login</h2>
	
	<div class="login_box">
		<?php
		$attributes = array('id' => 'frmlogin');
		
		$dataName = array(
		  'name'        => 'loginName',
		  'id'          => 'loginName',
		  'class'		=> 'required',
		  'tabindex'	=>	'1'
		);
	
		$dataPass = array(
			  'name'        => 'loginPass',
			  'id'          => 'loginPass',
			  'class'		=> 'required',
			  'tabindex'	=>	'2'
		);
	
		echo form_open(site_url(),$attributes);
		?>
		<div class="login_box_in">
		<p><label for="loginName"> Username :</label></p>
			<?php echo form_input($dataName); ?>
	    </div>
	    
	    <div class="login_box_in">
		<p><label for="loginPass"> Password :</label></p>
			<?php echo form_password($dataPass); ?>
	    </div>
	    
	    <label><a href="<?php echo site_url("forgot_password");?>" tabindex="4">Forgot your password?</a></label>
	    
	    <div class="clear"></div>
	    <!--<div class="buttun_log"><a id="cmdlogin">Login</a></div>-->
	    <div>
	    <?php
	    	
       		$dataSubmit = array(
			  'name'        => 'cmdSubmit',
			  'id'          => 'cmdSubmit',
			  'tabindex'	=>	'3',
			  'class'		=> 'buttun_submit'
			);
       		echo form_submit($dataSubmit, 'Login');
       	?>
       	</div>
		<?php
		echo form_close();
		?>
	</div>
	
	<h3><a href="<?php echo site_url("signup"); ?>" tabindex="4" class="for_sign_up" style="color:#FFFFFF;">Sign Up</a></h3>
</div><!--end_mid_contain_right-->