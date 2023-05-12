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
$mail->Subject = "Password Reset OTP for HulkZone Gym";

$mail->setFrom('gymhulkzone@gmail.com');
$mail->isHTML(true);
$mail->Body = "Dear " . $fname . ",<br><br>"
    . "We received a request to reset your password for your HulkZone Gym account. If you did not initiate this request, please disregard this email.<br><br>"
    . "Your One-Time Password (OTP) for password reset is: " . $otp . "<br><br>"
    . "Please use the provided OTP to reset your password. Enter the OTP on the password reset page to complete the process.<br><br>"
    . "Thank you for choosing HulkZone Gym.<br><br>"
    . "Best regards,<br>"
    . "HulkZone Gym";

$mail->addAddress($username);

if ($mail->send()) {
    echo "<script>alert('An OTP has been sent to your registered email address. Please check your inbox.');</script>";
} else {
  echo "Message could not be sent. Mailer Error: " .
    $mail->ErrorInfo;
}

$mail->smtpClose();
?>