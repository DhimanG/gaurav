<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Invite Friends using Facebook</title>
<style type="text/css">
 
.fb_frnds{
	list-style:none;
}
.fb_frnds li{
		padding:10px;
	float:left;
	width:30%;
}
.frnd_list{
	margin-top:-25px;
	margin-left:40px;
}
.fb_frnds a{
	text-decoration:none;
	background: #333;
  /* for IE */
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#333', endColorstr='#D95858'); 
  /* for webkit browsers */ 
  background: -webkit-gradient(linear, left top, left bottom, from(#333), to(#D95858)); 
  /* for firefox 3.6+ */ 
  background: -moz-linear-gradient(top,  #333,  #D95858);
  color: #FFFFFF;
	float: right;
	font: bold 13px arial;
	margin-right:110px ;
}
</style>
</head>
<body>

<?php

if(isset($user_friends)){  ?>
<span style="float: right;">  <a href="javascript:void(0);" onclick="fb_logout();">Logout</a> </span>
<h2> Facebook Friends List </h2> 

<div class="fb_frnds" style="width: 100%">
<?php
	foreach($user_friends['data'] as $user_friend){
?>
<div style="width : 40%; float: left; border: 1px solid #dddddd; margin: 1% ; padding: 1%; border-radius: 7px;">
	<p><img src="https://graph.facebook.com/<?php echo $user_friend['id']; ?>/picture" width="30" height="30"/></p>
	<div  class="frnd_list">
		<span><?php echo $user_friend['name']; ?></span>
		<span><a href="javascript:void(0);" onclick="send_invitation(<?php echo $user_friend['id']; ?>);"> Invite </a></span>
	</div>
</div>
 
<?php  }  ?>
</div> 
<?php
}else{
 
header('Location: '.$base_url);	
}?>
<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"> </script>
 
<script type="text/javascript">
FB.init({ 
       appId:'<?php echo $appID; ?>', cookie:true, 
       status:true, xfbml:true 
     });
 
function send_invitation(fb_frnd_id){
     FB.ui({ method: 'apprequests', 
       message: 'I like Get Spiffed Come and share your App Passion',
	   to:fb_frnd_id
     });
}
function fb_logout(){
	FB.logout(function(response) {
		
		//window.location ='<?php echo base_url(); ?>';
		window.close();
		window.opener.location.reload();
 });
 
}
</script>
</body>
</html>