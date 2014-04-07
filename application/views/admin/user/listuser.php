<!-- <link href="<?php echo base_url(); ?>public/css/nyroModal.css" type="text/css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>public/js/jquery.nyroModal.js" type="text/javascript"></script>

<script type="text/javascript">
	//$(document).ready(function(){ 
	$(function() {
	  $('.nyroModal').nyroModal();
	});
</script> -->

<article class="content-box minimizer">
	<header>
		<h2 style="padding-right: 90px;">User</h2>
		
		<a title="Toggle Content Block" class="content-box-minimizer" href="#" style="display: block; left: 324px;">Toggle</a>
	</header>
	<section>
		<div class="dataTables_wrapper">
		<form name="frmlistuser" id="frmlistuser" method="post">
		<table class="datatable">
			<thead class="trclass" border="1">
			<tr>
				<th width="10%" style="text-align:left;padding-left:10px;">Sr No.</th>
				<th width="20%" style="text-align:left;">Name</th>
				<th width="30%" style="text-align:left;">Email</th>
				<th width="20%" style="text-align:left;">Package Detail</th>
				<th width="5%" style="text-align:left;">Flag</th>
				<td class="tdclass" width="10%">Payment History</td>
				<td class="tdclass" width="10%">View Detail</td>
			</tr>
			</thead>
	
			<tfoot>
			<tr>
				<th style="text-align:left;padding-left:10px;">Sr No.</th>
				<th style="text-align:left;">Name</th>
				<th style="text-align:left;">Email</th>
				<th style="text-align:left;">City</th>
				<th style="text-align:left;">Flag</th>
				<th>Payment History</td>
				<th>View Detail</td>
			</tr>
			</tfoot>
		<tbody>
		<?php 
		$i = 1;
		if($userDetails){
			foreach($userDetails as $user){	
			$class = "gradeA odd";
			if($i % 2 == 0){
				$class = "gradeA even";
			}
			?>
			<tr class="<?php echo $class; ?>">
				<td style="text-align:left;vertical-align:top;padding-left:10px;"><?php echo $i;?></td>
				<td style="text-align:left;vertical-align:top;"><?php echo $user['userName']?></td>
				<td style="text-align:left;vertical-align:top;"><?php echo nl2br($user['userEmail']); ?></td>
				<td style="text-align:left;vertical-align:top;"><a href="<?php echo site_url("admin/user/package_subscription/".$user['userId']); ?>"><img alt="View User" src="<?php echo base_url(); ?>/public/admin/img/icons/buttons/user.png"></a>
				<?php echo nl2br($user['userCity']); ?>
				</td>
				<td style="text-align:left;vertical-align:top;">
					<?php
						if($user['userPaidFlag'] == '1')
							echo "Paid";
						else
							echo "Demo";
					 ?>
				</td>
				<td style="vertical-align:top;"><a href="<?php echo site_url("admin/user/paymentHistory/".$user['userId']); ?>" class="modal"><img alt="Payment History" src="<?php echo base_url(); ?>/public/admin/img/icons/buttons/price_tags.png"></a></td>
				<td style="vertical-align:top;"><a href="<?php echo site_url("admin/user/view/".$user['userId']); ?>"><img alt="View User" src="<?php echo base_url(); ?>/public/admin/img/icons/buttons/user.png"></a></td>
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
		</form>
		</div>
	</section>
</article>