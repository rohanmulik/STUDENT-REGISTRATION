<?php

require_once 'vendor/autoload.php';
require_once 'Config/constants.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
  ->setUsername(EMAIL)
  ->setPassword(PASS)
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

function sendemail($useremail, $token){

    //access mailer inside func
    global $mailer;

    $body = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset = "UTF-8">
        <title>Verify Email</title>
    </head>
    <body>
        <div class="wrapper">
    
        <p>
            Thank you for signing up. Please Click the Link below 
            to verify your Email.
    
        </p>
        <a href="http://localhost/STUDENT%20REGISTRATION/index.php?token='. $token . '">
            Verify Email Address
        </a>
    
        </div>
    
    
    </body>
    </html>';

        // Create a message
    $message = (new Swift_Message('Verify Email Address'))
        ->setFrom(EMAIL)
        ->setTo($useremail)
        ->setBody($body,'text/html');

    // Send the message
    $result = $mailer->send($message);

}