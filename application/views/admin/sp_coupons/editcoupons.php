<script>
 
</script>
<?php
 if ($this->session->flashdata('error')){
?>
<!-- Notification -->
<div class="notification error">
 <a href="#" class="close-notification tooltip" title="Hide Notification">x</a>
 <h4>Error</h4>
 <p><?php echo $this->session->flashdata('error'); ?></p>
</div>
<!-- /Notification -->
<?php
}
?>
<article class="content-box minimizer">
<header>				
 <h2 style="padding-right: 90px;">Sp_Coupons</h2>
 <nav>
  <ul class="button-switch">
   <li><a class="button" href="<?php echo site_url("admin/sp_coupons/"); ?>">List Sp_Coupons</a></li>
  </ul>
 </nav>
 <a title="Toggle Content Block" class="content-box-minimizer" href="#" style="display: block; left: 324px;">Toggle</a>
</header>
<section>
 <?php
  $attributes = array('id' => 'frmeditcoupon')	;
  echo form_open('admin/sp_coupons/editcoupons/'.$couponDetails[0]['id'],$attributes);
  //echo form_open('admin/sp_users/edituser/'.$usersDetails[0]['id'],$attributes);
  echo form_fieldset('Edit Coupon');
  

  $coupontitle = array(
     'name'  =>  'title',
     'id'    =>  'title',
     'class' =>  'required',
     'value' =>  $couponDetails[0]['title']
  );
  $couponimg = array(
     'name'  =>  'img',
     'id'    =>  'img',
     'class' =>  'small required',
     'value' =>  $couponDetails[0]['img']
  );
  $coupondesc = array(
     'name'  =>  'description',
     'id'    =>  'description',
     'class' =>  'required',
     'value' =>  $couponDetails[0]['description']
  );
  $couponprice = array(
     'name'  =>  'Price',
     'id'    =>  'Price',
     'class' =>  'small required',
     'value' =>  $couponDetails[0]['Price']
  );
 ?>
 <dl>
  <dt>
   <label>Sp_Coupon Name</label>
  </dt>
  <dd>
   <?php echo form_input($coupontitle); ?>
  </dd>
  <dt>
   <label>Sp_Coupon Image</label>
  </dt>
  <dd>
   <?php echo form_input($couponimg); ?>
  </dd>
  <dt>
   <label>Sp_Coupon Description</label>
  </dt>
  <dd>
   <?php echo form_input($coupondesc); ?>  
  </dd>
  <dt>
   <label>Sp_Coupon Price</label>
  </dt>
  <dd>
   <?php echo form_input($couponprice); ?>
  </dd>
 </dl>
 <?php
  echo form_fieldset_close(); 
  echo form_submit('cmdSubmit', 'Update Sp-Coupon');
  echo form_close();
 ?>

  
 </section>
</article>