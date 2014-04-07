<link href="<?php echo base_url(); ?>public/css/style_sheet.css" type="text/css" rel="stylesheet" />

<?php
	
	$notifyPercentage	= $documentDetailsArr[0]['portfolioNotifyPercentIncrease'];
    $notifyPrice		= $documentDetailsArr[0]['portfolioNotifyPrice'];

	$percentage	= ($fundNavPriceArr[$documentDetailsArr[0]['portfolioMutualFundId']] - $documentDetailsArr[0]['portfolioPurchaseNAV']) / $documentDetailsArr[0]['portfolioPurchaseNAV']; 	
	
	$purchasedPrice	= $documentDetailsArr[0]['portfolioUnits']* $documentDetailsArr[0]['portfolioPurchaseNAV'];
	
	$currentPrice	= $documentDetailsArr[0]['portfolioUnits']* $fundNavPriceArr[$documentDetailsArr[0]['portfolioMutualFundId']];

	$profitLoss	= $currentPrice - $purchasedPrice;
?>
<div class="popupdiv">

<div class="mutual_fund_details">
	<div class="details">
		<div class="head"><?php echo $fundDetails[$documentDetailsArr[0]['portfolioMutualFundId']] ?></div>
	</div>
	<ul>
		<li><span>Units Purchased :</span> <?php echo $documentDetailsArr[0]['portfolioUnits']; ?></li>
		<li><span>Date of purchase  :</span> <?php echo $documentDetailsArr[0]['portfolioPurchaseDate']; ?></li>
		<li><span>NAV When Purchase :</span>  <?php echo $documentDetailsArr[0]['portfolioPurchaseNAV']; ?> </li>
		<li><span>Value :</span> <?php echo $purchasedPrice; ?></li>
		<li><span>Current NAV :</span> <?php echo $fundNavPriceArr[$documentDetailsArr[0]['portfolioMutualFundId']]; ?> </li>
		<li><span>Current Value :</span> <?php echo $currentPrice; ?></li>
		<li><span>Notify me when Price Increase by  :</span>  <?php if($notifyPercentage != 0.00){ echo $notifyPercentage."%"; }else{ echo $notifyPrice; } ?>
			<div class="buttons">
				<ul>
					<li><button onclick="window.location.href='<?php echo site_url("/mutual/edit/". $documentDetailsArr[0]['portfolioId']); ?>'" class="butt"><span>Edit</span></button></li>
				</ul>
				
			</div>
		</li>
	</ul>	
</div>
</div>