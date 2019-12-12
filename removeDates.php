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
   $sql =" DROP TABLE IF EXISTS DATES";
	$db->exec($sql) or die($db->lastErrorMsg());
	 $sql ="CREATE TABLE IF NOT EXISTS DATES (
					Date		TEXT	NOT NULL,
					EventInfo	TEXT	NOT NULL,
					PRIMARY KEY (Date))";
	$db->exec($sql) or die($db->lastErrorMsg());
	 $db->close();
?>