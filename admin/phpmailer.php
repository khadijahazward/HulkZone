<?php


/*require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer();
$mail->isSMTP();

$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->SMTPSecure = "tls";

$mail->Port = "25";
$mail->Username = "gymhulkzone@gmail.com";
$mail->Password = "ddckguawqxbknjzg";
$mail->Subject = "Account Information";

$mail->setFrom('gymhulkzone@gmail.com');
$mail->isHTML(true);
$mail->Body = "Dear " . $fname . ",<br><br>Your account information is as follows:<br><br>Username: " . $username . "<br>Password: " . $pw . "<br><br>Please keep this information secure.";

$mail->addAddress($username);

if ($mail->send()) {
  
    echo "<script> alert('Account information successfully sent to the user'); </script>";

} else {
  /*echo "<script> alert('Message could not be sent. Mailer Error');</script> " .
    $mail->ErrorInfo;*/
  /*  $errorMessage = $mail->ErrorInfo;
    echo "<script> alert('Message could not be sent. Mailer Error: " . $errorMessage . "');</script>";
}

$mail->smtpClose();*/




require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer();
$mail->isSMTP();

$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->SMTPSecure = "tls";

$mail->Port = "25";
$mail->Username = "gymhulkzone@gmail.com";
$mail->Password = "ddckguawqxbknjzg";
$mail->Subject = "Hulk Zone - Account details";

$mail->setFrom('gymhulkzone@gmail.com');
$mail->isHTML(true);
$mail->Body = "Dear " . $fname . ",<br><br>Your account information is as follows:<br><br>Username: " . $username . "<br>Password: " . $pw . "<br><br>Please keep this information secure.";

$mail->addAddress($username);

if ($mail->send()) {
  echo "<script> alert('Account information successfully sent to the user'); </script>";

} else {
  $errorMessage = $mail->ErrorInfo;
  echo "<script> alert('Message could not be sent. Mailer Error: " . $errorMessage . "');</script>";
}

$mail->smtpClose();


?>