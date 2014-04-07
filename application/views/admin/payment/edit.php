<script type="text/javascript">
$(document).ready(function(){ // jQuery DOM ready function.
  $("#frmpayment").validate({
		
		rules: {
			password: {
				required: true,
			},
			confirm_password: {
				required: true,
				equalTo: "#password"
			},
		},

		messages: {
			password: {

			},
			confirm_password: {
				equalTo: "Please enter the same password as above"
			},
		}

	});
});
</script>

<?php
	if ($this->session->flashdata('error')){ 
	?>
	<!-- Notification -->
	<div class="notification error">
		<a href="#" class="close-notification tooltip" title="Hide Notification">x</a>
		<h4>Error</h4>
		<p><?php echo $this->session->flashdata('error'); ?></p>
	</div>
	<!-- /Notification -->
	<?php
	}
?>

<article class="content-box minimizer">
	
	<header>
				
		<h2 style="pediting-right: 90px;">Payment </h2>
		<nav>
			<ul class="button-switch">
				<li><a class="button" href="<?php echo site_url("admin/payment/"); ?>">List Payment </a></li>
			</ul>
		</nav>
		<a title="Toggle Content Block" class="content-box-minimizer" href="#" style="display: block; left: 324px;">Toggle</a>
	</header>

	<section>
	
	<?php
	$attributes = array('id' => 'frmpayment');

	echo form_open('admin/payment/edit/'.$paymentDetails[0]['payment_details_id'],$attributes);

	echo form_fieldset('Edit Payment ');


	$datapaymentname = array(
		  'name'        => 'paymentname',
		  'id'          => 'paymentname',
		  'class'		=> 'small required',
		  'value'		=> $paymentDetails[0]['name']
		);
	
	$dataamount = array(
		  'name'        => 'amount',
		  'id'          => 'amount',
		  'class'		=> 'small required number',
		  'value'		=> $paymentDetails[0]['amount']
		);
	
	$dataperiod = array(
		  'name'        => 'period',
		  'id'          => 'period',
		  'class'		=> 'small required',
		  'value'		=> $paymentDetails[0]['period']
		);
	
	?>
	<dl>
		<dt>
			<label>Payment  Name</label>
		</dt>
		<dd>
			
			<?php echo form_input($datapaymentname); ?>
		</dd>
		
		<dt>
			<label>Amount</label>
		</dt>
		<dd>
			
			<?php echo form_input($dataamount); ?>
		</dd>

		<dt>
			<label>Period</label>
		</dt>
		<dd>
			
			<?php echo form_input($dataperiod); ?>
		</dd>

	</dl>	
	<?php

	echo form_fieldset_close(); 
	echo form_submit('cmdSubmit', 'Edit Payment ');
	echo form_close();
	?>
	</section>
</article>