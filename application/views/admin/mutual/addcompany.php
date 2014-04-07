<script type="text/javascript">
$(document).ready(function(){ // jQuery DOM ready function.
  $("#frmMutual").validate();
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
				
		<h2 style="padding-right: 90px;">Mutual Company</h2>
		<nav>
			<ul class="button-switch">
				<li><a class="button" href="<?php echo site_url("admin/mutual/listcompany"); ?>">List Mutual Company</a></li>
			</ul>
		</nav>
		<a title="Toggle Content Block" class="content-box-minimizer" href="#" style="display: block; left: 324px;">Toggle</a>
	</header>

	<section>
	
	<?php
	$attributes = array('id' => 'frmMutual');

	echo form_open('admin/mutual/addcompany',$attributes);

	echo form_fieldset('Add Mutual Company');


	$datamutualname = array(
		  'name'        => 'mutualCompanyName',
		  'id'          => 'mutualCompanyName',
		  'class'		=> 'small required'
		);

	?>
	<dl>
		<dt style="width:160px;">
			<label>Mutual Company Name</label>
		</dt>
		<dd>
			
			<?php echo form_input($datamutualname); ?>
		</dd>
	</dl>	
	<?php

	echo form_fieldset_close(); 
	echo form_submit('cmdSubmit', 'Add Mutual Company');
	echo form_close();
	?>
	</section>
</article>