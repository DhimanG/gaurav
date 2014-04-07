<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery-1.3.1.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/js/jquery.validation.js"></script>

<script type="text/javascript">
	
	$(function () { // this line makes sure this code runs on page load
		$('.checkall').click(function () {
			var checked = $(this).attr('checked');
			var val = $(this).attr('value');
			if(checked){
				$('#li_'+val).find(':checkbox').attr('checked', checked);
			}else{
				$('#li_'+val).find(':checkbox').attr('checked', checked);
			}
		});
	});
	
$(document).ready(function(){ // jQuery DOM ready function.
	$("#frmemail").validate();
});

</script>
<link href="<?php echo base_url(); ?>public/css/style_sheet.css" type="text/css" rel="stylesheet" />
<div class="emaildoc">
<?php
	$attributes = array('id' => 'frmemail');
	echo form_open('documents/email/',$attributes);
?><ul>
	<?php
	foreach($catDetails[0] as $mainCatId => $mainCat){
?>
<li><input type="checkbox" name="subcat[<?php echo $mainCatId ?>]" id="subcat[<?php echo $mainCatId ?>]" value="<?php echo $mainCatId; ?>" class="checkall"/><span style="padding-left:8px"><?php echo $mainCat ?></span></li>
<?php
		if (array_key_exists($mainCatId, $catDetails)) {
?>
	<ul id="li_<?php echo $mainCatId; ?>">
<?php
		foreach($catDetails[$mainCatId] as $categoryId => $category){
?>
			<li><input type="checkbox" name="subcat[<?php echo $categoryId ?>]" id="subcat[<?php echo $categoryId ?>]" value="<?php echo $categoryId; ?>"/><?php echo $category ?></li>
<?php
			}
?>
	</ul>
<?php
		}
	}
	?>
</ul> 
Mail sent to : <input type="text" name="txtToEmail" id="txtToEmail" class="required email" />
<input type="submit" value="Email Documents"/>
<?php echo form_close(); ?>
<div>