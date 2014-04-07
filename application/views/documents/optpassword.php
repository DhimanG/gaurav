<script type="text/javascript">
$(document).ready(function(){
	$("#fromOTPPassword").validate({
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


	$attributes = array('id' => 'fromOTPPassword');
	
	$datapassword = array(
		  'name'        => 'password',
		  'id'          => 'password',
		);
	
	

	
	echo form_open_multipart('/documents/optpassword/',$attributes);
	?>
	<ul>
		<li>
			<label>OTP Password :</label>
			<?php echo form_password($datapassword); ?>
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
	    echo form_submit($dataSubmit, 'Enter OTP Password');       		
		echo form_close();
	?>
	</div>
	</div>
</div>