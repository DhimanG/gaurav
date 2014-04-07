<!DOCTYPE html>
<html class="csstransforms no-csstransforms3d csstransitions js cssanimations csstransitions" lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<!-- start: Meta -->
<meta charset="utf-8">
<title>Redeem - Get Spiffed your social currency engine</title>
<meta name="description" content="Get Spiffed - Your social currency engine">
<meta name="keywords" content="Get Spiffed - Your social currency engine">
<meta name="author" content="Get Spiffed - Your social currency engine">
<!-- end: Meta -->
<!-- start: Mobile Specific -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!-- end: Mobile Specific -->
<!-- start: Facebook Open Graph -->
<meta property="og:title" content="">
<meta property="og:description" content="">
<meta property="og:type" content="">
<meta property="og:url" content="">
<meta property="og:image" content="">
<!-- end: Facebook Open Graph -->
<!-- start: CSS -->
<link href="<?php echo base_url(); ?>Assets/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>Assets/css/bootstrap-responsive.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>Assets/css/style.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>Assets/css/css_002.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>Assets/css/css_004.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>Assets/css/css.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>Assets/css/css_003.css">
<!-- end: CSS -->
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
<!--start: Header -->
<header>
  <!--start: Container -->
  <div class="container">
    <!--start: Row -->
    <div class="row">
      <!--start: Logo -->
      <div class="logo span3"> <i class="ico-charts circle"></i><a class="brand" href="http://rosycontact.com/spiffcity/index.html">Get<span>Spiffed</span>.</a> </div>
      <!--end: Logo -->
      <!--start: Navigation -->
      <div class="span9">
        <div class="navbar navbar-inverse">          
            <ul class="nav">
              <li> <a href="<?php echo base_url(); ?>spiffcity/home">Home</a> </li>
              <li class="active"><a href="#">Redeem</a></li>
              <li><a href="<?php echo base_url(); ?>spiffcity/people">People</a></li>
              <li><a href="<?php echo base_url(); ?>spiffcity/login" id="home-login">Login</a></li>
            </ul>           
        </div>
      </div>
      <!--end: Navigation -->
    </div>
    <!--end: Row -->
  </div>
  <!--end: Container-->
</header>
<!--end: Header-->
<!-- start: Page Title -->
<div id="page-title">
  <div id="page-title-inner">
    <!-- start: Container -->
    <div class="container">
      <h2><i class="ico-credit ico-white"></i>Redeem</h2>
    </div>
    <!-- end: Container  -->
  </div>
</div>
<!-- end: Page Title -->
<!--start: Wrapper-->
<div id="wrapper">
  <!-- start: Container -->
  <!-- end: Container  -->
  <div class="container offer-tabnav">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#giftcard" data-toggle="tab" id="giftcardtab-btn"> <i class="icon-shopping-cart"></i> Gift Cards</a></li>
      
    </ul>
  </div>
  <div class="container offer-tabs">
    <div class="tab-content">
      <!-- start: Gift card Container -->
      <div class="tab-pane active" id="giftcard">
        <div id="filters">
          <ul class="option-set" data-option-key="filter">
            <li><a href="#filter" class="selected" data-option-value="*">All</a></li>
            <li><a href="#filter" data-option-value=".physical">Physical</a></li>
            <li><a href="#filter" data-option-value=".ecode">eCode</a></li>
          </ul>
        </div>
        <div style="position: relative; overflow: hidden; height: 666px;" id="portfolio-wrapper" class="row isotope">
          
          
          <!--- starting from here ------------------------------------------------------------------------------------->
          <?php          
          foreach($couponsDetails as $coupons){
          ?>
          <!--<div class="span2 portfolio-item physical isotope-item">
            <div class="picture">
              <a href="<?php echo base_url(); ?>spiffcity/dashboard/cart" title="Aeropostale">
                <!--<img src="<?php echo base_url()."Assets/spiffcity/coupons".$coupons['img'];?>" alt="Aeropostale"/>
                <img src="<?php echo base_url(); ?>Assets/img/aapple.jpeg" alt="Aeropostale">
                <div class="image-overlay-link"></div>
              </a>
              <div class="item-description alt">
                <h5>
                  <a href="<?php echo base_url(); ?>spiffcity/dashboard/cart">
                    Aeropostale
                  </a>
                </h5>
                <span class="rewardvalue ">50</span>
              </div>
              <div class="post-meta clearfix">
                <span class="thumb-rating">
                  <div class="btn-group ">
                    <a class="btn btn-mini" href="#">
                      <i class="icon-thumbs-up icon-black"></i>
                      216
                    </a>
                  </div>
                </span>
                <span class="card-comments">
                  <i class="mini-ico-comment"></i>
                  <a href="#">
                    89 comments
                  </a>
                </span>
              </div>
            </div>
          </div>-->
          <?php
          }
          ?>
          <!--- ending here ------------------------------------------------------------------------------------->
          
          
          <div class="span2 portfolio-item physical isotope-item">
            <div class="picture">
              <a href="<?php echo base_url(); ?>spiffcity/redeem_cart" title="Aeropostale">
                <!--<img src="<?php echo base_url()."Assets/spiffcity/coupons".$coupons['img'];?>" alt="Aeropostale"/>-->
                <img src="<?php echo base_url(); ?>Assets/img/aapple.jpeg" alt="Aeropostale">
                <div class="image-overlay-link"></div>
              </a>
              <div class="item-description alt">
                <h5>
                  <a href="<?php echo base_url(); ?>spiffcity/redeem_cart">
                    Aeropostale
                  </a>
                </h5>
                <span class="rewardvalue ">50</span>
              </div>
              <div class="post-meta clearfix">
                <span class="thumb-rating">
                  <div class="btn-group ">
                    <a class="btn btn-mini" href="#">
                      <i class="icon-thumbs-up icon-black"></i>
                      216
                    </a>
                  </div>
                </span>
                <span class="card-comments">
                  <i class="mini-ico-comment"></i>
                  <a href="#">
                    89 comments
                  </a>
                </span>
              </div>
            </div>
          </div>
          
          
          
          
           <div class="span2 portfolio-item physical isotope-item">
            <div class="picture">
              <a href="<?php echo base_url(); ?>spiffcity/redeem_cart" title="Aeropostale">
                <img src="<?php echo base_url()."Assets/spiffcity/coupons".$coupons['img'];?>" alt="<?php echo $coupons['title'];?>"/>
                <!--<img src="<?php echo base_url(); ?>Assets/img/abc.jpg" alt="Aeropostale">-->
                <div class="image-overlay-link"></div>
              </a>
              <div class="item-description alt">
                <h5>
                  <a href="<?php echo base_url(); ?>spiffcity/cart">
                    Aeropostale
                  </a>
                </h5>
                <span class="rewardvalue ">50</span>
              </div>
              <div class="post-meta clearfix">
                <span class="thumb-rating">
                  <div class="btn-group ">
                    <a class="btn btn-mini" href="#">
                      <i class="icon-thumbs-up icon-black"></i>
                      216
                    </a>
                  </div>
                </span>
                <span class="card-comments">
                  <i class="mini-ico-comment"></i>
                  <a href="#">
                    89 comments
                  </a>
                </span>
              </div>
            </div>
          </div>
          
          
          <div class="span2 portfolio-item physical isotope-item">
            <div class="picture">
              <a href="<?php echo base_url(); ?>spiffcity/redeem_cart" title="Aeropostale">
                <!--<img src="<?php echo base_url()."Assets/spiffcity/coupons".$coupons['img'];?>" alt="Aeropostale"/>-->
                <img src="<?php echo base_url(); ?>Assets/img/b1.jpg" alt="Aeropostale">
                <div class="image-overlay-link"></div>
              </a>
              <div class="item-description alt">
                <h5>
                  <a href="<?php echo base_url(); ?>spiffcity/redeem_cart">
                    Aeropostale
                  </a>
                </h5>
                <span class="rewardvalue ">50</span>
              </div>
              <div class="post-meta clearfix">
                <span class="thumb-rating">
                  <div class="btn-group ">
                    <a class="btn btn-mini" href="#">
                      <i class="icon-thumbs-up icon-black"></i>
                      216
                    </a>
                  </div>
                </span>
                <span class="card-comments">
                  <i class="mini-ico-comment"></i>
                  <a href="#">
                    89 comments
                  </a>
                </span>
              </div>
            </div>
          </div>
          
          
          
          
          
        </div>
      </div>
      <!-- End: Gift card Container -->
      
  </div>
 
</div>
<!-- end: Wrapper  -->
<!-- start: Footer Menu -->
<div id="footer-menu">
  <!-- start: Container -->
  <div class="container">
    <!-- start: Row -->
    <div class="row">
      <!-- start: Footer Menu Logo -->
      <div class="span2">
        <div id="footer-menu-logo" class="hidden-phone">
          <div id="logo-chart"></div>
          <a class="brand" href="http://rosycontact.com/spiffcity/index.html">Get<span>Spiffed</span>.</a> </div>
      </div>
      <!-- end: Footer Menu Logo -->
      <!-- start: Footer Menu Links-->
      <div class="span9">
        <div id="footer-menu-links"> <ul id="footer-nav">
            <li><a href="<?php echo base_url(); ?>spiffcity/home/index">Home</a></li>
            <li><a href="http://rosycontact.com/spiffcity/about.html">About</a></li>
            <li><a href="http://rosycontact.com/spiffcity/blog.html">Blog</a></li>
            <li><a href="http://rosycontact.com/spiffcity/contact.html">Contact</a></li>
            <li><a href="http://rosycontact.com/spiffcity/services.html">Business</a></li>
            <li><a href="http://rosycontact.com/spiffcity/terms.html">Terms</a></li>
            <li><a href="http://rosycontact.com/spiffcity/privacy.html">Privacy</a></li>
          </ul>
        </div>
      </div>
      <!-- end: Footer Menu Links-->
      <!-- start: Footer Menu Back To Top --> <div class="span1 hidden-phone">
        <div id="footer-menu-back-to-top"> <a href="#"></a> </div>
      </div>
      <!-- end: Footer Menu Back To Top -->
    </div>
    <!-- end: Row -->
  </div>
  <!-- end: Container  -->
</div>
<!-- end: Footer Menu -->
<!-- start: Footer -->
<div id="footer">
  <!-- start: Container -->
  <div class="container">
    <!-- start: Row -->
    <div class="row">
      <!-- start: About -->
      <div class="span3">
        <h3>About Us</h3>
        <p> Get Spiffed is an internet community of social media 
advocates, contributors and developers working on your behalf.  When you
 use Get Spiffed and our apps connected with the Social Currency Engine 
you become part of the community that gives you the power to capture 
your social value. </p>
      </div>
      <!-- end: About -->
      <!-- start: Photo Stream -->
      <div class="span3">
        <h3>Photo Stream</h3>
        <div class="flickr-widget">
          <script type="text/javascript" src="<?php echo base_url(); ?>Assets/js/badge_code_v2.js"></script><div class="flickr_badge_image" id="flickr_badge_image1"><a href="http://www.flickr.com/photos/29609591@N08/8637527812/"><img src="<?php echo base_url(); ?>Assets/img/8637527812_326926a060_s.jpg" alt="A photo on Flickr" title="Beech Tree Strathmore" height="75" width="75"></a></div><div class="flickr_badge_image" id="flickr_badge_image2"><a href="http://www.flickr.com/photos/29609591@N08/8627629925/"><img src="<?php echo base_url(); ?>Assets/img/8627629925_0781c1fc87_s.jpg" alt="A photo on Flickr" title="Fowlis" height="75" width="75"></a></div><div class="flickr_badge_image" id="flickr_badge_image3"><a href="http://www.flickr.com/photos/29609591@N08/8207432285/"><img src="<?php echo base_url(); ?>Assets/img/8207432285_b85b135b3e_s.jpg" alt="A photo on Flickr" title="Skotland" height="75" width="75"></a></div><div class="flickr_badge_image" id="flickr_badge_image4"><a href="http://www.flickr.com/photos/29609591@N08/8188704520/"><img src="<?php echo base_url(); ?>Assets/img/8188704520_8d7b0a9536_s.jpg" alt="A photo on Flickr" title="Elgol From Tokavaig" height="75" width="75"></a></div><div class="flickr_badge_image" id="flickr_badge_image5"><a href="http://www.flickr.com/photos/29609591@N08/8182862834/"><img src="<?php echo base_url(); ?>Assets/img/8182862834_45647ace5d_s.jpg" alt="A photo on Flickr" title="Buachaille Etive Mhor" height="75" width="75"></a></div><div class="flickr_badge_image" id="flickr_badge_image6"><a href="http://www.flickr.com/photos/29609591@N08/8171984512/"><img src="<?php echo base_url(); ?>Assets/img/8171984512_d1a55efb7b_s.jpg" alt="A photo on Flickr" title="Forth Bridge" height="75" width="75"></a></div><div class="flickr_badge_image" id="flickr_badge_image7"><a href="http://www.flickr.com/photos/29609591@N08/8164686559/"><img src="<?php echo base_url(); ?>Assets/img/8164686559_0e966d5797_s.jpg" alt="A photo on Flickr" title="Crannog Loch Tay" height="75" width="75"></a></div><div class="flickr_badge_image" id="flickr_badge_image8"><a href="http://www.flickr.com/photos/29609591@N08/8145628896/"><img src="<?php echo base_url(); ?>Assets/img/8145628896_43d24df4f3_s.jpg" alt="A photo on Flickr" title="Eilean Sionnach Isleoransay" height="75" width="75"></a></div><div class="flickr_badge_image" id="flickr_badge_image9"><a href="http://www.flickr.com/photos/29609591@N08/8141689644/"><img src="<?php echo base_url(); ?>Assets/img/8141689644_0a063815a0_s.jpg" alt="A photo on Flickr" title="Staffin Bay Ray" height="75" width="75"></a></div><span style="position:absolute;left:-999em;top:-999em;visibility:hidden" class="flickr_badge_beacon"><img src="<?php echo base_url(); ?>Assets/img/p.gif" alt="" height="0" width="0"></span>
          <div class="clear"></div>
        </div>
      </div>
      <!-- end: Photo Stream -->
      <div class="span6">
        <!-- start: Follow Us -->
        <h3>Follow Us!</h3>
        <ul class="social-grid">
          <li>
            <div class="social-item">
              <div class="social-info-wrap">
                <div class="social-info">
                  <div class="social-info-front social-twitter"> <a href="https://twitter.com/GetSpiffed"></a> </div>
                  <div class="social-info-back social-twitter-hover"> <a href="https://twitter.com/GetSpiffed"></a> </div>
                </div>
              </div>
            </div>
          </li>
          <li>
            <div class="social-item">
              <div class="social-info-wrap">
                <div class="social-info">
                  <div class="social-info-front social-facebook"> <a href="https://www.facebook.com/pages/Get-Spiffed/393235897390463?ref=ts&amp;fref=ts"></a> </div>
                  <div class="social-info-back social-facebook-hover"> <a href="https://www.facebook.com/pages/Get-Spiffed/393235897390463?ref=ts&amp;fref=ts"></a> </div>
                </div>
              </div>
            </div>
          </li>
          <li>
            <div class="social-item">
              <div class="social-info-wrap">
                <div class="social-info">
                  <div class="social-info-front social-dribbble"> <a href="http://dribbble.com/"></a> </div>
                  <div class="social-info-back social-dribbble-hover"> <a href="http://dribbble.com/"></a> </div>
                </div>
              </div>
            </div>
          </li>
          <li>
            <div class="social-item">
              <div class="social-info-wrap">
                <div class="social-info">
                  <div class="social-info-front social-flickr"> <a href="http://flickr.com/"></a> </div>
                  <div class="social-info-back social-flickr-hover"> <a href="http://flickr.com/"></a> </div>
                </div>
              </div>
            </div>
          </li>
        </ul>
        <!-- end: Follow Us -->
        <!-- start: Newsletter -->
        <form id="newsletter">
          <h3>Newsletter</h3>
          <p>Please leave us your email</p>
          <label for="newsletter_input">@:</label>
          <input id="newsletter_input" type="text">
          <input id="newsletter_submit" value="submit" type="submit">
        </form>
        <!-- end: Newsletter -->
      </div>
    </div>
    <!-- end: Row -->
  </div>
  <!-- end: Container  -->
</div>
<!-- end: Footer -->
<!-- start: Copyright -->
<div id="copyright">
  <!-- start: Container -->
  <div class="container">
    <div class="span12">
      <p> © 2012, <a href="http://clabs.co/">creativeLabs</a>. Designed by <a href="http://clabs.co/">creativeLabs</a> in Poland <img src="<?php echo base_url(); ?>Assets/img/poland2.png" alt="Poland" style="margin-top:-4px"> </p>
    </div>
  </div>
  <!-- end: Container  -->
</div>
<!-- end: Copyright -->
<!-- start: Java Script -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo base_url(); ?>Assets/js/jquery-1.js"></script>
<script src="<?php echo base_url(); ?>Assets/js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>Assets/js/isotope.js"></script>
<script src="<?php echo base_url(); ?>Assets/html/jquery.html"></script>
<script src="<?php echo base_url(); ?>Assets/js/flexslider.js"></script>
<script src="<?php echo base_url(); ?>Assets/js/carousel.js"></script>
<script src="<?php echo base_url(); ?>Assets/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>Assets/js/slider.js"></script>
<script src="<?php echo base_url(); ?>Assets/js/fancybox.js"></script>
<script defer="defer" src="<?php echo base_url(); ?>Assets/js/custom.js"></script>
<script>
$(document).ready(function() {
        $(function(){
			  var hash = window.location.hash;
			  hash && $('ul.nav a[href="' + hash + '"]').tab('show');
			});
		});
        </script>
<!-- end: Java Script -->


</body></html>