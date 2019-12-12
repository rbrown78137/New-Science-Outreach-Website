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
      DELETE from StudentInfo where name = '$studentName';
EOF;
   
   $ret = $db->exec($sql);
    $db->close();
}
?>