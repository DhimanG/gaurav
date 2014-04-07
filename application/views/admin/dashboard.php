<script src="<?php echo base_url(); ?>public/admin/js/jquery/jquery.nyromodal.min.js"></script>
<!-- Nav Shortcuts -->
<ul class="shortcuts">
	<li class="shortcut-administrator"><a title="" href="<?php echo site_url("admin/adminstrator"); ?>">Administrator</a></li>
	<li class="shortcut-user"><a title="" href="<?php echo site_url("admin/user"); ?>">Users</a></li>
	<li class="shortcut-country"><a title="" href="<?php echo site_url("admin/country"); ?>">Country</a></li>
	<li class="shortcut-news"><a title="" href="<?php echo site_url("admin/newsfeed"); ?>">News Feeds</a></li>
	<li class="shortcut-banner"><a title="" href="<?php echo site_url("admin/banner"); ?>">Banners</a></li>
	<li class="shortcut-document"><a title="" href="<?php echo site_url("admin/category"); ?>">Document Category</a></li>
	<li class="shortcut-mutualcompany"><a title="" href="<?php echo site_url("admin/mutual/listcompany"); ?>">Companies</a></li>
	<li class="shortcut-mutual"><a title="" href="<?php echo site_url("admin/mutual/listfund"); ?>">Mutual Funds</a></li>
	<li class="shortcut-cms"><a title="" href="<?php echo site_url("admin/cms"); ?>">CMS</a></li>
	<li class="shortcut-g_admin"><a title="" href="<?php echo site_url("admin/g_admin/g"); ?>">Admin</li>
</ul>
<!-- /Nav Shortcuts -->
<script>
$(document).ready(function(){ // jQuery DOM ready function.
	$("#cmbData").val('<?php echo $selectedValue;?>').attr('selected',true);
});
</script>
<br/>
<br/>
<br/>
<style>
select {
    margin-top: -25px;
    padding: 8px;
    color: #000000;
    border : 1px solid #A2A2A2;
}
</style>
<article class="content-box minimizer">
	<header>
		<h2>Payment History</h2>
		<nav>
			<?php 
				$attributes = array('id' => 'frmDashboard','name' => 'frmDashboard');
				echo form_open('admin/dashboard',$attributes);
						
				$cmbData['week'] = 'Weekly';
				$cmbData['month'] = 'Monthly';
				$cmbData['quater'] = 'Quaterly';
				$cmbData['year'] = '1 Yearly';
				
				$dataCategory = "id='cmbData' onchange='javascript:frmDashboard.submit();'";
				echo form_dropdown('cmbData', $cmbData,'',$dataCategory);
				echo form_close();
			?>
		</nav>
	</header>
	<section>
		<!-- Tab Content #tab1 -->
		<div class="tab default-tab" id="tab1">
			<h3>Payment from <?php echo $fromDate." to ".$toDate; ?></h3>
			<!-- Sample Data table for jQuery Visualize plugin. Use attribute chart-type for different visualization -->
			<table class="data" data-chart="line">
				<thead>
					<!--<tr>
						<td></td>
						<th scope="col">food</th>
						<th scope="col">auto</th>
						<th scope="col">household</th>
						<th scope="col">furniture</th>
						<th scope="col">kitchen</th>
						<th scope="col">bath</th>
					</tr>-->
					<tr>
						<td></td>
						<?php foreach($date as $key) { ?>
							<th scope="col"><?php echo $key; ?></th>
						<?php } ?>
					</tr>
				</thead>
				<tbody>
					<!--<tr>
						<th scope="row">Kate</th>
						<td>40</td>
						<td>80</td>
						<td>90</td>
						<td>25</td>
						<td>15</td>
						<td>119</td>
						<tr>-->
						<th scope="row">INR</th>
						<?php foreach($amount as $key) { ?>
							<td><?php echo $key; ?></td>
						<?php } ?>
					</tr>
					</tr>
				</tbody>
			</table>
			<!-- /Sample Data -->
		</div>
		<!-- /Tab Content #tab1 -->
	</section>
<!-- /Main Content -->