<link rel="stylesheet" href="<?php echo site_url(); ?>public/datepicker/base/jquery.ui.all.css">
<script type="text/javascript" src="<?php echo site_url(); ?>public/datepicker/jquery.ui.core.js"></script>
<script type="text/javascript" src="<?php echo site_url(); ?>public/datepicker/jquery.ui.widget.js"></script>
<script type="text/javascript" src="<?php echo site_url(); ?>public/datepicker/jquery.ui.datepicker.js"></script>
<link rel="stylesheet" href="<?php echo site_url(); ?>public/datepicker/datepicker.css">
<script>
/*
It is given in AJAX file.,
$(function() {
$( "#documentExpiryDate" ).datepicker({
	dateFormat: "yy-mm-dd",
	//showOn: "button",
	// buttonImage: "<?php echo site_url(); ?>public/images/calendar.gif"
});

});*/
</script>

<script>
var myStartDate = new Date() ;
$(function() {
	$( "#documentExpiryDate" ).datepicker({
		dateFormat: "yy-mm-dd",
		minDate: myStartDate,
		changeMonth: true,
		changeYear: true
		//showOn: "button",
		// buttonImage: "http://safedoc.phpdevelopment.co.in/public/images/calendar.gif"
	});
	$( "#documentAlertDate" ).datepicker({
		dateFormat: "yy-mm-dd",
		minDate: myStartDate,
		changeMonth: true,
		changeYear: true
		//showOn: "button",
		// buttonImage: "http://safedoc.phpdevelopment.co.in/public/images/calendar.gif"
	});
	
});
$(document).ready(function(){
	$("#documentAlertMe").change(function(){
		if($('#documentAlertMe').attr('checked'))
		{	//alert("check");
			$('#AlertMe').show();
		}else
		{	//alert("UN check");
			$('#AlertMe').hide();
		}
	});
});
</script>

<script type="text/javascript">
function getContent(obj){
	var dataString = 'id='+obj.value; 
	var urlstring = "<?php echo site_url() ?>"+'documents/ajaxContent/'; 
	$.ajax({ type:'POST', 
		url:urlstring, 
		data:dataString,
		success:function(data) { 
			$('#showContent').html(data); 
		} 
	});

}

$(document).ready(function(){ // jQuery DOM ready function.
	
	$("#frmDocuments").validate();
	
	$('#documentCategoryId').change(function(){
		var catid = $('#documentCategoryId').val();
		if(catid=='4' || catid=='5' || catid=='6')
		{
			$('#Certificates').show();
			$('#Pancard').hide();
		}
		else if(catid=='9')
		{
			$('#Certificates').hide();
			$('#Pancard').show();
		}else
		{
			$('#Certificates').hide();
			$('#Pancard').show();
		}
	});
});

/*function submitForm()
{
	catid = $('#documentCategoryId').val();

 	if(catid=='4' || catid=='5' || catid=='6')
	{
		$('#documentNumber').removeClass('required');
		
	}
	if(catid=='9')
	{
		$('#documentName').removeClass('required');
		$('#documentYearPassing').removeClass('required');
		$('#documentSubjectName').removeClass('required');
		$('#documentBoard').removeClass('required');
		$('#documentMarks').removeClass('required');
		$('#documentPercentage').removeClass('required');
		$('#documentRemarks').removeClass('required');		
	}
	
	$('#frmDocuments').submit();
}*/
</script>

<?php
	$attributes = array('id' => 'frmDocuments');
	echo form_open_multipart('documents/add/',$attributes);?>
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
			<li class="image_upload">
				<label for="documentImage">Upload a Image :</label>
				<?php
					$dataImage = array(
					  'name'        => 'documentImage',
					  'id'          => 'documentImage',
					  'class'		=> 'small',
					);
					echo form_upload($dataImage);
				?>
				<!--<input type="text" name="">
				<button>Browse</button>-->
			</li>
			<li>
				<label for="documentCategoryId">Category :</label>
				<?php
					$dataCategory = "id=documentCategoryId, onchange=getContent(this);";
					echo form_dropdown('documentCategoryId', $catDetails,'',$dataCategory);
				?>
			</li>
			<div id='showContent'>			
				<li>
					<label for="documentName">Document Name :</label>
					<?php
						$dataName = array(
						  'name'        => 'documentName',
						  'id'          => 'documentName',
						  'class'		=> 'small required',
						);
						echo form_input($dataName);
					?>
				</li>
				<li class="alert">
					<label>&nbsp;</label>
					<?php
						$data = array(
							'name'        => 'documentAlertMe',
							'id'          => 'documentAlertMe',
							'value'       => 'alertMe',
							'style'       => 'margin:7px 10px;',
							);
						echo form_checkbox($data) . "Alert Me";
					?>
				</li>
				<li id="AlertMe" style="display:none;">
					<label for="documentAlertDate">Alert Date :</label>
					<?php
						$data = array(
							'name'        => 'documentAlertDate',
							'id'          => 'documentAlertDate',
							'value'       =>  date('Y-m-d'),
							);
					echo form_input($data);
					?>
				</li>
			</div> <!-- showContent Ends here -->
		</ul>
	</div>
	<div class="bot_but">
		<div class="left_but">
       <?php
       		$dataSubmit = array(
			  'name'        => 'cmdSubmit',
			  'id'          => 'cmdSubmit',
			  'class'		=> 'left_but',
			  'style'		=> 'color:#FFFFFF;text-align:left;'
			);
       		echo form_submit($dataSubmit, 'Add Document');
       	 ?>
       	 </div>
       <!--	<button class="left_but" id="cmdSubmit" name="cmdSubmit"><span>Email your Documents</span></button>-->
    </div>
<?php echo form_close(); ?>