<?php
//echo "<pre>";print_r($invited);exit;
?>
  <script>
    $(document).ready(function(){
      var invited = "<?php echo $invited; ?>"
      var firstname = "<?php echo $profile_data[0]['first_name'];?>"
      var lastname = "<?php echo $profile_data[0]['last_name'];?>"
      var email = "<?php echo $profile_data[0]['email'];?>"
      var image = "<?php echo $profile_data[0]['img'];?>"
      var dob = "<?php echo $profile_data[0]['dob'];?>"
      var zipcode = "<?php echo $profile_data[0]['zip_code'];?>"
      var width = 0;
      if (firstname !== '' && lastname !== '' && email !== '' && dob !== '' && zipcode !== '') {
        width = width + 35;
        $(".bar").removeAttr("style");
        $(".bar").attr('style','width:'+width+'%');
        $(".profile").addClass("btn-success");
      }else{
        console.log("incomplete");
      }
      if (image !== '') {
        width = width + 35;
        $(".bar").removeAttr("style");
        $(".bar").attr('style','width:'+width+'%');
        $(".pic").addClass("btn-success");
      }else{
        console.log("no pics");
      }
      if (invited == true) {
        width = width + 30;
        $(".bar").removeAttr("style");
        $(".bar").attr('style','width:'+width+'%');
        $(".invite").addClass("btn-success");
      }else{
        console.log("no invitation send..");
      }
    });
  </script>
  <!-- start: Header -->
		<div class="container-fluid">
      <div class="row-fluid">
        
        <!-- start: Main Menu -->
        <div class="span2 main-menu-span">
          <div class="nav-collapse sidebar-nav">
            <ul class="nav nav-tabs nav-stacked main-menu">
              <li><a href="<?php echo base_url(); ?>spiffcity/popular"><i class="icon-home icon-white"></i><span class="hidden-tablet"> Home</span></a></li>
              <li><a href="<?php echo base_url(); ?>spiffcity/dashboard"><i class="icon-home icon-white"></i><span class="hidden-tablet"> Dashboard</span></a></li>
              <li class="active"><a href="#"><i class="icon-user icon-white"></i><span class="hidden-tablet"> My Account</span></a></li>
              <li><a href="<?php echo base_url(); ?>spiffcity/friends"><i class="icon-globe icon-white"></i><span class="hidden-tablet"> Friends</span></a></li>
              <li><a href="<?php echo base_url(); ?>spiffcity/invite"><i class="icon-bullhorn icon-white"></i><span class="hidden-tablet"> Invite Friends</span></a></li> 
              <li><a href="<?php echo base_url(); ?>spiffcity/activities"><i class="icon-tasks icon-white"></i><span class="hidden-tablet"> Activities</span></a></li>
              <!--<li><a href="http://www.rosycontact.com/spiffcity/dashboard/apps.html"><i class="icon-list icon-white"></i><span class="hidden-tablet"> Apps</span></a></li>-->
              <li><a href="<?php echo base_url(); ?>spiffcity/redeem"><i class="icon-tags icon-white"></i><span class="hidden-tablet"> Redeem</span></a></li>
              <!--<li><a href="http://www.rosycontact.com/spiffcity/dashboard/social.html"><i class="icon-share icon-white"></i><span class="hidden-tablet"> Connected Networks</span></a></li>-->
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <!-- end: Main Menu -->
        
        <noscript>
          <div class="alert alert-block span10">
            <h4 class="alert-heading">Warning!</h4>
            <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
          </div>
        </noscript>
        
        <div style="min-height: 441px;" id="content" class="span10">
        <!-- start: Content -->
        
  
        <div class="row breadrump-block">
          <hr>
            <div class="span8">
          <ul class="breadcrumb">
            <li>
              <a href="http://www.rosycontact.com/spiffcity/dashboard/index.html">Home</a> <span class="divider">/</span>
            </li>
            <li>
              <a href="#">My Account</a>
            </li>          
          </ul>
        </div>
        <div class="span3">
          <form class="form-search">
            <div class="input-append">
              <input id="appendedInputButton" class="input-large search-query" placeholder="Find apps, people, offers" type="text">
              <button class="btn" type="button"> <i class="icon-search"></i></button>
            </div>
          </form>          
        </div>
        <hr>
      </div>
            
      <div class="row-fluid">                	
        <div class="box span11" ontablet="span12" ondesktop="span11">
          <div class="my-profile-progress">
            <h1><i class="icon-ok"></i><span class="break"></span> Complete these steps to become a real <strong>Spiff City user</strong>!</h1> 
            <div class="progress progress-striped active">
              <div class="bar" style="width: 30%;"></div>
            </div> 
          <div class="profile-task row-fluid">
          <div class="span3 noMargin" ontablet="span6" ondesktop="span3"> <span class="btn disabled profile"><i class=" icon-remove"></i></span> Complete your profile </div>
          <div class="span3 noMargin" ontablet="span6" ondesktop="span3"> <span class="btn disabled pic"><i class="icon-white icon-ok"></i></span> Upload a picture</div>
          <div class="span3 noMargin" ontablet="span6" ondesktop="span3"> <span class="btn disabled invite"><i class=" icon-remove"></i></span> Invite your friends </div>
          </div> 
      </div>        
      </div>
 </div>
 <hr>
 <div class="row-fluid">
                	
  <div class="box span3" ontablet="span6" ondesktop="span3">
    <div class="my-profile">
      <div class="my-profile-img">                          
        <img height='100' src="<?php if(!$profile_data[0]['fb_id']){echo base_url() . "Assets/spiffcity/profile/" . $profile_data[0]['img'];}else{ echo "http://graph.facebook.com/".$profile_data[0]['fb_id']."/picture?type=large";} ?>">                                
      </div>
      <div class="user-name"><?php echo ucFirst($profile_data[0]['userid']); ?></div>
       <a href="http://www.rosycontact.com/spiffcity/dashboard/profile.html" class="profile-link" rel="tooltip" data-placement="top" data-original-title="Profile completeness">
          <div class="progress progress-striped">
              <div class="bar" style="width: 30%;"></div>
          </div>
       </a>                                      
      </div>                        	
    </div>         
  <div class="box span5 noMargin" ontablet="span10" ondesktop="span5">
    <div class="tot-spiff-box">
      <h2><?php echo $profile_data[0]['spiff_points']; ?></h2>   
      <h3>Spiffs</h3>     
    </div>
  </div> 
      
      <div class="box span3 noMargin" ontablet="span6" ondesktop="span3">
          <div class="my-profile clearfix">
                <div class="circleStatsItem red activity-meter">
                    <i class="fa-icon-thumbs-up"></i>
                    <span class="plus">+</span>
                    <span class="percent">%</span>
                    <div style="width:120px;display:inline;&quot;"><canvas width="120" height="120"></canvas><input readonly="readonly" style="width: 60px; position: absolute; margin-top: 42.8571px; margin-left: -90px; font-size: 30px; border: medium none; background: none repeat scroll 0% 0% transparent; font-family: Arial; font-weight: bold; text-align: center; color: rgb(250, 88, 51); padding: 2px 0px 0px;" value="58" class="orangeCircle" type="text"></div>
                </div>
                <div class="box-title">Activity Meter</div>
              </div>                        	
            </div>               
          </div>
				<hr>
			
			<div class="row-fluid sortable ui-sortable">
				<div class="box span12">
					<div class="box-header" data-original-title="">
						<h2><i class="icon-edit"></i><span class="break"></span>My Profile</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
						
						</div>
					</div>
					<div class="box-content">
						<!--<form class="form-horizontal" action="<?php echo base_url();?>spiffcity/profile/edit_profile" method="POST">-->
            <?php echo form_open_multipart('spiffcity/profile/edit_profile'); ?>
						  <fieldset>
                <div class="control-group">
								<label class="control-label">User name</label>
								<div class="controls">
								  <span class="input-xlarge uneditable-input"><?php echo ucFirst($profile_data[0]['userid']); ?></span>
								</div>
							  </div>
                              
                <div class="control-group">
								<label class="control-label" for="Input">First Name</label>
								<div class="controls">
								  <input class="validate[required,minSize[4],custom[onlyLetterSp]] input-xlarge  " id="first_name" name="first_name" placeholder="<?php echo ucFirst($profile_data[0]['first_name']);?>" value="<?php echo ucFirst($profile_data[0]['first_name']);?>" type="text">
								</div>
                
							  </div><div class="control-group">
								<label class="control-label" for="Input">Last Name</label>
								<div class="controls">
								  <input class="input-xlarge " id="last_name" name="last_name" placeholder="<?php echo ucFirst($profile_data[0]['last_name']);?>" value="<?php echo ucFirst($profile_data[0]['last_name']);?>" type="text">
								</div>
							  </div>
							
							<div class="control-group">
							  <label class="control-label" for="date01">Birth Date</label>
							  <div class="controls">
								<input class="input-xlarge datepicker hasDatepicker" id="dob" name="dob" placeholder="<?php echo date("d M Y" , strtotime($profile_data[0]['dob']));?>"  type="text">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="fileInput">Upload profile photo</label>
							  <div class="controls">
								<div id="uniform-fileInput" class="uploader">
                  <input id="userfile" name="userfile" type="file"><span>No file selected</span><span>Choose File</span></div>
							  </div>
							</div>  
                <div class="control-group">
                  <label class="control-label" for="inputEmail">Email</label>
                  <div class="controls">
                    <input class="validate[required,email]"id="email" name="email" placeholder="<?php echo $profile_data[0]['email'];  ?>" value="<?php echo $profile_data[0]['email'];  ?>" type="text">
                  </div>
                </div>
                 <div class="control-group">
                  <label class="control-label" for="inputEmail">Zipcode</label>
                  <div class="controls">
                    <input id="zip_code" name="zip_code" placeholder="<?php echo $profile_data[0]['zip_code']; ?>" value="<?php echo $profile_data[0]['zip_code']; ?>" type="text">
                  </div>
                </div>
                
                 <div class="form-actions">
								<button type="submit" class="btn btn-primary">Save changes</button>
								<button class="btn">Cancel</button>
							  </div>
                             
						  </fieldset>
						<?php echo form_close();?>

					</div>
				</div><!--/span-->

			</div><!--/row-->
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
			<div class="row-fluid sortable ui-sortable">
				<div class="box span12">
					<div class="box-header" data-original-title="">
						<h2><i class="icon-edit"></i><span class="break"></span>Password Change</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
						
						</div>
					</div>
					<div class="box-content">
						<form id="frmpassword" method="POST" class="form-horizontal" action="<?php echo base_url(); ?>spiffcity/profile/change_password" >
						  <fieldset>
                <div class="control-group">
                  <label class="control-label" for="inputPassword">Current password</label>
                  <div class="controls">
                    <input name="cpassword" class="validate[required,minSize[6],custom[onlyLetterSp]] text-input"id="current_Password" placeholder="Password" type="password">
                  </div>
                </div>
                
                <div class="control-group">
                  <label class=" control-label" for="inputPassword">New password</label>
                  <div class="controls">
                    <input name="new_password" class="validate[required,minSize[6],custom[onlyLetterSp]] text-input" id="new_Password" placeholder="Password" type="password">
                  </div>
                </div>
                
                <div class="control-group">
                  <label class="  control-label" for="inputPassword">Confirm new password</label>
                  <div class="controls">
                    <input name=" confirm_password" class="validate[required,equals[new_Password]] text-input" id="confirm_Password" placeholder="Password" type="password">
                  </div>
                </div>
                  <div class="form-actions">
								<button id="submit" type="submit" name="submit" class="btn btn-primary">Save changes</button>
								<button class="btn">Cancel</button>
							  </div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div>
		
			<!--/row-->
    
					<hr>
			<!-- end: Content -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
				
		<div class="modal hide fade" id="myModal">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3>Settings</h3>
			</div>
			<div class="modal-body">
				<p>Here settings can be configured...</p>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal">Close</a>
				<a href="#" class="btn btn-primary">Save changes</a>
			</div>
		</div>
		
		