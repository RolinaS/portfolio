<?php
$name = $_POST['fame'];
$email = $_POST['email'];
$subkect = $_POST['subject'];
$toEmail = "";
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$showMessage = '';
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {	
	$subject = "Contact us email";
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: '.$email."\r\n".
    'Reply-To: '.$email."\r\n" .
    'X-Mailer: PHP/' . phpversion();	
	$message = 'Hello,<br/>'
	. 'Name:' . $name . '<br/>'	
	. 'Message:' . $comment . '<br/><br/>';		
	mail($toEmail, $subject, $message, $headers);
	$showMessage = "Your Query has been received, We will contact you soon.";	
} else {
	$showMessage =  "invalid email";
}
$jsonData = array(
	"message"	=> $showMessage
);
echo json_encode($jsonData); 
?>