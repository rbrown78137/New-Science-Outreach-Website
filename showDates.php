<?php
 class MyDB extends SQLite3 {
      function __construct() {
         $this->open('Dates.db');
      }
   }
   $dates = '';
   $db = new MyDB();
   if(!$db) {
      echo $db->lastErrorMsg();
   } else {
   }
   $sql =<<<EOF
      SELECT * from DATES;
EOF;
$ret = $db->query($sql);
while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
	$info = $row['Date'];
	$dates .= $info.'#';
   }
   $dates =  substr($dates,0,-1);
echo $dates;
   
$db->close();
?>