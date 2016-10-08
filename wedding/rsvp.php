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
<!--FlipClock-->
<script src="js/flipclock/compiled/flipclock.js"></script>
</head>

<?php

//SET VALIDATION FLAG
$validation = true;

//INCLUDE DBCONNECTION CLASS
include dirname(__FILE__)."./class/dbConnection.php";

//CHECK IF FORM SUBMITTED
if($_POST){
	//VALIDATION
	if($_POST['name']){
		//CREATE CONNECTION
		$dbConnection = new dbConnection();
		//INSERT FORM DATA
		$dbConnection->insertInto('wedding_morgan',$_POST);
	}else{
		$validation = false;
	}
}

?>

<body>

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
		  <li class="active"><a href="rsvp.php">RSVP</a></li>
		  <li><a href="pinboard.php">Pinboard</a></li>
		</ul>
	  </div>
	</nav>
	
	<!--TITLE-->
	<div class="row">
		<div class="col-md-12">
			<div class="well bg-cream">
				<h1 class="title">R S V P </h1>
			</div>
		</div>
	</div>
	
	<?php
	//DISPLAY MESSAGE AFTER FORM SUBMISSION
	if($_POST){
		echo '<div class="row">';
		echo '<div class="col-md-12">';
		echo '<div class="well bg-cream">';
		if($validation){
			echo '<h1 class="subheading-text">Thank you for your message! - Head over to the pinboard to view all the messages for Sam and Donna!</h1>';
		}else{
			echo '<h1 class="subheading-text">Please provide your name!</h1>';
		}
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}
	?>
	
	<!--ACCOMODATION INFORMATION-->
	<div class="row">
		<div class="col-md-12">
			<div class="well bg-cream">
				<h1 class="heading-text">TITLE</h1>
				<p>Vestibulum a blandit eros, eu dictum dolor. Sed sit amet congue quam. Vivamus viverra a odio nec euismod. Nulla iaculis, quam sed elementum semper, mi urna interdum dolor, id convallis purus eros eu leo. Etiam molestie metus leo, sit amet maximus justo pretium eu. Nullam eget erat tellus. Fusce semper dignissim varius. Donec id quam leo. Nullam at tellus ut quam rhoncus maximus a at ex. Proin mattis in sem id pulvinar. Aenean semper diam auctor mollis dapibus. In hac habitasse platea dictumst. Aliquam finibus felis vitae convallis ultrices. In aliquam tincidunt vestibulum.</p>
			</div>
		</div>
	</div>
	
	<!--FORM-->
	<form method="POST" name="rsvp" action="">
		<div class="col-md-6 white">
			<div class="form-group">
				<label class="text-left" for="name">Your Name</label><br/>
				<input type="text" name="name" class="form-control" placeholder="e.g. Mr A Smith">
			</div>
			<div class="form-group">
				<label for="subject">Will you be attending?</label>
				<select name="attending" class="form-control">
					<option value="true">Yes</option>
					<option value="false">No</option>
				</select>
			</div>
			<div class="form-group">
				<label for="subject">Options?</label>
				<select name="choice" class="form-control">
					<option value="1">Option1</option>
					<option value="2">Option2</option>
				</select>
			</div>
		</div>
		<div class="col-md-6 white">
			<div class="form-group">
				<label for="body">Your Message</label>
				<textarea name="message" rows="10" cols="7" class="form-control textarea" placeholder="250 characters max"></textarea>
				<input type="hidden" name="created" value="<?php echo date('Y-m-d H:i:s') ?>">
				<button type="submit" class="btn btn-default" style="float: right; margin-top: 1.6rem;">RSVP</button>
			</div>
		</div>
	</form>
	
	<!--FOOTER-->
	<div class="footer">
		<p>Aliquam finibus felis vitae convallis ultrices. In aliquam tincidunt vestibulum.</p>
	</div>
	
</div>
</body>