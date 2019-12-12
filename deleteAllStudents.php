<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$studentName = $_POST["studentName"];
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
      $sql =<<<EOF
      DROP TABLE STUDENTINFO;
EOF;
   
   $ret = $db->exec($sql);
   $addTable ="CREATE TABLE IF NOT EXISTS StudentInfo (
					name				TEXT	NOT NULL,
					email				TEXT	NOT NULL,
					phone 				TEXT 	NOT NULL,
					years       		TEXT	NOT NULL,
					experimentData 		TEXT 	NOT NULL,
					eventsAttended 		TEXT	NOT NULL,
					PRIMARY KEY (name, email))";
			$db->exec($addTable) or die($db->lastErrorMsg());
    $db->close();
}
?>