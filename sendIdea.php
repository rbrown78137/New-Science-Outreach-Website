<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$to_id = 'csieve@bluevalleyk12.org';
$name = $_POST["name"];
$email = $_POST["email"];
$idea = $_POST["idea"];

	$errors= array();
      $file_name = $_FILES['file']['name'];
      $file_size = $_FILES['file']['size'];
      $file_tmp = $_FILES['file']['tmp_name'];
      $file_type = $_FILES['file']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['file']['name'])));
      
      $expensions= array("jpeg","jpg","png","pdf");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a PDF, JPEG or PNG file.";
      }
      
      if($file_size > 2097152) {
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"uploads/".$file_name); //The folder where you would like your file to be saved
         echo "Success";
      }else{
         print_r($errors);
      }

$body = 'This is an email auto-generated from the Science Outreach Website.<br>This was submitted by:  '.$name.'<br>Contact Email:  '.$email.'<br>Idea:<br>'.$idea;
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
$mail->isHTML(true);
$mail->Subject = 'Science Outreach Idea';
if($file_name!=null){
//$mail->addAttachment("uploads/".$file_name);
}
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