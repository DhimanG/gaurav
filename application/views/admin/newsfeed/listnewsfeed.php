<script>
 $(document).ready(function() { 
 	$('#mysubmit').click(function(){
 		if(confirm('Do you want to Delete?')){ $('#frmlistnewsfeed').submit(); }
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
?>
<article class="content-box minimizer">
	<form name="frmlistnewsfeed" id="frmlistnewsfeed" method="post">
	<header>
		<h2 style="padding-right: 90px;">Newsfeeds</h2>
		<nav>
			<ul class="button-switch">
				<li><?php echo form_button(array('name'=>'mysubmit','id'=>'mysubmit'), 'Delete');?></li>
				<li><a class="button" href="<?php echo site_url("admin/newsfeed/add"); ?>">Add Newsfeed</a></li>
			</ul>
		</nav>
		<a title="Toggle Content Block" class="content-box-minimizer" href="#" style="display: block; left: 324px;">Toggle</a>
	</header>
	<section>
		<div class="dataTables_wrapper">
		<table class="datatable">
			<thead class="trclass" border="1">
			<tr>
				<td class="tdclass" width="5%"><input type="checkbox" class="check-all"></td>
				<th width="5%" style="text-align:left;">Sr No.</th>
				<th width="20%" style="text-align:left;">Title</th>
				<th width="60%" style="text-align:left;">Description</th>
				<td class="tdclass" width="5%">Edit</td>
				<td class="tdclass" width="5%">Delete</td>
			</tr>
			</thead>
	
			<tfoot>
			<tr>
				<th><input type="checkbox" class="check-all"></th>
				<th style="text-align:left;">Sr No.</th>
				<th style="text-align:left;">Title</th>
				<th style="text-align:left;">Description</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			</tfoot>
		<tbody>
		<?php 
		$i = 1;
		if($newsfeedDetails){
			foreach($newsfeedDetails as $newsfeed){	
			$class = "gradeA odd";
			if($i % 2 == 0){
				$class = "gradeA even";
			}
			?>
			<tr class="<?php echo $class; ?>">
				<td style="vertical-align:top;"><input type="checkbox" value="<?php echo $newsfeed['newsfeedsId'];?>" name="delete[]"></td>
				<td style="text-align:left;vertical-align:top;"><?php echo $i;?></td>
				<td style="text-align:left;vertical-align:top;"><?php echo $newsfeed['newsfeedTitle']?></td>
				<td style="text-align:left;vertical-align:top;"><?php echo nl2br($newsfeed['newsfeedDescription']); ?></td>
				<td style="vertical-align:top;"><a href="<?php echo site_url("admin/newsfeed/edit/".$newsfeed['newsfeedsId']); ?>"><img alt="Pencil" src="<?php echo base_url(); ?>/public/admin/img/icons/buttons/pencil.png"></a></td>
				<td style="vertical-align:top;"><a href="#" onclick="javascript : deleteConfirm('<?php echo site_url("admin/newsfeed/delete/".$newsfeed['newsfeedsId']); ?>');"><img alt="Pencil" src="<?php echo base_url(); ?>/public/admin/img/icons/buttons/trashcan.png"></a></td>
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
	</form>
</article>