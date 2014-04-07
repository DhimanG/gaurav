<script type="text/javascript">
$(document).ready(function(){ // jQuery DOM ready function.
  $("#frmCms").validate();
  
    $('#cmsContent').wysiwyg({
    controls: {
      html: {visible : true},
      insertImage: {visible : true},
    }
});


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
				
		<h2 style="padding-right: 90px;">Cms</h2>
		<nav>
			<ul class="button-switch">
				<li><a class="button" href="<?php echo site_url("admin/cms/"); ?>">List Cms</a></li>
			</ul>
		</nav>
		<a title="Toggle Content Block" class="content-box-minimizer" href="#" style="display: block; left: 324px;">Toggle</a>
	</header>

	<section>
	
	<?php
	$attributes = array('id' => 'frmCms');

	echo form_open('admin/cms/edit/'.$cmsDetails[0]['cmsId'],$attributes);

	echo form_fieldset('Update Cms');


	$dataTitle = array(
		  'name'        => 'cmsTitle',
		  'id'          => 'cmsTitle',
		  'class'		=> 'small required',
		  'value'		=> $cmsDetails[0]['cmsTitle'],
		);
	
	$dataContent = array(
		  'name'        => 'cmsContent',
		  'id'          => 'cmsContent',
		  'class'		=> 'wysiwyg large required',
		  'value'		=> $cmsDetails[0]['cmsContent'],
		);
	$dataKeyword = array(
		  'name'        => 'cmsKeyword',
		  'id'          => 'cmsKeyword',
		  'class'		=> 'small required',
		  'value'		=> $cmsDetails[0]['cmsKeyword'],
		);
	$dataDescription = array(
		  'name'        => 'cmsDescription',
		  'id'          => 'cmsDescription',
		  'class'		=> 'small required',
		  'value'		=> $cmsDetails[0]['cmsDescription'],
		);

	?>
	<dl>
		<dt>
			<label>Cms Title</label>
		</dt>
		<dd>
			<?php echo form_input($dataTitle); ?>
		</dd>
	</dl>
	<dl>
		<dt>
			<label>Content</label>
		</dt>
		<dd>
			<?php echo form_textarea($dataContent); ?>
		</dd>
	</dl>	
	<dl>
		<dt>
			<label>Meta Keyword</label>
		</dt>
		<dd>
			<?php echo form_textarea($dataKeyword); ?>
		</dd>
	</dl>	
	<dl>
		<dt>
			<label>Meta Description</label>
		</dt>
		<dd>
			<?php echo form_textarea($dataDescription); ?>
		</dd>
	</dl>	
	<?php

	echo form_fieldset_close(); 
	echo form_submit('cmdSubmit', 'Update Cms');
	echo form_close();
	?>
	</section>
</article>