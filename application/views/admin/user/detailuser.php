<article class="content-box minimizer">
	<header>
		<h2 style="padding-right: 90px;">User</h2>
		<nav>
			<ul class="button-switch">
				<li><a class="button" href="<?php echo site_url("admin/user/"); ?>">List User</a></li>
			</ul>
		</nav>
		<a title="Toggle Content Block" class="content-box-minimizer" href="#" style="display: block; left: 324px;">Toggle</a>
	</header>

	<section>
	<?php 
		echo form_open();
		echo form_fieldset('User Detail');
	?>
			<dl>
				<dt>
					<label>Name</label>
				</dt>
				<dd>
					<?php echo $userDetails[0]['userName']; ?>
				</dd>
			</dl>
			<dl>
				<dt>
					<label>Image</label>
				</dt>
				<dd>
					<?php if($userDetails[0]['profile_image_path_original']!='') { ?> <img src="<?php echo $userDetails[0]['profile_image_path_original']; ?>" />  <?php } ?>
				</dd>
			</dl>
			<dl>
				<dt>
					<label>Email</label>
				</dt>
				<dd>
					<?php echo $userDetails[0]['userEmail']; ?>
				</dd>
			</dl>
			<dl>
				<dt>
					<label>Login</label>
				</dt>
				<dd>
					<?php echo $userDetails[0]['userUName']; ?>
				</dd>
			</dl>
			<dl>
				<dt>
					<label>Date Of Birth</label>
				</dt>
				<dd>
					<?php echo date('d/m/Y',strtotime($userDetails[0]['userDOB'])); ?>
				</dd>
			</dl>
			<dl>
				<dt>
					<label>Education</label>
				</dt>
				<dd>
					<?php echo $userDetails[0]['userEducation']; ?>
				</dd>
			</dl>
			<dl>
				<dt>
					<label>Work</label>
				</dt>
				<dd>
					<?php echo $userDetails[0]['userWork']; ?>
				</dd>
			</dl>
			<dl>
				<dt>
					<label>City</label>
				</dt>
				<dd>
					<?php echo $userDetails[0]['userCity']; ?>
				</dd>
			</dl>
			<dl>
				<dt>
					<label>Country</label>
				</dt>
				<dd>
					<?php echo $arrCountry[0]['countryName']; ?>
				</dd>
			</dl>
			<dl>
				<dt>
					<label>About User</label>
				</dt>
				<dd>
					<?php echo $userDetails[0]['userAboutMySelf']; ?>
				</dd>
			</dl>
			<dl>
				<dt>
					<label>Mobile</label>
				</dt>
				<dd>
					<?php echo $userDetails[0]['userMobile']; ?>
				</dd>
			</dl>
			<?php if($NotifiDetails){ ?>
			<dl>
				<dt>
					<label>Notification</label>
				</dt>
				<dd>
					Email : <?php if($NotifiDetails[0]['notificationByEmail'] == '1' ){?>
								<img src="<?php echo base_url(); ?>public/images/tick.png" width="16" height="16" alt="" style="border:none;box-shadow:none;" />      
								<?php }else{ ?>
								<img src="<?php echo base_url(); ?>public/images/cross.png" width="16" height="16" alt="" style="border:none;box-shadow:none;"  />
							<?php } ?>
			 		<br/>
					SMS : <?php if($NotifiDetails[0]['notificationBySMS'] == '1' ){?>
							<img src="<?php echo base_url(); ?>public/images/tick.png" width="16" height="16" alt="" style="border:none;box-shadow:none;"  />
							<?php }else{ ?>
							<img src="<?php echo base_url(); ?>public/images/cross.png" width="16" height="16" alt="" style="border:none;box-shadow:none;" />
						<?php } ?>
				</dd>
			</dl>
			<?php } ?>
			<dl>
				<dt>
					<label>Created Date</label>
				</dt>
				<dd>
					<?php echo $userDetails[0]['userCreatedOn']; ?>
				</dd>
			</dl>
			<dl>
				<dt>
					<label>Last Updated</label>
				</dt>
				<dd>
					<?php echo $userDetails[0]['userUpdatedOn']; ?>
				</dd>
			</dl>
		<?php 
			echo form_fieldset_close(); 
			echo form_close();
		?>
	</section>
</article>