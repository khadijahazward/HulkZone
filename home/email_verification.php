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
$mail->Subject = "Verify Your Email Address for HulkZone Gym";

$mail->setFrom('gymhulkzone@gmail.com');
$mail->isHTML(true);
$mail->Body = "Dear " . $fname . "<br><br>" . "We hope this email finds you well. We are writing to request that you verify your email address with HulkZone Gym. 

<br><br> Your One-Time Password (OTP) for email verification is: ". $otp .". Please enter this code on the verification page to complete the process.

<br><br> If you did not initiate this request, please ignore this email and your account will remain unchanged.

<br><br>Thank you for being a valued member of HulkZone Gym.

<br><br>Best regards,
<br>HulkZone Gym";

$mail->addAddress($username);

if ($mail->send()) {
    echo "<script> alert('Account information successfully sent to the user'); </script>";

} else {
  echo "Message could not be sent. Mailer Error: " .
    $mail->ErrorInfo;
}

$mail->smtpClose();
?>