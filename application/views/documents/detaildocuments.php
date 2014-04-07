<link href="<?php echo base_url(); ?>public/css/style_sheet.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery-1.3.1.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/js/jquery.validation.js"></script>

<script type="text/javascript">
function emailDocument(id){
	
	var emailaddress = $("#txtToEmail").val();
	
	if(emailaddress == ''){
		$("#txtToEmail").addClass('error');
		return false;
	}
	
	if( !isValidEmailAddress( emailaddress ) ){
		$("#txtToEmail").addClass('error');
		return false;	
	}

	
	var dataString = 'id='+id+'&email='+emailaddress; 
	var urlstring = "<?php echo site_url() ?>"+'documents/ajaxMailDocument/'; 
	$.ajax({ type:'POST', 
		url:urlstring, 
		data:dataString,
		success:function(data) { 
			alert(data); 
		} 
	});

}

function isValidEmailAddress(emailAddress) {
	var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
	return pattern.test(emailAddress);
};

</script>
<?php if($documentDetailsArr) {
	//echo "<pre>";
	//print_r($documentDetailsArr);
	//echo "</pre>";
?>
<div class="popupdiv">
	<div class="doc_details">
		<div class="details">
			<div class="img"><img height="119" width="180" alt="" src="<?php echo site_url()."public/upload/user".$this->session->userdata('userid')."/documents/thumb/".$documentDetailsArr[0]['documentImage'];?>"></div>
			<div class="head"><?php echo $categoryDetail[0]['docCategoryName']; ?></div>
		</div>
		<table cellpadding="2" cellspacing="0" width="100%" class="detailView" style="border:1px solid #474747;">
			<?php if ($documentDetailsArr[0]['docCategoryParentId'] == '2' || $documentDetailsArr[0]['documentCategoryId'] == '2' ) { ?>
				<tr><td align='right' class='title' width="40%">Name as on the certificate   : </td><td align='left'><?php echo $documentDetailsArr[0]['documentName'];?></td></tr>
				<tr><td align='right' class='title'>Year of Passing : </td><td align='left'><?php echo $documentDetailsArr[0]['documentYearPassing'];?></li>
				<tr><td align='right' class='title'>Subject Name : </td><td align='left'><?php echo $documentDetailsArr[0]['documentSubjectName'];?></td></tr>
				<tr><td align='right' class='title'>Name of the Board : </td><td align='left'><?php echo $documentDetailsArr[0]['documentBoard'];?></td></tr>
				<tr><td align='right' class='title'>Total Marks : </td><td align='left'><?php echo $documentDetailsArr[0]['documentMarks'];?></td></tr>
				<tr><td align='right' class='title'>Percentage of marks obtained(Total) : </td><td align='left'><?php echo $documentDetailsArr[0]['documentPercentage'];?></td></tr>
				<tr><td align='right' class='title'>Remarks : </td><td align='left'><?php echo $documentDetailsArr[0]['documentRemarks'];?>
			<?php } elseif ($documentDetailsArr[0]['documentCategoryId'] == '7' || $documentDetailsArr[0]['documentCategoryId'] == '8') { ?>
				<tr><td align='right' class='title'  width="40%"> <?php if($documentDetailsArr[0]['documentCategoryId']=='7') echo "Passport Number"; else echo "Driving License Number";?>  : </td><td align='left'><?php echo $documentDetailsArr[0]['documentNumber'];?></td></tr>
				<tr><td align='right' class='title'>Expiry Date  : </td><td align='left'><?php echo $documentDetailsArr[0]['documentExpiryDate'];?>
					<?php if( $documentDetailsArr[0]['documentAlertDate'] !='0000-00-00' ){ ?>
						</td></tr>
						<tr><td align='right' class='title'>Alert Date  : </td><td align='left'><?php echo $documentDetailsArr[0]['documentAlertDate'];?>
					<?php } ?>
			<?php } elseif ($documentDetailsArr[0]['documentCategoryId'] == '9'){ ?>
						<tr><td align='right' class='title' width="30%">Pancard Number : </td><td align='left'><?php echo $documentDetailsArr[0]['documentNumber'];?>
			<?php }  elseif ($documentDetailsArr[0]['docCategoryParentId'] == '0'){ ?>
						<tr><td align='right' class='title' width="30%">Document Name : </td><td align='left'><?php echo $documentDetailsArr[0]['documentName'];?></td></tr>
							<?php if( $documentDetailsArr[0]['documentAlertDate'] !='0000-00-00' && !is_null($documentDetailsArr[0]['documentAlertDate'])) { ?>
								<tr><td align='right' class='title'>Alert Date  : </td><td align='left'><?php echo $documentDetailsArr[0]['documentAlertDate'];?>
						<?php } ?>
			<?php } ?>
				<tr><td align='right' class='title'> </td>
				<td align="left">
					<button onclick="window.location.href='<?php echo site_url()."documents/edit/".$documentDetailsArr[0]['documentId']; ?>'" class="butt"><span>Edit</span></button>
				</td></tr>
		</table>
		
		<!--<ul>
			<?php if ($documentDetailsArr[0]['docCategoryParentId'] == '2' || $documentDetailsArr[0]['documentCategoryId'] == '2' ) { ?>
				<li><span>Name as on the certificate   : </span><?php echo $documentDetailsArr[0]['documentName'];?></li>
				<li><span>Year of Passing : </span><?php echo $documentDetailsArr[0]['documentYearPassing'];?></li>
				<li><span>Subject Name : </span><?php echo $documentDetailsArr[0]['documentSubjectName'];?></li>
				<li><span>Name of the Board : </span><?php echo $documentDetailsArr[0]['documentBoard'];?></li>
				<li><span>Total Marks : </span><?php echo $documentDetailsArr[0]['documentMarks'];?></li>
				<li><span>Percentage of marks obtained(Total) : </span><?php echo $documentDetailsArr[0]['documentPercentage'];?></li>
				<li><span>Remarks : </span><?php echo $documentDetailsArr[0]['documentRemarks'];?>
			<?php } elseif ($documentDetailsArr[0]['documentCategoryId'] == '7' || $documentDetailsArr[0]['documentCategoryId'] == '8') { ?>
				<li><span> <?php if($documentDetailsArr[0]['documentCategoryId']=='7') echo "Passport Number"; else echo "Driving License Number";?>  : </span><?php echo $documentDetailsArr[0]['documentNumber'];?></li>
				<li><span>Expiry Date  : </span><?php echo $documentDetailsArr[0]['documentExpiryDate'];?>
					<?php if( $documentDetailsArr[0]['documentAlertDate'] !='0000-00-00' ){ ?>
						</li>
						<li><span>Alert Date  : </span><?php echo $documentDetailsArr[0]['documentAlertDate'];?>
					<?php } ?>
			<?php } elseif ($documentDetailsArr[0]['documentCategoryId'] == '9'){ ?>
						<li><span>Pancard Number : </span><?php echo $documentDetailsArr[0]['documentNumber'];?>
			<?php }  elseif ($documentDetailsArr[0]['docCategoryParentId'] == '0'){ ?>
						<li><span>Document Name : </span><?php echo $documentDetailsArr[0]['documentName'];?></li>
							<?php if( $documentDetailsArr[0]['documentAlertDate'] !='0000-00-00' && !is_null($documentDetailsArr[0]['documentAlertDate'])) { ?>
								<li><span>Alert Date  : </span><?php echo $documentDetailsArr[0]['documentAlertDate'];?>
						<?php } ?>
			<?php } ?>
				<div class="buttons">
					<ul>
						<li><button onclick="window.location.href='<?php echo site_url()."documents/edit/".$documentDetailsArr[0]['documentId']; ?>'" class="butt"><span>Edit</span></button></li>
					</ul>
				</div>
			</li>
		</ul>-->
	</div>
	<div class="bot_but">
		<p style="padding-bottom:2px">
		Mail sent to : <input type="text" name="txtToEmail" id="txtToEmail" class="required email" />
		</p>
		<p></p>
		<button class="left_but" onclick="onchange=emailDocument(<?php echo $documentDetailsArr[0]['documentId'];?>);"><span>Email your Documents</span></button>
	</div>
</div>
<?php }else { ?>
	<div class="error">
		<p> No Document Found </p>
	</div>
<?php } ?>
