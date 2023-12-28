<?php
    if($TYPE_USER == 1) {
        include "../../mail/PHPMailer/src/PHPMailer.php";
        include "../../mail/PHPMailer/src/Exception.php";
        include "../../mail/PHPMailer/src/SMTP.php";
    } else if($TYPE_USER == 2){
        include "../../mail/PHPMailer/src/PHPMailer.php";
        include "../../mail/PHPMailer/src/Exception.php";
        include "../../mail/PHPMailer/src/SMTP.php";
    } else {
        include "./mail/PHPMailer/src/PHPMailer.php";
        include "./mail/PHPMailer/src/Exception.php";
        include "./mail/PHPMailer/src/SMTP.php";
    }
   
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\Exception;
    
    //Load Composer's autoloader
    
    //Create an instance; passing `true` enables exceptions
                           // Passing `true` enables exceptions
  function sendmail($title, $message, $email, $username) {
      try {
          //Server settings
          $mail = new PHPMailer(true);   
          $mail->CharSet = "UTF-8";
          $mail->SMTPDebug = 0;                                 // Enable verbose debug output
          $mail->isSMTP();                                      // Set mailer to use SMTP
          $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
          $mail->SMTPAuth = true;                               // Enable SMTP authentication
          $mail->Username = 'letankim2810@gmail.com';                 // SMTP username
          $mail->Password = 'qpgxowptqcndgmvt';                               // SMTP password
          $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
          $mail->Port = 587;                                    // TCP port to connect to
        
          //Recipients
          $mail->setFrom('letankim2810@gmail.com', 'LeTanKimBlog');
          $mail->addAddress($email, $username);     // Add a recipient
        
          //Content
          $mail->isHTML(true);                                  // Set email format to HTML
          $mail->Subject = $title;
          // $mail->Body    = "$message ".$emailUser." ".$phone."";
          // biến gửi đi
          $mail->Body = $message;
          $mail->send();
          return true;
      } catch (Exception $e) {
          return false;
      }
  }
?>