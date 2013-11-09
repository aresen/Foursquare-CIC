<?php
include_once "config.php";
?>
<!DOCTYPE html>
<html lang="en">
 
<head>
    <title>Foursquare Check-In Challenge!</title>
   	 <meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
 
    <body>
    <div id="content">
   	 <h1>Welcome to foursquare checkin challenge</h1>
   	 <p></p>
   	 <p><a href="https://foursquare.com/oauth2/authenticate?client_id=<?php echo $client_id; ?>&response_type=code&redirect_uri=<?php echo $redirect; ?>" title="Login">Log in with Foursquare</a></p>
    </div>
    <div id="footer">
   	 <p class="left">This application uses foursquare</p>
   	 <p class="right"></p>
    </div>
    </body>
 
</html>
