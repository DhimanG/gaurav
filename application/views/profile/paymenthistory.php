<div class="mutual_fund">
	<ul>
		<li style="border-bottom:none;">
			<div class="data">
		<?php
		if($paymentHistory){
		?>
		<table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
		  <tbody><tr>
			<td class="heading">Payment History</td>
		  </tr>
		  <tr>
			<td valign="top" align="left" class="main_tab">
				<table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
				  <tbody><tr>
					<td valign="top" align="left" class="pur">Amount</td>
					<td valign="top" align="left" class="now">Date</td>
				  </tr>
					<?php
						foreach($paymentHistory as $history){	?>
						
							  <tr>
								 <td valign="top" align="left" class="d-pur"><?php echo $history['paymentAmount']; ?></td>
								 <td valign="top" align="left" class="d-now"><?php echo $history['paymentCreatedOn']; ?></td>
							  </tr>
					<?php 
				} ?>
				</tbody></table>
				</td>
			  </tr>
			</tbody></table>
			<?php } ?>
			</div>
		</li>
	</ul>
</div>