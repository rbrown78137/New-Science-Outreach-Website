
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$numberOfDates = $_POST['numDates'];
$dateInfo = '';

 class MyDB extends SQLite3 {
      function __construct() {
         $this->open('Dates.db');
      }
   }
   $db = new MyDB();
   if(!$db) {
      echo $db->lastErrorMsg();
   } else {
      echo "Opened database successfully\n";
   }
   $sql ="CREATE TABLE IF NOT EXISTS DATES (
					Date		TEXT	NOT NULL,
					EventInfo	TEXT	NOT NULL,
					PRIMARY KEY (Date))";
			$db->exec($sql) or die($db->lastErrorMsg());
			
	
	for($i = 0; $i < $numberOfDates; $i++){
		echo "<h2>attempt to insert data</h2>";
$dateName = "date".$i;
$Date = SQLite3::escapeString($_POST[$dateName]);
echo $Date;
$insert = "INSERT INTO DATES VALUES ('$Date','$dateInfo')";
			if($db->exec($insert)) 
			{
				
				echo "<h1>Submition Succesful</h1>";
			}
			else
			{
				echo "<h1>Unable to add information</h1>";
			}
	}
  $db->close();
}
?>