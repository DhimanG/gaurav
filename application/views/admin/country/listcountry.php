<script>
 $(document).ready(function() { 
 	$('#mysubmit').click(function(){
 		if(confirm('Do you want to Delete?')){ $('#frmlistcountry').submit(); }
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
	<form name="frmlistcountry" id="frmlistcountry" method="post">
	<header>
				
		<h2 style="padding-right: 90px;">Country</h2>
		<nav>
			<ul class="button-switch">
				<li><?php echo form_button(array('name'=>'mysubmit','id'=>'mysubmit'), 'Delete');?></li>
				<li><a class="button" href="<?php echo site_url("admin/country/add"); ?>">Add Country</a></li>
			</ul>
		</nav>

		<a title="Toggle Content Block" class="content-box-minimizer" href="#" style="display: block; left: 324px;">Toggle</a>
	</header>
	<section>
		<div class="dataTables_wrapper">
		<table class="datatable">
		<thead  class="trclass">
		<tr>
			<td width="5%" class="tdclass"><input type="checkbox" class="check-all"></th>
			<th width="10%">Sr No.</th>
			<th width="75%" style="text-align:left;">Country Name</th>
			<td width="5%" class="tdclass">Edit</th>
			<td width="5%" class="tdclass">Delete</th>
		</tr>
		</thead>
		<tfoot>
		<tr>
			<th><input type="checkbox" class="check-all"></th>
			<th>Sr No.</th>
			<th  style="text-align:left;">Country Name</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		</tfoot>
		<tbody>
		<?php 
		$i = 1;
		foreach($countryDetails as $country){	
		$class = "gradeA odd";
		if($i % 2 == 0){
			$class = "gradeA even";
		}
		?>
		<tr class="<?php echo $class; ?>">
			<td><input type="checkbox" value="<?php echo $country['countryId'];?>" name="delete[]"></td>
			<td class="sorting_1"><?php echo $i; ?></td>
			<td style="text-align:left;"><?php echo $country['countryName']; ?></td>
			<td><a href="<?php echo site_url("admin/country/edit/".$country['countryId']); ?>"><img alt="Pencil" src="<?php echo base_url(); ?>/public/admin/img/icons/buttons/pencil.png"></a></td>
			<td><a href="#" onclick="javascript: deleteConfirm('<?php echo site_url("admin/country/delete/".$country['countryId']); ?>');"><img alt="Pencil" src="<?php echo base_url(); ?>/public/admin/img/icons/buttons/trashcan.png"></a></td>
		</tr>
		<?php
		$i++;
		}
		?>
		</tbody>
		
		</table>
		</div>
	</section>
	</form>
</article>