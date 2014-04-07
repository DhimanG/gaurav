<?php //print_r($coupon);exit;?>
<div class="modal-header">
  <button data-dismiss="modal" class="close" type="button">×</button>
  <h3>Gift Card</h3>
</div>
<div class="modal-body">            	
  <div class="offer-description">
    <img alt="<?php echo ucFirst($coupon->title); ?>" src="<?php echo base_url().'Assets/spiffcity/coupons/'.$coupon->img;?>">
    <div class="title"><h3><?php echo ucFirst($coupon->title); ?></h3></div>
    <p><?php echo ucFirst($coupon->description); ?></p>
    <div class="item-description alt">
      <h5><a href="#"><?php echo ucFirst($coupon->title); ?></a></h5>
      <span class="rewardvalue ">$<?php echo $coupon->Price; ?></span>
    </div>     		
  </div>
</div>
<div class="modal-footer">
  <a data-dismiss="modal" class="btn" href="#">Close</a>
 <!-- <a data-coupon_id="<?php echo $coupon->id; ?>" data-coupon_title="<?php echo $coupon->title; ?>" data-coupon_price="<?php echo $coupon->Price; ?>" data-coupon_description="<?php echo $coupon->description; ?>" class="add_cart btn btn-primary" href="<?php echo base_url(); ?>spiffcity/cart/add_cart_coupon">Add to Cart</a>-->
  <a class="add_cart btn btn-primary" href="<?php echo base_url(); ?>spiffcity/cart/add_cart?id=<?php echo $coupon->id; ?>">Add to Cart</a>
</div>
            