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
				
		<h2 style="padding-right: 90px;">Sp_Points</h2>
		<nav>
			<ul class="button-switch">
				<li><a class="button" href="<?php echo site_url("admin/sp_coupons/addcoupon"); ?>">Add Sp_Coupon</a></li>
			</ul>
		</nav>	

		<a title="Toggle Content Block" class="content-box-minimizer" href="#" style="display: block; left: 324px;">Toggle</a>
	</header>

	<section>
		<div class="dataTables_wrapper">
		<form name="frmlistcoupons" id="frmlistcoupons" method="post">
		<table class="datatable">
		<thead  class="trclass">
		<tr>
			<!--<td class="tdclass"><input type="checkbox" class="check-all"></th>-->
			<th width="10%">Sr No.</th>
			<th width="20%" style="text-align:left;">Title</th>
			<th width="30%" style="text-align:left;">Image</th>
			<th width="30%" style="text-align:left;">Description</th>
			<th width="20%" style="text-align:left;">Price</th>
			<td width="10%" class="tdclass">Edit</th>
			<!--<td class="tdclass">Delete</th>-->
		</tr>
		</thead>
		<tfoot>
		<tr>
			<!--<th><input type="checkbox" class="check-all"></th>-->
			<th>Sr No.</th>
			<th style = "text-align:left;">Title</th>
			<th style = "text-align:left;">Image</th>
			<th style = "text-align:left;">Description</th>
			<th style = "text-align:left;">Price</th>
			<th>Edit</th>
			<!--<th>Delete</th>-->
		</tr>
		</tfoot>
		<tbody>
		<?php 
		$i = 1;
		foreach($couponsDetails as $coupons){	
		$class = "gradeA odd";
		if($i % 2 == 0){
			$class = "gradeA even";
		}
		?>
		<tr class="<?php echo $class; ?>">
			<!--<td><input type="checkbox"></td>-->
			<td class="sorting_1"><?php echo $i; ?></td>
			<td style="text-align:left;"><?php echo $coupons['title']; ?></td>
			<td style="text-align:left;">
				<?php if($coupons['img'] != ''){ ?>
					<img src="<?php echo site_url().'Assets/spiffcity/coupons/'.$coupons['img'];?>" width="100"/>
				<?php } else echo "Google Code" ?>
			</td>
			<td style="text-align:left;"><?php echo $coupons['description']; ?></td>
			<td style="text-align:left;"><?php echo $coupons['Price']; ?></td>
			<td><a href="<?php echo site_url("admin/sp_coupons/editcoupons/".$coupons['id']); ?>"><img alt="Pencil" src="<?php echo base_url(); ?>/public/admin/img/icons/buttons/pencil.png"></a></td>
			
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