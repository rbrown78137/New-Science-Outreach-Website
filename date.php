<!DOCTYPE html>
<html>
<head>
<title> Science Outreach </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="Style/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
function sendStudent(){
	var urlParams = new URLSearchParams(window.location.search);
	var date = urlParams.get('id');
	var studentName = document.getElementsByName("studentName")[0].value;
	
	  var formdata = new FormData();
	   formdata.append("studentName", studentName);
	   formdata.append("date",date);
	    var xmlhttp;
       if(window.XMLHttpRequest)
       {
           xmlhttp = new XMLHttpRequest;
       }
       else
       {
           xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
       }
       xmlhttp.onreadystatechange = function()
       {
          if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
          {
			  	
          }
       }
       xmlhttp.open("POST", "addStudentToEvent.php");
       xmlhttp.send(formdata);
	
	 
}
function setUpDate(){
	var urlParams = new URLSearchParams(window.location.search);
	var date = urlParams.get('id');
	var title = document.createElement("h1");
	title.appendChild(document.createTextNode("Sign up for " +  date));
	document.getElementById("nameSection").appendChild(title);
}
</script>
</head>
<body onload="setUpDate();">
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
<div id="formContainer"class="container-fluid">
<div id="nameSection"></div>
<label class = "inputLabel">First and Last Name:</label>
<input type="text" name="studentName" id="studentName">
<br><br>
<input type="button" value="Submit" onclick="sendStudent();">
</div>
</body>
</html>