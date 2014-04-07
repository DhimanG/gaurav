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
				
		<h2 style="padding-right: 90px;">Advertise</h2>
		
		<a title="Toggle Content Block" class="content-box-minimizer" href="#" style="display: block; left: 324px;">Toggle</a>
	</header>

	<section>
		<div class="dataTables_wrapper">
		<form name="frmlistadminstrator" id="frmlistadminstrator" method="post">
		<table class="datatable">
		<thead  class="trclass">
		<tr>
			<th width="10%">Sr No.</th>
			<th width="20%">Company Name</th>
			<th width="10%" >Adress</th>
			<th width="10%" >Phone</th>
			<th width="10%" >Email</th>
			<th width="40%" >Requirement</th>
		
		</tr>
		</thead>
		<tfoot>
		<tr>
			<th width="10%">Sr No.</th>
			<th width="20%">Company Name</th>
			<th width="10%" >Adress</th>
			<th width="10%" >Phone</th>
			<th width="10%" >Email</th>
			<th width="40%" >Requirement</th>
		</tr>
		</tfoot>
		<tbody>
		<?php 
		$i = 1;
		foreach($advertiseDetails as $advertise){	
		$class = "gradeA odd";
		if($i % 2 == 0){
			$class = "gradeA even";
		}
		?>
		<tr class="<?php echo $class; ?>">
			<td class="sorting_1"><?php echo $i; ?></td>
			<td><?php echo $advertise['company_name']; ?></td>
			<td><?php echo $advertise['address']; ?></td>
			<td><?php echo $advertise['Phone']; ?></td>
			<td><?php echo $advertise['email_id']; ?></td>
			<td><?php echo $advertise['Requirement']; ?></td>
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