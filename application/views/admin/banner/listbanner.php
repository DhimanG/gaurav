<?php
	if ($this->session->flashdata('success')){ 
	?>
	<div class="notification success">
			<a title="Hide Notification" class="close-notification tooltip" href="#">x</a>
			<h4>Success</h4>
			<p><?php echo $this->session->flashdata('success') ?></p>
	</div>
	<?php
	}
?>
<article class="content-box minimizer">
	<header>
		<h2 style="padding-right: 90px;">Banners</h2>
		<a title="Toggle Content Block" class="content-box-minimizer" href="#" style="display: block; left: 324px;">Toggle</a>
	</header>
	<section>
		<div class="dataTables_wrapper">
		<form name="frmlistbanner" id="frmlistbanner" method="post">
		<table class="table-form">
			<thead class="trclass" border="1">
			<tr>
				<th width="5%">Sr No.</th>
				<th width="20%" style="text-align:left;padding-left:15px;">Title</th>
				<th width="30%" style="text-align:left;">Banner Image / Banner Code</th>
				<th width="40%" style="text-align:left;">Link</th>
				<th width="5%">Edit</th>
			</tr>
			</thead>
		<tbody>
		<?php 
		$i = 1;
		if($bannerDetails){
			foreach($bannerDetails as $banner){	
			$class = "gradeA odd";
			if($i % 2 == 0){
				$class = "gradeA even";
			}
			?>
			<tr class="<?php echo $class; ?>">
				<td style="text-align:left;vertical-align:top;padding-left:15px;"><?php echo $banner['bannerId']?></td>
				<td style="text-align:left;vertical-align:top;"><?php echo $banner['bannerTitle']?></td>
				<td style="text-align:left;vertical-align:top;">
					<?php if($banner['bannerImage']!=''){ ?>
						<img src="<?php echo site_url().'public/upload/banner/'.$banner['bannerImage'];?>" width="100"/>
					<?php } else echo "Google Code" ?>
				</td>
				<td style="text-align:left;vertical-align:top;">
					<?php if($banner['bannerImage']!=''){ ?>
						<a href="<?php  echo $banner['bannerLink']; ?> " target="_blank"><?php  echo $banner['bannerLink']; ?> </a>
					<?php } else echo "-" ?>
				</td>
				<td style="vertical-align:top;"><a href="<?php echo site_url("admin/banner/edit/".$banner['bannerId']); ?>"><img alt="Pencil" src="<?php echo base_url(); ?>/public/admin/img/icons/buttons/pencil.png"></a></td>
			</tr>
			<?php
			}
		}
		else
		{?> 
			<tr>
				<td colspan="5" align="center">No Data Found</td>
			</tr>
		<?php }
		?>
		</tbody>
		</table>
		</form>
		</div>
	</section>
</article>