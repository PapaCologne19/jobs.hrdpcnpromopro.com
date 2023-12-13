<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

    require '../vendor/autoload.php';
    require '../vendor/phpmailer/phpmailer/src/Exception.php';
    require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require '../vendor/phpmailer/phpmailer/src/SMTP.php';
    


function send_mail($recipient, $subject, $message)
{

  $mail = new PHPMailer();
  $mail->IsSMTP();

  $mail->SMTPAuth   = TRUE;
  $mail->SMTPSecure = 'ssl';
  $mail->Port       = 465;
  $mail->Host       = "mail.hrdpcnpromopro.com";
  $mail->Username   = 'jobs@hrdpcnpromopro.com';
  $mail->Password   = 'P@ssw0rd2024';

  $mail->IsHTML(true);
  $mail->AddAddress($recipient, '');
  $mail->SetFrom("jobs@hrdpcnpromopro.com", "PCN Promopro Inc.");
  $mail->Subject = $subject;
  $content = $message;

  $mail->MsgHTML($content); 
  if(!$mail->Send()) { 
    return false;
  } else {
    echo "Email sent successfully";
    return true;
  }

}

?>