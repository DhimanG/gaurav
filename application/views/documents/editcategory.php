<script type="text/javascript">
 
 function deleteConfirm(url)
 {
 	if(confirm('Do you want to Delete?'))
 	{
 		window.location.href=url;
 	}
 }

</script>
<?php
	$attributes = array('id' => 'frmDocuments');
	echo form_open('documents/editcategory/'.$catDetails[0]['docCategoryId'],$attributes);
?>
<div class="doc_edit">
		<ul>
			<li>
				<label for="mainCat">Main Category -</label>
			
					<?php 
						$catName = array(
						  'name'        => 'mainCat',
						  'id'          => 'mainCat',
						  'class'		=> 'small',
						 'value'		=> $allCatDetails[$catDetails[0]['docCategoryParentId']],
						  'readonly'	=> 'readonly'
						);
						echo form_input($catName);
					?>
			
			</li>
			<li>
					<label for="catName">Category Name -</label>
					<?php 
						$catName = array(
						  'name'        => 'catName',
						  'id'          => 'catName',
						  'class'		=> 'small required',
						  'value'		=> $catDetails[0]['docCategoryName']
						);
						echo form_input($catName);
					?>
			</li>
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
       		echo form_submit($dataSubmit, 'Update Category'); ?>
       	</div>
    </div>
<?php echo form_close(); ?>