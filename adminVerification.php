<!DOCTYPE html>
<html lang="en">
<head>
<title> Science Outreach </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="Style/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<nav class="navbar navbar-default navbar-static-top" role="navigation">
<div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand titleText">Science Outreach</a>
    </div>
	 <div class="collapse navbar-collapse" id="myNavbar">
	<ul class="nav navbar-nav navbar-right">
		<li class=" tabText"><a href="index.php">Home</a></li>
		<li class=" tabText"><a href="experiments.php">Experiments</a></li>
		<li class=" tabText"><a href="signup.php">Sign Up</a></li>
		<li class=" tabText"><a href="ideaPage.php">Ideas</a></li>
		<li class="active tabText"><a href="adminVerification.php">Admin</a></li>
	</ul>
	</div>
</nav>
<h1>Login</h1>
<form action ="transfer.php" method="POST">
<label class = "inputLabel">Username:</label>
<input type="text" name="username" id="usernameBox">
<br><br>
<label class = "inputLabel">Password:</label>
<input type="text" name="password" id="passwordBox">
<br><br>
<input type="submit" value="Submit">
</form>
</body>
</html>