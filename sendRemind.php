<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$dateOfEvent = $_POST["date"];	
echo $dateOfEvent;
$studentListJSON = $_POST["studentListJSON"];
$studentList = json_decode($studentListJSON);
echo '-----------------------';
echo $studentListJSON;
echo '-----------------------';
var_dump($studentList);
echo '-----------------------';
$experimentListJSON = $_POST["experimentListJSON"];
$experimentList = json_decode($experimentListJSON);
echo $experimentListJSON;
echo '-----------------------';
var_dump($experimentList);
echo '-----------------------';
$studentEXPListJSON = $_POST["studentEXPListJSON"];
$studentEXPList = json_decode($studentEXPListJSON,true);





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
      SELECT * from StudentInfo;
EOF;
	$ret = $db->query($sql);
	$studentNameToSendArray = array();
	$phoneNumberToSendArray = array();
	$studentIndex = 0;
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
		for($i = 0; $i<count($studentList);$i++){
			if($row['name'] == $studentList[$i]){
				$studentNameToSendArray[$studentIndex] = $row['name'];
				$phoneNumberToSendArray[$studentIndex] = $row['phone'];
				$studentIndex++;
			}
		}
	}
   $db->close();
   $studentExperimentList = array();
   for($i = 0; $i<count($studentNameToSendArray);$i++){
		$individualList = array();
		$individualListIndex = 0;
		for($z = 0; $z<count($experimentList);$z++){
			for($q = 0; $q<count($studentEXPList[$z]);$q++){
				if($studentNameToSendArray[$i] == $studentEXPList[$z][$q]){
					$individualList[$individualListIndex] = explode("!",$experimentList[$z])[0];
					$individualListIndex++;
				}
			}
		}
		$studentExperimentList[$i] = $individualList;
   }
   

   


$mail = new PHPMailer(true);
try{
$mail->SMTPDebug = 2;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = 'bvhsscienceoutreach@gmail.com';
$mail->Password = 'BVHSScienceOutreach';
$mail->setFrom('bvhsscienceoutreach@gmail.com','Science Outreach');


for($i = 0;$i<count($studentNameToSendArray);$i++){
	$cleanedEmail = preg_replace("/[^a-zA-Z0-9@-@.-.]/", "",$phoneNumberToSendArray[$i]);
	$recipient = filter_var($cleanedEmail, FILTER_SANITIZE_EMAIL);
	if (!filter_var($recipient, FILTER_VALIDATE_EMAIL) === false) {
		$recipientName = $studentNameToSendArray[$i];
		$recipientExperiments = $studentExperimentList[$i];
		$body = 'Hello, '.$recipientName. '. You have been selected to attend the Science Outreach Event on '.$dateOfEvent.'. You have been given the following experiments: ';
		for($z=0;$z<count($recipientExperiments);$z++){
		$body.= $recipientExperiments[$z].', ';
		}
		$body = substr($body,0,-2);
		$body.='.';
		$mail->ClearAllRecipients();
		$mail->addAddress($recipient);
		$mail->Subject = 'Date Reminder';
		$mail->Body    = $body;
		$mail->send();
	} else {
		echo "Error Sending To $recipient";
	}
 }

}
catch (Exception $e){
	echo 'Error:',$mail->ErrorInfo;
}
  
   
}
?>