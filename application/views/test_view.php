<!--<html>
<head>
    <title>Facebook Sweetness</title>
</head>
<body>
    <h1>Facebook stuff</h1>

    <?php if (@$user_profile): ?>
        <pre>
            <?php echo print_r($user_profile, TRUE) ?>
        </pre>
        <a href="<?= $logout_url ?>">Logout</a>
    <?php else: ?>
        <h2>Welcome, please login below</h2>
        <a href="<?= $login_url ?>">Login</a>
    <?php endif; ?>

</body>

</html>-->
<!--
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Invite Friends using Facebook</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>
</head>
 
<body>
 
<img src="images/invite_facebook.png" id="facebook" style="cursor:pointer;float:left;margin-left:460px;" />
 
<div id="fb-root"></div>
 
</script>
<script type="text/javascript">
window.fbAsyncInit = function() {
FB.init({
appId:'<?php echo $appID; ?>', cookie:true,
status:true, xfbml:true,oauth : true
});
};
(function(d){
var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
if (d.getElementById(id)) {return;}
js = d.createElement('script'); js.id = id; js.async = true;
js.src = "//connect.facebook.net/en_US/all.js";
ref.parentNode.insertBefore(js, ref);
}(document));
$('#facebook').click(function(e) {
FB.login(function(response) {
if(response.authResponse) {
parent.location ='<?php echo $base_url; ?>fb_test.php';
}
},{scope: 'email,read_stream,publish_stream,user_birthday,user_location,user_work_history,user_hometown,user_photos'});
});
</script>
</body>
</html>
-->


<?php 

  $app_id = '561885653907144';
  $app_secret = '880c40d8d9e5bf82d669a9ecc30fd118';

  $token_url = "https://graph.facebook.com/oauth/access_token?" .
    "client_id=" . $app_id .
    "&client_secret=" . $app_secret .
    "&grant_type=client_credentials";

  $access_token = file_get_contents($token_url);

  $signed_request = $_REQUEST["signed_request"]; 
  list($encoded_sig, $payload) = explode('.', $signed_request, 2);
  $data = json_decode(base64_decode(strtr($payload, '-_', '+/')), true);
  $user_id = $data["user_id"];

  //Get all app requests for user
  $request_url ="https://graph.facebook.com/" .
    $user_id . "/apprequests?" .
    $access_token;
  $requests = file_get_contents($request_url);

  //Print all outstanding app requests
  echo '<pre>';
  print_r($requests);
  echo '</pre>';

  //Process and delete app requests
  $data = json_decode($requests);
  foreach($data->data as $item) {
    $id = $item->id;
    $delete_url = "https://graph.facebook.com/" .
      $id . "?" . $access_token . "&method=delete";

    $result = file_get_contents($delete_url);
    echo("Requests deleted? " . $result);
  }
?>






