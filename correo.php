0<?php

https://github.com/PHPMailer/PHPMailer

$nombre = $_POST["Name"];
$correo = $_POST["Email"];
$mensaje = $_POST["Message"];

$body = "Nombre:" . $nombre . "<br>Correo: ". $correo . "<br>Mensaje" .$mensaje;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Phpmailer/Exception.php';
require 'Phpmailer/PHPMailer.php';
require 'Phpmailer/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'info@mindyourventures.com';                     // SMTP username
    $mail->Password   = 'MYFV2019!';                               // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom($correo, $nombre);
    $mail->addAddress('info@mindyourventures.com', 'MYFHOODS');     // Add a recipient
    
  
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Correo MYF HOODS';
    $mail->Body    = $body;
    

    $mail->send();
    header('Location: index.html');
    //echo 'Message has been sent';
    } 
    catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
?>