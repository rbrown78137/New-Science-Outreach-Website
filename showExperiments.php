<?php
 class MyDB extends SQLite3 {
      function __construct() {
         $this->open('Dates.db');
      }
   }
   $exps = '';
   $db = new MyDB();
   if(!$db) {
      echo $db->lastErrorMsg();
   } else {
   }
   $sql =<<<EOF
      SELECT * from EXPERIMENTS;
EOF;
$ret = $db->query($sql);
while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
	$info = $row['EXP'];
	$numInfo = $row['NUMSTUDENTS'];
	$exps .= $info.'!'.$numInfo.'#';
   }
   $exps =  substr($exps,0,-1);
echo $exps;
   
$db->close();
?>