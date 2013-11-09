<?php
include_once "config.php";
if($_GET['code']{
$authkey = file_get_contents("https://foursquare.com/oauth2/access_token?client_id=".$client_id."&client_secret=".$secret."&grant_type=authorization_code&redirect_uri=".$redirect."&code=".$_GET['code']);
$decoded_auth = json_decode($authkey,true);
$access_token = $decoded_auth['access_token'];

$userinfo = file_get_contents("https://api.foursquare.com/v2/users/self?oauth_token=".$access_token);
$decoded_userinfo= json_decode($userinfo, true);
$name = $decoded_userinfo['response']['user']['firstName'];

$auto_complete = file_get_contents("https://api.foursquare.com/v2/venues/suggestCompletion".$access_token);


}
?>



<!DOCTYPE html>
<html lang="en">

<head>
	<title>Create!</title>
  	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
  	<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
	<script src="jquery.geocomplete.js"></script>
	<script $ ("input").geocomplete({ details: "form" });</script>
</head>
 
    <body>
    <div id="content">
    	<h1> Let's play a game... </h1>
    	<p><Add a place!</p>
    	<form>
    		Place: <input name="venue" type="text" value="">
    		Latitude: <input name="lng" type="text" value="">
    		Longitude: <input name="long" type="text" value="">
    	</form>
    </div>
    </body>
 </html>