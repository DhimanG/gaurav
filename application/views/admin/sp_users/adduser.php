<script type="text/javascript">
$(document).ready(function(){ // jQuery DOM ready function.
  $("#frmadduser").validate({
		
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
	$attributes = array('id' => 'frmadduser');

	echo form_open('admin/sp_users/adduser',$attributes);

	echo form_fieldset('Add Sp_User');


	$datausername = array(
		  'name'        => 'userid',
		  'id'          => 'userid',
		  'remote'		=> site_url().'admin/sp_users/userNameValidation',
		  'class'		=> 'small required'
		);
	
	$datauserpassword = array(
		  'name'        => 'password',
		  'id'          => 'password',
		  'class'		=> 'small password'
		);
	
	$datauseremail = array(
		  'name'        => 'email',
		  'id'          => 'email',
		  'remote'		=> site_url().'admin/myprofile/EmailValidation/',
		  'class'		=> 'small required email'
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
			<label>Password</label>
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
	echo form_submit('cmdSubmit', 'Add Sp_User');
	echo form_close();
	?>
	</section>
</article>