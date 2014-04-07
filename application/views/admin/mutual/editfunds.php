<script type="text/javascript">
$(document).ready(function(){ // jQuery DOM ready function.
  $("#frmFund").validate();
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
				
		<h2 style="padding-right: 90px;">Mutual Fund</h2>
		<nav>
			<ul class="button-switch">
				<li><a class="button" href="<?php echo site_url("admin/mutual/listfund"); ?>">List Mutual Fund</a></li>
			</ul>
		</nav>
		<a title="Toggle Content Block" class="content-box-minimizer" href="#" style="display: block; left: 324px;">Toggle</a>
	</header>

	<section>
	
	<?php
	$attributes = array('id' => 'frmFund');

	echo form_open('admin/mutual/editfund/'. $arrFund[0]['mutualfundsId'],$attributes);
	echo form_fieldset('Update Mutual Fund');
	
	$mutualfundsName = array(
		  'name'        => 'mutualfundsName',
		  'id'          => 'mutualfundsName',
		  'class'		=> 'small required',
		  'value'		=> $arrFund[0]['mutualfundsName'],
		);

	$mutualfundsCode = array(
		  'name'        => 'mutualfundsCode',
		  'id'          => 'mutualfundsCode',
		  'class'		=> 'small required',
		  'value'		=> $arrFund[0]['mutualfundsCode'],
		);

	$mutualfundsNAV = array(
		  'name'        => 'mutualfundsNAV',
		  'id'          => 'mutualfundsNAV',
		  'class'		=> 'small number',
		  'value'		=> $arrFund[0]['mutualfundsNAV'],
		);

	$mutualfundsRepurchasePrice = array(
		  'name'        => 'mutualfundsRepurchasePrice',
		  'id'          => 'mutualfundsRepurchasePrice',
		  'class'		=> 'small number',
		  'value'		=> $arrFund[0]['mutualfundsRepurchasePrice'],
		);

	$mutualfundsSalesPrice = array(
		  'name'        => 'mutualfundsSalesPrice',
		  'id'          => 'mutualfundsSalesPrice',
		  'class'		=> 'small number',
		  'value'		=> $arrFund[0]['mutualfundsSalesPrice'],
		);
	
	$mutualfundsupadtedDate = array(
		  'name'        => 'mutualfundsupadtedDate',
		  'id'          => 'mutualfundsupadtedDate',
		  'class'		=> 'small datepicker',
		  'value'		=> date("m\/d\/Y",strtotime($arrFund[0]['mutualfundsUpdateDate']))
		);

	?>
	<dl>
		<dt>
			<label></label>Mutual Company</label>
		</dt>
		<dd>
			<?php
				$dataCompany = "id=mutualfundsCompanyId";
				echo form_dropdown('mutualfundsCompanyId', $company, $arrFund[0]['mutualfundsCompanyId']);
			?>
		</dd>
	</dl>	
	<dl>
		<dt>
			<label></label> Name</label>
		</dt>
		<dd>
			<?php echo form_input($mutualfundsName); ?>
		</dd>
	</dl>	
	<dl>
		<dt>
			<label></label> Code</label>
		</dt>
		<dd>
			<?php echo form_input($mutualfundsCode); ?>
		</dd>
	</dl>	
	<dl>
		<dt>
			<label></label> NAV</label>
		</dt>
		<dd>
			<?php echo form_input($mutualfundsNAV); ?>
		</dd>
	</dl>	
	<dl>
		<dt>
			<label></label> Re-purchased Price</label>
		</dt>
		<dd>
			<?php echo form_input($mutualfundsRepurchasePrice); ?>
		</dd>
	</dl>	
	<dl>
		<dt>
			<label></label> Sale Price</label>
		</dt>
		<dd>
			<?php echo form_input($mutualfundsSalesPrice); ?>
		</dd>
	</dl>	
	<dl>
		<dt>
			<label></label> Funds Updated Date</label>
		</dt>
		<dd>
			<?php echo form_input($mutualfundsupadtedDate); ?>
		</dd>
	</dl>
	<?php

	echo form_fieldset_close(); 
	echo form_submit('cmdSubmit', 'Update Mutual Fund');
	echo form_close();
	?>
	</section>
</article>