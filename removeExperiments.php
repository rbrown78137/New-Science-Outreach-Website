<?php
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
   $sql =" DROP TABLE IF EXISTS EXPERIMENTS";
	$db->exec($sql) or die($db->lastErrorMsg());
	 $sql ="CREATE TABLE IF NOT EXISTS EXPERIMENTS (
					EXP				TEXT	NOT NULL,
					NUMSTUDENTS		TEXT	NOT NULL,
					PRIMARY KEY (EXP))";
	$db->exec($sql) or die($db->lastErrorMsg());
	 $db->close();
?>