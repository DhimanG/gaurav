<script type="text/javascript">
$(document).ready(function(){ // jQuery DOM ready function.
  $("#frmCountry").validate();
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
				
		<h2 style="padding-right: 90px;">Country</h2>
		<nav>
			<ul class="button-switch">
				<li><a class="button" href="<?php echo site_url("admin/country/"); ?>">List Country</a></li>
			</ul>
		</nav>
		<a title="Toggle Content Block" class="content-box-minimizer" href="#" style="display: block; left: 324px;">Toggle</a>
	</header>

	<section>
	
	<?php
	$attributes = array('id' => 'frmCountry');
	echo form_open('admin/country/add',$attributes);

	echo form_fieldset('Add Country');


	$datacountryname = array(
		  'name'        => 'countryname',
		  'id'          => 'countryname',
		  'class'		=> 'small required'
		);

	?>
	<dl>
		<dt>
			<label>Country Name</label>
		</dt>
		<dd>
			
			<?php echo form_input($datacountryname); ?>
		</dd>
	</dl>	
	<?php

	echo form_fieldset_close(); 
	echo form_submit('cmdSubmit', 'Add Country');
	echo form_close();
	?>
	</section>
</article>