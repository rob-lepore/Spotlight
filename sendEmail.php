<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

function sendEmail($emailData){
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                      
        $mail->isSMTP();                                           
        $mail->Host       = 'smtp.gmail.com';                    
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'app.web.spotlight@gmail.com';                     
        $mail->Password   = 'vqvvokqsabrxmgpy';                               
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
        $mail->Port       = 587;

        //Recipients
        $mail->setFrom('app.web.spotlight@gmail.com', 'Spotlight App');
        $mail->addAddress($emailData["toEmail"], $emailData["toName"]);     

        // Content
        $mail->isHTML(true);
        $mail->Subject = $emailData["subject"];
        $mail->Body    = $emailData["body"];

        $mail->send();
        echo 'Email sent successfully.';
    } catch (Exception $e) {
        echo "Email sending failed: {$mail->ErrorInfo}";
    }
}
?>