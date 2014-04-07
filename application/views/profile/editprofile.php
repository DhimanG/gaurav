<script type="text/javascript">
	$(document).ready(function(){
		
		$("#frmeditProfile").validate();

		$('#submtupdate').click(function() {
		  $('#frmeditProfile').submit();
		});

	});
</script>

<link rel="stylesheet" href="<?php echo site_url(); ?>public/datepicker/base/jquery.ui.all.css">
<script type="text/javascript" src="<?php echo site_url(); ?>public/datepicker/jquery.ui.core.js"></script>
<script type="text/javascript" src="<?php echo site_url(); ?>public/datepicker/jquery.ui.widget.js"></script>
<script type="text/javascript" src="<?php echo site_url(); ?>public/datepicker/jquery.ui.datepicker.js"></script>
<link rel="stylesheet" href="<?php echo site_url(); ?>public/datepicker/datepicker.css">
<script>

$(function() {
$( "#userDOB" ).datepicker({
	dateFormat: "dd-mm-yy",
	yearRange: '-60,+10',
	changeMonth: true,
	changeYear: true
	//showOn: "button",
	// buttonImage: "<?php echo site_url(); ?>public/images/calendar.gif"
});

});
</script>

<div class="profile_edit">
<?php 
 if ($this->session->flashdata('error')){ 
?>
	<!-- Notification -->
	<div class="errormsg">
		<p> <?php echo $this->session->flashdata('error'); ?></p>
	</div>
	<!-- /Notification -->
<?php } ?>
	<?php
	$attributes = array('id' => 'frmeditProfile');
	echo form_open_multipart('/profile/edit/',$attributes);
	?>

	<ul>
		<li>
			<?php
				$dataUserName = array(
				  'name'        => 'userName',
				  'id'          => 'userName',
				  'class'		=> 'required',
				  'value'       => $userDetails[0]['userName']
				);

			?>
			<label for="userName">Name :</label>
			<?php echo form_input($dataUserName); ?>
		</li>
		<li>
			<?php
				$dataAge = array(
				  'name'        => 'userDOB',
				  'id'          => 'userDOB',
				  'class'		=> 'required',
				  'value'       => date('d-m-Y',strtotime($userDetails[0]['userDOB']))
				);
			?>
			<label for="userDOB">Date Of Birth : </label>
			<?php echo form_input($dataAge); ?>
		</li>
		<li>
			<?php
				$dataEducation = array(
				  'name'        => 'userEducation',
				  'id'          => 'userEducation',
				  'class'		=> 'required',
				  'value'       => $userDetails[0]['userEducation']
				);
			?>
			<label for="userEducation">Education :</label>
			<?php echo form_input($dataEducation); ?>
		</li>
		<li>
			<?php
				$dataWork = array(
				  'name'        => 'userWork',
				  'id'          => 'userWork',
				 // 'class'		=> 'required',
				  'value'       => $userDetails[0]['userWork']
				);
			?>
			<label for="userWork">Work :</label>
			<?php echo form_input($dataWork); ?>
		</li>
		<li>
			<?php
				$dataCity = array(
				  'name'        => 'userCity',
				  'id'          => 'userCity',
				  'class'		=> 'required',
				  'value'       => $userDetails[0]['userCity']
				);
			?>
			<label for="userCity">City :</label>
			<?php echo form_input($dataCity); ?>
		</li>
		<li>
			<?php if( $userDetails[0]['userCountryId'] == '')
				{ 
					$countryId = '0';
				}else{ 
					$countryId = $userDetails[0]['userCountryId'];
				} ?>
			<label for="userCountry">Country :</label>
			<?php echo form_dropdown('userCountry', $countryArr,$countryId,"id='userCountry'"); ?>
		</li>
		<li>
			<?php
				$dataMyself = array(
				  'name'        => 'userMyself',
				  'id'          => 'userMyself',
				 // 'class'		=> 'required',
				  'value'       => $userDetails[0]['userAboutMySelf']
				);
			?>
			<label for="userMyself">About Myself :</label>
			<?php echo form_textarea($dataMyself); ?>
		</li>
		<li>
			<label for="userfile">Profile Image (148x95):</label>
			<?php //echo form_textarea($dataMyself); ?>
			<input type="file" name="userfile" id="userfile" size="20" />
		</li>
		<li class="additional">
			<label>Additional Information :</label>
		</li>
		<li>
			<?php
				$dataEmail = array(
				  'name'        => 'useremail',
				  'id'          => 'useremail',
				  'class'		=> 'required email',
				  'value'       => $userDetails[0]['userEmail']
				);
			?>
			<label for="useremail">Email Id :</label>
			<?php echo form_input($dataEmail); ?>
		</li>
		<li>
			<?php
				$dataPhone = array(
				  'name'        => 'dataPhone',
				  'id'          => 'dataPhone',
				  'class'		=> 'required number',
				  'value'       => $userDetails[0]['userMobile'],
			      'maxlength'   => '10',
	              'style'       => 'width:102px',
				);
			?>
			<label for="dataPhone">Phone Number :</label>
			<!-- <span style="float: left; font-size: 15px; padding-top: 6px;">+91</span> --><?php echo form_input($dataPhone); ?> 
			<p style="float:left;width:100%;">(Only 10 digit Mobile Number)</p>
		</li>
		<li class="additional">
			<label>Notification :</label>
			<p style="float:left;width:100%;">(All Alerts by SMS and Email)</p>
			
		</li>
						
		<li class="notification">
			<?php
				if($NotifiDetails[0]['notificationByEmail'] == '1' ){
					$flag	= true;
				}else{
					$flag	= false;
				}
			?>
			<label for="chkEmail">Email :</label>
			<?php echo form_checkbox('chkEmail', 'emailChecked',$flag,'id="chkEmail"'); ?>
		</li>
		<li class="notification">
			<?php
				if($NotifiDetails[0]['notificationBySMS'] == '1' ){
					$flag	= true;
				}else{
					$flag	= false;
				}
			?>
			<label for="chkMessage">SMS :</label>
			<?php echo form_checkbox('chkMessage', 'messageChecked',$flag,'id="chkMessage"'); ?>
		</li>
	</ul>
</div>
<div class="bot_but">
	<div class="left_but">
	<?php
		$dataSubmit = array(
				  'name'        => 'cmdSubmit',
				  'id'          => 'cmdSubmit',
				  'class'		=> 'left_but',
				  'style'		=>  'color:#FFFFFF;text-align:left'
				);
	    echo form_submit($dataSubmit, 'Update');       		
		echo form_close();
	?>
	</div>
</div>
<!--<div>
	<button class="left_but" id="submtupdate" class="bot_but"><span>Update</span></button>
</div>-->