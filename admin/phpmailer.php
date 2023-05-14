<?php

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
$mail->Body = "Dear " . $fname . ",<br><br>
We are pleased to inform you that your account has been successfully created. Your account information is given below::<br><br>Username: " . $username . "<br>Password: " . $pw . "<br><br>Please note that this is a system-generated password. We strongly recommend that you change your password after logging into the system for the first time. We also advise you to keep your login credentials secure to prevent unauthorized access to your account.
<br><br>Thank you for choosing our service.<br><br>Best regards,<br><br>
Hulk Zone";

$mail->addAddress($username);

if ($mail->send()) {
  echo "<script> alert('Account information successfully sent to the user'); </script>";

} else {
  $errorMessage = $mail->ErrorInfo;
  echo "<script> alert('Message could not be sent. Mailer Error: " . $errorMessage . "');</script>";
}

$mail->smtpClose();


?>