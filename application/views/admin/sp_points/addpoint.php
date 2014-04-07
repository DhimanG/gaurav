<script type="text/javascript">
$(document).ready(function(){ // jQuery DOM ready function.
  $("#frmaddpoint").validate({
		
		
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
				
		<h2 style="padding-right: 90px;">Sp_User</h2>
		<nav>
			<ul class="button-switch">
				<li><a class="button" href="<?php echo site_url("admin/sp_points/"); ?>">List Sp_Points</a></li>
			</ul>
		</nav>
		<a title="Toggle Content Block" class="content-box-minimizer" href="#" style="display: block; left: 324px;">Toggle</a>
	</header>

	<section>
	
	<?php
	$attributes = array('id' => 'frmaddpoint');

	echo form_open('admin/sp_points/addpoint	',$attributes);

	echo form_fieldset('Add Sp_Point');


	$Title = array(
		  'name'   => 'Title',
		  'id'     => 'Title',
		  'class'		=> 'required'
		);
	
	$spiff_points = array(
		  'name'   => 'spiff_points',
		  'id'     => 'spiff_points',
		  'class'		=> 'required'
		);
	
	$value = array(
		  'name'   => 'value',
		  'id'     => 'value',
		  'class'		=> 'required'
		);

	?>
	<dl>
		<dt>
			<label>Sp_Title</label>
		</dt>
		<dd>
			
			<?php echo form_input($Title); ?>
		</dd>
		
		<dt>
			<label>SpiffCity_Point</label>
		</dt>
		<dd>
			
			<?php echo form_input($spiff_points); ?>
		</dd>

		<dt>
			<label>Value</label>
		</dt>
		<dd>
			
			<?php echo form_input($value); ?>
		</dd>
	</dl>	
	<?php

	echo form_fieldset_close(); 
	echo form_submit('cmdSubmit', 'Add Sp_Point');
	echo form_close();
	?>
	</section>
</article>