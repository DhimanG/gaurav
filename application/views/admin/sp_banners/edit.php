<script type="text/javascript">

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
	$bannertitle = array(
		  'name'   => 'bannertitle',
		  'id'     => 'bannertitle',
		  'class'		=> 'required',
		  'value'		=> $bannerDetails[0]['title']
	 );
	$bannerimg = array(
		  'name'  => 'img',
		  'id'    => 'img',
				'class'	=> 'required',
				'value'	=>	$bannerDetails[0]['img']
		);
	
	$hidden = array('prev_image' => $bannerDetails[0]['img']);
	
	$attributes = array('id' => 'frmeditbanner');
	echo form_open('admin/sp_banners/edit/'.$bannerDetails[0]['id'],$attributes);
	echo form_fieldset('Update Sp_Banner');
	?>
	<dl>
		<dt>
			<label>Sp_Banner Title</label>
		</dt>
		<dd>
			<?php echo form_input($bannertitle); ?>
		</dd>
	</dl>
	<dl id="imageBanner">
		<dt>
			<label>Sp_Banner Image</label>
		</dt>
		<dd>
			<?php echo form_input($bannerimg); ?>
		</dd>
		
	</dl>
	
	<?php

	echo form_fieldset_close(); 
	echo form_submit('Submit', 'Update Banner');
	echo form_close();
	?>
	</section>
</article>