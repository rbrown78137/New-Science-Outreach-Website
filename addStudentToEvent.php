<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$studentName = $_POST["studentName"];
	$eventDate = $_POST["date"];
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
      SELECT * from EVENTRECORDS;
EOF;
$ret = $db->query($sql);
$dataToSend = '';
$studentList = array();
while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
	if($row['DATE'] ==$eventDate){
		echo $row['STUDENTLIST'];
	if($row['STUDENTLIST'] == 'null'){
		$studentList = $studentName;
	}else{
	$oldList = preg_split ("/#/",$row['STUDENTLIST']);
	$includeName = true;
	foreach($oldList as $value){
		if($value == $studentName){
			$includeName = false;
		}
	}
	if($includeName){
	$studentList = $row['STUDENTLIST'].'#'.$studentName;
	}else{
		$studentList = $row['STUDENTLIST'];
	}
	}
	}
}

         $modifyStatement =<<<EOF
		UPDATE EventRecords set STUDENTLIST ='$studentList'  where DATE='$eventDate';
EOF;
   $return = $db->exec($modifyStatement);
   $db->close();
}
?>