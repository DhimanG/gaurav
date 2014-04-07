<script type="text/javascript">
$(function() {
  $('.nyroModal').nyroModal();
});
</script>

<script>
function deleteConfirm(url)
 {
 	if(confirm('Do you want to Delete?'))
 	{
 		window.location.href=url;
 	}
}
</script>
<?php
	if ($this->session->flashdata('success')){ 
	?>
	<div class="success">
		<p><?php echo $this->session->flashdata('success') ?></p>
	</div>
	<?php
	}
?>
<?php
	if ($this->session->flashdata('error')){ 
	?>
	<div class="success">
		<p><?php echo $this->session->flashdata('error') ?></p>
	</div>
	<?php
	}
?>
<div class="mutual_fund">
	<ul>
		<?php
		if($portfolioDetails){
			foreach($portfolioDetails as $portfolio){	
			
			
			$percentage	= ($fundNavPriceArr[$portfolio['portfolioMutualFundId']] - $portfolio['portfolioPurchaseNAV']) / $portfolio['portfolioPurchaseNAV']; 	
			
			$purchasedPrice	= $portfolio['portfolioUnits']* $portfolio['portfolioPurchaseNAV'];
			
			$currentPrice	= $portfolio['portfolioUnits']* $fundNavPriceArr[$portfolio['portfolioMutualFundId']];

			$profitLoss	= $currentPrice - $purchasedPrice;
		?>
		<li>
			<div class="data">
				<table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
				  <tbody><tr>
					<td class="heading"><?php echo $fundDetails[$portfolio['portfolioMutualFundId']]; ?></td>
				  </tr>
				  <tr>
					<td valign="top" align="left" class="main_tab">
						<table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
						  <tbody><tr>
							<td valign="top" align="left" class="pur">Purchase - # Units</td>
							<td valign="top" align="left" class="now">Now - NAV</td>
							<td valign="top" align="left" class="prof-loss">Profit / Loss - Value</td>
							<td valign="top" align="left" class="divider">|</td>
							<td valign="top" align="left" class="per">%</td>
						  </tr>
						  <tr>
							 <td valign="top" align="left" class="d-pur"><?php echo $portfolio['portfolioUnits']; ?></td>
							<td valign="top" align="left" class="d-now"><?php //echo $portfolio['portfolioPurchaseNAV']; 
								echo $fundNavPriceArr[$portfolio['portfolioMutualFundId']];
							?></td>
							<td valign="top" align="left" class="d-prof-loss"><?php echo $profitLoss."  ".((trim(substr($profitLoss,0,1)) == '-') ? '(loss)' : '(profit)' )?></td>
							<td valign="top" align="left" class="d-divider">-</td>
							<td valign="top" align="left" class="d-per"><?php echo  round($percentage, 3); ?></td>
						  </tr>
						</tbody></table>
					</td>
				  </tr>
				</tbody></table>
			</div>
			<div class="buttons">
				<ul>
					<li><button href="<?php echo site_url()."mutual/detail/".$portfolio['portfolioId'];?>" class="butt nyroModal"><span>View</span></button></li>
					<li><button onclick="window.location.href='<?php echo site_url("/mutual/edit/". $portfolio['portfolioId']); ?>'" class="butt"><span>Edit</span></button></li>
					<li><button onclick="javascript: deleteConfirm('<?php echo site_url("/mutual/delete/". $portfolio['portfolioId']); ?>');" class="butt"><span>Delete</span></button></li>
				</ul>
			</div>
		</li>
		<?php 
			}
		}
		else
		{ ?>
			<li>
				<div class="img"></div>
				<div class="cont">
					<h1>No Data Uploaded Yet.</h1>
				</div>
			</li>
		<?php }
		?>
	</ul>
</div>
<div class="bot_but">
	<button onclick="window.location.href='<?php echo site_url("/mutual/add"); ?>'" class="right_but">
		<span>Add Portfolio</span>
	</button>
</div>