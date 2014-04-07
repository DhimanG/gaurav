<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $cmsDetails[0]['cmsTitle'];?></title>
<meta name="description" content="<?php echo $cmsDetails[0]['cmsKeyword'];?>" /> 
<meta name="keywords" content="<?php echo $cmsDetails[0]['cmsKeyword'];?>" />

<link href="<?php echo base_url(); ?>public/css/style_sheet.css" type="text/css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>public/SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/SpryAssets/SpryAccordion.js" type="text/javascript"></script>
<link href="<?php echo base_url(); ?>public/SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>public/SpryAssets/SpryAccordion.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery-1.3.1.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/js/jquery.validation.js"></script>

<link href="<?php echo base_url(); ?>public/css/nyroModal.css" type="text/css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>public/js/jquery.nyroModal.js" type="text/javascript"></script>

</head>
<?php 
$segemntUri	= $this->uri->segment('1');

$this->load->helper('front_common');
$arrBannerFront = frontBanner();		

$arrProfileDetails = frontProfileDetails();	
$newsFeed	= frontNewsDetails();

$catDetails	= frontMainCatDetails();
?>
<script>
$(document).ready(function(){ // jQuery DOM ready function.
	$("#frmSearch").validate();
	
	$('#SubmitSearch').click(function(){
		$('#frmSearch').submit();
	});

	
	$("#frmView").validate();
});
</script>
<body>
<!--start_wrapper-->
	<div id="wrapper">
       <div id="header"><!--start_header-->
            <div class="logo"><a href="<?php echo site_url(); ?>"><img src="<?php echo base_url(); ?>public/images/logo.png" width="308" height="67" alt="logo" /></a></div>
            <div class="right_cont">
            	<?php if($this->session->userdata('logged_user_in')) { ?>
            		<div class="search">
					<?php
						$attributes = array('id' => 'frmSearch');
						echo form_open('documents/search',$attributes);
						$dataadminstratorname = array(
							  'name'        => 'txtSearch',
							  'id'          => 'txtSearch',
							  'class'		=> 'small required'
							);
						echo form_input($dataadminstratorname);
					?>
                	 <div class="search_icon">
                    	<?php //	 echo form_submit('cmdSubmit', 'search', 'class="searchButton"');?>
                    	<a href="#"><img src="<?php echo base_url(); ?>public/images/search_icon.png" width="15" height="17" alt="" id="SubmitSearch" /></a>
                    </div>
                    <?php echo form_close(); ?>
                    </div>
                    <?php } ?>
					<?php if($this->session->userdata('logged_user_in')) { ?>
                <div class="right_nav">
					<?php }else{ ?>
                <div class="right_nav" style="margin:36px 0 0">
				<?php } ?>
                	<ul>
                		<?php if($this->session->userdata('logged_user_in') ) { ?>
                			<li class="profile_info"><a href="<?php echo base_url().'profile'; ?>"><?php echo $this->session->userdata('name') ?></a></li>
	                        <li><a href="<?php echo site_url(); ?>">Home</a>|</li>
							 <li><a href="<?php echo site_url('profile/change_password'); ?>">Change Password </a>|</li>
	                        <li><a href="<?php echo site_url("logout"); ?>">Logout</a></li>
                		<?php } else { ?>
                    		<li style="width:300px;text-align:right;"><a href="<?php echo site_url(); ?>">Home</a>|</li>
							<li><a href="<?php echo site_url("login"); ?>">Login</a>|</li>
	                        <li><a href="<?php echo site_url("signup"); ?>">Sign Up</a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div><!--end_header-->
        <div id="main_wrapper"><!-- Main Wrapper Start -->
			<?php
			if ($this->session->flashdata('error')){ 
			?>
			<!-- Notification -->
					<h4 class="errormsg"><?php echo $this->session->flashdata('error'); ?></h4>
			<!-- /Notification -->
			<?php
			}
			?>
			
			<?php
			if ($this->session->flashdata('success')){ 
			?> 
			<!-- Notification -->
					<h4 class="success"><?php echo $this->session->flashdata('success'); ?></h4>
			<!-- /Notification -->
			<?php
			}
			?>

        	<div class="main_inner"><!-- Main Inner Start -->
              <div id="terms">
              		<?php	$this->load->view($middle); 	?>
              </div>	
              <div class="right-col">
              	<div class="add_ban">
              		<?php if($arrBannerFront[0]['bannerImage']!=''){?>
              	 		<a href="<?php echo $arrBannerFront[0]['bannerLink'];?>" target="_blank"> <img src="<?php echo base_url().'public/upload/banner/'.$arrBannerFront[0]['bannerImage'];?>" width="171" height="95" alt="" /> </a>
              	 	<?php }else{ echo  $arrBannerFront[0]['bannerCode'];}?>
              	 </div>
                 <div class="add_ban1">
                 	<?php if($arrBannerFront[1]['bannerImage']!=''){?>
              	 		<a href="<?php echo $arrBannerFront[1]['bannerLink'];?>" target="_blank"> <img src="<?php echo base_url().'public/upload/banner/'.$arrBannerFront[1]['bannerImage'];?>" width="175" height="175" alt="" /> </a>
              	 	<?php }else{ echo  $arrBannerFront[1]['bannerCode'];}?>
              	 </div>
                 <div class="add_ban1">
                 	<?php if($arrBannerFront[2]['bannerImage']!=''){?>
              	 		<a href="<?php echo $arrBannerFront[2]['bannerLink'];?>" target="_blank"> <img src="<?php echo base_url().'public/upload/banner/'.$arrBannerFront[2]['bannerImage'];?>" width="175" height="175" alt="" /> </a>
              	 	<?php }else{ echo  $arrBannerFront[2]['bannerCode'];}?>
                 </div>
                 <div class="add_ban1">
                 	<?php if($arrBannerFront[3]['bannerImage']!=''){?>
              	 		<a href="<?php echo $arrBannerFront[3]['bannerLink'];?>" target="_blank"> <img src="<?php echo base_url().'public/upload/banner/'.$arrBannerFront[3]['bannerImage'];?>" width="171" height="95" alt="" /> </a>
              	 	<?php }else{ echo  $arrBannerFront[3]['bannerCode'];}?>
              	 </div>
              </div>
            </div><!-- Main Inner End -->
        </div><!-- Main Wrapper End -->
        <div id="footer"><!--start_footer-->
                <?php	$this->load->view('footer'); 	?>
        </div><!--start_footer-->
        
</div><!--end_wrapper-->
<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
var Accordion1 = new Spry.Widget.Accordion("Accordion1");
//-->
</script>
</body>
	
</html>
