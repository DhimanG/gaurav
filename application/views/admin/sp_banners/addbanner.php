<script type="text/javascript">
$(document).ready(function(){ // jQuery DOM ready function.
  $("#frmaddbanner").validate({
		
		
	});
});
</script>

<?php
	if ($this->session->flashdata('error')){ 
	?>
	<!-- Notification -->
	<div class="notification error">
		<a href="#" class="close-notification tooltip" title="Hide Notification">x</a>
		<h4>Error</h4>
		<p><?php echo $this->session->flashdata('error'); ?></p>
	</div>
	<!-- /Notification -->
	<?php
	}
?>

<article class="content-box minimizer">
	
	<header>
				
		<h2 style="padding-right: 90px;">Sp_Banner</h2>
		<nav>
			<ul class="button-switch">
				<li><a class="button" href="<?php echo site_url("admin/sp_banners/"); ?>">List Sp_Banners</a></li>
			</ul>
		</nav>
		<a title="Toggle Content Block" class="content-box-minimizer" href="#" style="display: block; left: 324px;">Toggle</a>
	</header>

	<section>
	
	<?php
	$attributes = array('id' => 'frmaddbanner');

	echo form_open('admin/sp_banners/addbanner',$attributes);

	echo form_fieldset('Add Sp_Banner');


	$title = array(
		  'name'    => 'title',
		  'id'      => 'title',
		  'class'		 => 'required'
		);
	
	$img = array(
		  'name'   => 'img',
		  'id'     => 'img',
		  'class'		=> 'required'
		);
	
	?>
	<dl>
		<dt>
			<label>Sp_Banner Title</label>
		</dt>
		<dd>
			
			<?php echo form_input($title); ?>
		</dd>
		
		<dt>
			<label>Sp_Banner Image</label>
		</dt>
		<dd>
			
			<?php echo form_input($img); ?>
		</dd>

	</dl>	
	<?php

	echo form_fieldset_close(); 
	echo form_submit('cmdSubmit', 'Add Sp_Banner');
	echo form_close();
	?>
	</section>
</article>