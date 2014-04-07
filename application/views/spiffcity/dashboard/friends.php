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
            <li class="active"><a href="#"><i class="icon-globe icon-white"></i><span class="hidden-tablet"> Friends</span></a></li>
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
    
    
    <div style="min-height: 422px;" id="content" class="span10">
			<!-- start: Content -->
			

			<div class="row breadrump-block">
				<hr>
                <div class="span8">
				<ul class="breadcrumb">
					<li>
						<a href="<?php echo base_url();?>spiffcity/dashboard">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Friends</a>
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
             
            <div class="row-fluid friends-filter clearfix">
            	
            	<div class=" span8  pull-right">
                    <div id="filters">
                      <ul class="option-set">
                        <li><a href="#filter" class="selected">All (556)</a></li>
                        <li><a href="#filter"><i class="fa-icon-user"></i>Get Spiffed  (156)</a></li>
                        <li><a href="#filter"><i class="fa-icon-facebook"></i>Facebook  (250)</a></li>
                         <li><a href="#filter"><i class="fa-icon-twitter"></i>Twitter (150)</a></li>
                      </ul>
                    </div>
                </div>
                 <div class=" span4  pull-left">
                	<div class="actions">
                              <div class="social-connect-btn clearfix"> 
                                <a href="#" class="connect-facebook"> <span> Connect Friends </span> </a>
                                <a href="#" class="connect-twitter"> <span> Connect Followers </span></a>
                              </div>
                     </div>
                </div>
               
            </div>
            
            <div class="row-fluid" id="friends-list">
            
                <div class="span12">
                  <ul class="thumbnails">
                    <li class="span4" ontablet="span8" ondesktop="span4">
                      <div class="friends-list-item clearfix "> 
                            <div class="span2"> <a href="#"> <img class="avatar" alt="Lucas" src="Get%20Spiffed%20frnd_files/avatar.jpg"></a> </div>
                            <div class="span7">	<a href="#">?ukasz Holeczek</a></div>  
                            <div class="span2">	<a href="#" class="btn btn-success btn-mini">connect</a> </div> 
                       </div> 
                     </li>                     
                     <li class="span4" ontablet="span8" ondesktop="span4">
                      <div class="friends-list-item clearfix"> 
                    	  <div class="span2"> <a href="#"> <img class="avatar" alt="Lucas" src="Get%20Spiffed%20frnd_files/avatar5.jpg"></a> </div>
                          <div class="span7">	<a href="#">John D'sa</a></div>  
                          <div class="span2">	<a href="#" class="btn btn-warning btn-mini">Follow</a> </div> 
                        </div> 
                     </li> 
                     <li class="span4" ontablet="span8" ondesktop="span4">
                    	 <div class="friends-list-item clearfix"> 
                    	  <div class="span2"> <a href="#"> <img class="avatar" alt="Lucas" src="Get%20Spiffed%20frnd_files/avatar9.jpg"></a> </div>
                          <div class="span7">	<a href="#">Jerry k</a></div>  
                          <div class="span2">	<a href="#" class="btn btn-success btn-mini">connect</a> </div> 
                        </div> 
                    </li>     
                    <li class="span4" ontablet="span8" ondesktop="span4">
                      <div class="friends-list-item clearfix "> 
                            <div class="span2"> <a href="#"> <img class="avatar" alt="Lucas" src="Get%20Spiffed%20frnd_files/avatar.jpg"></a> </div>
                            <div class="span7">	<a href="#">?ukasz Holeczek</a></div>  
                            <div class="span2">	<a href="#" class="btn btn-danger btn-mini">Unfollow</a> </div> 
                       </div> 
                     </li>                     
                     <li class="span4" ontablet="span8" ondesktop="span4">
                      <div class="friends-list-item clearfix"> 
                    	  <div class="span2"> <a href="#"> <img class="avatar" alt="Lucas" src="Get%20Spiffed%20frnd_files/avatar5.jpg"></a> </div>
                          <div class="span7">	<a href="#">John D'sa</a></div>  
                          <div class="span2">	<a href="#" class="btn btn-warning btn-mini">Follow</a> </div> 
                        </div> 
                     </li> 
                     <li class="span4" ontablet="span8" ondesktop="span4">
                    	 <div class="friends-list-item clearfix"> 
                    	  <div class="span2"> <a href="#"> <img class="avatar" alt="Lucas" src="Get%20Spiffed%20frnd_files/avatar9.jpg"></a> </div>
                          <div class="span7">	<a href="#">Jerry k</a></div>  
                           <div class="span2">	<a href="#" class="btn btn-danger btn-mini">Unfollow</a> </div> 
                        </div> 
                    </li>        
                    <li class="span4" ontablet="span8" ondesktop="span4">
                      <div class="friends-list-item clearfix "> 
                            <div class="span2"> <a href="#"> <img class="avatar" alt="Lucas" src="Get%20Spiffed%20frnd_files/avatar.jpg"></a> </div>
                            <div class="span7">	<a href="#">?ukasz Holeczek</a></div>  
                            <div class="span2">	<a href="#" class="btn btn-success btn-mini">connect</a> </div> 
                       </div> 
                     </li>
                      <li class="span4" ontablet="span8" ondesktop="span4">
                      <div class="friends-list-item clearfix "> 
                            <div class="span2"> <a href="#"> <img class="avatar" alt="Lucas" src="Get%20Spiffed%20frnd_files/avatar.jpg"></a> </div>
                            <div class="span7">	<a href="#">?ukasz Holeczek</a></div>  
                            <div class="span2">	<a href="#" class="btn btn-success btn-mini">connect</a> </div> 
                       </div> 
                     </li>                     
                     <li class="span4" ontablet="span8" ondesktop="span4">
                      <div class="friends-list-item clearfix"> 
                    	  <div class="span2"> <a href="#"> <img class="avatar" alt="Lucas" src="Get%20Spiffed%20frnd_files/avatar5.jpg"></a> </div>
                          <div class="span7">	<a href="#">John D'sa</a></div>  
                          <div class="span2">	<a href="#" class="btn btn-warning btn-mini">Follow</a> </div> 
                        </div> 
                     </li> 
                     <li class="span4" ontablet="span8" ondesktop="span4">
                    	 <div class="friends-list-item clearfix"> 
                    	  <div class="span2"> <a href="#"> <img class="avatar" alt="Lucas" src="Get%20Spiffed%20frnd_files/avatar9.jpg"></a> </div>
                          <div class="span7">	<a href="#">Jerry k</a></div>  
                          <div class="span2">	<a href="#" class="btn btn-success btn-mini">connect</a> </div> 
                        </div> 
                    </li>     
                    <li class="span4" ontablet="span8" ondesktop="span4">
                      <div class="friends-list-item clearfix "> 
                            <div class="span2"> <a href="#"> <img class="avatar" alt="Lucas" src="Get%20Spiffed%20frnd_files/avatar.jpg"></a> </div>
                            <div class="span7">	<a href="#">?ukasz Holeczek</a></div>  
                            <div class="span2">	<a href="#" class="btn btn-danger btn-mini">Unfollow</a> </div> 
                       </div> 
                     </li>                     
                     <li class="span4" ontablet="span8" ondesktop="span4">
                      <div class="friends-list-item clearfix"> 
                    	  <div class="span2"> <a href="#"> <img class="avatar" alt="Lucas" src="Get%20Spiffed%20frnd_files/avatar5.jpg"></a> </div>
                          <div class="span7">	<a href="#">John D'sa</a></div>  
                          <div class="span2">	<a href="#" class="btn btn-warning btn-mini">Follow</a> </div> 
                        </div> 
                     </li> 
                     <li class="span4" ontablet="span8" ondesktop="span4">
                    	 <div class="friends-list-item clearfix"> 
                    	  <div class="span2"> <a href="#"> <img class="avatar" alt="Lucas" src="Get%20Spiffed%20frnd_files/avatar9.jpg"></a> </div>
                          <div class="span7">	<a href="#">Jerry k</a></div>  
                           <div class="span2">	<a href="#" class="btn btn-danger btn-mini">Unfollow</a> </div> 
                        </div> 
                    </li>        
                    <li class="span4" ontablet="span8" ondesktop="span4">
                      <div class="friends-list-item clearfix "> 
                            <div class="span2"> <a href="#"> <img class="avatar" alt="Lucas" src="Get%20Spiffed%20frnd_files/avatar.jpg"></a> </div>
                            <div class="span7">	<a href="#">?ukasz Holeczek</a></div>  
                            <div class="span2">	<a href="#" class="btn btn-success btn-mini">connect</a> </div> 
                       </div> 
                     </li> 
                      <li class="span4" ontablet="span8" ondesktop="span4">
                      <div class="friends-list-item clearfix "> 
                            <div class="span2"> <a href="#"> <img class="avatar" alt="Lucas" src="Get%20Spiffed%20frnd_files/avatar.jpg"></a> </div>
                            <div class="span7">	<a href="#">?ukasz Holeczek</a></div>  
                            <div class="span2">	<a href="#" class="btn btn-success btn-mini">connect</a> </div> 
                       </div> 
                     </li>                     
                     <li class="span4" ontablet="span8" ondesktop="span4">
                      <div class="friends-list-item clearfix"> 
                    	  <div class="span2"> <a href="#"> <img class="avatar" alt="Lucas" src="Get%20Spiffed%20frnd_files/avatar5.jpg"></a> </div>
                          <div class="span7">	<a href="#">John D'sa</a></div>  
                          <div class="span2">	<a href="#" class="btn btn-warning btn-mini">Follow</a> </div> 
                        </div> 
                     </li> 
                     <li class="span4" ontablet="span8" ondesktop="span4">
                    	 <div class="friends-list-item clearfix"> 
                    	  <div class="span2"> <a href="#"> <img class="avatar" alt="Lucas" src="Get%20Spiffed%20frnd_files/avatar9.jpg"></a> </div>
                          <div class="span7">	<a href="#">Jerry k</a></div>  
                          <div class="span2">	<a href="#" class="btn btn-success btn-mini">connect</a> </div> 
                        </div> 
                    </li>     
                      <li class="span4" ontablet="span8" ondesktop="span4">
                    	 <div class="friends-list-item clearfix"> 
                    	  <div class="span2"> <a href="#"> <img class="avatar" alt="Lucas" src="Get%20Spiffed%20frnd_files/avatar9.jpg"></a> </div>
                          <div class="span7">	<a href="#">Jerry k</a></div>  
                          <div class="span2">	<a href="#" class="btn btn-success btn-mini">connect</a> </div> 
                        </div> 
                    </li>     
                                       
                  </ul>
                </div>
                
                
                
                
			</div>
            <div class="row-fluid">
                <div class="pagination pagination-centered">
                  <ul>
                    <li class="disabled"><a href="#">«</a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">»</a></li>
                 </ul>
                </div>
            </div>
            <hr>
            
            <div class="row-fluid">
                	
                		<div class="box span12" ontablet="span12" ondesktop="span12">
                        			<h1>Invite your friends to join <strong>Get Spiffed</strong>. </h1>  
            			</div>
             </div>
           
			<div class="row-fluid sortable ui-sortable">
				<div class="box span8">
					<div class="box-header" data-original-title="">
						<h2><i class="icon-edit"></i><span class="break"></span>Invite your friends by Email</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
						
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal">
						  <fieldset>
                          	<p> 
                            	Invite your Gmail contacts. We will not store your password.
                                
                            </p>
                            <br>
                            
                           <div class="control-group">
                              <label class="control-label" for="inputEmail">Email</label>
                              <div class="controls">
                                <input id="inputEmail" placeholder="Email" type="text">
                              </div>
                            </div>
                            
                            <div class="control-group">
                              <label class="control-label" for="inputPassword">Password</label>
                              <div class="controls">
                                <input id="inputPassword" placeholder="Password" type="password">
                              </div>
                            </div>
                            
                             <div class="control-group">
                              <label class="control-label" for="inputPassword">&nbsp;</label>
                              <div class="controls">
                               <button type="submit" class="btn btn-primary">Add friends</button>
                              </div>
                            </div>
                            
                            <hr>
                            
                            <div class="control-group">
								<label class="control-label">&nbsp;</label>
								<div class="controls">
								 <strong>Or invite email addresses</strong>
								</div>
							</div>
                              <div class="control-group">
								<label class="control-label">Email addresses</label>
								<div class="controls">
								  <textarea class="span8 typeahead" rows="4" cols="6" id="inviteemailid" name="user_email_list" onclick="this.value=''" value="ype a list of invite of email addresses separated with comma">Type a list of invite of email addresses separated with comma</textarea>
								</div>
							  </div>
                             <div class="control-group">
								<label class="control-label">Subject</label>
								<div class="controls">
								  <textarea class="span8 typeahead" rows="2" cols="6" id="invitesub" name="user_email_list" onclick="this.value=''" value="subject"></textarea>
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
                                <a href="#" class="connect-facebook"> <span>Invite facebook  friends</span> </a>
                                <a href="#" class="connect-twitter"> <span> Invite twitter  friends</span></a>
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
			
				</div><!--/fluid-row-->