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
				
		<h2 style="padding-right: 90px;">Sp_Points</h2>
		<nav>
			<ul class="button-switch">
				<li><a class="button" href="<?php echo site_url("admin/sp_points/"); ?>">List Sp_Points</a></li>
			</ul>
		</nav>
		<a title="Toggle Content Block" class="content-box-minimizer" href="#" style="display: block; left: 324px;">Toggle</a>
	</header>

	<section>
	
	<?php
	$attributes = array('id' => 'frmeditpoints');

	echo form_open('admin/sp_points/editpoints/'.$pointDetails[0]['id'],$attributes);

	echo form_fieldset('Edit Points');


	$pointstitle = array(
		  'name'        => 'Title',
		  'id'          => 'Title',
		  'class'		=> 'required',
		  'value'		=> $pointDetails[0]['Title'],
		  
		);
	
	$spiff_points = array(
		  'name'        => 'spiff_points',
		  'id'          => 'spiff_points',
		  'class'		=> 'required',
				'value'		=>	 $pointDetails[0]['spiff_points']
		);
	
	$pointsvalue= array(
		  'name'        => 'value',
		  'id'          => 'value',
		  'class'		=> 'small required ',
		  'value'		=> $pointDetails[0]['value']
		  
		);

	?>
	<dl>
		<dt>
			<label>Sp_Points Title</label>
		</dt>
		<dd>
			
			<?php echo form_input($pointstitle); ?>
		</dd>
		
		<dt>
			<label>Spiff_Points</label>
		</dt>
		<dd>
			<?php echo form_input($spiff_points); ?>
		</dd>

		<dt>
			<label>Sp_Points Value</label>
		</dt>
		<dd>
			
			<?php echo form_input($pointsvalue); ?>
		</dd>

	</dl>	
	<?php

	echo form_fieldset_close(); 
	echo form_submit('Submit', 'Update Sp_Points');
	echo form_close();
	?>
	</section>
</article>