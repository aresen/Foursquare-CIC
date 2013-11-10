<?php
include_once "config.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
 
<head>
    <title>Foursquare Check-In Challenge!</title>
   	 <meta http-equiv="content-type" content="text/html;charset=utf-8" />
     <link rel="stylesheet" type="text/css" href="static/style.css">
     <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
</head>
 
    <body>
    <section>
	<header>
		<h1>Check-In Challenge</h1>
	</header>
    <div id="content">
   	 <h2>Welcome to the Foursquare Check-In Challenge!</h2>
   	 <p></p>
   	 <p><a href="https://foursquare.com/oauth2/authenticate?client_id=<?php echo $client_id; ?>&response_type=code&redirect_uri=<?php echo $redirect; ?>" title="Login with Foursquare!"><img src="img/signin_foursquare.png" alt="Login with Foursquare!"></a></p>
    </div>
    <div id="desc">
        <h2>Description</h2>
        <p>blah blah blah</p>
    </div>
    <div id="footer">
   	 <p class="left">This application uses Foursquare to deliver content.</p>
   	 <p class="right"></p>
    </div>
    </section>
    </body>
</html>
