<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  /**$receiving_email_address = 'sami.rolina@outlook.fr';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  /*
  $contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

  /**$contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);

  echo $contact->send();*/

  $name = $_POST['name'];
  $email = $_POST['emai'];
  $comment = $_POST['subject'];
  $mess = $_POST['message'];
  $toEmail = "sami.rolina@outlook.fr";
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
    . 'Sujet:' . $comment . '<br/>'
    . 'Message:' . $mess . '<br/><br/>';		
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
