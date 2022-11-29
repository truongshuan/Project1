<?php
$receiver = "truongshuan0310@gmail.com";
// $subject = "Email Test via PHP using Localhost";
// $body = "Hi, there...This is a test email send from Localhost.";
$sender = "xuanptpc04031@fpt.edu.vn";

// if (mail($receiver, $subject, $body, $sender)) {
//     echo "Email sent successfully to $receiver";
// } else {
//     echo "Sorry, failed while sending mail!";
// }

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require "PHPMailer/src/SMTP.php";
require "PHPMailer/src/Exception.php";
require "PHPMailer/src/PHPMailer.php";
$mail = new PHPMailer(true);
$subject = "Password Reset Code";
$message = "Your password reset code is 03102002";
//Send mail using gmail
if ($mail) {
    $mail->IsSMTP(); // telling the class to use SMTP
    $mail->SMTPAuth = true; // enable SMTP authentication
    $mail->SMTPSecure = "ssl"; // sets the prefix to the servier
    $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
    $mail->Port = 465; // set the SMTP port for the GMAIL server
    $mail->Username = "xuanptpc04031@fpt.edu.vn"; // GMAIL username
    $mail->Password = "Shuan0310."; // GMAIL password
}

//Typical mail data
$mail->AddAddress($receiver);
$mail->SetFrom($sender, 'Admin: Shuandz');
$mail->Subject = $subject;
$mail->Body = $message;


try {
    $mail->Send();
    echo "Success!";
} catch (Exception $e) {
    //Something went bad
    echo "Fail :(";
}