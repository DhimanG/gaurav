<script type="text/javascript">
$(document).ready(function(){ // jQuery DOM ready function.

	<?php if($bannerDetailsArr[0]['bannerCode']!=''){?>
		$("#imageBanner").hide();
	<?php } else {?> 
		$("#codeBanner").hide();
	<?php } ?>
	
  $("#frmBanner").validate();
  
});

function radioChange(val)
{
	if(val=='code')
	{
		$("#imageBanner").hide();
		$("#codeBanner").show();
		$("#bannerCode").removeClass('required url');
		$("#bannerCode").addClass('required');
	}
	else
	{
		$("#imageBanner").show();
		$("#codeBanner").hide();
		$("#bannerCode").addClass('required url');
		$("#bannerCode").removeClass('required');
	}
		
}
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
				
		<h2 style="padding-right: 90px;">Banner</h2>
		<nav>
			<ul class="button-switch">
				<li><a class="button" href="<?php echo site_url("admin/banner/"); ?>">List Banner</a></li>
			</ul>
		</nav>
		<a title="Toggle Content Block" class="content-box-minimizer" href="#" style="display: block; left: 324px;">Toggle</a>
	</header>

	<section>
	
	<?php
	$databannerTitle = array(
		  'name'        => 'bannerTitle',
		  'id'          => 'bannerTitle',
		  'class'		=> 'small required',
		  'value'		=> $bannerDetailsArr[0]['bannerTitle'],
		  'disabled'	=>	'disabled',
		);
	$databannerImage = array(
		  'name'        => 'bannerImage',
		  'id'          => 'bannerImage'
		);
	$databannerLink = array(
		  'name'        => 'bannerLink',
		  'id'          => 'bannerLink',
		  'class'		=> 'small required url',
		  'value'		=> $bannerDetailsArr[0]['bannerLink'],
		);
	
	$databannerDesc = array(
		  'name'        => 'bannerCode',
		  'id'          => 'bannerCode',
		   'class'		=> 'required',
		  'value'		=> $bannerDetailsArr[0]['bannerCode'],
		);
	$hidden = array('prev_image' => $bannerDetailsArr[0]['bannerImage']);
	
	$attributes = array('id' => 'frmBanner');
	echo form_open_multipart('admin/banner/edit/'.$bannerDetailsArr[0]['bannerId'],$attributes,$hidden);
	echo form_fieldset('Update Banner');
	?>
	<dl>
		<dt>
			<label>Banner Name</label>
		</dt>
		<dd>
			<?php echo form_input($databannerTitle); ?>
		</dd>
	</dl>
	<dl>
		<dt>
			<label></label>
		</dt>
		<dd>
			<?php	
				if($bannerDetailsArr[0]['bannerCode']!='')
				{
					$data = array(
					    'name'        => 'bannerType',
					    'id'          => 'bannerType',
					    'value'       => 'code',
					    'checked'     => TRUE,
					    'style'       => 'margin:0px 10px;',
					    'onclick'	  => 'javascript: radioChange(this.value)',
					    );
					echo form_radio($data) . "Google Code";
					
					$data = array(
					    'name'        => 'bannerType',
					    'id'          => 'bannerType',
					    'value'       => 'image',
					    'checked'     => FALSE,
					    'style'       => 'margin:0px 10px;',
					    'onclick'	  => 'javascript: radioChange(this.value)',
					    );
					echo form_radio($data) . "Image";
				}
				else
				{
					$data = array(
					    'name'        => 'bannerType',
					    'id'          => 'bannerType',
					    'value'       => 'code',
					    'checked'     => FALSE,
					    'style'       => 'margin:0px 10px;',
					    'onclick'	  => 'javascript: radioChange(this.value)',
					    );
					echo form_radio($data) . "Google Code";
					
					$data = array(
					    'name'        => 'bannerType',
					    'id'          => 'bannerType',
					    'value'       => 'image',
					    'checked'     => TRUE,
					    'style'       => 'margin:0px 10px;',
					    'onclick'	  => 'javascript: radioChange(this.value)',
					    );
					echo form_radio($data) . "Image";
				}
			?>
		</dd>
	</dl>
	<dl id="imageBanner">
		<dt>
			<label>Banner Image</label>
		</dt>
		<dd>
			<?php echo form_upload($databannerImage); ?>
			<?php if($bannerDetailsArr[0]['bannerImage']!=''){ ?>
					 <br/><br/>
					 <?php // echo "Delete ". form_checkbox('deleteImage','yes'); ?>
					 	<img src="<?php echo site_url().'public/upload/banner/'.$bannerDetailsArr[0]['bannerImage'];?>" width="100"/>
				<?php } ?>
		</dd>
		
		<dt>
			<label>Banner Link</label>
		</dt>
		<dd>
			<?php echo form_input($databannerLink); ?>
		</dd>
	
	</dl>
	<dl id="codeBanner">
		<dt>
			<label>Google Code</label>
		</dt>
		<dd>
			<?php echo form_textarea($databannerDesc); ?>
		</dd>
	</dl>
	
	<?php

	echo form_fieldset_close(); 
	echo form_submit('cmdSubmit', 'Update Banner');
	echo form_hidden('prev_image', $bannerDetailsArr[0]['bannerImage']);
	echo form_close();
	?>
	</section>
</article>