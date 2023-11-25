<?php

use FTP\Connection;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';

include('../dbConnection/db.php'); 



        $phpFirstNameRegister = $_POST["phpFirstNameRegister"];
        $phpLastNameRegister = $_POST["phpLastNameRegister"];
        $phpEmailRegister = $_POST["phpEmailRegister"];
        $phpPasswordRegister = $_POST["phpPasswordRegister"];
        $phpUsernameRegister = $_POST["phpUsernameRegister"];
  
 


    $stmt = $mysqli->prepare('SELECT EMAIL FROM USERS WHERE EMAIL = ?;');

    if(!$stmt->execute(array($phpEmailRegister)))
    {
        $stmt = null;
        header("location: ../index.php?error=stmtfailed");
        exit();
    }
    if($stmt->num_rows > 0)
    {
        
    }
    else
    {
      $stmt = $mysqli->query("
      INSERT INTO CATEGORIES 
      (
        CATEGORY_DESCRIPTION,
        REQUESTED_BY
      ) 
      VALUES
      (
          '{$phpCategoryName}',
          '{$phpUser}'
      );");

/*
        $stmt = null;
        $stmt = $mysqli->prepare('CALL RegisterUser(?,?,?,?,?)');
        */
            if(!$stmt->execute(array($phpFirstNameRegister,$phpLastNameRegister,$phpEmailRegister,$phpUsernameRegister,$phpPasswordRegister)))
            {
                $stmt = null;
                header("location: ../registro.php?error=stmtfailed");
                exit();
            }
            else
            {
              /*
              $to = "wichotrevor97@outlook.com";
              $subject = "Welcome to Pluche LITE";
              $headers  = "From: etigresi2@outlook.es" . "\r\n";
              $headers .= "MIME-Version: 1.0" . "\r\n";
              $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";


              $message = '<h1>hola</h1>';
              */

              $mail = new PHPMailer(true);

              try 
              {
                  //Server settings
                  $mail->SMTPDebug = 2;                      //Enable verbose debug output
                  $mail->isSMTP();                                            //Send using SMTP
                  $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                  $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                  $mail->Username   = 'etigresi2@gmail.com';                     //SMTP username
                  $mail->Password   = 'wicho10211997';                               //SMTP password
                  $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
                  $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
              
                  //Recipients
                  $mail->setFrom('etigresi2@gmail.com', 'Pluche LITE');
                  $mail->addAddress( $phpEmailRegister, $phpFirstNameRegister);     //Add a recipient            //Name is optional
                  $mail->addReplyTo('info@example.com', 'Information');
              
                  //Attachments
                  //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                  //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
              
                  //Content
                  $mail->isHTML(true);                                  //Set email format to HTML
                  $mail->Subject = 'Thank You!';
                  $mail->MsgHTML(file_get_contents('../emailTemplate/template.html'));
                  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
              
                  $mail->send();
                  echo 'Message has been sent';

                } 
                catch (Exception $e) 
                {
                  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }


              }
              $stmt = null;
              }


   


?>