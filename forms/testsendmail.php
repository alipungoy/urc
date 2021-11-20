<?php
require_once('../vendor/autoload.php');
$TOKEN = bin2hex(random_bytes(50));

$transport = (new Swift_SmtpTransport('smtp.google.com', 587))
->setUsername('urc.thesis.test@gmail.com')
->setSourceIP('0.0.0.0')
->setPassword('w33d1sl4yf12')
;


$mailer = new Swift_Mailer($transport);

$message = (new Swift_Message('Wonderful Subject'))
->setFrom(['urc.thesis.test@gmail.com' => 'URC'])
->setTo(['mfaulan@gmail.com'])
->setBody('Please click this link to verify account http://127.0.0.1/urc/pages/confirmation.php?token='.$TOKEN);

$sendmail = $mailer->send($message);

if ($sendmail) {
    echo 'success';
}
