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
				
		<h2 style="padding-right: 90px;">Sp_Banners</h2>
		<nav>
			<ul class="button-switch">
				<li><a class="button" href="<?php echo site_url("admin/sp_banners/addbanner"); ?>">Add Sp_Banner</a></li>
			</ul>
		</nav>

		<a title="Toggle Content Block" class="content-box-minimizer" href="#" style="display: block; left: 324px;">Toggle</a>
	</header>

	<section>
		<div class="dataTables_wrapper">
		<form name="frmlistbanner" id="frmlistbanner" method="post">
		<table class="datatable">
		<thead  class="trclass">
		<tr>
			<!--<td class="tdclass"><input type="checkbox" class="check-all"></th>-->
			<th width="10%">Sr No.</th>
			<th width="20%"style="text-align:left;">Sp_Banner Title</th>
			<th width="60%" style="text-align:left;">Sp_Banner Image</th>
			<td width="10%" class="tdclass">Edit</th>
			<!--<td class="tdclass">Delete</th>-->
		</tr>
		</thead>
		<tfoot>
		<tr>
			<!--<th><input type="checkbox" class="check-all"></th>-->
			<th>Sr No.</th>
			<th style="text-align:left;">Sp_Banner Title</th>
			<th style="text-align:left;">Sp_Banner Image</th>
			<th>Edit</th>
			<!--<th>Delete</th>-->
		</tr>
		</tfoot>
		<tbody>
		<?php 
		$i = 1;
		foreach($bannerDetails as $banner){	
		$class = "gradeA odd";
		if($i % 2 == 0){
			$class = "gradeA even";
		}
		?>
	<tr class="<?php echo $class; ?>">
			<td style="text-align:left;vertical-align:top;padding-left:15px;"><?php echo $banner['id']?></td>
			<td style="text-align:left;vertical-align:top;"><?php echo $banner['title']?></td>
			<td style="text-align:left;vertical-align:top;">
				<?php if($banner['img']!=''){ ?>
					<img src="<?php echo site_url().'Assets/img	/'.$banner['img'];?>" width="100"/>
				<?php } else echo "Google Code" ?>
			</td>
			<td style="text-align:left;vertical-align:top;">
				
			</td>
			<td style="vertical-align:top;"><a href="<?php echo site_url("admin/sp_banners/edit/".$banner['id']); ?>"><img alt="Pencil" src="<?php echo base_url(); ?>/public/admin/img/icons/buttons/pencil.png"></a></td>
		</tr>
		<?php
		$i++;
		}
		?>
		</tbody>
		</table>
		</form>
		</div>
	</section>
</article>