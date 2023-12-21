<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/* require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php'; */

$name = $_POST['name'];
$sender = $_POST['email'];
$phone = $_POST['phone'];
$subject = $_POST['subject'];
$message = $_POST['message'];

//sendmail using phpmailer and gmail
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
//Server settings
$mail->SMTPDebug = 0; 
//set utf8
$mail->CharSet = 'UTF-8';                                // Enable verbose debug output
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com;';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'junior@akinfo.com.br';                 // SMTP username
$mail->Password = 'Aguiav0@alto';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;    

$mail->setFrom($email); //Sender
$mail->addAddress('junior@akinfo.com.br');
$mail->addReplyTo($email, $name);

$mail->isHTML(true);                                  // Set email format to HTML
$message = "Name: $name <br> Email: $email <br> Phone: $phone <br> Subject: $subject <br> Message: $message";
$mail->Subject = 'Testing mail';
$mail->Body    = $message;
$mail->AltBody = $message;

if(!$mail->send()) {
    //json response
    $reponse = array('status' => 'error', 'message' => 'Message could not be sent.');
} else {
    $reponse = array('status' => 'error', 'message' => 'Message could not be sent.');
}