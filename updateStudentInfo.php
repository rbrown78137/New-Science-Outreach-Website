<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$studentName = $_POST["studentName"];
	$valueIndex = $_POST["valueIndex"];
	$value = $_POST["updatedValue"];
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
   if($valueIndex ==1){
     $sql =<<<EOF
UPDATE StudentInfo set email  ='$value'  where name='$studentName';
EOF;
   $ret = $db->exec($sql);
   }
   else  if($valueIndex == 2){
     $sql =<<<EOF
UPDATE StudentInfo set phone ='$value'  where name='$studentName';
EOF;
   $ret = $db->exec($sql);
   }
   else  if($valueIndex ==3){
     $sql =<<<EOF
UPDATE StudentInfo set years ='$value'  where name='$studentName';
EOF;
   $ret = $db->exec($sql);
   }
   else  if($valueIndex ==4){
     $sql =<<<EOF
UPDATE StudentInfo set experimentData ='$value'  where name='$studentName';
EOF;
   $ret = $db->exec($sql);
   }
   else  if($valueIndex ==5){
     $sql =<<<EOF
UPDATE StudentInfo set eventsAttended ='$value'  where name='$studentName';
EOF;
   $ret = $db->exec($sql);
   }
   $db->close();
}
?>