<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/../../PHPMailer/src/PHPMailer.php';
require __DIR__ . '/../../PHPMailer/src/Exception.php';
require __DIR__ . '/../../PHPMailer/src/SMTP.php';

include_once(__DIR__ . '/../../modules/database/smtp_functions.php');

// Informações de configuração do servidor SMTP

$smtpConfig = getSmtpConfig();

$smtpHost = $smtpConfig['host'];
$smtpUsername = $smtpConfig['username'];
$smtpPassword = $smtpConfig['password'];
$smtpPort = $smtpConfig['port'];

$mail = new PHPMailer(true);

//Server settings                 
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Host = $smtpHost;
$mail->Port = $smtpPort;
$mail->Username = $smtpUsername;
$mail->Password = $smtpPassword;
$mail->CharSet = "UTF-8";
$mail->isHTML(true);

return $mail;
