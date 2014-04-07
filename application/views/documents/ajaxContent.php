<?php

if($parentId == '2' || $id == '2' )
{
// Making change here.. in this condition,
// Need to reflect in adddocument.php too
?>
	<li>
		<label for="documentName">Name as on the certificate  :</label>
		<?php
			$dataName = array(
			  'name'        => 'documentName',
			  'id'          => 'documentName',
			  'class'		=> 'small required',
			);
			echo form_input($dataName);
		?>
	</li>
	<li>
		<label for="documentYearPassing">Year of Passing  :</label>
		<?php 
			$dataYearPassing = array(
			  'name'        => 'documentYearPassing',
			  'id'          => 'documentYearPassing',
			  'class'		=> 'small required',
			);
			echo form_input($dataYearPassing);
		?>
	</li>
	<li>
		<label for="documentSubjectName">Subject Name  :</label>
		<?php 
			$dataSubjectName = array(
			  'name'        => 'documentSubjectName',
			  'id'          => 'documentSubjectName',
			  'class'		=> 'small required',
			);
			echo form_input($dataSubjectName);
		?>
	</li>
	<li>
		<label for="documentBoard">Name of the Board  :</label>
		<?php 
			$dataBoard = array(
			  'name'        => 'documentBoard',
			  'id'          => 'documentBoard',
			  'class'		=> 'small required',
			);
			echo form_input($dataBoard);
		?>
	</li>
	<li>
		<label for="documentMarks">Total Marks  :</label>
		<?php 
			$dataMarks = array(
			  'name'        => 'documentMarks',
			  'id'          => 'documentMarks',
			  'class'		=> 'small required',
			);
			echo form_input($dataMarks);
		?>
	</li>
	<li>
		<label for="documentPercentage">Percentage of marks obtained(Total)  :</label>
		<?php 
			$dataPercentage = array(
			  'name'        => 'documentPercentage',
			  'id'          => 'documentPercentage',
			  'class'		=> 'small required',
			);
			echo form_input($dataPercentage);
		?>
	</li>
	<li>
		<label for="documentRemarks">Remarks  :</label>
		<?php 
			$dataRemarks = array(
			  'name'        => 'documentRemarks',
			  'id'          => 'documentRemarks',
			  'class'		=> 'small required',
			);
			echo form_input($dataRemarks);
		?>
	</li>
<?php
}else if($parentId == '3') { ?>
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
	<li>
		<label for="documentNumber"> <?php if($id=='7') echo "Passport Number :"; else if($id=='8') echo "Driving License Number :"; else  echo "Pan card Number :";?></label>
		<?php
			$dataPancard = array(
			  'name'        => 'documentNumber',
			  'id'          => 'documentNumber',
			  'class'		=> 'small required',
			);
			echo form_input($dataPancard);
		?>
	</li>
	<?php if($id != '9'){
		
		if($id=='7')
			echo form_hidden('documentName', 'Passport');
		else
			echo form_hidden('documentName', 'Driving License');
	?>
		<li>
		<label for="documentExpiryDate">Expiry Date  :</label>
		<?php
			$dataPancard = array(
			  'name'        => 'documentExpiryDate',
			  'id'          => 'documentExpiryDate',
			  'class'		=> 'small required',
			  'readonly'	=> 'readonly',
			  'value'		=> date('Y-m-d'),
			);
			echo form_input($dataPancard);
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
		<label for="documentAlertDate">Alert Date  :</label>
		<?php
			$data = array(
			    'name'        => 'documentAlertDate',
			    'id'          => 'documentAlertDate',
			    'value'       =>  date('Y-m-d'),
			    );
		echo form_input($data);
		?>
	</li> 
	
	<?php }
		else
			echo form_hidden('documentName', 'Pan Card');
	?>

<?php }
else if($parentId =='0' && $id != '2' ) {
?>
<script>
$(function() {
	$( "#documentExpiryDate" ).datepicker({
		dateFormat: "yy-mm-dd",
		changeMonth: true,
		changeYear: true
		//showOn: "button",
		// buttonImage: "http://safedoc.phpdevelopment.co.in/public/images/calendar.gif"
	});
	$( "#documentAlertDate" ).datepicker({
		dateFormat: "yy-mm-dd",
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
	<li>
		<label for="documentName">Document Name  :</label>
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
		<label for="documentAlertDate">Alert Date  :</label>
		<?php
			$data = array(
			    'name'        => 'documentAlertDate',
			    'id'          => 'documentAlertDate',
			    'value'       =>  date('Y-m-d'),
			    );
		echo form_input($data);
		?>
	</li>
<?php
}else{
?>
<script>
$(function() {
	$( "#documentExpiryDate" ).datepicker({
		dateFormat: "yy-mm-dd",
		changeMonth: true,
		changeYear: true
		//showOn: "button",
		// buttonImage: "http://safedoc.phpdevelopment.co.in/public/images/calendar.gif"
	});
	$( "#documentAlertDate" ).datepicker({
		dateFormat: "yy-mm-dd",
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
	<li>
		<label for="documentName">Document Name  :</label>
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
		<label for="documentAlertDate">Alert Date  :</label>
		<?php
			$data = array(
			    'name'        => 'documentAlertDate',
			    'id'          => 'documentAlertDate',
			    'value'       =>  date('Y-m-d'),
			    );
		echo form_input($data);
		?>
	</li>
<?php
}
?>