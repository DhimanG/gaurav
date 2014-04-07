<script type="text/javascript">
$(document).ready(function(){ // jQuery DOM ready function.
	$("#frmMyProfile").validate({
		
		rules: {
			confirm_password: {
				equalTo: "#password"
			},
		},

		messages: {
			confirm_password: {
				minlength: "Your password must be at least 5 characters long",
				equalTo: "Please enter the same password as above"
			},
		}

	});
});
</script>
<?php
	if ($this->session->flashdata('error')){ 
	?>
	<!-- Notification -->
	<div class="notification error">
		<a href="#" class="close-notification tooltip" title="Hide Notification">x</a>
		<h4>Error</h4>
		<p><?php echo $this->session->flashdata('error'); ?></p>
	</div>
	<!-- /Notification -->
	<?php
	}
?>
<?php
	if ($this->session->flashdata('success')){ 
	?>
	<div class="notification success">
			<a title="Hide Notification" class="close-notification tooltip" href="#">x</a>
			<h4>Success</h4>
			<p><?php echo $this->session->flashdata('success') ?></p>
	</div>
	<?php
	}
?>
<article class="content-box minimizer">
	
	<header>
		<h2 style="padding-right: 90px;">My Profile</h2>
		
		<a title="Toggle Content Block" class="content-box-minimizer" href="#" style="display: block; left: 324px;">Toggle</a>
	</header>

	<section>
	
	<?php
	$attributes = array('id' => 'frmMyProfile','name' => 'frmMyProfile');
	echo form_open('admin/myprofile',$attributes);
	echo form_fieldset('Edit Profile');


	$dataadminstratorname = array(
		  'name'        => 'adminstratorname',
		  'id'          => 'adminstratorname',
		  'class'		=> 'small required',
		  'value'		=> $arrAdminDetails[0]['adminUserName'],
		  'disabled'	=> 'disabled',
		);
	
	$dataadminemail = array(
		  'name'        => 'email',
		  'id'          => 'email',
		  'class'		=> 'small required email',
		  'remote'		=> site_url().'admin/myprofile/EmailValidation/'.$arrAdminDetails[0]['adminUserID'],
		  'value'		=> $arrAdminDetails[0]['adminUserEmail']
		);
	
	$dataadminpassword = array(
		  'name'        => 'password',
		  'id'          => 'password',
		  'class'		=> 'small password'
		);
	
	$dataadminconfirmpassword = array(
		  'name'        => 'confirm_password',
		  'id'          => 'confirm_password',
		  'class'		=> 'small password'
		);

	?>
	<dl>
		<dt>
			<label>Name</label>
		</dt>
		<dd>
			<?php echo form_input($dataadminstratorname); ?>
		</dd>
	</dl>
	<dl>
		<dt>
			<label>Email</label>
		</dt>
		<dd>
			<?php echo form_input($dataadminemail); ?>
		</dd>
	</dl>
	<dl>
		<dt>
			<label>New Password</label>
		</dt>
		<dd>
			<?php echo form_password($dataadminpassword); ?>
		</dd>
	</dl>
	<dl>
		<dt>
			<label>Confirm Password</label>
		</dt>
		<dd>
			<?php echo form_password($dataadminconfirmpassword); ?>
		</dd>
	</dl>	
	<?php
		echo form_fieldset_close(); 

		echo form_submit('cmdSubmit', 'Update Profile');
		echo form_hidden('id', $arrAdminDetails[0]['adminUserID']);
		
		echo form_close();
	?>
	</section>
</article>