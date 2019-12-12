<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    $sql =" DROP TABLE IF EXISTS EVENTRECORDS";
	$db->exec($sql) or die($db->lastErrorMsg());
$db->close();
}
?>