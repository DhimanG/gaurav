<link rel="stylesheet" href="<?php echo site_url(); ?>public/datepicker/base/jquery.ui.all.css">
<script type="text/javascript" src="<?php echo site_url(); ?>public/datepicker/jquery.ui.core.js"></script>
<script type="text/javascript" src="<?php echo site_url(); ?>public/datepicker/jquery.ui.widget.js"></script>
<script type="text/javascript" src="<?php echo site_url(); ?>public/datepicker/jquery.ui.datepicker.js"></script>
<link rel="stylesheet" href="<?php echo site_url(); ?>public/datepicker/datepicker.css">
<script>

$(function() {
$( "#portfolioPurchaseDate" ).datepicker({
	dateFormat: "yy-mm-dd",
	changeMonth: true,
	changeYear: true
	//showOn: "button",
	// buttonImage: "<?php echo site_url(); ?>public/images/calendar.gif"
});

});
</script>
	
<script type="text/javascript">
function getMutualFund(obj){
	var value = obj.value;
	if(dataString!='0'){
		var dataString = 'id='+obj.value;
		var urlstring = "<?php echo site_url() ?>"+'mutual/ajaxMutualFund/'; 
		$.ajax({ type:'POST', 
			url:urlstring, 
			data:dataString,
			success:function(data) { 
				$('#showFund').html(data); 
			} 
		});
	}
}

$(document).ready(function(){ // jQuery DOM ready function.
	$("#frmMutual").validate();
});

$(document).ready(function() {
    $('input[type=radio]').live('change', function() { 
		var val	= $(this).val();
		if(val == 1){
			$('#notifybyprice').css('display','none');
			$('#notifybypercentage').css('display','block');
			$('#increasePrice').val('');
			$('#increasePrice').removeClass('error required number');
			
		}

		if(val == 0){
			$('#notifybyprice').css('display','block');
			$('#notifybypercentage').css('display','none');
			$('#portfolioNotifyPercentIncrease').val('');
			$('#increasePrice').addClass('required number');
			
		}
	});
});

</script>

<?php
	$attributes = array('id' => 'frmMutual');
	echo form_open_multipart('mutual/add/',$attributes);?>
	<?php 
		 if ($this->session->flashdata('error')){ 
	?>
		<!-- Notification -->
		<div class="errormsg">
			<p> <?php echo $this->session->flashdata('error'); ?></p>
		</div>
		<!-- /Notification -->
	<?php
	}
	?>
	<div class="doc_edit">
		<ul>
			<li>
				<label for="portfolioMutualCompanyId">Company :</label>
				<?php
					$dataCompany = "id=portfolioMutualCompanyId class='required', onchange=getMutualFund(this);";
					echo form_dropdown('portfolioMutualCompanyId', $companyDetails,'',$dataCompany);
				?>
			</li>
			<div id='showFund'>  <!-- showContent Start here -->
				<li>
					<label for="portfolioMutualFundId">Fund :</label>
					<?php
						$dataFund = "id=portfolioMutualFundId class='required'";
						echo form_dropdown('portfolioMutualFundId', $fundDetails,'',$dataFund);
					?>
				</li>
			</div>
				<li>
					<label for="portfolioUnits">Units Purchased :</label>
					<?php
						$dataName = array(
						  'name'        => 'portfolioUnits',
						  'id'          => 'portfolioUnits',
						  'class'		=> 'small required number',
						);
						echo form_input($dataName);
					?>
				</li>
				<li>
					<label for="portfolioPurchaseDate">Date Of Purchase :</label>
					<?php 
						$portfolioPurchaseDate = array(
						  'name'        => 'portfolioPurchaseDate',
						  'id'          => 'portfolioPurchaseDate',
						  'class'		=> 'small required',
						  'value'		=>	date('Y-m-d'),
						);
						echo form_input($portfolioPurchaseDate);
					?>
				</li>
				<li>
					<label for="portfolioPurchaseNAV">NAV When Purchase :</label>
					<?php 
						$portfolioPurchaseNAV = array(
						  'name'        => 'portfolioPurchaseNAV',
						  'id'          => 'portfolioPurchaseNAV',
						  'class'		=> 'small required number',
						);
						echo form_input($portfolioPurchaseNAV);
					?>
				</li>
				
				<li>
					<label for="radioNotify">Notify me By :</label>
					<div class="notify">
						<div class="rad_but"><input type="radio" name="radioNotify" id="radioNotify" value="0" /><p>Price </p></div>
						<div class="rad_but"><input type="radio" name="radioNotify" id="radioNotify" value="1" /><p>Percentage</p></div>
					</div>
				</li>
				
				<li id="notifybyprice" style="display:none">
					<label for="increasePrice">Notify Me when Price Increase by :</label>
					<?php 
						$increasePrice = array(
						  'name'        => 'increasePrice',
						  'id'          => 'increasePrice',
						  'class'		=> 'small required number',
						);
						echo form_input($increasePrice);
					?>
				</li>
				<li id="notifybypercentage" style="display:none">
					<label for="portfolioNotifyPercentIncrease">Notify Me when Price Increase by :</label>
					<?php 
						$percentage = array(
								''  => '---',
								'10'  => '10%',
								'20'  => '20%',
								'30'  => '30%',
								'40'  => '40%',
								'50'  => '50%',
								'60'  => '60%',
								'70'  => '70%',
								'80'  => '80%',
								'90'  => '90%',
								'100'  => '100%',
								'101'  => 'Above 100%',
						);
						$dataCompany = "id=portfolioNotifyPercentIncrease";
						echo form_dropdown('portfolioNotifyPercentIncrease', $percentage,'',$dataCompany);
					?>
				</li>
			</div> <!-- showContent Ends here -->
		</ul>
	<div class="bot_but">
		<div class="left_but">
       <?php
       		$dataSubmit = array(
			  'name'        => 'cmdSubmit',
			  'id'          => 'cmdSubmit',
			  'class'		=> 'left_but',
			  'style'		=> 'color:#FFFFFF;text-align:left;'
			);
       		echo form_submit($dataSubmit, 'Add Portfolio');
       	?>
       	</div>
    </div>
<?php echo form_close(); ?>