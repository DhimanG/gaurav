<script type="text/javascript">
$(document).ready(function(){ // jQuery DOM ready function.
  $("#frmadminstrator").validate({
		
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
				
		<h2 style="padding-right: 90px;">Administrator</h2>
		<nav>
			<ul class="button-switch">
				<li><a class="button" href="<?php echo site_url("admin/adminstrator/"); ?>">List Administrator</a></li>
			</ul>
		</nav>
		<a title="Toggle Content Block" class="content-box-minimizer" href="#" style="display: block; left: 324px;">Toggle</a>
	</header>

	<section>
	
	<?php
	$attributes = array('id' => 'frmadminstrator');
				
	echo form_open('admin/adminstrator/add',$attributes);

	echo form_fieldset('Add Administrator');


	$dataadminstratorname = array(
		  'name'        => 'adminstratorname',
		  'id'          => 'adminstratorname',
		  'remote'		=> site_url().'admin/adminstrator/AdminNameValidation',
		  'class'		=> 'small required'
		);
	
	$dataadminpassword = array(
		  'name'        => 'password',
		  'id'          => 'password',
		  'class'		=> 'small password'
		);
	
	$dataadminemail = array(
		  'name'        => 'email',
		  'id'          => 'email',
		  'remote'		=> site_url().'admin/myprofile/EmailValidation/',
		  'class'		=> 'small required email'
		);

	$dataadminconfirmpassword = array(
		  'name'        => 'confirm_password',
		  'id'          => 'confirm_password',
		  'class'		=> 'small password'
		);

	?>
	<dl>
		<dt>
			<label>Administrator Name</label>
		</dt>
		<dd>
			
			<?php echo form_input($dataadminstratorname); ?>
		</dd>
		
		<dt>
			<label>Email</label>
		</dt>
		<dd>
			
			<?php echo form_input($dataadminemail); ?>
		</dd>

		<dt>
			<label>Password</label>
		</dt>
		<dd>
			
			<?php echo form_password($dataadminpassword); ?>
		</dd>

		<dt>
			<label>Confirm Password</label>
		</dt>
		<dd>
			
			<?php echo form_password($dataadminconfirmpassword); ?>
		</dd>
	</dl>	
	<?php

	echo form_fieldset_close(); 
	echo form_submit('cmdSubmit', 'Add Administrator');
	echo form_close();
	?>
	</section>
</article>