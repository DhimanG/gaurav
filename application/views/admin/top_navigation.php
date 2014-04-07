<!-- Muon jQuery Sticky Dropdown Menu 1.0 -->
	<header class="muon">
	
		<div class="navigation-wrapper">
		
			<!-- Logo -->
			<a href="<?php echo site_url()."admin" ?>" class="muon-logo" title="Back to homepage">Your logo</a>
			
			<!-- Root navigation block -->
			<nav>
			
				<!-- Root menu level -->
				<ul>
					
					<!-- Root menu items -->
					<li><a href="<?php echo site_url("admin/dashboard"); ?>" class="muon-no-submenu">Dashboard</a></li>
					<li><a href="#">Masters</a>
					<nav class="muon-five-columns" style="left: 0px; display: block;">
						
							<!-- Submenu -->
							<ul class="muon-w-subheader muon-circles">
								
								<!-- Submenu header -->
								<li><h1>Masters</h1></li>
								
								<!-- Submenu items -->
								<li><a href="<?php echo site_url("admin/adminstrator"); ?>">Administrator</a></li>
								<li><a href="<?php echo site_url("admin/country"); ?>">Country</a></li>
								<li><a href="<?php echo site_url("admin/newsfeed"); ?>">News Feeds</a></li>
								<li><a href="<?php echo site_url("admin/banner"); ?>">Banners</a></li>
								<li><a href="<?php echo site_url("admin/category"); ?>">Category</a></li>
								<li><a href="<?php echo site_url("admin/user"); ?>">User</a></li>
								<li><a href="<?php echo site_url("admin/cms"); ?>">CMS</a></li>
								<li><a href="<?php echo site_url("admin/payment"); ?>">Packages</a></li>
								<li><a href="<?php echo site_url("admin/advertise"); ?>">Advertise</a></li>
								<li><a href="<?php echo site_url("admin/sp_users"); ?>">Sp_Users</a></li>
								<li><a href="<?php echo site_url("admin/sp_coupons"); ?>">Sp_Coupons</a></li>
								<li><a href="<?php echo site_url("admin/sp_banners"); ?>">Sp_Banner</a></li>								
								<li><a href="<?php echo site_url("admin/sp_points"); ?>">Sp_Points</a></li>
							</ul>
							
							
							
							<!-- Submenu -->
							<ul class="muon-w-subheader muon-circles">
	
								<!-- Submenu header -->
								<li><h1>Mutual</h1></li>
	
								<!-- Submenu items -->
								<li><a href="<?php echo site_url("admin/mutual/listcompany"); ?>">Mutual Fund Company</a></li>
								<li><a href="<?php echo site_url("admin/mutual/listfund"); ?>">Mutual Funds</a></li>
								<li><a href="<?php echo site_url("admin/mutual/runprocess"); ?>">Run Process</a></li>
							</ul>
							
							
							
						</nav>
					</li>
					
	
	
				<!-- End of root menu level -->
				</ul>
				
			<!-- End of root navigation block -->
			</nav>
			
			<!-- User list -->
			<ul class="muon-user-list">
				<li class="muon-user-data">Welcome, <a href="#"><?php echo $this->session->userdata('adminUsername')?></a></li>
				<li><a class="muon-settings" title="Profile" href="<?php echo site_url("admin/myprofile");?>">Settings</a></li>
				<li><a class="muon-logout" title="Logout" href="<?php echo site_url("admin/logout"); ?>">Logout</a></li>
			</ul>
			
		</div>
	
	</header>
	<!-- End of Muon Header -->	