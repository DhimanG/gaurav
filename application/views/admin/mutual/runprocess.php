<script>
 function deleteConfirm(url)
 {
 	if(confirm('Do you want to run Process Manually?'))
 	{
 		window.location.href=url;
 	}
 }
</script>
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
	if ($this->session->flashdata('error')){ 
	?>
	<div class="notification error">
			<a title="Hide Notification" class="close-notification tooltip" href="#">x</a>
			<h4>Error</h4>
			<p><?php echo $this->session->flashdata('error') ?></p>
	</div>
	<?php
	}
?>
<article class="content-box minimizer">
	<header>
		<h2>Run Process</h2>
	</header>
	<section>	
		<h3 class="bb">Mutual Funds NAV Update Process</h3>		
		<p>The process will update the following fields from http://www.amfiindia.com/spages/NAV1.txt.</p>
			<p>1. NAV</p>
			<p>2. Re-purchased Price</p>
			<p>3. Sale Price</p>
			<p>4. Funds Updated Date</p>
		<p>
			This process will run from cron everyday at specific time, but in case failure of the process Administrator can tun it manually.
		</p>
		<a class="button stats-view" href="#" onclick="javascript : deleteConfirm('<?php echo site_url("admin/mutual/readtxt/"); ?>');">Run Process</a>
	</section>
</article>