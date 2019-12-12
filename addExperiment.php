<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$numberOfExp = $_POST['numExp'];
 

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
   $sql ="CREATE TABLE IF NOT EXISTS EXPERIMENTS (
					EXP				TEXT	NOT NULL,
					NUMSTUDENTS		TEXT	NOT NULL,
					PRIMARY KEY (EXP))";
			$db->exec($sql) or die($db->lastErrorMsg());
			
	
	for($i = 0; $i < $numberOfExp; $i++){
		echo "<h2>attempt to insert experiment</h2>";
$expName = "exp".$i;
$expNumName = "expNum".$i;
$Exp = SQLite3::escapeString($_POST[$expName]);
$ExpNum = SQLite3::escapeString($_POST[$expNumName]);
echo $Exp;
echo $ExpNum;
$insert = "INSERT INTO EXPERIMENTS VALUES ('$Exp','$ExpNum')";
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