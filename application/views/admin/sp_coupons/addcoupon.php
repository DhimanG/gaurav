<script type="text/javascript">
$(document).ready(function(){ // jQuery DOM ready function.
  $("#frmadduser").validate({
		
		

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
				
		<h2 style="padding-right: 90px;">Sp_Coupons</h2>
		<nav>
			<ul class="button-switch">
				<li><a class="button" href="<?php echo site_url("admin/sp_coupons/"); ?>">List Sp_Coupons</a></li>
			</ul>
		</nav>
		<a title="Toggle Content Block" class="content-box-minimizer" href="#" style="display: block; left: 324px;">Toggle</a>
	</header>

	<section>
	
	<?php
	$attributes = array('id' => 'frmaddcoupon');

	echo form_open_multipart('admin/sp_coupons/addcoupon',$attributes);
	echo form_fieldset('Add Sp_Coupon');


	$title = array(
		  'name'   => 'title',
		  'id'     => 'title',
		  'class'		=> 'required'
		);
	
	$img = array(
		  'name'   => 'userfile',
		  'id'     => 'userfile',
		  'class'		=> 'input-file uniform_on',
      'type'    => 'file'
		);
	
	$description = array(
		  'name'    => 'description',
		  'id'      => 'description',
		  'class'		 => 'required'
		);

	$points = array(
		  'name'   => 'points',
		  'id'     => 'points',
		  'class'		=> 'required'
		);
 $Price = array(
    'name'   => 'Price',
    'id'     => 'Price',
    'class'  => 'required'
 );
 $likes = array(
    'name'   => 'likes',
    'id'     => 'likes',
    'class'  => 'required'
 )
	?>
	<dl>
		<dt>
			<label>Sp_Coupons Title</label>
		</dt>
		<dd>
			
			<?php echo form_input($title); ?>
		</dd>
		
		<dt>
			<label>Sp_Coupon Image</label>
		</dt>
		<dd>
			<?php echo form_input($img); ?>
		</dd>

		<dt>
			<label>Sp_Coupon Description</label>
		</dt>
		<dd>
			
			<?php echo form_input($description); ?>
		</dd>

		<dt>
			<label>Points</label>
		</dt>
		<dd>
			
			<?php echo form_input($points); ?>
		</dd>
  
  <dt>
   <label>Price</label>
  </dt>
  <dd>
   <?php echo form_input($Price)?>
  </dd>
  <dt>
   <label>Likes</label>
  </dt>
  <dd>
   <?php echo form_input($likes)?>
  </dd>
	</dl>	
	<?php

	echo form_fieldset_close(); 
	echo form_submit('cmdSubmit', 'Add Sp_Coupon');
	echo form_close();
	?>
	</section>
</article>