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
    $sql =<<<EOF
      SELECT * from EVENTRECORDS;
EOF;
$ret = $db->query($sql);
$dataToSend = '';
while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
	$dateEventArray = array();
	$dateEventArray[0] = $row['DATE'];
	$dateEventArray[1] = $row['STUDENTLIST'];
	$dateEventArray[2] = $row['EXPERIMENTLIST'];
	$dateEventArray[3] = $row['STUDENTEXPERIMENTLIST'];
	$dateEventArrayJSON = json_encode($dateEventArray);
	$dataToSend .= $dateEventArrayJSON.'&';
	
}
 $dataToSend =  substr($dataToSend,0,-1);
 echo $dataToSend;
$db->close();
}
?>