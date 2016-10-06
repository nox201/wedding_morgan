<!DOCTYPE html>
<html>
<head>
<!-- CSS library -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/flipclock.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<?php

//INCLUDE DBCONNECTION CLASS
include dirname(__FILE__)."./class/dbConnection.php";
//CREATE CONNECTION
$dbConnection = new dbConnection();
//INSERT FORM DATA
$messages = $dbConnection->directQuery('SELECT * FROM `wedding_morgan`');

?>

<script>
//RANDOMIZE STICKYNOTE TILT
function rand(){
	var num = Math.floor(Math.random() * 20 + 1) - 10;
	return num;
}

function tilt(){
	var stickynotes = document.getElementsByClassName('stickynote');
	for (i = 0; i < stickynotes.length; i++){
		var degrees = rand();
		stickynotes[i].style.transform = 'rotate(' + degrees + 'deg)';
	}
}
</script>

<body onload="tilt()">

<div class="container-fluid bg bg-silver text-center">
	
	<!--NAVBAR-->
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
		<div class="navbar-header">
		  <a class="navbar-brand precious" href="home.html">The Morgan Wedding</a>
		</div>
		<ul class="nav navbar-nav">
		  <li><a href="home.html">Home</a></li>
		  <li><a href="photo.html">Photos</a></li>
		  <li><a href="info.html">Information</a></li>
		  <li><a href="rsvp.php">RSVP</a></li>
		  <li class="active"><a href="pinboard.php">Pinboard</a></li>
		</ul>
	  </div>
	</nav>
	
	<!--TITLE-->
	<div class="row">
		<div class="col-md-12">
			<div class="well bg-cream">
				<h1 class="title">Messages</h1>
			</div>
		</div>
	</div>
	
	<!--MESSAGE DISPLAY (PHP)-->
	<div class="row pinboard">
	<?php
		foreach($messages as $message){
			echo '<div class="col-md-4 stickynote">';
			echo '<img src="./img/pin.png">';
			echo '<p class="stickynote-text">' . $message['message'] . '</p><p class="signature">- ' . $message['name'] . '</p>';
			echo '</div>';
		}
	?>
	</div>
	
	<!--MESSAGE DISPLAY (HTML)-->
<!-- 	<div class="row pinboard">
		<div class="col-md-4 stickynote">
			<img src="./img/pin.png">
			<p class="stickynote-text">Lorum Ipsem</p><p class="signature">- Mr A Smith</p>
		</div>
		<div class="col-md-4 stickynote">
			<img src="./img/pin.png">
			<p class="stickynote-text">Sed sit amet congue quam. Vivamus viverra a odio nec euismod. Nulla iaculis, quam sed elementum semper, mi urna interdum dolor, id convallis purus eros eu leo.</p><p class="signature">- Mr A Smith</p>
		</div>
		<div class="col-md-4 stickynote">
			<img src="./img/pin.png">
			<p class="stickynote-text">Sed sit amet congue quam. Vivamus viverra a odio nec euismod. Nulla iaculis, quam sed elementum semper, mi urna interdum dolor, id convallis purus eros eu leo.</p><p class="signature">- Mr A Smith</p>
		</div>
		<div class="col-md-4 stickynote">
			<img src="./img/pin.png">
			<p class="stickynote-text">Lorum Ipsem</p><p class="signature">- Mr A Smith</p>
		</div>
		<div class="col-md-4 stickynote">
			<img src="./img/pin.png">
			<p class="stickynote-text">Sed sit amet congue quam. Vivamus viverra a odio nec euismod. Nulla iaculis, quam sed elementum semper, mi urna interdum dolor, id convallis purus eros eu leo.</p><p class="signature">- Mr A Smith</p>
		</div>
		<div class="col-md-4 stickynote">
			<img src="./img/pin.png">
			<p class="stickynote-text">Sed sit amet congue quam. Vivamus viverra a odio nec euismod. Nulla iaculis, quam sed elementum semper, mi urna interdum dolor, id convallis purus eros eu leo.</p><p class="signature">- Mr A Smith</p>
		</div>
		<div class="col-md-4 stickynote">
			<img src="./img/pin.png">
			<p class="stickynote-text">Lorum Ipsem</p><p class="signature">- Mr A Smith</p>
		</div>
		<div class="col-md-4 stickynote">
			<img src="./img/pin.png">
			<p class="stickynote-text">Sed sit amet congue quam. Vivamus viverra a odio nec euismod. Nulla iaculis, quam sed elementum semper, mi urna interdum dolor, id convallis purus eros eu leo.</p><p class="signature">- Mr A Smith</p>
		</div>
		<div class="col-md-4 stickynote">
			<img src="./img/pin.png">
			<p class="stickynote-text">Sed sit amet congue quam. Vivamus viverra a odio nec euismod. Nulla iaculis, quam sed elementum semper, mi urna interdum dolor, id convallis purus eros eu leo.</p><p class="signature">- Mr A Smith</p>
		</div>
	</div>	 -->
	
	<!--FOOTER-->
	<div class="footer">
		<p>Aliquam finibus felis vitae convallis ultrices. In aliquam tincidunt vestibulum.</p>
	</div>

</body>

<?php
//CLOSE RESULTS SET TO ENABLE CONNECTION CLOSE
$messages = null;
//CLOSE CONNECTION
$dbConnection = null;
?>