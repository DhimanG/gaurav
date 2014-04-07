 
 
   <!-- start: Header -->
		<div class="container-fluid">
		<div class="row-fluid">
				
			<!-- start: Main Menu -->
			<div class="span2 main-menu-span">
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li><a href="<?php echo base_url(); ?>spiffcity/popular"><i class="icon-home icon-white"></i><span class="hidden-tablet"> Home</span></a></li>
						<li><a href="<?php echo base_url(); ?>spiffcity/dashboard"><i class="icon-home icon-white"></i><span class="hidden-tablet"> Dashboard</span></a></li>
            <li><a href="<?php echo base_url(); ?>spiffcity/profile"><i class="icon-user icon-white"></i><span class="hidden-tablet"> My Account</span></a></li>
            <li><a href="<?php echo base_url(); ?>spiffcity/friends"><i class="icon-globe icon-white"></i><span class="hidden-tablet"> Friends</span></a></li>
            <li class="active"><a href="#"><i class="icon-bullhorn icon-white"></i><span class="hidden-tablet"> Invite Friends</span></a></li> 
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
  
  <div style="min-height: 422px;" id="content" class="span10">

<!-- start: Content -->
			

			<div class="row breadrump-block">
				<hr>
                <div class="span8">
				<ul class="breadcrumb">
					<li>
						<a href="<?php echo base_url();?>spiffcity/dashboard/">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Invite friends</a>
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
                	
                		<div class="box span12" ontablet="span12" ondesktop="span12">
                        			<h1>Invite your friends to join <strong>Get Spiffed</strong>. </h1>  
                                    <p>
                                    Invite your friends to join <strong>Get Spiffed</strong> and to share their App passion. Tell them about the great opportunities they will encounter as <strong>OFFERS</strong> from their favorite Apps. Earn Spiffs for each friend who accepts your <strong>invitation</strong> and join the opportunity of redeeming <strong>GREAT OFFERS</strong>.
                                    </p>  
            			</div>
             </div>
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
				<div class="box span8">
					<div class="box-header" data-original-title="">
						<h2><i class="icon-edit"></i><span class="break"></span>Invite your friends by Email</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>						
						</div>
					</div>
					<div class="box-content">
						<form id="frmInvitation" class="form-horizontal" action="<?php echo site_url('spiffcity/invite/send_invitation'); ?>" method="POST">
						  <fieldset>                                                                                               	
                              <div class="control-group">
								<label class="control-label">Email addresses</label>
								<div class="controls">
								  <textarea class="span8 typeahead validate[required,custom[email]] text-input" rows="4" cols="6" id="inviteemailid" name="user_email" onclick="this.value=''" value="ype a list of invite of email addresses separated with comma">Type a list of invite of email addresses separated with comma</textarea>
								</div>
							  </div>
                              
                             <div class="control-group">
								<label class="control-label">Subject</label>
								<div class="controls">
								  <textarea class="span8 typeahead validate[required] text-input" rows="2" cols="6" id="invitesub" name="user_email_subject" onclick="this.value=''" value="subject"></textarea>
								</div>
							  </div>
                            
                          
                               <div class="control-group">
                              <label class="control-label" for="inputPassword">&nbsp;</label>
                              <div class="controls">
                               <button type="submit" class="btn btn-primary">Send invitation</button>
                              </div>
                            </div>
                        
                             
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->
                
                <div class="box span4">
                	<div class="box-header" data-original-title="">
						<h2><i class="icon-edit"></i><span class="break"></span>Share link</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
						
						</div>
					</div>
                    <div class="box-content">
						<form class="form-horizontal">
						  <fieldset>
                          	<p> 
                            	Share Get spiffed link on Facebook or Twitter.                                
                            </p>
                          
                           <div class="">
                              <label>Your message</label>
                            </div>
                            <div>
                            	<textarea class="span12 typeahead" rows="4" id="invitetext" name="user_email_list" onclick="this.value=''" value="ype a list of invite of email addresses separated with comma">I like Get Spiffed Come and share your App Passion</textarea>
								</div>
                            
                            <div class="actions">
                              <div class="social-connect-btn clearfix">

                                <a href="javascript:friends_list();" class="connect-facebook" id="facebook" > <span><img src="<?php echo base_url();?>Assets/img/invite.jpeg" id="facebook" class="connect-facebook" style="cursor:pointer;float:left;max-width: 20%>;"/></span> </a>
                                <!--a><span><img src="<?php echo base_url();?>Assets/img/invite.jpeg" id="facebook" class="connect-facebook" style="cursor:pointer;float:left;max-width: 20%>;"/></span--> 
                                <a href="#" class="connect-twitter" style="float:right;"> <span> Invite twitter  friends</span></a>
                              </div>
                            </div>
                            
						  </fieldset>
						</form>   
                        </div> 

					</div>
                    	
                </div>
<hr>
			</div><!--/row-->
    		
		
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
		
		<div class="clearfix"></div>
    
    