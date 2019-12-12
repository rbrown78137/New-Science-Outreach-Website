<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$dateName = $_POST["dateName"];
$experimentListJSON = $_POST["experimentList"];
$dateNameForDB = SQLite3::escapeString($dateName);
$experimentListForDB = $experimentListJSON;
$studentListForDB= "null";
$studentExperimentListForDB = "null";
class MyDB extends SQLite3 {
      function __construct() {
         $this->open('Student.db');
      }
   }
   $db = new MyDB();
   if(!$db) {
      echo $db->lastErrorMsg();
   } else {
   }
$sql ="CREATE TABLE IF NOT EXISTS EVENTRECORDS (
					DATE					TEXT	NOT NULL,
					STUDENTLIST				TEXT	NOT NULL,
					EXPERIMENTLIST			TEXT	NOT NULL,
					STUDENTEXPERIMENTLIST	TEXT	NOT NULL,
					PRIMARY KEY (DATE))";
$db->exec($sql) or die($db->lastErrorMsg());

echo '<br>----------------<br>';
echo '<br>----------------<br>';
echo '<br>----------------<br>';
echo $dateNameForDB;
echo $studentListForDB;
echo $experimentListForDB;
echo $studentExperimentListForDB;
$insert = "INSERT INTO EVENTRECORDS VALUES ('$dateNameForDB','$studentListForDB','$experimentListForDB','$studentExperimentListForDB')";
			if($db->exec($insert)) 
			{
				
				echo "<h1>Submition Succesful</h1>";
			}
			else
			{
				echo "<h1>Unable to add information</h1>";
			}
}
?>