<?php
include_once "config.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Create!</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
     <link rel="stylesheet" type="text/css" href="static/style.css">
	<script>
	$( document ).ready(function(){
	    var oauth = encodeURI('<?php echo $_SESSION['access_token']; ?>');
	    console.log("LOLOL");
	    $("#test").click(function() {
		var place = $("#place").val();
		var keyw = $("#keyw").val();
		var venueSearch = "https://api.foursquare.com/v2/venues/search&intent=checkin&near="+encodeURIComponent(place)+"&query="+encodeURIComponent(keyw)+"&oauth_token="+oauth; 
	        $.getJSON(venueSearch, function(){
		}) 
		.done(function (id, name) {
		console.log(id, name);
		})
	    }); 
	});
	</script>
</head>
 
    <body>
    <section>
	<header>
		<h1>Check-In Challenge</h1>
	</header>
    <div id="content">
    	<h2> Let's play a game... </h2>
    	<form action="submit.php" method="post">
    		Keyword: <input name="venue" type="text" value="" id="keyw">
    		Place: <input name="place" type="text" value="" id="place">
        <input type="submit" value ="Submit" id='test' />
    	</form>
    	<p>Add a place!</p>
	<br>
    </div>
    </section>
    </body>
 </html>
