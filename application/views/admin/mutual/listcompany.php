<script>
 $(document).ready(function() { 
 	$('#mysubmit').click(function(){
 		if(confirm('Do you want to Delete?')){ $('#frmlistcompany').submit(); }
 	})
 })
 
 function deleteConfirm(url)
 {
 	if(confirm('Do you want to Delete?'))
 	{
 		window.location.href=url;
 	}
 }
</script>
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
	if ($this->session->flashdata('error')){ 
	?>
	<div class="notification error">
			<a title="Hide Notification" class="close-notification tooltip" href="#">x</a>
			<h4>Error</h4>
			<p><?php echo $this->session->flashdata('error') ?></p>
	</div>
	<?php
	}
?>
<article class="content-box minimizer">
	<?php 
		$attributes = array('id' => 'frmlistcompany');
		echo form_open_multipart('admin/mutual/',$attributes);
	?>
	<header>
		<h2 style="padding-right: 90px;">Mutual Company</h2>
		<nav>
			<ul class="button-switch">
				<li><?php  echo form_button(array('name'=>'mysubmit','id'=>'mysubmit'), 'Delete');?></li>
				<li><a class="button" href="<?php echo site_url("admin/mutual/addcompany"); ?>">Add Mutual Company</a></li>
			</ul>
		</nav>
		<a title="Toggle Content Block" class="content-box-minimizer" href="#" style="display: block; left: 324px;">Toggle</a>
	</header>
	<section>
		<div class="dataTables_wrapper">
		<table class="datatable">
			<thead class="trclass" border="1">
			<tr>
				<th width="5%"><input type="checkbox" class="check-all"></th>
				<th width="10%" style="text-align:left;padding-left:10px;">Sr No. </th>
				<th width="80%" style="text-align:left;">Mutual Company</th>
				<td class="tdclass" width="5%">Edit</td>
				<td class="tdclass" width="5%">Delete</td>
			</tr>
			</thead>
	
			<tfoot>
			<tr>
				<th><input type="checkbox" class="check-all"></td>
				<th style="text-align:left;padding-left:10px;">Sr No. </td>
				<th style="text-align:left;">Mutual Company</td>
				<th>Edit</td>
				<th>Delete</td>
			</tr>
			</tfoot>
		<tbody>
		<?php 
		$i = 1;
		if($arrCompany){
			foreach($arrCompany as $company){	
			$class = "gradeA odd";
			if($i % 2 == 0){
				$class = "gradeA even";
			}
			?>
			<tr class="<?php echo $class; ?>">
				<td><input type="checkbox" value="<?php echo $company['mutualCompanyId'];?>" name="delete[]"></td>
				<td style="text-align:left;vertical-align:top;padding-left:10px;"><?php echo $i;?></td>
				<td style="text-align:left;vertical-align:top;"><?php echo nl2br($company['mutualCompanyName']); ?></td>
				<td style="vertical-align:top;"><a href="<?php echo site_url("admin/mutual/editcompany/".$company['mutualCompanyId']); ?>"><img alt="Pencil" src="<?php echo base_url(); ?>/public/admin/img/icons/buttons/pencil.png"></a></td>
				<td style="vertical-align:top;"><a href="#" onclick="javascript : deleteConfirm('<?php echo site_url("admin/mutual/deletecompany/".$company['mutualCompanyId']); ?>');"><img alt="Pencil" src="<?php echo base_url(); ?>/public/admin/img/icons/buttons/trashcan.png"></a></td>
			</tr>
			<?php
			$i++;
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
		</div>
	</section>
	<?php echo form_close();?>
</article>