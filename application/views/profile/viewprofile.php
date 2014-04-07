<div class="profile">
	<ul>
		<li>
		<label>Name :</label>
		<div class="details"><?php echo $userDetails[0]['userName']; ?></div>
	    </li>
	    <li>
		<label>Date Of Birth :</label>
		<div class="details"><?php echo date('d/m/Y',strtotime($userDetails[0]['userDOB'])); ?></div>
	    </li>
	    <li>
		<label>Education :</label>
		<div class="details"><?php echo $userDetails[0]['userEducation']; ?></div>
	    </li>
	    <li>
		<label>Work :</label>
		<div class="details"><?php echo $userDetails[0]['userWork']; ?></div>
	    </li>
	    <li>
		<label>City :</label>
		<div class="details"><?php echo $userDetails[0]['userCity']; ?></div>
	    </li>
	    <li>
		<label>Country :</label>
		<div class="details"><?php if($userDetails[0]['userCountryId']!='') echo $countryArr[$userDetails[0]['userCountryId']]; ?></div>
	    </li>
	    <li>
		<label>About Myself :</label>
		<div class="details"><?php echo $userDetails[0]['userAboutMySelf']; ?></div>
	    </li>
	    <li>
			<label>Additional Information :</label>
			<ul class="inner">
				<li>
				<label>a) Email id :</label>
				<div class="details"><?php echo $userDetails[0]['userEmail']; ?></div>
			    </li>
			    <li>
				<label> b) Phone Number :</label>
				
				<div class="details"><?php echo $userDetails[0]['userMobile']; ?></div>
				</li>
			</ul>
	    </li>
	    <li>
			<label>Notification :</label>
			<p style="float:left;width:100%;">(All Alerts by SMS and Email)</p>
			<ul class="inner">
				<li>
				<label>a) Email :</label>
				<?php if($NotifiDetails[0]['notificationByEmail'] == '1' ){?>
				<img src="<?php echo base_url(); ?>public/images/tick.png" width="16" height="16" alt="" />      
				<?php }else{ ?>
				<img src="<?php echo base_url(); ?>public/images/cross.png" width="16" height="16" alt="" />      
				<?php } ?>
				</li>
			    <li>
				<label> b) SMS :</label>
				<?php if($NotifiDetails[0]['notificationBySMS'] == '1' ){?>
				<img src="<?php echo base_url(); ?>public/images/tick.png" width="16" height="16" alt="" />      
				<?php }else{ ?>
				<img src="<?php echo base_url(); ?>public/images/cross.png" width="16" height="16" alt="" />      
				<?php } ?>
				
				<?php if(!$paymentHistory){ // else it will come down.?>
				<div class="buttons">
				  <ul>
				      <li><button class="butt" onclick="window.location.href='<?php echo site_url("profile/edit/"); ?>'"><span>Edit</span></button></li>
				  </ul>
				</div>
				<?php } ?>
			    </li>
			</ul>
	    </li>
	    <?php if($paymentHistory)
	    { ?>
	    	 <li>
				<label>Payment Information :</label>
				<ul class="inner">
					<li>
					<label>Payment Amount:</label>
					<div class="details">INR <?php echo $paymentHistory[0]['paymentAmount']; ?></div>
				    </li>
				    <li>
					<label>Payment Date :</label>
					<div class="details"><?php echo $paymentHistory[0]['paymentCreatedOn']; ?></div>
				    </li>
				</ul>
				<div class="buttons">
				  <ul>
				      <li><button class="butt" onclick="window.location.href='<?php echo site_url("profile/edit/"); ?>'"><span>Edit</span></button></li>
				  </ul>
				</div>
		    </li>
	    <?php }?>
	</ul>
</div>