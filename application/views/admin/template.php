<!doctype html>
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
	<title>safedoc</title>
	
	<meta charset="utf-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="robots" content="index, follow">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- Icons -->
	<link rel="shortcut icon" href="/favicon.ico">
	<link rel="apple-touch-icon" href="/apple-touch-icon.png">
	
	<!-- CSS Styles -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/screen.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/colors.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/jquery.muon.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/jquery.tipsy.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/jquery.wysiwyg.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/jquery.datatables.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/jquery.nyromodal.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/jquery.datepicker.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/jquery.fileinput.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/jquery.fullcalendar.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/jquery.visualize.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/jquery.snippet.css">
	

	<!-- Google WebFonts -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans+Mono|Open+Sans:400,400italic,700,700italic&amp;v2' rel='stylesheet' type='text/css'>
	
	<!-- Modernizr adds classes to the <html> element which allow you to target specific browser functionality in your stylesheet -->
	<script src="<?php echo base_url(); ?>public/admin/js/libs/modernizr-1.7.min.js"></script>
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/jquery.validation.js"></script>

</head>
<body>

	<?php
		$this->load->view('admin/top_navigation');
	?>
		
	<!-- Main Content -->
	<section role="main" class="page-wrapper">
		
		<section id="dashboard">
			
		<!-- Nav Shortcuts -->
		<!-- /Nav Shortcuts -->
			
	</section>	

		<?php
			$this->load->view($middle);
		?>
	
	</section>
	<!-- /Main Content -->
	
	<!-- Main Footer -->
	<footer id="footer">
		<div class="page-wrapper">
			<section>
    			<p>Safedocmanager - Admin Panel</p>
			</section>
			<section>
    			&nbsp;
			</section>
			<section>
				<p>© 2012 neosoft technologies </p>
			</section>
		</div>
	</footer>
	<!-- /Main Footer -->
	
	
	

	<!-- JavaScript at the bottom for faster page loading -->
	
	<script>!window.jQuery && document.write(unescape('%3Cscript src="<?php echo base_url(); ?>public/admin/js/libs/jquery-1.5.1.min.js"%3E%3C/script%3E'))</script>
	<!--[if IE]><script src="<?php echo base_url(); ?>public/admin/js/jquery/excanvas.js"></script><![endif]--><!-- IE Canvas Fix for Visualize Charts -->
	<script src="<?php echo base_url(); ?>public/admin/js/libs/selectivizr.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/jquery/jquery.visualize.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/jquery/jquery.visualize.tooltip.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/jquery/jquery.tipsy.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/jquery/jquery.nyromodal.min.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/jquery/jquery.wysiwyg.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/jquery/jquery.datatables.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/jquery/jquery.datepicker.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/jquery/jquery.fileinput.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/jquery/jquery.fullcalendar.min.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/jquery/jquery.ui.totop.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/jquery/jquery.snippet.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/jquery/jquery.muonmenu.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/script.js"></script>
	
	<script>
		var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']]; // Change UA-XXXXX-X to be your site's ID
		(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
		g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
		s.parentNode.insertBefore(g,s)}(document,'script'));
	</script>

	<script type="text/javascript">
	$(document).ready(function() {
	   $("#column_check").removeClass('sorting_asc');
	   $("#column_edit").removeClass('sorting');
	   $("#column_delet").removeClass('sorting');
	 });
	</script>
</body>
</html>