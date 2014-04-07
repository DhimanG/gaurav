<script>
$(document).ready(function(){ // jQuery DOM ready function.
	
	$("#frmDocuments").validate();
	
});
</script>
<?php
if ($documentDetailsArr) {
	
$attributes = array('id' => 'frmDocuments');
echo form_open_multipart('documents/edit/'.$documentDetailsArr[0]['documentId'],$attributes);?>
<?php 
	 if ($this->session->flashdata('error')){ 
?>
	<!-- Notification -->
	<div class="errormsg">
		<p> <?php echo $this->session->flashdata('error'); ?></p>
	</div>
	<!-- /Notification -->
<?php } ?>
<div class="doc_edit">
	<div class="details">
    	<div class="img"><img height="119" width="180" alt="" src="<?php echo site_url()."public/upload/user".$this->session->userdata('userid')."/documents/thumb/".$documentDetailsArr[0]['documentImage'];?>"></div>
        <div class="head"><?php echo $categoryDetail[0]['docCategoryName']; ?></div>
    </div>
    <ul>
    	<li class="image_upload">
			<label>Upload a Image :</label>
			<?php
				$dataImage = array(
				  'name'        => 'documentImage',
				  'id'          => 'documentImage',
				  'class'		=> 'small',
				);
				echo form_upload($dataImage);
			?>
		</li>
		<?php if($parentId == '2' || $documentDetailsArr[0]['documentCategoryId'] == '2' )
		{ ?>
	    	<li>
				<label for="documentName">Name as on the certificate :</label>
				<?php
					$dataName = array(
					  'name'        => 'documentName',
					  'id'          => 'documentName',
					  'class'		=> 'small required',
					  'value'		=> $documentDetailsArr[0]['documentName'],
					);
					echo form_input($dataName);
				?>
			</li>
			<li>
				<label for="documentYearPassing">Year of Passing :</label>
				<?php 
					$dataYearPassing = array(
					  'name'        => 'documentYearPassing',
					  'id'          => 'documentYearPassing',
					  'class'		=> 'small required',
					  'value'		=> $documentDetailsArr[0]['documentYearPassing'],
					);
					echo form_input($dataYearPassing);
				?>
			</li>
			<li>
				<label for="documentSubjectName">Subject Name :</label>
				<?php 
					$dataSubjectName = array(
					  'name'        => 'documentSubjectName',
					  'id'          => 'documentSubjectName',
					  'class'		=> 'small required',
					  'value'		=> $documentDetailsArr[0]['documentSubjectName'],
					);
					echo form_input($dataSubjectName);
				?>
			</li>
			<li>
				<label for="documentBoard">Name of the Board :</label>
				<?php 
					$dataBoard = array(
					  'name'        => 'documentBoard',
					  'id'          => 'documentBoard',
					  'class'		=> 'small required',
					  'value'		=> $documentDetailsArr[0]['documentBoard'],
					);
					echo form_input($dataBoard);
				?>
			</li>
			<li>
				<label for="documentMarks">Total Marks :</label>
				<?php 
					$dataMarks = array(
					  'name'        => 'documentMarks',
					  'id'          => 'documentMarks',
					  'class'		=> 'small required',
					  'value'		=> $documentDetailsArr[0]['documentMarks'],
					);
					echo form_input($dataMarks);
				?>
			</li>
			<li>
				<label for="documentPercentage">Percentage of marks obtained(Total) :</label>
				<?php 
					$dataPercentage = array(
					  'name'        => 'documentPercentage',
					  'id'          => 'documentPercentage',
					  'class'		=> 'small required',
					  'value'		=> $documentDetailsArr[0]['documentPercentage'],
					);
					echo form_input($dataPercentage);
				?>
			</li>
			<li>
				<label for="documentRemarks">Remarks :</label>
				<?php 
					$dataRemarks = array(
					  'name'        => 'documentRemarks',
					  'id'          => 'documentRemarks',
					  'class'		=> 'small required',
					  'value'		=> $documentDetailsArr[0]['documentRemarks'],
					);
					echo form_input($dataRemarks);
				?>
			</li>
		<?php } elseif ($parentId == '3')
		{ ?>
			<link rel="stylesheet" href="<?php echo site_url(); ?>public/datepicker/base/jquery.ui.all.css">
			<script type="text/javascript" src="<?php echo site_url(); ?>public/datepicker/jquery.ui.core.js"></script>
			<script type="text/javascript" src="<?php echo site_url(); ?>public/datepicker/jquery.ui.widget.js"></script>
			<script type="text/javascript" src="<?php echo site_url(); ?>public/datepicker/jquery.ui.datepicker.js"></script>
			<link rel="stylesheet" href="<?php echo site_url(); ?>public/datepicker/datepicker.css">
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
				<label for="documentNumber"> <?php if($documentDetailsArr[0]['documentCategoryId'] =='7') echo "Passport Number :"; else if($documentDetailsArr[0]['documentCategoryId'] =='8') echo "Driving License Number :"; else  echo "Pan card Number :";?></label>
				<?php
					$dataPancard = array(
					  'name'        => 'documentNumber',
					  'id'          => 'documentNumber',
					  'class'		=> 'small required',
					  'value'		=> $documentDetailsArr[0]['documentNumber'],
					);
					echo form_input($dataPancard);
				?>
			</li>
			<?php if($documentDetailsArr[0]['documentCategoryId'] != '9'){
		
				if($documentDetailsArr[0]['documentCategoryId'] =='7')
					echo form_hidden('documentName', 'Passport');
				else
					echo form_hidden('documentName', 'Driving License');
			?>
			<li>
				<label for="documentExpiryDate">Expiry Date :</label>
				<?php
					$dataPancard = array(
					  'name'        => 'documentExpiryDate',
					  'id'          => 'documentExpiryDate',
					  'class'		=> 'small required',
					  'readonly'	=> 'readonly',
					  'value'		=> $documentDetailsArr[0]['documentExpiryDate'],
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
					if ($documentDetailsArr[0]['documentAlertDate']!='0000-00-00') 
						$data['checked'] = TRUE;
					
					echo form_checkbox($data) . "Alert Me";
				?>
			</li>
			<li id="AlertMe" <?php if ($documentDetailsArr[0]['documentAlertDate']=='0000-00-00'){echo'style="display:none;"';}?>>
				<label for="documentAlertDate">Alert Date :</label>
				<?php
					if ($documentDetailsArr[0]['documentAlertDate']!='0000-00-00') 
						$alertDate = $documentDetailsArr[0]['documentAlertDate'];
					else
						$alertDate = date('Y-m-d');
						
					$data = array(
					    'name'        => 'documentAlertDate',
					    'id'          => 'documentAlertDate',
					    'value'		  => $alertDate,
					    );
				echo form_input($data);
				?>
			</li>
			
		<?php }
			else
				echo form_hidden('documentName', 'Pan Card');
		
		
		}  elseif ($parentId =='0' && $documentDetailsArr[0]['documentCategoryId'] != '2')
		{ ?>
			<link rel="stylesheet" href="<?php echo site_url(); ?>public/datepicker/base/jquery.ui.all.css">
			<script type="text/javascript" src="<?php echo site_url(); ?>public/datepicker/jquery.ui.core.js"></script>
			<script type="text/javascript" src="<?php echo site_url(); ?>public/datepicker/jquery.ui.widget.js"></script>
			<script type="text/javascript" src="<?php echo site_url(); ?>public/datepicker/jquery.ui.datepicker.js"></script>
			<link rel="stylesheet" href="<?php echo site_url(); ?>public/datepicker/datepicker.css">
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
					<label for="documentName">Document Name :</label>
					<?php
						$dataName = array(
						  'name'        => 'documentName',
						  'id'          => 'documentName',
						  'class'		=> 'small required',
						  'value'       =>  $documentDetailsArr[0]['documentName'],
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
						if ($documentDetailsArr[0]['documentAlertDate']!='0000-00-00'  && !is_null($documentDetailsArr[0]['documentAlertDate']) ) 
							$data['checked'] = TRUE;
						
						echo form_checkbox($data) . "Alert Me";
					?>
				</li>
		    	<li id="AlertMe" <?php if ($documentDetailsArr[0]['documentAlertDate']=='0000-00-00' || is_null($documentDetailsArr[0]['documentAlertDate'])){echo'style="display:none;"';}?>>
					<label for="documentAlertDate">Alert Date :</label>
					<?php
						if ($documentDetailsArr[0]['documentAlertDate']!='0000-00-00'  && !is_null($documentDetailsArr[0]['documentAlertDate'])) 
							$alertDate = $documentDetailsArr[0]['documentAlertDate'];
						else
							$alertDate = date('Y-m-d');
							
						$data = array(
						    'name'        => 'documentAlertDate',
						    'id'          => 'documentAlertDate',
						    'value'		  => $alertDate,
						    );
					echo form_input($data);
					?>
				</li> 
		<?php }else { ?>
			<link rel="stylesheet" href="<?php echo site_url(); ?>public/datepicker/base/jquery.ui.all.css">
			<script type="text/javascript" src="<?php echo site_url(); ?>public/datepicker/jquery.ui.core.js"></script>
			<script type="text/javascript" src="<?php echo site_url(); ?>public/datepicker/jquery.ui.widget.js"></script>
			<script type="text/javascript" src="<?php echo site_url(); ?>public/datepicker/jquery.ui.datepicker.js"></script>
			<link rel="stylesheet" href="<?php echo site_url(); ?>public/datepicker/datepicker.css">
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
					<label for="documentName">Document Name :</label>
					<?php
						$dataName = array(
						  'name'        => 'documentName',
						  'id'          => 'documentName',
						  'class'		=> 'small required',
						  'value'       =>  $documentDetailsArr[0]['documentName'],
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
						if ($documentDetailsArr[0]['documentAlertDate']!='0000-00-00'  && !is_null($documentDetailsArr[0]['documentAlertDate']) ) 
							$data['checked'] = TRUE;
						
						echo form_checkbox($data) . "Alert Me";
					?>
				</li>
		    	<li id="AlertMe" <?php if ($documentDetailsArr[0]['documentAlertDate']=='0000-00-00' || is_null($documentDetailsArr[0]['documentAlertDate'])){echo'style="display:none;"';}?>>
					<label for="documentAlertDate">Alert Date :</label>
					<?php
						if ($documentDetailsArr[0]['documentAlertDate']!='0000-00-00'  && !is_null($documentDetailsArr[0]['documentAlertDate'])) 
							$alertDate = $documentDetailsArr[0]['documentAlertDate'];
						else
							$alertDate = date('Y-m-d');
							
						$data = array(
						    'name'        => 'documentAlertDate',
						    'id'          => 'documentAlertDate',
						    'value'		  => $alertDate,
						    );
					echo form_input($data);
					?>
				</li> 
			<?php } ?>
    </ul>	
</div>
<div class="bot_but">
	<div class="left_but">
	<?php
		echo form_hidden('prev_image', $documentDetailsArr[0]['documentImage']);
		echo form_hidden('documentId', $documentDetailsArr[0]['documentId']);
		echo form_hidden('documentCategoryId', $documentDetailsArr[0]['documentCategoryId']);
		$dataSubmit = array(
		  'name'        => 'cmdSubmit',
		  'id'          => 'cmdSubmit',
		  'class'		=> 'left_but',
		  'style'		=> 'color:#FFFFFF;text-align:left;'
		);
		echo form_submit($dataSubmit, 'Update');
	?>
	</div>
</div>
<?php echo form_close();
}
else { ?>
<div class="error">
		<p> No Document Found </p>
	</div>
<?php } ?>