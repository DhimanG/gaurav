<?php //echo "<pre>";print_r($comments);exit;?>

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
            <li><a href="<?php echo base_url(); ?>spiffcity/invite"><i class="icon-bullhorn icon-white"></i><span class="hidden-tablet"> Invite Friends</span></a></li> 
            <li class="active"><a href="#"><i class="icon-tasks icon-white"></i><span class="hidden-tablet"> Activities</span></a></li>
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
			
        <div>
          <hr>
          <ul class="breadcrumb">
            <li>
              <a href="#">Home</a> <span class="divider">/</span>
            </li>
            <li>
              <a href="#">Activities</a>
            </li>
          </ul>
          <hr>
        </div>  
        <div class="row-fluid sortable ">
          <div class="box span12">
            <div class="box-header" data-original-title="">
              <h2><i class="icon-picture"></i> Activities</h2>
              <div class="box-icon">
                <a href="#" id="toggle-fullscreen" class="hidden-phone hidden-tablet"><i class="icon-fullscreen"></i></a>
                <a href="#" class="btn-setting"><i class="icon-wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="icon-remove"></i></a>
              </div>
            </div>
            <div class="box-content">                    
              <div class="row-fluid clearfix">            	               
                <div style="position: relative; height:1640px;" class="masonry-gallery masonry">                
                <?php
                  if($comments){
                    $i="10";
                    foreach($comments as $crowd){
                ?>
                <div style="position: absolute; width: 318px; top: 50px; left: <?php echo $i;?>px;" id="image-1" class="masonry-thumb masonry-brick">
                  <a style="background:url(img/gallery/photo1.jpg)" title="Sample Image 1" href="<?php echo base_url() . "Assets/spiffcity/crowdcast/" . $crowd->img; ?>">
                  <img class="grayscale" src="<?php echo base_url() . "Assets/spiffcity/crowdcast/" . $crowd->img;?>" alt="Sample Image 1"></a>
                  <div class="activity-details"> 
                    <div class="activity-title"><?php echo $crowd->title;?></div>
                    <p><?php echo $crowd->description;?></p>
                    <div class="date-time clearfix"><span class="date-right"><?php echo $crowd->modified_date;?></span></div>
                  </div>
                </div>                
                <?php
                    $i=$i+330;
                    }
                ?>
                <?php
                  }else{
                    if ($this->session->flashdata('success')){ 
                ?>
                <div class="notification success">
                  <h4>Failed</h4>
                  <p><?php echo $this->session->flashdata('success') ?></p>
                </div>
                <?php
                    }
                  }
                ?>
              </div>              
            </div>
            </div>            
          </div><!--/span-->			
        </div><!--/row-->    
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
