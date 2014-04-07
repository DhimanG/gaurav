<script type="text/javascript">
$(document).ready(function(){ // jQuery DOM ready function.
  $("#frmCategory").validate();
});
</script>

<?php
	if ($this->session->flashdata('error')){ 
	?>
	<!-- Notification -->
	<div class="notification error">
		<a href="#" class="close-notification tooltip" title="Hide Notification">x</a>
		<h4>Error notification</h4>
		<p><?php echo $this->session->flashdata('error'); ?></p>
	</div>
	<!-- /Notification -->
	<?php
	}
?>

<article class="content-box minimizer">
	
	<header>
				
		<h2 style="padding-right: 90px;">Category</h2>
		<nav>
			<ul class="button-switch">
				<li><a class="button" href="<?php echo site_url("admin/category/"); ?>">List Category</a></li>
			</ul>
		</nav>
		<a title="Toggle Content Block" class="content-box-minimizer" href="#" style="display: block; left: 324px;">Toggle</a>
	</header>

	<section>
	
	<?php
	$attributes = array('id' => 'frmCategory');

	echo form_open('admin/category/edit/'.$categoryDetails[0]['docCategoryId'],$attributes);

	echo form_fieldset('Update Category');


	$dataCatName = array(
		  'name'        => 'catname',
		  'id'          => 'catname',
		  'class'		=> 'small required',
		  'value'		=> $categoryDetails[0]['docCategoryName'],
		);

	?>
	<dl>
		<dt>
			<label>Main Category</label>
		</dt>
		<dd>
			
			<?php echo form_dropdown('mainCat', $catDetails, $categoryDetails[0]['docCategoryParentId']); ?>
		</dd>

		<dt>
			<label>Category Name</label>
		</dt>
		<dd>
			
			<?php echo form_input($dataCatName); ?>
		</dd>
	</dl>	
	<?php

	echo form_fieldset_close(); 
	echo form_submit('cmdSubmit', 'Update Category');
	echo form_close();
	?>
	</section>
</article>