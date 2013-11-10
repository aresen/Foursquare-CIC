<?php
include_once "config.php";
session_start();
if($_GET['code']){
//We need to hit up the authkey URL and get the key in JSON format
$authkey = file_get_contents("https://foursquare.com/oauth2/access_token?client_id=".$client_id."&client_secret=".$secret."&grant_type=authorization_code&redirect_uri=".$redirect."&code=".$_GET['code']);
//We then need to decode it and store that key in a variable (or in a database)
$decoded_auth = json_decode($authkey,true);
$access_token = $decoded_auth['access_token'];
$_SESSION['access_token'] = $access_token;

//we then look up whatever endpoint of the api we want
$userinfo = file_get_contents("https://api.foursquare.com/v2/users/self?oauth_token=".$access_token);
//https://api.foursquare.com/v2/users/USER_ID/friends
$newuserinfo = file_get_contents("https://api.foursquare.com/v2/users/self/friends?oauth_token=".$access_token);
$decoded_userinfo = json_decode($userinfo, true);

$newdecoded_userinfo = json_decode($newuserinfo, true);

$name = $decoded_userinfo['response']['user']['firstName'];
$lastname = $decoded_userinfo['response']['user']['lastName'];

$pals = array();
for ($x = 0; $x < $newdecoded_userinfo['response']['friends']['count']; $x++)
{
	$pals[$x] = $newdecoded_userinfo['response']['friends']['items'][$x]['firstName'];
	
}

function friends($pals) 
{
	for ($x = 0; $x < count($pals) + 5; $x++)
	{
		echo array_shift($pals), " ";
	}
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Welcome to Check-in Challenge</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
     <link rel="stylesheet" type="text/css" href="static/style.css">
</head>
    <body>
    <section>
	<header>
		<h1>Check-In Challenge</h1>
	</header>
   	 <div id="content">
   		 <h2>Hello, <?php echo $name; ?></h2>
   		 <h2>Last Name:<?php echo $lastname; ?></h2>
   		 <h3>Your friends are <?php friends($pals); ?></h3>
   		 <p>Should print the name of foursquare user</p>
   	 </div>
   	 <p><a href = "create.php"> Create a Challenge</p>
     </section>
    </body>
</html>
