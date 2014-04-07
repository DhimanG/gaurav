<table cellspacing="2" cellpadding="2" border="1" style="border-collapse:collapse;">
	<tbody>
	<?php if(!$paymentHistory){?>
		<tr>
			<td> No payment made yet.</td>
		</tr>
	<?php }else{ ?>
		<tr style="margin:20px 0px;">
			<td align="center">Payment Information</td>
		</tr>
		<tr>
			<td style="text-align:left;">Amount : <?php echo $paymentHistory[0]['paymentAmount'];?></td>
		</tr>
		<tr>
			<td style="text-align:left;">Date : <?php echo $paymentHistory[0]['paymentCreatedOn'];?></td>
		</tr>
	<?php } ?>
	</tbody>
</table>