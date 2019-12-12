<!DOCTYPE html>
<html lang="en">
<head>
<title> Science Outreach </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="Style/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
function addExperiments(){
	/*
	reused code for dates. any reference to dates should be experiments
	*/
 var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
				var experiments = this.responseText.split("#");
				
				var dateLabel = document.createElement("h2");
				dateLabel.innerHTML  = "Experiments";
				document.getElementById("signUpForm2").appendChild(dateLabel);	
				
				var linebreak = document.createElement('br');
				document.getElementById("signUpForm2").appendChild(linebreak);
				
				var dateLabel = document.createElement("label");
				dateLabel.innerHTML  = " Rank your preference for each experiment. (1 = really want to do,  3 = no preference, 5 = I do not want to do) ";
				document.getElementById("signUpForm2").appendChild(dateLabel);
				
				var linebreak = document.createElement('br');
					document.getElementById("signUpForm2").appendChild(linebreak);
					
				for(var i =0; i<experiments.length;i++){
					var exp = experiments[i].split("!")[0];
					var linebreak = document.createElement('br');
					document.getElementById("signUpForm2").appendChild(linebreak);
			
					var expName = document.createElement("label");
					expName.innerHTML = exp;
					document.getElementById("signUpForm2").appendChild(expName);
					
					var linebreak = document.createElement('br');
					document.getElementById("signUpForm2").appendChild(linebreak);
					
					
					var radioLabel = document.createElement("label");
					radioLabel.innerHTML  = "1: ";
					radioLabel.className = "expOption";
					radioLabel.setAttribute("for", option1);
					document.getElementById("signUpForm2").appendChild(radioLabel);
					
					var option1 = document.createElement('input');
					option1.type = 'radio';
					option1.name = exp;
					option1.value ="1";
					option1.setAttribute('class','expInput');
					document.getElementById("signUpForm2").appendChild(option1);
					
					
					var radioLabel = document.createElement("label");
					radioLabel.innerHTML  = "2: ";
					radioLabel.className = "expOption";
					radioLabel.setAttribute("for", option2);
					document.getElementById("signUpForm2").appendChild(radioLabel);
					
					var option2 = document.createElement('input');
					option2.type = 'radio';
					option2.name = exp;
					option2.value ="2";
					option2.setAttribute('class','expInput');
					document.getElementById("signUpForm2").appendChild(option2);
					
					var radioLabel = document.createElement("label");
					radioLabel.innerHTML  = "3: ";
					radioLabel.className = "expOption";
					radioLabel.setAttribute("for", option3);
					document.getElementById("signUpForm2").appendChild(radioLabel);
					
					var option3 = document.createElement('input');
					option3.type = 'radio';
					option3.name = exp;
					option3.value ="3";
					option3.setAttribute('class','expInput');
					document.getElementById("signUpForm2").appendChild(option3);
					option3.checked ="checked";
					
					var radioLabel = document.createElement("label");
					radioLabel.innerHTML  = "4: ";
					radioLabel.className = "expOption";
					radioLabel.setAttribute("for", option4);
					document.getElementById("signUpForm2").appendChild(radioLabel);
					
					
					var option4 = document.createElement('input');
					option4.type = 'radio';
					option4.name = exp;
					option4.value ="4";
					option4.setAttribute('class','expInput');
					document.getElementById("signUpForm2").appendChild(option4);
					
					var radioLabel = document.createElement("label");
					radioLabel.innerHTML  = "5: ";
					radioLabel.className = "expOption";
					radioLabel.setAttribute("for", option5);
					document.getElementById("signUpForm2").appendChild(radioLabel);
					
					
					var option5 = document.createElement('input');
					option5.type = 'radio';
					option5.name = exp;
					option5.value ="5";
					option5.setAttribute('class','expInput');
					document.getElementById("signUpForm2").appendChild(option5);
					
					var linebreak = document.createElement('br');
					document.getElementById("signUpForm2").appendChild(linebreak);
				}
			var linebreak = document.createElement('br');
			document.getElementById("signUpForm2").appendChild(linebreak);
		}
        };
        xmlhttp.open("Post", "showExperiments.php", true);
        xmlhttp.send();
}
function addSubmitButton(){
	var submitButton = document.createElement('input');
	submitButton.setAttribute('type','button');
	submitButton.setAttribute('value', "Submit");
	document.getElementById("signUpForm3").appendChild(submitButton);
	submitButton.onclick = function(){
	submitFormInfo();
	}
}
function submitFormInfo(){
var name = document.getElementById("signUpForm").elements["name"].value;
var email = document.getElementById("signUpForm").elements["email"].value;
var phone = document.getElementById("signUpForm").elements["phone"].value +document.getElementById("carrierBox").value;
var yearsExperience = document.getElementById("signUpForm").elements["yearsExperience"].value;
console.log(name);
console.log(email);
console.log(phone);
console.log(yearsExperience);


var experimentList = new Object();
var experiments = document.getElementsByClassName("expInput");
for(exp of experiments){
	if(exp.checked){
	experimentList[exp.name]=exp.value;
	}
}
var experimentData = JSON.stringify(experimentList);
console.log(experimentData);

 var formdata = new FormData();
 formdata.append("name", name);
 formdata.append("email", email);
 formdata.append("phone", phone);
 formdata.append("yearsExperience", yearsExperience);
 formdata.append("experimentData", experimentData);
 
 

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
			  var response = document.createElement('p');
			  response.innerHTML = "Response Submitted";
			  document.getElementById("signUpForm3").appendChild(response);
          }
       }
       xmlhttp.open("POST", "submitForm.php");
       xmlhttp.send(formdata);
}

function addFormInfo(){
	addExperiments();
	addSubmitButton();
}
</script>
<style>
#signUpContainer{
	margin-left: 15px;
}
.inputLabel {
  display: inline-block;
  width: 140px;
}
.dateLabel {
	margin-left: 5px;
}
.expOption{
	margin-left: 20px;
	margin-right: 5px;

}
</style>
</head>
<body onload = "addFormInfo();">
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
		<li class="active tabText"><a href="signup.php">Sign Up</a></li>
		<li class=" tabText"><a href="ideaPage.php">Ideas</a></li>
		<li class=" tabText"><a href="adminVerification.php">Admin</a></li>
	</ul>
	</div>
</nav>

 

<h2>Sign Up For Events</h2>
<div class ="container-fluid" id="signUpContainer">
<h2>Important Info</h2>
<br>
<form id="signUpForm">
<label class = "inputLabel">Name:</label>
<input type="text" name="name" id="nameInfo">

<br><br>

<label class = "inputLabel">E-mail:</label>
<input type="text" name="email" id="emailInfo">

<br><br>

<label class = "inputLabel">Phone Number:</label>
<input type="text" name="phone" id="phoneInfo">
<select id ="carrierBox">
  <option value="">Carrier</option>
  <option value="@mms.alltelwireless.com">Alltel</option>
  <option value="@mms.att.net">AT&amp;T</option>
  <option value="@myboostmobile.com">Boost Mobile</option>
  <option value="@mms.cricketwireless.net">Cricket Wireless</option>
  <option value="@mymetropcs.com">MetroPCS</option>
  <option value="@msg.fi.google.com">Project Fi</option>
  <option value="@text.republicwireless.com">Republic Wireless</option>
  <option value="@mypixmessages.com">Straight Talk</option>
  <option value="@pm.sprint.com">Sprint</option>
  <option value="@tmomail.net">T-Mobile</option>
  <option value="@mms.uscc.net">U.S. Cellular</option>
  <option value="@vzwpix.com">Verizon Wireless</option>
  <option value="@vmpix.com">Virgin Mobile</option>
</select>
<br><br><br>
<label>Years in Science Outreach:</label>
<br>
<input type="radio" name="yearsExperience" value="0"> 0
<br>
<input type="radio" name="yearsExperience" value="1"> 1
<br>
<input type="radio" name="yearsExperience" value="2+"> 2 or more years
<br><br>
</form>
</div>
<div class ="container-fluid" id="signUpForm2">
</div>
<div class ="container-fluid" id="signUpForm3">
</div>
<h1></h1>
<!--
<form method="post" action="submit.php">  
  Name: <input type="text" name="name">
  <br><br>
  E-mail: <input type="text" name="email">
  <br><br>
Demo 1: <select name="Demo1">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
  </select>
  <input type="submit" name="submit" value="Submit">  
</form>
-->

</body>
</html>