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
				<li><a class="button" href="<?php echo site_url("admin/category/add"); ?>">Add Category</a></li>
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
			<!--<td class="tdclass"><input type="checkbox" class="check-all"></th>-->
			<th width="10%">Sr No.</th>
			<th width="40%" style="text-align:left;">Category Name</th>
			<th width="40%" style="text-align:left;">Parent Category</th>
			<td width="10%" class="tdclass">Edit</th>
			<!--<td class="tdclass">Delete</th>-->
		</tr>
		</thead>
		<tfoot>
		<tr>
			<!--<th><input type="checkbox" class="check-all"></th>-->
			<th>Sr No.</th>
			<th style="text-align:left;">Category Name</th>
			<th style="text-align:left;">Parent Category</th>
			<th>Edit</th>
			<!--<th>Delete</th>-->
		</tr>
		</tfoot>
		<tbody>
		<?php 
		$i = 1;
		foreach($categoryDetails as $category){	
		$class = "gradeA odd";
		if($i % 2 == 0){
			$class = "gradeA even";
		}
		?>
		<tr class="<?php echo $class; ?>">
			<!--<td><input type="checkbox"></td>-->
			<td class="sorting_1"><?php echo $i; ?></td>
			<td style="text-align:left;"><?php echo $category['docCategoryName']; ?></td>
			<td style="text-align:left;"><?php echo $arrParentCat[$category['docCategoryParentId']]; ?></td>
			<td><a href="<?php echo site_url("admin/category/edit/".$category['docCategoryId']); ?>"><img alt="Pencil" src="<?php echo base_url(); ?>/public/admin/img/icons/buttons/pencil.png"></a></td>
			<!--<td><a href="<?php echo site_url("admin/category/delete"); ?>"><img alt="Pencil" src="<?php echo base_url(); ?>/public/admin/img/icons/buttons/trashcan.png"></a></td>-->
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