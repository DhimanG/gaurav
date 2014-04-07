<script type="text/javascript">
$(document).ready(function(){
	$("#frmChangePassword").validate({
		rules: {
			password: {
				required: true,
				minlength: 5
			},
			confirm_password: {
				required: true,
				minlength: 5,
				equalTo: "#password"
			}
		}
	});
});
</script>
<?php
	if ($this->session->flashdata('success')){ 
	?>
	<div class="success">
		<p><?php echo $this->session->flashdata('success') ?></p>
	</div>
	<?php
	}
?>
<?php 
	 if ($this->session->flashdata('error')){ 
?>
	<!-- Notification -->
	<div class="errormsg">
		<p> <?php echo $this->session->flashdata('error'); ?></p>
	</div>
	<!-- /Notification -->
<?php
}
?>

<div class="profile_edit">
	<?php


	$attributes = array('id' => 'frmChangePassword');
	
	$datapassword = array(
		  'name'        => 'password',
		  'id'          => 'password',
		);
	
	$dataconfirmpassword = array(
		  'name'        => 'confirm_password',
		  'id'          => 'confirm_password',
		);

	
	echo form_open_multipart('/profile/change_password/',$attributes);
	?>
	<ul>
		<li>
			<label>Password :</label>
			<?php echo form_password($datapassword); ?>
		</li>
		<li>
			<label>Re-enter Password :</label>
			<?php echo form_password($dataconfirmpassword); ?>
		</li>
		
	</ul>
	<div class="bot_but">
	<div class="left_but">
	<?php
		$dataSubmit = array(
				  'name'        => 'cmdSubmit',
				  'id'          => 'cmdSubmit',
				  'class'		=> 'left_but',
				  'style'		=>  'color:#FFFFFF;text-align:left'
				);
	    echo form_submit($dataSubmit, 'Update Password');       		
		echo form_close();
	?>
	</div>
	</div>
</div>