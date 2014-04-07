    </div>
	</div>
</div>
<!-- start: Header -->	
		<div class="container-fluid">
		<div class="row-fluid">
				
			<!-- start: Main Menu -->
			<div class="span2 main-menu-span">
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li><a href="<?php echo base_url(); ?>spiffcity/popular"><i class="icon-home icon-white"></i><span class="hidden-tablet"> Home</span></a></li>
						<li><a href="<?php echo base_url(); ?>spiffcity/dashboard"><i class="icon-home icon-white"></i><span class="hidden-tablet"> Dashboard</span></a></li>
            <li><a href="<?php echo base_url(); ?>spiffcity/profile"><i class="icon-user icon-white"></i><span class="hidden-tablet"> My Account</span></a></li>
            <li><a href="<?php echo base_url(); ?>spiffcity/friends"><i class="icon-globe icon-white"></i><span class="hidden-tablet"> Friends</span></a></li>
            <li><a href="<?php echo base_url(); ?>spiffcity/invite"><i class="icon-bullhorn icon-white"></i><span class="hidden-tablet"> Invite Friends</span></a></li> 
            <li><a href="<?php echo base_url(); ?>spiffcity/activities"><i class="icon-tasks icon-white"></i><span class="hidden-tablet"> Activities</span></a></li>
            <li class="active"><a href="<?php echo base_url(); ?>spiffcity/redeem"><i class="icon-tags icon-white"></i><span class="hidden-tablet"> Redeem</span></a></li>
					</ul>
				</div><!--/.well -->
			</div><!--/span-->
			<!-- end: Main Menu -->
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			
			<div style="min-height: 780px;" id="content" class="span10 shop_h">
			<!-- start: Content -->
			

			<div class="row breadrump-block">
				<hr>
                <div class="span8">
				<ul class="breadcrumb">
					<li>
						<a href="http://www.rosycontact.com/spiffcity/dashboard/index.html">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Apps</a>
					</li>                   
                    
				</ul>
                </div>
                <div class="span3">
                	<form class="form-search">
                      <div class="input-append">
                          <input id="appendedInputButton" class="input-large search-query" placeholder="Find apps, people, offers" type="text">
                          <button class="btn" type="button"> <i class="icon-search"></i></button>
           			  </div>
                    </form>
                    
                </div>
                	<hr>
			</div>
            
            
           
                <div class="row-fluid sortable ui-sortable" id="apps-list">
                	<div class="title">
                      <h3>Shopping Cart</h3>
                    </div>
               	</div>
                <div class="row-fluid">
                    <div class="span12">
            <table class="table table-striped" id="cart_table">
              <tbody>
                
                <tr>
                  <?php if(!$this->cart->contents()){
                    echo 'You don\'t have any items yet.';
                  }
                    else{
                  ?>
                  
                  <th colspan="2">Item Description</th>
                  <th>Price</th>
                  <th class="product-qty">Qty</th>
                  <th class="product-delete">Delete</th>
                  <th class="text-center">Total</th>
                </tr>
                <?php
                  $sub_total='0';
                  $c='1';
                  
                  foreach($this->cart->contents() as $cc){
                 //print_r($this->cart->contents());exit;
                ?>
                <tr id="row<?php echo $c;?>" data-rowid="<?php echo $cc['rowid'];?>">
                  <td width="17%" class="product-img first  ">
                      <a title="none" href="#"><img alt="<?php echo $cc['name'];?>" src="<?php echo base_url().'Assets/spiffcity/coupons/'.$cc['option'];?>"></a>                                    
                  </td>
                  <td width="32%" class="product-name" name ="p_name" id="name"><h3><?php echo $cc['name'];?></h3></td>
                  <td width="15%" class="product-price price" name="price"><?php echo $cc['price'];?></td>
                  <td width="15%" align="center" class="product-qty " name="qty"><input class="input_qty qty" type="text" onfocus="this.select();"   value="<?php echo $cc['qty']; ?>" id="qty" name="qty" size="4"></td>
                  <td width="15%" align="center" class="product-delete" ><a data-id="<?php echo $cc['rowid'];?>" class="remove_cart"  href="#">Remove</a></td>
                  <td width="10%" class="product-total last qty_total" name="total"><?php echo $total =$cc['price'] * $cc['qty'];?></td>
                </tr>
                <?php
                  //$sub_total = $sub_total + $total;
                  $c++;
                  }
                ?>
              </tbody>
            </table>
                    </div>
                </div>
                
                <div class="row-fluid">
                	<div class="span12 text-right ckeckout-total">
                    <!--<h3 class="text-right">Sub-Total &nbsp&nbsp</h3>-->
                    <h3 class="text-right sub-total">Sub-Total &nbsp&nbsp<?php echo $this->cart->format_number($this->cart->total()); ?></h3>
                    <!--<h3 class="sub-total" align="Center">Spiff Balance &nbsp&nbsp&nbsp&nbsp<?php echo $balance; ?></h3>-->

                    </div>
                </div>
          <?php }?>      
                <div class="row-fluid">
                  <div class="span12 text-right ckeckout-button">                		
                    <a class="continue-shop-btn btn"  href="<?php echo base_url(); ?>spiffcity/redeem" name="continue-shopping" id="continue-shopping">Continue Shopping</a>
                    <input type="submit" class="update-btn btn" value="Update" name="update" id="update-cart" disabled="true"> &nbsp;
                    <!--<input type="submit" class="checkout-btn" value="Checkout" name="checkout" id="checkout-button">-->
                      <script id="buynow" disabled="false" src="https://raw.github.com/paypal/JavaScriptButtons/master/dist/paypal-button.min.js?merchant=N5PPXLVFCE7K2"
                                data-button="buynow"
                                data-name="payment"
                                data-amount="<?php echo $this->cart->format_number($this->cart->total()); ?>"
                      ></script> 
                  </div>
              	</div>
            
			</div><!--/row-->
    		
		<hr>
			<!-- end: Content -->
			<!--/#content.span10--> 
				</div><!--/fluid-row-->