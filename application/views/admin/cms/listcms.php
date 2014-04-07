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
				
		<h2 style="padding-right: 90px;">Cms</h2>
		<!--<nav>
			<ul class="button-switch">
				<li><a class="button" href="<?php echo site_url("admin/cms/add"); ?>">Add Cms</a></li>
			</ul>
		</nav>-->

		<a title="Toggle Content Block" class="content-box-minimizer" href="#" style="display: block; left: 324px;">Toggle</a>
	</header>

	<section>
		<div class="dataTables_wrapper">
		<form name="frmlistcms" id="frmlistcms" method="post">
		<table class="datatable">
		<thead  class="trclass">
		<tr>
			<th style="text-align:left;padding-left:15px;">Sr No.</th>
			<th style="text-align:left;">Title</th>
			<td class="tdclass">Edit</td>
			<td class="tdclass">View</td>
		</tr>
		</thead>
		<tfoot>
		<tr>
			<th style="text-align:left;padding-left:15px;">Sr No.</th>
			<th style="text-align:left;">Title</th>
			<th>Edit</th>
			<th>View</th>
			<!--<th>Delete</th>-->
		</tr>
		</tfoot>
		<tbody>
		<?php 
		$i = 1;
		foreach($cmsDetails as $cms){	
		$class = "gradeA odd";
		if($i % 2 == 0){
			$class = "gradeA even";
		}
		?>
		<tr class="<?php echo $class; ?>">
			<td width="10%" style="text-align:left;vertical-align:top;padding-left:15px;" class="sorting_1"><?php echo $cms['cmsId']; ?></td>
			<td width="80%"  style="text-align:left;vertical-align:top;"><?php echo $cms['cmsTitle']; ?></td>
			<td width="5%" ><a href="<?php echo site_url("admin/cms/edit/".$cms['cmsId']); ?>"><img alt="Pencil" src="<?php echo base_url(); ?>/public/admin/img/icons/buttons/pencil.png"></a></td>
			<td width="5%" ><a href="<?php echo site_url("admin/cms/view/".$cms['cmsId']); ?>"><img alt="Pencil" src="<?php echo base_url(); ?>/public/admin/img/icons/buttons/pencil.png"></a></td>
		</tr>
		<?php
		}
		?>
		</tbody>
		</table>
		</form>
		</div>
	</section>
</article>