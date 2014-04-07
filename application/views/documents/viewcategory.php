<script type="text/javascript">
 function deleteConfirm(url)
 {
 	if(confirm('Do you wish to Delete?'))
 	{
 		window.location.href=url;
 	}
 }
</script>

<?php
	if ($this->session->flashdata('error')){ 
?>
<!-- Notification -->
		<h4 class="errormsg"><?php echo $this->session->flashdata('error'); ?></h4>
<!-- /Notification -->
<?php
}
?>

<?php
	if ($this->session->flashdata('success')){ 
?> 
<!-- Notification -->
		<h4 class="success"><?php echo $this->session->flashdata('success'); ?></h4>
<!-- /Notification -->
<?php
}
?>

<div class="cat_listing">
	<ul>
	<?php
	foreach($categoryDetails as $category){	
	?>
		<li>
			<div class="cont">
				<h1><?php echo $category['docCategoryName']; ?></h1>
				<p><?php echo $arrParentCat[$category['docCategoryParentId']]; ?></p>
				<div class="buttons">
					<ul>
						<li><button class="butt" onclick="window.location.href='http://safedoc.phpdevelopment.co.in/documents/editcategory/<?php echo $category['docCategoryId']; ?>'"><span>Edit</span></button></li>
						<li><button class="butt" onclick="javascript : deleteConfirm('http://safedoc.phpdevelopment.co.in/documents/deletecategory/<?php echo $category['docCategoryId']; ?>');"><span>Delete</span></button></li>
					</ul>
				</div>
			</div>
		</li>
	<?php
	}
	?>
	</ul>
</div>
<div class="bot_but">
	<button class="right_but" onclick="window.location.href='http://safedoc.phpdevelopment.co.in/documents/addcategory'">
		<span>Add Category</span>
	</button>
</div>