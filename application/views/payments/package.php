<script type="text/javascript">
	$(document).ready(function(){
		$("#req_frm").validate()

		$('#req_frm').submit(function() {
			if(!($('input[name=txtTxnAmount]:checked').val())){
				alert('Please Select Package');
				return false;
			}
			
		});
	})

	
</script>

<?php
	 if ($this->session->flashdata('error')){ 
?>
	<!-- Notification -->
	<div class="errormsg">
		<p> <?php echo $this->session->flashdata('error'); ?></p>
	</div>
	<!-- /Notification -->
<?php } ?>
<div id="payment">
	<!-- <ul>
		<li class="heading">Payment</li>
		<li class="subheading">Package</li>
		<li class="radio"><input type="radio" value="" name=""> <span>Package name</span></li>
		<li class="subheading">Payment gateway</li>
		<li class="radio"><input type="radio" value="" name=""> <span>Paypal</span></li>
		<li class="subheading">Terms &amp; Condition</li>
		<li class="radio"><input type="checkbox" value="" name=""><span>Accept</span></li>
		<li class="submit"><input type="button" value="Submit" name=""></li>
	</ul> -->
	<form name="req_frm" action="<?php echo site_url('payments'); ?>" method="post" id="req_frm">
<input type="hidden" name="action" value="process">
<p>&nbsp;</p>
<br>
<table align="center" border="0">
	
	<input type="hidden" name="txtTranID" value="1" />
	<input type="hidden" name="txtMarketCode" value="T1998" />
	<input type="hidden" name="txtAcctNo" value="1" />
	<input type="hidden" name="txtBankCode" value="NA" />
	<!-- <tr>
		<td>Txn Amount</td>
		<td><input type="hidden" name="txtTxnAmount" value="250"/></td>
	</tr> -->
	<tr>
		<td><h1>Please Select the Package</h1></td>
	</tr>
	<tr>
		<!-- <td>Payment Type</td>	 -->	
		<td><!-- <select name="txtTxnAmount" id="txtTxnAmount"> -->
				<ul>
				<?php if($arrUser){?>
				<li class="radio"><input type="radio" value="0" name="txtTxnAmount" class="requried" checked> <span>Trial period for 30 days(Free)</span></li>
				<?php } ?>
				<?php foreach($paymentDetails as $payment){
				?>
				<li class="radio"><input class="requried" type="radio" value="<?php echo $payment['amount']; ?>" name="txtTxnAmount"> <span><?php echo $payment['name']; ?> (Rs <?php echo $payment['amount']; ?> ) </span></li>

				<?php } ?>
				</ul>
				
			<!-- </select> -->

		</td>
	</tr>
	
</table>
<table align="center">
	<tr>
		<td><input type="submit" name="proceed" value="Proceed"/></td>
	</tr>
</table>
</form>
</div>


