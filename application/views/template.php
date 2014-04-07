<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
$segemntUri	= $this->uri->segment('1');
?>
<title>Safe Docs <?php echo ($segemntUri)?"-".ucwords($segemntUri):''; ?></title> 

<link href="<?php echo base_url(); ?>public/css/style_sheet.css" type="text/css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>public/SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/SpryAssets/SpryAccordion.js" type="text/javascript"></script>
<link href="<?php echo base_url(); ?>public/SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>public/SpryAssets/SpryAccordion.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery-1.3.1.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/js/jquery.validation.js"></script>
<script src="<?php echo base_url(); ?>public/js/verticle_slide.js"></script>

<link href="<?php echo base_url(); ?>public/css/nyroModal.css" type="text/css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>public/js/jquery.nyroModal.js" type="text/javascript"></script>

</head>
<?php 

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
});
</script>
<body>
<!--start_wrapper-->
	<div id="wrapper">
    	
        <div id="header"><!--start_header-->
            <div class="logo"><a href="<?php echo site_url(); ?>"><img src="<?php echo base_url(); ?>public/images/logo.png" width="308" height="67" alt="logo" /></a></div>
            <div class="right_cont">
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
                <div class="right_nav">
                	<ul>
                    	<li class="profile_info"><a href="<?php echo base_url().'profile'; ?>"><?php echo $this->session->userdata('name') ?> </a></li>
                        <li><a href="<?php echo site_url(); ?>">Home</a>|</li>
                        <li><a href="<?php echo site_url('profile/change_password'); ?>">Change Password </a>|</li>
                        <?php /* if($this->session->userdata('paid') == '1') { ?>
                        	<li><a href="<?php echo site_url('profile/payment_history'); ?>">Payment History </a>|</li>
                        <?php }*/ ?>
                        <li><a href="<?php echo site_url("logout"); ?>">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div><!--end_header-->
        <div id="main_wrapper"><!-- Main Wrapper Start -->
        	<div class="main_inner"><!-- Main Inner Start -->
            	<div class="col-left"><!-- Col Left Start -->
                	<div class="profile_bg">
					<?php if($arrProfileDetails[0]['profile_image_path_thumb'] != ''){ ?>
					<img src="<?php echo site_url().'public/upload/user'.$this->session->userdata('userid').'/profile/thumb/'.$arrProfileDetails[0]['profile_image_path_thumb']; ?>" />
					<?php }else{ ?>
					<img src="<?php echo site_url() ?>public/images/no-image.jpg" width="150px" height="100px" />
					<?php }?>
					</div>
                    <div class="profile_name"><?php echo $arrProfileDetails[0]['userName']; ?></div>
                    <div class="acorrd">
                        <div id="Accordion1" class="Accordion" tabindex="0">
                         <div class="AccordionPanel">
                          <div class="AccordionPanelTab" onclick="window.location.href='<?php echo site_url("profile"); ?>'"> Profile </div>
                          <div class="AccordionPanelContent">
                          </div>
                        </div>
                        <div class="AccordionPanel">
                          <div class="AccordionPanelTab" onclick="window.location.href='<?php echo site_url("documents"); ?>'">Documents</div>
                          <div class="AccordionPanelContent">
                            <div class="tab">
                                <ul>
                                      <?php
									  foreach($catDetails[0] as $mainCatId => $mainCat){

										echo " <li><a href='#'>".$mainCat."</a></li>";
										if (array_key_exists($mainCatId, $catDetails)) {
											echo "<ul>";
											foreach($catDetails[$mainCatId] as $category){
												echo "<li>".$category."</li>";
												}
												echo "</ul>";
											}
										}
										?>
                                </ul>               
                            </div>
                          </div>
                        </div>
                        <div class="AccordionPanel">
                          <div class="AccordionPanelTab" onclick="window.location.href='<?php echo site_url("mutual"); ?>'">Portfolio</div>
                          <div class="AccordionPanelContent">
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php if($arrProfileDetails[0]['userAboutMySelf']!='') { ?>
                    <div class="left_cont">
                    	<div class="top_bg">&nbsp;</div>
                        <div class="mid">
                        	<div class="head">About Myself</div>	
                            <p><?php echo $arrProfileDetails[0]['userAboutMySelf']; ?></p>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="left_cont">
                    	<div class="top_bg">&nbsp;</div>
                        <div class="mid">
                        	<div class="head" style="font-size:18px;margin-bottom:10px;">Latest updates</div>
                        		<div id="marqueecontainer" onMouseover="copyspeed=pausespeed" onMouseout="copyspeed=marqueespeed">
									<div id="vmarquee" style="position: absolute; width: 98%;">
			                        	<?php foreach ($newsFeed as $latestUpdate) { ?>
			                        		<div class="head"><?php echo $latestUpdate['newsfeedTitle']; ?></div>
			                            	<p><?php echo $latestUpdate['newsfeedDescription']; ?></p>
			                            <?php  } ?>
			                        </div>
			                    </div>
                        </div>
                    </div>
                </div><!-- Col Left End -->
                <div class="mid-col"><!-- Col Middle Start -->
                	<div class="navigation">
                    	<ul>
                        	<li><a href="<?php echo site_url("profile"); ?>" class="<?php echo ( $segemntUri == 'profile'?'active':''); ?>">Profile</a></li>
                            <li><a href="<?php echo site_url("documents"); ?>" class="<?php echo ( $segemntUri == 'documents'?'active':''); ?>">Documents</a></li>
                            <li class="last"><a href="<?php echo site_url("mutual"); ?>" class="<?php echo ( $segemntUri == 'mutual'?'active':''); ?>">Mutual Fund</a></li>
                        </ul>
                    </div>
						<?php
						
							$this->load->view($middle);
						?>
                    <div class="baaner">
                    	<?php if($arrBannerFront[4]['bannerImage']!=''){?>
              	 			<a href="<?php echo $arrBannerFront[4]['bannerLink'];?>" target="_blank"> <img src="<?php echo base_url().'public/upload/banner/'.$arrBannerFront[4]['bannerImage'];?>" width="468" height="60" alt="" /> </a>
              		 	<?php }else{ echo  $arrBannerFront[4]['bannerCode'];}?>
                   </div>
              </div><!-- Col Middle End -->
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
var Accordion1 = new Spry.Widget.Accordion("Accordion1", { defaultPanel: <?php echo $tabIndex; ?> });
//-->
</script>
</body>
	
</html>