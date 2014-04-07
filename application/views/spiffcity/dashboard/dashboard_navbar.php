<html>
  <head>
    <meta charset="utf-8">
    <title>Get Spiffed Dashboard </title>
    <meta content="Get Spiffed Dashboard " name="description">
    <meta content="Get Spiffed Dashboard " name="author">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
    <link  href="<?php echo base_url(); ?>Assets/dashboard/css/bootstrap.css" id="bootstrap-style" rel="stylesheet">
    <link  href="<?php echo base_url();?>Assets/dashboard/css/bootstrap-responsive.css" rel="stylesheet">
    <link  href="<?php echo base_url();?>Assets/dashboard/css/style.css" id="base-style" rel="stylesheet">
    <link  href="<?php echo base_url();?>Assets/dashboard/css/style-responsive.css" id="base-style-responsive" rel="stylesheet">    
    <link  href="<?php echo base_url();?>Assets/dashboard/css/slide_menu.css" rel="stylesheet">
    <link  href="<?php echo base_url();?>Assets/dashboard/css/jquery.fs.picker.css" rel="stylesheet">
    <link  href="<?php echo base_url();?>Assets/dashboard/Font-Awesome-master/css/font-awesome.css" rel="stylesheet">
    <link  href="<?php echo base_url();?>Assets/dashboard/Font-Awesome-master/css/font-awesome.min.css" rel="stylesheet">
    <link  href="<?php echo base_url(); ?>Assets/js/jQuery-Validation-Engine/css/validationEngine.jquery.css" rel = "stylesheet" type="text/css"/>
    <link  href="<?php echo base_url();?>Assets/img/favicon.ico" rel="shortcut icon">
    <script src="<?php echo base_url();?>Assets/dashboard/js/jquery-1.7.2.min.js"></script>
    <script src="<?php echo base_url();?>Assets/dashboard/js/jquery-ui-1.8.21.custom.min.js"></script> 
    <?php
      $appID='561885653907144';
      if($_SERVER['HTTP_HOST']=='localhost'){
      $base_url='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
      }else{
      $base_url='http://'.$_SERVER['HTTP_HOST'];	
      }
    ?>
    
  </head>
  <body>
    
    <div id="fb-root"></div>
 
    <script type="text/javascript">
      window.fbAsyncInit = function() {
         FB.init({ 
           appId:'<?php echo $appID; ?>',
           cookie:true, 
           status:true,
           xfbml:true,
           oauth : true 
         });
       };
       (function(d){
               var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
               if (d.getElementById(id)) {return;}
               js = d.createElement('script'); js.id = id; js.async = true;
               js.src = "//connect.facebook.net/en_US/all.js";
               ref.parentNode.insertBefore(js, ref);
             }(document));
     //$('#facebook').click(function() {
      function friends_list(){ 	
          FB.login(function(response) {
          if(response.authResponse) {
            console.log(response);
            window.open("<?php echo site_url('spiffcity/invite/invite_friends'); ?>","MsgWindow","width=600,height=500,scrollbars=1,resizable=1");
          }
       },{scope: 'email,read_stream,publish_stream,user_birthday,user_location,user_work_history,user_hometown,user_photos'});
      }
    </script>
    
    
    
    <div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">						
        <!-- Start Slide Menu -->
        <div class="dropdown pull-left visible-phone">
          <a class="btn btn-navbar2 pull-left second" type="button" href="#modal">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>          
          <div style="display:none" id="modal">
            <ul class="nav nav-list left-menu" id="accordion">
              <li><a onclick="javascript: i_m_clicked('index.html');" href="index.html"><i class="icon-home icon-white"></i>Dashboard</a></li>
              <li><a onclick="javascript: i_m_clicked('profile.html');" class="item" href="profile.html"><i class="icon-white icon-user"></i>My Account</a></li>
              <li><a onclick="javascript: i_m_clicked('friends.html');" class="item" href="friends.html"><i class="icon-globe icon-white"></i>Friends</a></li>
              <li><a onclick="javascript: i_m_clicked('invite.html');" class="item" href="invite.html"><i class="icon-bullhorn icon-white"></i>Invite Friends</a></li>
              <li><a onclick="javascript: i_m_clicked('activities.html');" class="item" href="activities.html"><i class="icon-tasks icon-white"></i>Activities</a></li>
              <li><a onclick="javascript: i_m_clicked('apps.html');" class="item" href="apps.html"><i class="icon-list icon-white"></i>Apps</a></li> 
              <li><a onclick="javascript: i_m_clicked('redeem.html');" class="item" href="redeem.html"><i class="icon-tags icon-white"></i>Redeem</a></li>
              <li><a onclick="javascript: i_m_clicked('social.html');" class="item" href="social.html"><i class="icon-share icon-white"></i>Connected Networks</a></li>                                                                
              </ul>
          </div>
        </div>
        <!-- End Slide Menu -->
		<script>
      function i_m_clicked(new_des){
      window.location = new_des;
      }
    </script>						
      <a data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse" data-toggle="collapse" class="btn btn-navbar hidden-phone">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a href="index.html" class="brand"> <!--<img alt="Perfectum Dashboard" src="img/logo20.png" />--> <span class="hidden-phone">GetSpiffed </span></a>								
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
						
						<!-- start: User Dropdown -->
						<li class="dropdown">
							<a href="#" data-toggle="dropdown" class="btn dropdown-toggle">
								<i class="icon-user icon-white"></i>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo base_url();?>spiffcity/profile"><i class="icon-user"></i> My Account</a></li>
								<li><a href="<?php echo base_url();?>spiffcity/logout"><i class="icon-off"></i> Logout</a></li>
							</ul>
						</li>
						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->
				
			</div>
		</div>
	</div>
  