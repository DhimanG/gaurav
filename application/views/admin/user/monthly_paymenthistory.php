<article class="content-box minimizer">
	<header>
		<h2 style="padding-right: 90px;">Payment History</h2>
		<nav>
			<ul class="button-switch">
				<li><a class="button" href="<?php echo site_url("admin/user/"); ?>">List User</a></li>
			</ul>
		</nav>
		<a title="Toggle Content Block" class="content-box-minimizer" href="#" style="display: block; left: 324px;">Toggle</a>
	</header>
	<section>
		<div class="dataTables_wrapper">
			Payment History of <h1><?php echo $userArr[0]['userName']; ?> </h1>
		<form name="frmlistuser" id="frmlistuser" method="post">
		<table class="datatable">
			<thead class="trclass" border="1">
			<tr>
				<th width="10%" style="text-align:left;padding-left:10px;">Sr No.</th>
				<th width="20%" style="text-align:left;">Amount</th>
				<th width="70%" style="text-align:left;">Date</th>
			</tr>
			</thead>
	
			<tfoot>
			<tr>
				<th style="text-align:left;padding-left:10px;">Sr No.</th>
				<th>Amount</td>
				<th>Date</td>
			</tr>
			</tfoot>
		<tbody>
		<?php 
		$i = 1;
		if($paymentHistory){
			foreach($paymentHistory as $history){	
			$class = "gradeA odd";
			if($i % 2 == 0){
				$class = "gradeA even";
			}
			?>
			<tr class="<?php echo $class; ?>">
				<td style="text-align:left;vertical-align:top;padding-left:10px;"><?php echo $i;?></td>
				<td style="text-align:left;vertical-align:top;"><?php echo $history['paymentAmount']?></td>
				<td style="text-align:left;vertical-align:top;"><?php echo nl2br($history['paymentCreatedOn']); ?></td>
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