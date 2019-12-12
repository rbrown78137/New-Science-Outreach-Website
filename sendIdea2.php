<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$to_id = '9132139410@mms.att.net';
$name = $_POST["name"];
$email = $_POST["email"];
$idea = $_POST["idea"];

$body = 'This is a reminder for your upcoming science outreach date';
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
$mail->addAddress($to_id);
//$mail->isHTML(true);
$mail->Subject = 'Date Reminder';
$mail->Body    = $body;
echo 'testing';
$mail->send();
echo 'Message has been sent';
}
catch (Exception $e){
	echo 'Error:',$mail->ErrorInfo;
}
}
?>