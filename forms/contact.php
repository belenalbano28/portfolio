<?php
 

    $visitor_name = "";
    $visitor_email = "";
    $email_title = "";
    $visitor_message = "";
    $recipient = "belenalristi@gmail.com";
     
    if(isset($_POST['name'])) {
      $visitor_name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    }
     
    if(isset($_POST['email'])) {
        $visitor_email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['email']);
        $visitor_email = filter_var($visitor_email, FILTER_VALIDATE_EMAIL);
    }
     
    if(isset($_POST['subject'])) {
        $email_title = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
    }
     
    if(isset($_POST['message'])) {
        $visitor_message = htmlspecialchars($_POST['message']);
    }
     

     
    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $visitor_email . "\r\n";
     
    mail($recipient, $email_title, $visitor_message, $headers)



?>