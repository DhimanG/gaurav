<?php
    //echo"<pre>";print_r($user_profile);
    //echo "asdasd<pre>";print_r($crowdcast_data);exit;

     //$id=$this->session->userdata('spiff_id');
     //print_r($id);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"><style type="text/css">.gm-style .gm-style-mtc label,.gm-style .gm-style-mtc div{font-weight:400}</style><style type="text/css">.gm-style .gm-style-cc span,.gm-style .gm-style-cc a,.gm-style .gm-style-mtc div{font-size:10px}</style><link href="<?php echo base_url(); ?>Assets/css/css.css" rel="stylesheet" type="text/css"><style type="text/css">@media print {  .gm-style .gmnoprint, .gmnoprint {    display:none  }}@media screen {  .gm-style .gmnoscreen, .gmnoscreen {    display:none  }}</style><style type="text/css">.gm-style{font-family:Roboto,Arial,sans-serif;font-size:11px;font-weight:400;text-decoration:none}</style>
    <meta charset="utf-8">
    <title>Spiffcity</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">  
    <meta name="author" content="">
    <!-- Le styles -->
    <link href="<?php echo base_url(); ?>Assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>Assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>Assets/css/docs.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>Assets/css/prettify.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>Assets/css/bootstrap-modal.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>Assets/css/jquery.fs.picker.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/component.css">
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.js"></script>
        <![endif]-->
    <!-- Le fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="http://rosycontact.com/spiff1/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="http://rosycontact.com/spiff1/assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="http://rosycontact.com/spiff1/assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="http://rosycontact.com/spiff1/assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="http://rosycontact.com/spiff1/assets/ico/favicon.png">
    <link rel="stylesheet" href="http://www.benplum.com/lab/_Formstone/Selecter/jquery.fs.selecter.css" type="text/css" media="all" />

    <link href="<?php echo base_url(); ?>Assets/css/app.css" rel="stylesheet">
    <!--<script src="<?php echo base_url(); ?>Assets/js/commonmaputilmarker.js" charset="UTF-8" type="text/javascript"></script>
    <!--<script src="<?php echo base_url(); ?>Assets/js/onion.js" charset="UTF-8" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>Assets/js/controls.js" charset="UTF-8" type="text/javascript"></script>-->
    <!--<script src="<?php echo base_url(); ?>Assets/js/stats.js" charset="UTF-8" type="text/javascript"></script>-->
    <script src="<?php echo base_url(); ?>Assets/js/jquery.js"></script>
    <style>
      body{
       font-family:Arial;
       color:#333;
       font-size:14px;
      }
      .mytable{
       margin:0 auto;
       width:600px;
       border:2px dashed #17A3F7;
      }
      a{
       color:#0C92BE;
       cursor:pointer;
      }
    </style> 
  </head>
    
    
  <body id="main">
    
    <!-- Navbar List Start================================================= -->
    <div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left w30" id="cbp-spmenu-s1">
      <div class="leftbar">
        <div id="modal">
          <div class="logo_box2 logo_in_nav visible-phone"> <a class="uibutton logo" href="http://rosycontact.com/spiff1/index.html">getspiffed</a></div>
            <ul id="accordion" class="nav nav-list left-menu">
              <li> <a href="#" rel="popular"><i class="icon-black icon-map-marker"></i> get local</a> </li>
              <li> <a href="#" class="item" rel="GetSocial"><i class="icon-black icon-user"></i> get social</a>
                <ul class="nav nav-list left-menu-in">
                  <li><a href="http://rosycontact.com/spiff1/popular.html">Popular</a></li>
                  <li><a href="#">My Network</a></li>
                  <li><a href="#">CrowdCast</a></li>
                  <li><a href="#">Social Feed</a></li>
                  <li><a href="#" class="last">Videos</a></li>
                </ul>
              </li>
              <li> <a href="#" class="item" rel="GetSpiffed"><i class="icon-black icon-gift"></i> get spiffed</a>
                <ul class="nav nav-list left-menu-in">
                  <li><a href="#">Social Rewards</a></li>
                  <li><a href="<?php echo base_url();?>spiffcity/dashboard">Dashboard</a></li>
                </ul>
              </li>
              <li> <a href="#" class="item" rel="GetSpiffed"><i class="icon-black icon-th-list"></i> catagories</a>
                <ul class="nav nav-list left-menu-in">
                  <li><a href="#">Bucket List</a></li>
                  <li><a href="#">Cute</a></li>
                  <li><a href="#">Everything</a></li>
                  <li><a href="#">Face Plant</a></li>
                  <li><a href="#">Fest</a></li>
                  <li><a href="#">Foodie</a></li>
                  <li><a href="#">Front Row</a></li>
                  <li><a href="#">Game On</a></li>
                  <li><a href="#">Gear</a></li>
                  <li><a href="#">Honey Badger</a></li>
                  <li><a href="#">Late Night</a></li>
                  <li><a href="#">Life Hack</a></li>
                  <li><a href="#">Local Spots</a></li>
                  <li><a href="#">My Facebook Tagged Pics</a></li>
                  <li><a href="#">My Videos</a></li>
                  <li><a href="#">Pole Position</a></li>
                  <li><a href="#">Pop The Cork</a></li>
                  <li><a href="#">Rip It</a></li>
                  <li><a href="#">Take Me There</a></li>
                  <li><a href="#">Talent</a></li>
                  <li><a href="#">Tie The Knot</a></li>
                  <li><a href="#">Wayback Machine</a></li>
                  <li><a href="#">Facebook Top Pics</a></li>
                  <li><a href="#">My Facebook Photos</a></li>
                </ul>
              </li>
            </ul>
          <div class="visible-phone">
            <div class="btn_in_nav">
              <!--<div class="sign"><a href="#">Sign up</a></div>
              <div class="login"><a href="#">Login</a></div>-->
              <div style="clear:both;"></div>
            </div>
          </div>
          <div class="visible-phone seach_nav">
            <form action="">
              <div class="input-append">
                <input class="span2 text input search_text" placeholder="Search..." type="text">
                <button class="btn" type="button"><i class="icon-black icon-search"></i></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Navbar List End================================================= -->
    
    <!-- Navbar================================================= -->
    <div class="navbar">
      <div class="navbar-inner">
         <div class="span1"><button id="showLeftPush" class="menu-icon"></button></div>
          <!-- <a class="brand uibutton" href="./index.html">spiffcity</a> -->
          <div class="span3 search_div w768_search hidden-phone">
            <form class="navbar-search" action="">
              <div class="input-append">
                <input class="span2 text input search_text" placeholder="Search for awesomeness..." type="text">
                <button class="btn" type="button"><i class="icon-black icon-search"></i></button>
              </div>
            </form>
          </div>          
          <div class="span4 get w768logo hidden-phone">
          <div class="logo_box2"> <a class="uibutton logo" href="http://rosycontact.com/spiff1/index.html">getspiffed</a></div>
        </div>          
          <div class="span3 hidden-phone">
          <div class="rightHeaderContent">                        
                                    
            <div class="dropdown">    
              <ul class="nav nav-pills" role="menu" aria-labelledby="dLabel">
                <li class="dropdown">
                  <a href="#" data-toggle="dropdown" role="button" id="drop4" class="dropdown-toggle name_drop"><?php $firstname = $this->session->userdata('username');if(isset($firstname)) echo ucFirst($firstname);?><!--<img src='https://graph.facebook.com/<?php echo $user_profile['id']; ?>/picture'>--></a>
                  <ul aria-labelledby="drop4" role="menu" class="dropdown-menu" id="menu1">
                    <li role="presentation"><a href="<?php echo base_url(); ?>spiffcity/dashboard/" tabindex="-1" role="menuitem" class="spec">Dashboard</a></li>
                    <li role="presentation"><a href="<?php echo base_url(); ?>spiffcity/redeem" tabindex="-1" role="menuitem" class="spec">Redeem</a></li>
                    <li role="presentation"><a href="<?php echo base_url(); ?>spiffcity/people" tabindex="-1" role="menuitem" class="spec">People</a></li>
                    <li role="presentation"><a href="#myModal1" tabindex="-1" role="menuitem" class="spec"  data-toggle="modal">Add Post</a></li>
                   <!-- <li role="presentation"><a href="<?php $fbstatus=$this->session->userdata('fbstatus');if($fbstatus ==true  ){echo $logout_url;}else{echo base_url().'spiffcity/logout';} ?>" tabindex="-1" role="menuitem" class="spec">Sign Out</a></li-->
                    <!--<li role="presentation"><a href="<?= $logout_url ?>" tabindex="-1" role="menuitem" class="spec">Sign Out</a></li>-->
                    <li role="presentation"><a href="<?php echo base_url(); ?>spiffcity/logout" tabindex="-1" role="menuitem" class="spec">Log Out</a></li>
                     <!--<a href="<?php echo base_url(); ?>spiffcity/popular/fb">comments</a>-->
                  </ul>
                </li>                     
              </ul>
            </div>                        
            <div style="clear:both;"></div
          </div>
        </div>          
        <!-- <div class="navbar-search " ><a href="#" class="btn"><i class="icon-search"></i></a></div> -->          
      </div>
    </div>    
    <div class="jumbotron masthead">
      <div class="container-fluid">
        <h4>Spiff City - <span>Currency of your social life.</span></h4>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row-fluid">
        <h1 class="span12 page_heading"> Popular </h1>
      </div>
    </div>
    <!--for showing posts of the current user-->   
    <div class="container-fluid">
      <div class="row-fluid sortable">
        <div class="box span12">
          <div class="box-content">
            <div style="position: relative; height: 8006px;" class="masonry-gallery masonry" id="popular_view">
              <?php
                $spiff_id = $this->session->userdata('spiff_id');                
                foreach($crowdcast_data as $crowd){              
              ?>
              <div class="masonry-thumb masonry-brick" >
                <div class="post-buttons">
                  <button href="#myModal" type="button" class="Button btn btn_commnet" title="Comments"> <i href="#myModal" class="icon-black icon-comment"></i> </button>
                  <button type="button" class="Button btn btn-spiffs"> 255 Spiffs </button>
                  <button type="button" class="Button btn btn-like" title="like"><i class="icon-black icon-heart"></i></button>
                </div>
                  <a  style="background:url(Assets/img/img_1.jpg)" title="Sample Image 1" href="#myModal"   role="button" data-toggle="modal" > <img style="width:300px;"  class="grayscale post_image" data-crowdcast_id="<?php echo $crowd->id;?>" src="<?php echo base_url() . "Assets/spiffcity/crowdcast/" . $crowd->img; ?>" alt="Sample Image 1"></a>
                <div class="activity-details">
                  <div class="activity-title"><?php echo $crowd->title; ?></div>
                  <div class="img_user_details"><i class="icon-user icon-black"></i><a href="#" class="img_user_name"><?php echo $firstname; ?></a> into CrowdCast</div>
                  <p><?php echo $crowd->description; ?> </p>
                  <div class="date-time clearfix"><span class="time-left"><?php echo $crowd->modified_date; ?></span>  </div>
                </div>
              </div>
              <?php } ?>              
              </div>
            </div>
          </div>
        </div>
        <!--/span-->
      </div>
    </div>
    <!--for showing selected post in detail.-->
    <div id="myModal"  class="modal hide fade crowd_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    </div> 
    <div id="myModal1" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <button type="button" class="closebtn" data-dismiss="modal" aria-hidden="true">x</button>
      <div class="container-fluid">
        <div class="row-fluid">
          <div class="span9">
            <div class="modal-container">
              <?php echo form_open_multipart('spiffcity/popular/add_post') ?>               
              <div class="modal-header modal-actionbar">
                Add a Post
              </div>              
              <hr />
              <div class="map-body">            
                <div class="row-fluid">
                  <div>
                    Title :
                    <input   type="text" placeholder="Add a title..." name = "title" id="title">
                  </div>
                  <br/>
                  <div >
                    Description : 
                    <textarea class="content-txt comment" name="description" id="description" placeholder="Add a description..."></textarea>
                  </div>
                  
                  <div >
                    Upload an Image : 
                    <input type="file" name="userfile" id="userfile"><br>
                  </div>
                </div>
              </div>              
              <hr/>              
              <div class="modal-footer">
                <input type="submit" class="btn"  value = "Done" name = "done" id="done"/>
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
              </div>
              <?php echo form_close(); ?>
            </div>
          </div>    
        </div>
      </div>
    </div>
    
    <script src="<?php echo base_url(); ?>Assets/js/classie.js"></script>
    <script src="http://www.benplum.com/lab/_Formstone/Selecter/jquery.fs.selecter.js"></script>
    <script src="<?php echo base_url();?>Assets/js/jquery.fs.selecter.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>Assets/js/imagesLoaded.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>Assets/source_fancybox/jquery.fancybox.pack.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>Assets/js/jquery.masonry.min.js"></script>
    
    <script type="text/javascript">
		$(document).ready(function(){
      
      $(document).on("click",".post_image",function(){
       //console.log('dsfsd');
        var crowdcast_id = $(this).data("crowdcast_id");         
        $.ajax({
          type:"POST",
          url:"<?php echo base_url();?>spiffcity/popular/get_crowdcast_details",
          data:{              
              'crowdcast_id':crowdcast_id
            },
          success:function(comments){            
            $("#myModal").html(comments);
            //if (comments["success"]!= false) {
            //  //console.log(comments['success']['crowd_data']['img']);
            //  $(".span9").parents(".container-fluid").find(".crowd_modal").after(crowdcast(comments));
            //}else{
            //  console.log(comments["success"]);exit;
            //}
          }
        })
      })
        
      //jquery to show posts comments...
      //$(document).on("blur",".content-txt",function(){
      //  $(this).parents(".span10").find(".comment_btn").addClass("hide");
      //})
      $(document).on("click",".btn_comment",function(){
        $(".content-txt").focus();
      })
      $(document).on("focus",".content-txt", function(){
        console.log($(this).parents(".span10").find(".comment_btn"));
        $(this).parents(".span10").find(".comment_btn").removeClass("hide").css("display","block");        
      })
    $(document).on("click",".comment_btn .btn",function(){
        var crowdcast_id = $(this).data("crowdcast_id");
        var user_id ="<?php echo $spiff_id;?>";
        var txt = $(this).parents(".span10").find(".content-txt").val();
        var user_img_path = "<?php echo base_url(); ?>Assets/img/avtaar_1.jpg";
        var user_name = "<?php echo ucFirst($this->session->userdata('username')); ?>";
        var comment_html = addNewComment(txt,user_img_path, user_name);
        var $comment_btn = $(this);
        $.ajax({
          type:"POST",
          url:"<?php echo base_url();?>spiffcity/popular/share_comments",
          data:{
              'user_id':user_id,
              'crowdcast_id':crowdcast_id,
              'comments':txt
            },
          success:function(comment){
            if(comment["success"] == true){
              console.log( $comment_btn.parents(".comments-block").find("ul.comment-ul li:last"));
              $comment_btn.parents(".comments-block").find("ul.comment-ul").append(comment_html);
            }
            else{
              $comment_btn.parents(".comments-block").find("ul.comment-ul").append(comment_error);
            }
          }
        })
        //$(this).parents(".comments-block").find("ul.comment-ul li:last").after(comment_html);
        $(".content-txt").val(' ');
      })
    
    function addNewComment(comment_text,user_img_path, user_name){
      var html_data = '<li>' + 
        '<div class="span2">' +
        '<div class="avt-box"><img src=' + user_img_path + ' alt="avataar_name"> </div>' +
        '</div>' + 
        '<div class="span10">' +
        '<div class="commenterWrapper"> <a class="commnet_author_name" href="http://rosycontact.com/RickyG/">' + user_name + '</a> <span class="commnet_time"> 1 day ago </span> <span class="comment-delete" data-comment_id="4" >x</span></div>' +
        '<p> ' + comment_text + ' </p>' +
        '</div>' +
        '</li>'
      return html_data;
    }
    function comment_error(comment_text){
      var html_error_data ='<div>'+
          '<p>unable to send comment' + comment_text + '</p>'+
        '</div>'
      return html_error_data;
    }
    $(document).on("click",".btn-like",function(){
      var user_id = "<?php echo $this->session->userdata("spiff_id");   ?>";
      var crowdcast_id = $(this).data("crowdcast_id");        
      $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>spiffcity/popular/share_like",
        data:{
            'user_id':user_id,
            'crowdcast_id':crowdcast_id
          },
        success:function(like){
          if (like["success"]== true) {
            $("#like").hide();
            $("#unlike").show().css('background-color','RED');
            //$("#unlike").style.backgroundColor = '0000FF';
          }
        }
      })
    })
    $(document).on("click",".btn-unlike",function(){
      var user_id = "<?php echo $this->session->userdata("spiff_id");   ?>"
      var crowdcast_id = $(this).data("crowdcast_id");
      $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>spiffcity/popular/unlike",
        data:{
            'user_id':user_id,
            'crowdcast_id':crowdcast_id
          },
        success:function(unlike){
          if (unlike["success"] == true) {
            $("#unlike").hide();
            $("#like").show();
          }
        }
      })
    });
      
      
    });		
</script>
    <script>
      //$(".second").pageslide({ direction: "right", modal: true });
    </script>    
    <script>
      var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
      showLeftPush = document.getElementById( 'showLeftPush' ),
      body = document.body;
      showLeftPush.onclick = function() {
        classie.toggle( this, 'active' );
        classie.toggle( body, 'cbp-spmenu-push-toright' );
        classie.toggle( menuLeft, 'cbp-spmenu-open' );
      };
    </script>
    <script>	
      $(document).ready(function () {          
        $('#accordion a.item').click(function () {      
          //slideup or hide all the Submenu
          //$('#accordion li').children('ul').slideUp('fast');	
          //show the selected submenu
          $(this).siblings('ul').toggle('fast');            
          //add "Over" class, so that the arrow pointing down
          $(this).addClass($(this).attr('rel') + 'Over');	
          //remove all the "Over" class, so that the arrow reset to default
          $('#accordion a.item').each(function () {
            if ($(this).attr('rel')!='') {
              $(this).removeClass();	
              //alert($(this).attr('rel'));
            }
          });  
          return false;      
        });        
      });        
    </script>
    <!-- Custom Select Plugin -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/jquery.css" type="text/css" media="all">
    <script src="<?php echo base_url(); ?>Assets/js/jquery.js"></script>
    <script>
      $(document).ready(function() {
        //$("#selecter, #multiple").selecter();
        $("#btn_comment").click(function(){
          $.ajax({
            type:"POST",
            url:"<?php echo base_url(); ?>spiffcity/popular/comment",
            data:$("#txt_comment").val(),
            success:function msg(){
              
            }           
          })
        });
         
        //initialize();
        
      });
    </script>
    <script type="text/javascript">
      //$(window).load(function(){	   
      //  var $container = $('.side-bar_gallery');              
      //  $container.imagesLoaded( function(){
      //    $container.masonry({
      //      singleMode: false,
      //      resizeable: true,					
      //      isResizable: true,
      //      saveOptions: true,
      //      itemSelector : '.side_gal-item'
      //    });                  
      //  });                
      //});
    </script>    
    <script>
      $(document).ready(function() {
        //$("input[type=checkbox], input[type=radio]").picker();       
        
      });  
    </script>
    <script src="<?php echo base_url(); ?>Assets/js/bootstrap.js" type="text/javascript" ></script>
    <script src="<?php echo base_url(); ?>Assets/js/bootstrap-modalmanager.js"></script>
    <script src="<?php echo base_url(); ?>Assets/js/bootstrap-modal.js"></script>
    <script src="<?php echo base_url(); ?>Assets/js/custom.js" type="text/javascript" ></script>
  </body>
</html>



<!--function time_passed($timestamp){
    //type cast, current time, difference in timestamps
    $timestamp      = (int) $timestamp;
    $current_time   = time();
    $diff           = $current_time - $timestamp;
   
    //intervals in seconds
    $intervals      = array (
        'year' => 31556926, 'month' => 2629744, 'week' => 604800, 'day' => 86400, 'hour' => 3600, 'minute'=> 60
    );
   
    //now we just find the difference
    if ($diff == 0)
    {
        return 'just now';
    }   

    if ($diff < 60)
    {
        return $diff == 1 ? $diff . ' second ago' : $diff . ' seconds ago';
    }       

    if ($diff >= 60 && $diff < $intervals['hour'])
    {
        $diff = floor($diff/$intervals['minute']);
        return $diff == 1 ? $diff . ' minute ago' : $diff . ' minutes ago';
    }       

    if ($diff >= $intervals['hour'] && $diff < $intervals['day'])
    {
        $diff = floor($diff/$intervals['hour']);
        return $diff == 1 ? $diff . ' hour ago' : $diff . ' hours ago';
    }   

    if ($diff >= $intervals['day'] && $diff < $intervals['week'])
    {
        $diff = floor($diff/$intervals['day']);
        return $diff == 1 ? $diff . ' day ago' : $diff . ' days ago';
    }   

    if ($diff >= $intervals['week'] && $diff < $intervals['month'])
    {
        $diff = floor($diff/$intervals['week']);
        return $diff == 1 ? $diff . ' week ago' : $diff . ' weeks ago';
    }   

    if ($diff >= $intervals['month'] && $diff < $intervals['year'])
    {
        $diff = floor($diff/$intervals['month']);
        return $diff == 1 ? $diff . ' month ago' : $diff . ' months ago';
    }   

    if ($diff >= $intervals['year'])
    {
        $diff = floor($diff/$intervals['year']);
        return $diff == 1 ? $diff . ' year ago' : $diff . ' years ago';
    }
}-->