<?php
   class MyDB extends SQLite3 {
      function __construct() {
         $this->open('Student.db');
      }
   }
   $students = "";
   $db = new MyDB();
   if(!$db) {
      echo $db->lastErrorMsg();
   } else {
   }
 $sql =<<<EOF
      SELECT * from StudentInfo;
EOF;
$ret = $db->query($sql);
 while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
	 $students .= $row['name'] ."!".$row['email']."!".$row['phone']."!".$row['years']."!".$row['experimentData']."!".$row['eventsAttended']."#";
   }

   
$db->close();
$students = substr($students,0,-1);
echo $students;
?>