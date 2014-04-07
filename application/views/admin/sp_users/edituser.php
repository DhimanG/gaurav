<script type="text/javascript">
$(document).ready(function(){ // jQuery DOM ready function.
  $("#frmedituser").validate({
		
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
				required: "Please provide a password",
				minlength: "Your password must be at least 5 characters long"
			},
			confirm_password: {
				required: "Please provide a password",
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

<article class="content-box minimizer">
	
	<header>
				
		<h2 style="padding-right: 90px;">Sp_User</h2>
		<nav>
			<ul class="button-switch">
				<li><a class="button" href="<?php echo site_url("admin/sp_users/"); ?>">List Sp_Users</a></li>
			</ul>
		</nav>
		<a title="Toggle Content Block" class="content-box-minimizer" href="#" style="display: block; left: 324px;">Toggle</a>
	</header>

	<section>
	
	<?php
	$attributes = array('id' => 'frmedituser');

	echo form_open('admin/sp_users/edituser/'.$usersDetails[0]['id'],$attributes);

	echo form_fieldset('Edit User');


	$datausername = array(
		  'name'        => 'userid',
		  'id'          => 'userid',
		  'class'							=> 'small required',
		  'value'							=> $usersDetails[0]['userid'],
		  'disabled'				=> 'disabled'
		);
	
	$datauserpassword = array(
		  'name'        => 'password',
		  'id'          => 'password',
		  'class'							=> 'small password'
		);
	
	$datauseremail = array(
		  'name'        => 'email',
		  'id'          => 'email',
		  'class'							=> 'small required email',
		  'remote'						=> site_url().'admin/myprofile/EmailValidation/'.$usersDetails[0]['id'],
		  'value'							=> $usersDetails[0]['email']
		  
		);

	$datauserconfirmpassword = array(
		  'name'        => 'confirm_password',
		  'id'          => 'confirm_password',
		  'class'		=> 'small password'
		);

	?>
	<dl>
		<dt>
			<label>Sp_User Name</label>
		</dt>
		<dd>
			
			<?php echo form_input($datausername); ?>
		</dd>
		
		<dt>
			<label>Email</label>
		</dt>
		<dd>
			<?php echo form_input($datauseremail); ?>
		</dd>

		<dt>
			<label>New Password</label>
		</dt>
		<dd>
			
			<?php echo form_password($datauserpassword); ?>
		</dd>

		<dt>
			<label>Confirm Password</label>
		</dt>
		<dd>
			
			<?php echo form_password($datauserconfirmpassword); ?>
		</dd>
	</dl>	
	<?php

	echo form_fieldset_close(); 
	echo form_submit('cmdSubmit', 'Update Sp_user');
	echo form_close();
	?>
	</section>
</article>