<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Safe Doc</title>
<meta name="description" content="Safe Doc.. need to give hardcode." /> 
<meta name="keywords" content="Safe Doc.. need to give hardcode." />

<link href="<?php echo base_url(); ?>public/css/style_sheet.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery-1.3.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery.betterTooltip.js"></script>
<script src="<?php echo base_url(); ?>public/admin/js/jquery.validation.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.tTip').betterTooltip({speed: 150, delay: 300});

		
	});
</script>

<script>
var totalMessage = 6;
var iNumberMessage =1;

function fade_out()
{
 
	$('#num_div').fadeOut('slow', function() {
			if(iNumberMessage < totalMessage) 
			  iNumberMessage=iNumberMessage+1;
			else
				iNumberMessage =1;
					
			fade_number(iNumberMessage);
			
		});
}

function fade_number() {
	
	$("#num_div").html($('#message'+iNumberMessage).html());
	$("#num_div").fadeIn('slow',function(){
	   setTimeout(fade_out,5000);


		/*$('#num_div').fadeOut(1000, function() {
			if(iNumberMessage < total) {
			  fade_number(++iNumberMessage);
			}
			else
				fade_number(1);
			
		}); */
	});
}

$(document).ready(function(){
	fade_number();
});

$(document).ready(function() {
    $('[title]').each(function() {
        $this = $(this);
        $.data(this, 'title', $this.attr('title'));
        $this.removeAttr('title');
    });
});


</script>

</head>

<body>
<!--start_wrapper-->
	<div id="wrapper">
    	
        <div id="header"><!--start_header-->
        	
            <div class="logo"><a href="<?php echo site_url(); ?>"><img src="<?php echo base_url(); ?>public/images/logo.png" width="308" height="67" alt="logo" /></a></div>
            
			<div class="top_line"><h1 id="num_div" style="display:none;"></h1></div>
			<div id="message1" style="display:none;">Keep Personal Information Personal. </div>
			<div id="message2" style="display:none;">We Facilitate Easy Access And Provision Of All Your Information.</div>
			<div id="message3" style="display:none;">Get Latest Updates And Notification On Your Email.</div>
			<div id="message4" style="display:none;">We Provide You Notifications On Expiry.</div>
			<div id="message5" style="display:none;">We Store And Provide You Latest Updates On Mutual Funds.</div>
			<div id="message5" style="display:none;">We Assure Security And Safety Of Your Personal Documents Stored In SafeDocManager.</div>

        </div><!--end_header-->
        
        <div class="clear"></div>
        
        <div id="container"><!--start_container-->
        
        	<div class="mid_contain"><!--start_mid_contain-->
            	
                <div class="mid_contain_left"><!--start_mid_contain_left-->
                	
                    <h1>Keep your documents safe and secure on a single platform. </h1>
                    
                    <ul>
                    	<li>We store Personal Information which includes all your documents related to your day to day as well as for long term use.</li>
                        <li>We store Mutual Fund Details with notifications on expiry and maturity as decided by you.</li>
                        <li>Easy Portability and Accessbility. A secured portal to access all your information for a whole life time.</li>
                    </ul>
                    
                    <div class="round_box">
                    	<ul>
                        	<li class="tTip" title="Email"><a href="#" title="You can email your documents easily so that it is easily available to anyone at anytime"><img src="<?php echo base_url(); ?>public/images/massage.png" width="61" height="68" alt="" /></a></li>
                            <li class="tTip" title="Driving License and Passport"><a href="#" title="Driving License and Passport could be easily stored with proper notifications before the expiry date."><img src="<?php echo base_url(); ?>public/images/img_1.png" width="61" height="68"  alt="" /></a></li>
                            <li class="tTip" title="Mark sheets"><a href="#" title="We take care of all your mark sheets related to school and degree certificates so that it is easily managed and accessible at any time."><img src="<?php echo base_url(); ?>public/images/img_2.png" width="61" height="68"  alt="" /></a></li>
                            <li class="tTip" title="Mutual Funds"><a href="#" title="We store your mutual fund details so as to make it easily accessible with proper notifications at the time of maturity"><img src="<?php echo base_url(); ?>public/images/img_3.png" width="61" height="68"  alt=""  /></a></li>
                            <li class="tTip" title="Accessibility"><a href="#" title="All documents stored in this portal are easily accessible all across the globe to provide reliable and easy access of your personal assets."><img src="<?php echo base_url(); ?>public/images/img_4.png" width="61" height="68"  alt=""  /></a></li>
                            <li class="tTip" title="Download"><a href="#" title="You may download all your information from any place accross the globe. We also provide access to email your documents at the same time."><img src="<?php echo base_url(); ?>public/images/img_5.png" width="61" height="68"   alt="" /></a></li>
                        </ul>
                        <span><img src="<?php echo base_url(); ?>public/images/shadow_img.png" width="395" height="69" alt="" /></span>
                    </div>
                    
                </div><!--end_mid_contain_left-->
                
                 <?php echo $this->load->view($middle);?>
                 
            </div><!--end_mid_contain-->
            
        </div><!--end_container-->
        
        
        <div id="footer"><!--start_footer-->
                 <?php	$this->load->view('footer'); 	?>
        </div><!--start_footer-->
        
</div><!--end_wrapper-->

</body>



<!--font-->
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/cufon-yui.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/Myriad_Pro_400.font.js"></script>
<script type="text/javascript">
	Cufon.replace('h2');
</script>
<!--font-->

<!--font-->
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/cufon-yui.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/Myriad_Pro_400.font.js"></script>
<script type="text/javascript">
	Cufon.replace('h3');
</script>
<!--font-->
</html>