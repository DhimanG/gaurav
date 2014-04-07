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
				
		<h2 style="padding-right: 90px;">Category</h2>
		<nav>
			<ul class="button-switch">
				<li><a class="button" href="<?php echo site_url("admin/payment/add"); ?>">Add Payment Type</a></li>
			</ul>
		</nav>

		<a title="Toggle Content Block" class="content-box-minimizer" href="#" style="display: block; left: 324px;">Toggle</a>
	</header>

	<section>
		<div class="dataTables_wrapper">
		<form name="frmlistcategory" id="frmlistcategory" method="post">
		<table class="datatable">
		<thead  class="trclass">
		<tr>
			<td class="tdclass"><input type="checkbox" class="check-all"></th>
			<th width="10%">Sr No.</th>
			<th width="40%" >Name</th>
			<th width="40%" >Amount</th>
			<th >Period</th>
			<td width="10%" class="tdclass">Edit</th>
			<td class="tdclass">Delete</th>
		</tr>
		</thead>
		<tfoot>
		<tr>
			<th><input type="checkbox" class="check-all"></th>
			<th>Sr No.</th>
			<th >Name</th>
			<th >Amount</th>
			<th >Period</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		</tfoot>
		<tbody>
		<?php 
		$i = 1;
		foreach($paymentDetails as $payment){	
		$class = "gradeA odd";
		if($i % 2 == 0){
			$class = "gradeA even";
		}
		?>
		<tr class="<?php echo $class; ?>">
			<td><input type="checkbox"></td>
			<td class="sorting_1"><?php echo $i; ?></td>
			<td ><?php echo $payment['name']; ?></td>
			<td ><?php echo $payment['amount']; ?></td>
			<td ><?php echo $payment['period']; ?></td>
			<td><a href="<?php echo site_url("admin/payment/edit/".$payment['payment_details_id']); ?>"><img alt="Pencil" src="<?php echo base_url(); ?>/public/admin/img/icons/buttons/pencil.png"></a></td>
			<td><a href="<?php echo site_url("admin/category/delete"); ?>"><img alt="Pencil" src="<?php echo base_url(); ?>/public/admin/img/icons/buttons/trashcan.png"></a></td>
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