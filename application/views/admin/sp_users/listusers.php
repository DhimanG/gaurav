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
				
		<h2 style="padding-right: 90px;">Sp_Users</h2>
		<nav>
			<ul class="button-switch">
				<li><a class="button" href="<?php echo site_url("admin/sp_users/adduser"); ?>">Add Sp_User</a></li>
			</ul>
		</nav>

		<a title="Toggle Content Block" class="content-box-minimizer" href="#" style="display: block; left: 324px;">Toggle</a>
	</header>

	<section>
		<div class="dataTables_wrapper">
		<form name="frmlistusers" id="frmlistusers" method="post">
		<table class="datatable">
		<thead  class="trclass">
		<tr>
			<!--<td class="tdclass"><input type="checkbox" class="check-all"></th>-->
			<th width="10%">Sr No.</th>
			<th width="20%"style="text-align:left;">Sp_User Name</th>
			<th width="60%" style="text-align:left;">Sp_User Email</th>
			<td width="10%" class="tdclass">Edit</th>
			<!--<td class="tdclass">Delete</th>-->
		</tr>
		</thead>
		<tfoot>
		<tr>
			<!--<th><input type="checkbox" class="check-all"></th>-->
			<th>Sr No.</th>
			<th style="text-align:left;">Sp_User Name</th>
			<th style="text-align:left;">Sp_User Email</th>
			<th>Edit</th>
			<!--<th>Delete</th>-->
		</tr>
		</tfoot>
		<tbody>
		<?php 
		$i = 1;
		foreach($usersDetails as $users){	
		$class = "gradeA odd";
		if($i % 2 == 0){
			$class = "gradeA even";
		}
		?>
		<tr class="<?php echo $class; ?>">
			<!--<td><input type="checkbox"></td>-->
			<td class="sorting_1"><?php echo $i; ?></td>
			<td style="text-align:left;"><?php echo $users['userid']; ?></td>
			<td style="text-align:left;"><?php echo $users['email']; ?></td>
			<td><a href="<?php echo site_url("admin/sp_users/edituser/".$users['id']); ?>"><img alt="Pencil" src="<?php echo base_url(); ?>/public/admin/img/icons/buttons/pencil.png"></a></td>
			<!--<td><a href="<?php echo site_url("admin/adminstrator/delete"); ?>"><img alt="Pencil" src="<?php echo base_url(); ?>/public/admin/img/icons/buttons/trashcan.png"></a></td>-->
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