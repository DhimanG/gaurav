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

	echo form_fieldset('Detail Cms');
	?>
	<dl>
		<dt>
			<label>Id</label>
		</dt>
		<dd>
			<?php echo  $cmsDetails[0]['cmsId']; ?>
		</dd>
	</dl>
	<dl>
		<dt>
			<label>Title</label>
		</dt>
		<dd>
			<?php echo  $cmsDetails[0]['cmsTitle']; ?>
		</dd>
	</dl>
	<dl>
		<dt>
			<label>Content</label>
		</dt>
		<dd>
			<?php echo  $cmsDetails[0]['cmsContent'] ?>
		</dd>
	</dl>	
	<dl>
		<dt>
			<label>Meta Keyword</label>
		</dt>
		<dd>
			<?php echo  $cmsDetails[0]['cmsKeyword'] ?>
		</dd>
	</dl>	
	<dl>
		<dt>
			<label>Meta Description</label>
		</dt>
		<dd>
			<?php echo  $cmsDetails[0]['cmsDescription'] ?>
		</dd>
	</dl>	
	<?php

	echo form_fieldset_close(); 
	echo form_close();
	?>
	</section>
</article>