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
	<script src="admin.js"></script>
	<style>
	.studentListStyle{
		margin-left: 40px;
		color: DarkGreen;
	}
	.experimentListStyle{
		margin-left: 20px;
		color: DarkMagenta;
		text-decoration: underline;
	}
	</style>
</head>

<body>
<?php
class MyDB extends SQLite3 {
      function __construct() {
         $this->open('Dates.db');
      }
   }
?>
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
		<li class="active tabText"><a href="admin.php">Admin</a></li>
	</ul>
	</div>
</nav>
<h1>Plan Next Events</h1>
<button onclick = "addDatesToSelect(this);">Select Date</button>
<div id="dateSelection"></div>
<h1>Yearly Schedule Options</h1>
<div id = "eventTable">
<button onclick = "generatePreviousEventList(this);">View Previous Events</button>
</div>
<div id = "dateTable">
<button onclick = "editYear(this);">Edit year schedule</button>
</div>
<h1>Experiments</h1>
<div id= "experimentTable">

<?php
   $db = new MyDB();
   if(!$db) {
      echo $db->lastErrorMsg();
   } else {
   }
   $sql =<<<EOF
      SELECT * from EXPERIMENTS;
EOF;
$ret = $db->query($sql);
while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
	$info = $row['EXP'];
	$num = $row['NUMSTUDENTS'];
	echo '<h4>'.$info.' ('.$num.')'.'</h4>';
	
   }
   

   
$db->close();

?>
<button onclick = "editExperiment(this);">Edit Experiments</button>
</div>

<h1>Student Database Features</h1>
<div id="studentDBEdit">
<button onclick="editValueButton(this);">Edit Database Values</button>
</div>
<button onclick="showTables(this)">Show Info In Database</button>
<div class = "container" id="table1">
</div>
<h1></h1>
</body>
</html>