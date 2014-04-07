<?php
//print_r($invited);exit;
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

<div class="container-fluid">
		<div class="row-fluid">
      <!-- start: Main Menu -->
			<div class="span2 main-menu-span">
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
            <li><a href="<?php echo base_url(); ?>spiffcity/popular"><i class="icon-user icon-white"></i><span class="hidden-tablet"> Home</span></a></li>
            <li class="active"><a href="<?php echo base_url(); ?>spiffcity/dashboard"><i class="icon-user icon-white"></i><span class="hidden-tablet"> Dashboard</span></a></li>
            <li><a href="<?php echo base_url(); ?>spiffcity/profile"><i class="icon-user icon-white"></i><span class="hidden-tablet"> My Account</span></a></li>
            <li><a href="<?php echo base_url(); ?>spiffcity/friends"><i class="icon-globe icon-white"></i><span class="hidden-tablet"> Friends</span></a></li>
            <li><a href="<?php echo base_url(); ?>spiffcity/invite"><i class="icon-bullhorn icon-white"></i><span class="hidden-tablet"> Invite Friends</span></a></li> 
            <li><a href="<?php echo base_url(); ?>spiffcity/activities"><i class="icon-tasks icon-white"></i><span class="hidden-tablet"> Activities</span></a></li>               
            <li><a href="<?php echo base_url(); ?>spiffcity/redeem"><i class="icon-tags icon-white"></i><span class="hidden-tablet"> Redeem</span></a></li>
            <!--<li><a href="social.html"><i class="icon-share icon-white"></i><span class="hidden-tablet"> Connected Networks</span></a>-->
            </li>
					</ul>
				</div><!--/.well -->
			</div><!--/span-->
			<!-- end: Main Menu -->			
			<noscript>
				&lt;div class="alert alert-block span10"&gt;
				&lt;h4 class="alert-heading"&gt;Warning!&lt;/h4&gt;
				&lt;p&gt;You need to have &lt;a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank"&gt;JavaScript&lt;/a&gt; enabled to use this site.&lt;/p&gt;
				&lt;/div&gt;
			</noscript>			
			<div class="span10" id="content" style="min-height: 454px;">
			<!-- start: Content -->			
			<div class="row breadrump-block">
				<hr>
          <div class="span8">
				<ul class="breadcrumb">
					<li>
						<a href="#">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Dashboard</a>
					</li>                   
				</ul>
          </div>
          <div class="span3">
            <form class="form-search">
              <div class="input-append">
                  <input type="text" placeholder="Find apps, people, offers" class="input-large search-query" id="appendedInputButton">
                  <button type="button" class="btn"> <i class="icon-search"></i></button>
              </div>
            </form>                    
          </div>
            <hr>
			</div>
            
         
             
				<div class="row-fluid">
                	
                		<div ondesktop="span3" ontablet="span6" class="box span3">
                        		<div class="my-profile">
                                    <div class="my-profile-img">
                                      <img src="<?php if(!$profile_data[0]['fb_id']){echo base_url() . "Assets/spiffcity/profile/" . $profile_data[0]['img'];}else{ echo "http://graph.facebook.com/".$profile_data[0]['fb_id']."/picture?type=large";} ?>"">                                
                                    </div>
                                    <div class="user-name"><?php echo ucFirst($this->session->userdata('username')); ?></div>
                                     <a data-original-title="Profile completeness" data-placement="top" rel="tooltip" class="profile-link" href="profile.html">
                                        <div class="progress progress-striped">
                                            <div style="width: 30%;" class="bar"></div>
                                        </div>
                                     </a>
                                </div>                        	
                        </div>
                        
                        
                		<div ondesktop="span5" ontablet="span10" class="box span5 noMargin">
                        	<div class="tot-spiff-box">
                            	<h2><?php echo $profile_data[0]['spiff_points'];?></h2>   
                                <h3>Spiffs</h3>     
                            </div>
                        </div> 
                        
                        <div ondesktop="span3" ontablet="span6" class="box span3 noMargin">
                        		<div class="my-profile clearfix">
                                        <div class="circleStatsItem red activity-meter">
                                            <i class="fa-icon-thumbs-up"></i>
                                            <span class="plus">+</span>
                                            <span class="percent">%</span>
                                            <div style="width:120px;display:inline;"><canvas height="120" width="120"></canvas><input type="text" class="orangeCircle" value="58" style="width: 60px; position: absolute; margin-top: 42.8571px; margin-left: -90px; font-size: 30px; border: medium none; background: none repeat scroll 0% 0% transparent; font-family: Arial; font-weight: bold; text-align: center; color: rgb(250, 88, 51); padding: 2px 0px 0px;" readonly="readonly"></div>
                                        </div>
                                        <div class="box-title">Activity Meter</div>
                                </div>                        	
                        </div>               
                </div>
                <hr>
			
			<div class="row-fluid">
				
				
				<div class="circleStats">
                    
					<div ondesktop="span2" ontablet="span4" class="span2 empty-circle">
                    	&nbsp;
                    </div>
					<div ondesktop="span2" ontablet="span4" class="span2">
                    	<div class="circleStatsItem blue">
                        	<i class="fa-icon-bullhorn"></i>
							<span class="plus">+</span>
							<span class="percent"></span>
                        	<div style="width:120px;display:inline;"><canvas height="120" width="120"></canvas><input type="text" class="blueCircle" value="8" style="width: 60px; position: absolute; margin-top: 42.8571px; margin-left: -90px; font-size: 30px; border: medium none; background: none repeat scroll 0% 0% transparent; font-family: Arial; font-weight: bold; text-align: center; color: rgb(47, 171, 233); padding: 2px 0px 0px;" readonly="readonly"></div>
                    	</div>
						<div class="box-small-title">Redeemed Offers
</div>
					</div>
					<div ondesktop="span2" ontablet="span4" class="span2">
						<div class="circleStatsItem yellow">
                        	<i class="fa-icon-user"></i>
							<span class="plus">+</span>
							<span class="percent"></span>
                        	<div style="width:120px;display:inline;"><canvas height="120" width="120"></canvas><input type="text" class="yellowCircle" value="12" style="width: 60px; position: absolute; margin-top: 42.8571px; margin-left: -90px; font-size: 30px; border: medium none; background: none repeat scroll 0% 0% transparent; font-family: Arial; font-weight: bold; text-align: center; color: rgb(231, 229, 114); padding: 2px 0px 0px;" readonly="readonly"></div>
                    	</div>
						<div class="box-small-title"> friends</div>
					</div>
					<div ondesktop="span2" ontablet="span4" class="noMargin span2">
						<div class="circleStatsItem pink">
                        	<i class="fa-icon-globe"></i>
							<span class="plus">+</span>
							<span class="percent">%</span>
                        	<div style="width:120px;display:inline;"><canvas height="120" width="120"></canvas><input type="text" class="pinkCircle" value="23" style="width: 60px; position: absolute; margin-top: 42.8571px; margin-left: -90px; font-size: 30px; border: medium none; background: none repeat scroll 0% 0% transparent; font-family: Arial; font-weight: bold; text-align: center; color: rgb(228, 43, 117); padding: 2px 0px 0px;" readonly="readonly"></div>
                    	</div>
						<div class="box-small-title">Spiffs among friends 
</div>
					</div>
				
					<div ondesktop="span2" ontablet="span4" class="span2">
						<div class="circleStatsItem lightorange">
                        	<i class="fa-icon-shopping-cart"></i>
							<span class="plus">+</span>
							<span class="percent"></span>
                        	<div style="width:120px;display:inline;"><canvas height="120" width="120"></canvas><input type="text" class="lightOrangeCircle" value="42" style="width: 60px; position: absolute; margin-top: 42.8571px; margin-left: -90px; font-size: 30px; border: medium none; background: none repeat scroll 0% 0% transparent; font-family: Arial; font-weight: bold; text-align: center; color: rgb(244, 167, 12); padding: 2px 0px 0px;" readonly="readonly"></div>
                    	</div>
						<div class="box-small-title">purchases
</div>
					</div>

                </div>
			
			</div>
			
			
			
			<div class="sortable row-fluid ui-sortable ">
				
				<a class="quick-button span2" href="friends.html">
					<i class="fa-icon-group"></i>
					<p>Friends</p>
					<span class="notification">1.367</span>
				</a>
				<a class="quick-button span2" href="activities.html">
					<i class="fa-icon-comments-alt"></i>
					<p>Activities</p>
					<span class="notification green">167</span>
				</a>
				<a class="quick-button span2" href="redeem.html">
					<i class="fa-icon-shopping-cart"></i>
					<p>Offers</p>
				</a>
				<a class="quick-button span2" href="redeem.html">
					<i class="fa-icon-tags"></i>
					<p>Rewards</p>
				</a>
				<a class="quick-button span2">
					<i class="fa-icon-rss"></i>
					<p>Spiffs</p>
				</a>
				<a class="quick-button span2">
					<i class="fa-icon-gift"></i>
					<p>Gifts</p>
					<span class="notification red">68</span>
				</a>
				
			</div>
			<hr>

			<div class="row-fluid">	
				
                <div ondesktop="span4" ontablet="span6" class="box span4">
					<div class="box-header">
						<h2><i class="icon-user"></i><span class="break"></span>Get Spiffed Friends</h2>
						<div class="box-icon">
							<a class="btn-minimize" href="#"><i class="icon-chevron-up"></i></a>
							<a class="btn-close" href="#"><i class="icon-remove"></i></a>
						</div>
					</div>
                    <div class="friends-action  clearfix">	
                    				<span class="pull-right"><a href="friends.html">View all (329) </a></span> 
                        </div>
					<div class="box-content">
                    
                    	
						<ul class="dashboard-list">
							<li class="clearfix">
                            	<div class="span2"> <a href="#"> <img src="<?php echo base_url(); ?>Asssets/dashboard/img/avatar.jpg" alt="Lucas" class="avatar"></a> </div>
                                <div class="span7">	<a href="#">?ukasz Holeczek</a></div>  
                                <div class="span2">	<a class="btn btn-success btn-mini" href="#">connect</a> </div>  
							</li>
                            
                            <li class="clearfix">
                            	<div class="span2"> <a href="#"> <img src="<?php echo base_url(); ?>Asssets/dashboard/img/avatar9.jpg" alt="Lucas" class="avatar"></a> </div>
                                <div class="span7">	<a href="#">Bill Cole</a></div>  
                                <div class="span2"><a class="btn btn-warning btn-mini" href="#">Follow</a></div>  
							</li>
                            <li class="clearfix">
                            	<div class="span2"> <a href="#"> <img src="<?php echo base_url(); ?>Asssets/dashboard/img/avatar5.jpg" alt="Lucas" class="avatar"></a> </div>
                                <div class="span7">	<a href="#">Jane Sanchez</a></div>  
                                <div class="span2"><a class="btn btn-danger btn-mini" href="#">unfollow</a></div>  
							</li>
                            <li class="clearfix">
                            	<div class="span2"> <a href="#"> <img src="<?php echo base_url(); ?>Asssets/dashboard/img/avatar.jpg" alt="Lucas" class="avatar"></a> </div>
                                <div class="span7">	<a href="#">?ukasz Holeczek</a></div>  
                                <div class="span2">	<a class="btn btn-success btn-mini" href="#">connect</a> </div>  
							</li>
                            
                            <li class="clearfix">
                            	<div class="span2"> <a href="#"> <img src="<?php echo base_url(); ?>Asssets/dashboard/img/avatar9.jpg" alt="Lucas" class="avatar"></a> </div>
                                <div class="span7">	<a href="#">Bill Cole</a></div>  
                                <div class="span2"><a class="btn btn-success btn-mini" href="#">connect</a></div>  
							</li>
                            <li class="clearfix">
                            	<div class="span2"> <a href="#"> <img src="<?php echo base_url(); ?>Asssets/dashboard/img/avatar5.jpg" alt="Lucas" class="avatar"></a> </div>
                                <div class="span7">	<a href="#">Jane Sanchez</a></div>  
                                <div class="span2"><a class="btn btn-success btn-mini" href="#">connect</a></div>  
							</li>
                            
                          
                            
						
						</ul>
					</div>
				</div>
				<!--/span-->
                
                <div ondesktop="span4" ontablet="span6" class="box span4">
					<div class="box-header">
						<h2><i class="fa-icon-facebook"></i><span class="break"></span>facebook Friends</h2>
						<div class="box-icon">
							<a class="btn-minimize" href="#"><i class="icon-chevron-up"></i></a>
							<a class="btn-close" href="#"><i class="icon-remove"></i></a>
						</div>
					</div>
                    <div class="friends-action  clearfix">	
                        			<span class="pull-right"><a href="friends.html">View all (141) </a></span> 
                        </div>
					<div class="box-content">
						<ul class="dashboard-list">
							<li class="clearfix">
                            	<div class="span2"> <a href="#"> <img src="<?php echo base_url(); ?>Asssets/dashboard/img/avatar.jpg" alt="Lucas" class="avatar"></a> </div>
                                <div class="span7">	<a href="#">?ukasz Holeczek</a></div>  
                                <div class="span2">	<a class="btn btn-success btn-mini" href="#">connect</a> </div>  
							</li>
                            
                            <li class="clearfix">
                            	<div class="span2"> <a href="#"> <img src="<?php echo base_url(); ?>Asssets/dashboard/img/avatar9.jpg" alt="Lucas" class="avatar"></a> </div>
                                <div class="span7">	<a href="#">Bill Cole</a></div>  
                                <div class="span2"><a class="btn btn-warning btn-mini" href="#">Follow</a></div>  
							</li>
                            <li class="clearfix">
                            	<div class="span2"> <a href="#"> <img src="<?php echo base_url(); ?>Asssets/dashboard/img/avatar5.jpg" alt="Lucas" class="avatar"></a> </div>
                                <div class="span7">	<a href="#">Jane Sanchez</a></div>  
                                <div class="span2"><a class="btn btn-danger btn-mini" href="#">unfollow</a></div>  
							</li>
                            <li class="clearfix">
                            	<div class="span2"> <a href="#"> <img src="<?php echo base_url(); ?>Asssets/dashboard/img/avatar.jpg" alt="Lucas" class="avatar"></a> </div>
                                <div class="span7">	<a href="#">?ukasz Holeczek</a></div>  
                                <div class="span2">	<a class="btn btn-success btn-mini" href="#">connect</a> </div>  
							</li>
                            
                            <li class="clearfix">
                            	<div class="span2"> <a href="#"> <img src="<?php echo base_url(); ?>Asssets/dashboard/img/avatar9.jpg" alt="Lucas" class="avatar"></a> </div>
                                <div class="span7">	<a href="#">Bill Cole</a></div>  
                                <div class="span2"><a class="btn btn-success btn-mini" href="#">connect</a></div>  
							</li>
                            <li class="clearfix">
                            	<div class="span2"> <a href="#"> <img src="<?php echo base_url(); ?>Asssets/dashboard/img/avatar5.jpg" alt="Lucas" class="avatar"></a> </div>
                                <div class="span7">	<a href="#">Jane Sanchez</a></div>  
                                <div class="span2"><a class="btn btn-success btn-mini" href="#">connect</a></div>  
							</li>
						
						</ul>
					</div>
				</div>
				
				<div ondesktop="span4" ontablet="span6" class="box span4">
					<div class="box-header">
						<h2><i class="fa-icon-twitter"></i><span class="break"></span>Twitter followers</h2>
						<div class="box-icon">
							<a class="btn-minimize" href="#"><i class="icon-chevron-up"></i></a>
							<a class="btn-close" href="#"><i class="icon-remove"></i></a>
						</div>
					</div>
                    <div class="friends-action  clearfix">	
                        				<span class="pull-right"><a href="friends.html">View all (141) </a></span> 
                        </div>
					<div class="box-content">
						<ul class="dashboard-list">
							<li class="clearfix">
                            	<div class="span2"> <a href="#"> <img src="<?php echo base_url(); ?>Asssets/dashboard/img/avatar.jpg" alt="Lucas" class="avatar"></a> </div>
                                <div class="span7">	<a href="#">?ukasz Holeczek</a></div>  
                                <div class="span2">	<a class="btn btn-success btn-mini" href="#">connect</a> </div>  
							</li>
                            
                            <li class="clearfix">
                            	<div class="span2"> <a href="#"> <img src="<?php echo base_url(); ?>Asssets/dashboard/img/avatar9.jpg" alt="Lucas" class="avatar"></a> </div>
                                <div class="span7">	<a href="#">Bill Cole</a></div>  
                                <div class="span2"><a class="btn btn-warning btn-mini" href="#">Follow</a></div>  
							</li>
                            <li class="clearfix">
                            	<div class="span2"> <a href="#"> <img src="<?php echo base_url(); ?>Asssets/dashboard/img/avatar5.jpg" alt="Lucas" class="avatar"></a> </div>
                                <div class="span7">	<a href="#">Jane Sanchez</a></div>  
                                <div class="span2"><a class="btn btn-danger btn-mini" href="#">unfollow</a></div>  
							</li>
                            <li class="clearfix">
                            	<div class="span2"> <a href="#"> <img src="<?php echo base_url(); ?>Asssets/dashboard/img/avatar.jpg" alt="Lucas" class="avatar"></a> </div>
                                <div class="span7">	<a href="#">?ukasz Holeczek</a></div>  
                                <div class="span2">	<a class="btn btn-success btn-mini" href="#">connect</a> </div>  
							</li>
                            
                            <li class="clearfix">
                            	<div class="span2"> <a href="#"> <img src="<?php echo base_url(); ?>Asssets/dashboard/img/avatar9.jpg" alt="Lucas" class="avatar"></a> </div>
                                <div class="span7">	<a href="#">Bill Cole</a></div>  
                                <div class="span2"><a class="btn btn-success btn-mini" href="#">connect</a></div>  
							</li>
                            <li class="clearfix">
                            	<div class="span2"> <a href="#"> <img src="<?php echo base_url(); ?>Asssets/dashboard/img/avatar5.jpg" alt="Lucas" class="avatar"></a> </div>
                                <div class="span7">	<a href="#">Jane Sanchez</a></div>  
                                <div class="span2"><a class="btn btn-success btn-mini" href="#">connect</a></div>  
							</li>
						
						</ul>
					</div>
				</div>						
			</div>
			
       
			<hr>
			<!-- end: Content -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
				
		
			</div>
			
		
		