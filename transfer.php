<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if($_POST['username'] == "admin" && $_POST['password'] == "password"){
header('Location: admin.php'); 
}
else{
	header('Location: adminVerification.php'); 
}
}
?>