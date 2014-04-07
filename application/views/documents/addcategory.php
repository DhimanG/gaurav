<?php
	$attributes = array('id' => 'frmDocuments');
	echo form_open('documents/addcategory/',$attributes);
?>
<div class="doc_edit">
		<ul>
			<li>
				<label for="mainCat">Main Category -</label>
					<?php echo form_dropdown('mainCat', $mainCat,'',"id='mainCat'"); ?>
			</li>
			<li>
					<label for="catName">Category Name -</label>
					<?php 
						$catName = array(
						  'name'        => 'catName',
						  'id'          => 'catName',
						  'class'		=> 'small required',
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
       		echo form_submit($dataSubmit, 'Add Category'); ?>
       	</div>
    </div>
<?php echo form_close(); ?>