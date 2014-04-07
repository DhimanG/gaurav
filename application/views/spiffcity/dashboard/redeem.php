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
				&lt;div class="alert alert-block span10"&gt;
					&lt;h4 class="alert-heading"&gt;Warning!&lt;/h4&gt;
					&lt;p&gt;You need to have &lt;a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank"&gt;JavaScript&lt;/a&gt; enabled to use this site.&lt;/p&gt;
				&lt;/div&gt;
			</noscript>
			
			<div class="span10" id="content" style="min-height: 783px;">
			<!-- start: Content -->
			

			<div class="row breadrump-block">
				<hr>
                <div class="span8">
				<ul class="breadcrumb">
					<li>
						<a href="<?php echo base_url(); ?>spiffcity/dashboard">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Apps</a>
					</li>                   
                    
				</ul>
                </div>
                <div class="span3">
                	<form class="form-search">
                      <div class="input-append">
                          <input type="text" placeholder="Find apps, people, offers" class="input-large search-query" id="appendedInputButton">
                          <button type="button" class="btn"> <i class="icon-search"></i></button>
           			  </div>
                    </form>
                    
                </div>
                	<hr>
			   </div>
            
            
           
      <div id="redeem-list" class="row-fluid ">                	
           <div class="span12 offer-tabnav">
                  <ul class="nav nav-tabs add_cart_view">
                    <li class="active"><a id="giftcardtab-btn" data-toggle="tab" href="#giftcard"> <i class="icon-shopping-cart"></i> Gift Cards</a></li>
                    <li style="float: right;"><a href="<?php echo base_url(); ?>spiffcity/cart" class="btn" >Checkout</a></li>
                  </ul>
            </div>
          </div>  
      
      <div class="row-fluid"> 
           <div class="span12 ">                
                <div class="offer-tabs">
                  <div class="tab-content">
                       <div id="giftcard" class="tab-pane active">
                          <div class="row-fluid">
                                  <div class=" span8  pull-right">
                                      <div id="filters">
                                        <ul class="option-set">
                                          <li><a class="selected" href="#filter">All </a></li>
                                          <li><a href="#filter">filter 1  (156)</a></li>
                                          <li><a href="#filter">filter 2  (250)</a></li>
                                           <li><a href="#filter">filter 3  (150)</a></li>
                                        </ul>
                                      </div>
                                  </div>
                              </div>
                             <div class="row-fluid" id="portfolio-wrapper">
                              <?php foreach($coupons as $cp){?>
                                <div class="span2 portfolio-item">
                                  <div class="picture">
                                    <a class="card-detail" title="<?php echo $cp['title'];?>" href="#" ">
                                      <img data-coupon_id="<?php echo $cp['id']; ?>" class="coupon" alt="<?php echo $cp['title'];?>" src="<?php echo base_url().'Assets/spiffcity/coupons/'.$cp['img'];?>">
                                      <div class="image-overlay-link"></div>
                                    </a>
                                    <div class="item-description alt">
                                      <h5>
                                        <a class="coupon" href="#"><?php echo ucFirst($cp['title']);?></a>
                                      </h5>
                                      <span class="rewardvalue ">$<?php echo $cp['Price'];?></span>
                                    </div>
                                    <div class="post-meta clearfix">
                                      <span class="thumb-rating">
                                        <div class="btn-group ">
                                          <a href="#" class="btn btn-mini"><i class="icon-thumbs-up icon-black"></i><?php echo $cp['likes'];?>&nbsp likes</a>
                                        </div>
                                      </span>
                                    </div>
                                  </div>
                                </div>
                                   
                              <?php }?>     
                                  
                             </div>
                       </div>                                 
                  </div>
                </div>
             </div>
       </div>     
               
               
                      
                
			<hr>
			</div><!--/row-->
    		
		
			<!-- end: Content -->
			
</div><!--/fluid-row-->
				
		<div id="myModal" class="modal hide fade">
			<div class="modal-header">
				<button data-dismiss="modal" class="close" type="button">×</button>
				<h3>Settings</h3>
			</div>
			<div class="modal-body">
				<p>Here settings can be configured...</p>
			</div>
			<div class="modal-footer">
				<a data-dismiss="modal" class="btn" href="#">Close</a>
				<a class="btn btn-primary" href="#">Save changes</a>
			</div>
		</div>
        <!-- Start:modal box for top giftcard detail page -->
        <div id="Modal-card" class="modal hide fade">
          
        </div>
        <!-- End:modal box for top giftcard detail page -->
        