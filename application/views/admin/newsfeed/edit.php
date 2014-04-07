<script type="text/javascript">
$(document).ready(function(){ // jQuery DOM ready function.
  $("#frmNewsfeed").validate();
  
    $('#newsfeedDescription').wysiwyg({
    	controls: {
    	  html: {visible : true},
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
				
		<h2 style="padding-right: 90px;">Newsfeed</h2>
		<nav>
			<ul class="button-switch">
				<li><a class="button" href="<?php echo site_url("admin/newsfeed/"); ?>">List Newsfeed</a></li>
			</ul>
		</nav>
		<a title="Toggle Content Block" class="content-box-minimizer" href="#" style="display: block; left: 324px;">Toggle</a>
	</header>

	<section>
	
	<?php
	$attributes = array('id' => 'frmNewsfeed');

	echo form_open('admin/newsfeed/edit/'.$newsfeedDetailsArr[0]['newsfeedsId'],$attributes);
	echo form_fieldset('Update Newsfeed');

	$datanewsfeedTitle = array(
		  'name'        => 'newsfeedTitle',
		  'id'          => 'newsfeedTitle',
		  'class'		=> 'small required',
		  'value'		=> $newsfeedDetailsArr[0]['newsfeedTitle']
		);

	$datanewsfeedDesc = array(
		  'name'        => 'newsfeedDescription',
		  'id'          => 'newsfeedDescription',
		  'class'		=> 'wysiwyg large required',
		  'value'		=> $newsfeedDetailsArr[0]['newsfeedDescription']
		);

	?>
	<dl>
		<dt>
			<label>Newsfeed Name</label>
		</dt>
		<dd>
			<?php echo form_input($datanewsfeedTitle); ?>
		</dd>
	</dl>
	<dl>
		<dt>
			<label>Newsfeed Description</label>
		</dt>
		<dd>
			<?php echo form_textarea($datanewsfeedDesc); ?>
		</dd>
	</dl>
	<?php

	echo form_fieldset_close(); 
	echo form_submit('cmdSubmit', 'Update Newsfeed');
	echo form_close();
	?>
	</section>
</article>