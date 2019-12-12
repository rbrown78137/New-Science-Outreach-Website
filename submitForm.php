<!DOCTYPE html>
<html>
<?php
// define variables and set to empty values
$name = $email = $phone = $yearsExperience = $dataData = $experimentData = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = SQLite3::escapeString($_POST["name"]);
  $email  = SQLite3::escapeString($_POST["email"]);
  $phone = SQLite3::escapeString($_POST["phone"]);
  $yearsExperience = $_POST["yearsExperience"];
  $experimentData = $_POST["experimentData"];
  $eventsAttended = "0";
  class MyDB extends SQLite3 {
      function __construct() {
         $this->open('Student.db');
      }
   }
   $db = new MyDB();
   if(!$db) {
      echo $db->lastErrorMsg();
   } else {
      echo "Opened database successfully\n";
   }
$sql ="CREATE TABLE IF NOT EXISTS StudentInfo (
					name				TEXT	NOT NULL,
					email				TEXT	NOT NULL,
					phone 				TEXT 	NOT NULL,
					years       		TEXT	NOT NULL,
					experimentData 		TEXT 	NOT NULL,
					eventsAttended 		TEXT	NOT NULL,
					PRIMARY KEY (name, email))";
			$db->exec($sql) or die($db->lastErrorMsg());
$insert = "INSERT INTO StudentInfo VALUES ('$name','$email', '$phone', '$yearsExperience', '$experimentData','$eventsAttended')";
			if($db->exec($insert)) 
			{
				
				echo "<h1>Submition Succesful</h1>";
			}
			else
			{
				echo "<h1>Unable to add information</h1>";
			}
  $db->close();
echo "<h2>Information you submitted </h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $phone	;
echo "<br>";
echo $yearsExperience;
echo "<br>";
echo $experimentData;
echo "<br>";

}
?>
</html>