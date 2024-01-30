<?php

include_once(__DIR__ . '/../../modules/database/smtp_functions.php');
include_once(__DIR__ . '/../../config.php');
include_once(__DIR__ . '/../functions/alerts.php');
function sendPasswordResetEmail($email, $token)
{

    $baseURL = BASE_PATH;

    $mail = require __DIR__ . "/mailer.php";
    $mail->setFrom($smtpConfig['username'], $smtpConfig['system_name']);
    $mail->addAddress($email);

    $mail->Subject = 'Redefinição de Senha';

    // Corpo da mensagem em HTML
    $mail->Body = <<<END
     <html>
     <head>
         <style>
         body {
             font-family: 'Arial', sans-serif;
             background-color: #f4f4f4;
             color: #333;
             margin: 0;
             padding: 0;
         }
         .container {
             width: 80%;
             margin: 20px auto;
             background-color: #fff;
             padding: 20px;
             box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
         }
         h1 {
             color: #007bff;
         }
         p {
             margin-bottom: 15px;
         }
         a.button {
             display: inline-block;
             padding: 10px 20px;
             font-size: 16px;
             color: #fff;
             background-color: #007bff;
             text-decoration: none;
             border-radius: 5px;
         }
         a.button:hover {
             background-color: #0056b3;
         }
     </style>
     </head>
     <body>
         <div class="container">
             <h1>Redefinição de Senha</h1>
             <p>Olá,</p>
             <p>Recebemos uma solicitação para redefinir sua senha. Se você não fez essa solicitação, pode ignorar este e-mail.</p>
             <p>Para redefinir sua senha, clique no seguinte botão:</p>
             <p><a href="$baseURL/pages/auth/reset_password.php?token=$token" class="button">Redefinir Senha</a></p>
             <p>Se o botão acima não funcionar, você pode copiar e colar a seguinte URL no seu navegador:</p>
             <p><a href="$baseURL/pages/auth/reset_password.php?token=$token">$baseURL/pages/auth/reset_password.php?token=$token</a></p>
             <p>Este link expirará em 1 hora.</p>
             <p>Obrigado!</p>
         </div>
     </body>
     </html>
     END;

    $mail->AltBody = 'Olá,
 
     Recebemos uma solicitação para redefinir sua senha. Se você não fez essa solicitação, pode ignorar este e-mail.
     
     Para redefinir sua senha, clique no seguinte botão:
     ' . $baseURL . '/pages/auth/reset_password.php?token=' . $token .

        'Se o botão acima não funcionar, você pode copiar e colar a seguinte URL no seu navegador:
     ' . $baseURL . '/pages/auth/reset_password.php?token=' . $token .

        'Este link expirará em 1 hora.
     
     Obrigado!
     ';

    $mail->send();
}

function sendNewContactEmail($name, $userEmail, $phone, $contactPreference)
{

    $baseURL = BASE_PATH;

    $mail = require __DIR__ . "/mailer.php";
    $mail->setFrom($smtpConfig['username'], $smtpConfig['system_name']);
    $mail->addAddress($smtpConfig['username']);
    try {
        $mail->Subject = 'Novo contato';

        // Corpo da mensagem em HTML
        $mail->Body = <<<END
     <html>
     <head>
         <style>
         body {
             font-family: 'Arial', sans-serif;
             background-color: #f4f4f4;
             color: #333;
             margin: 0;
             padding: 0;
         }
         .container {
             width: 80%;
             margin: 20px auto;
             background-color: #fff;
             padding: 20px;
             box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
         }
         h1 {
             color: #007bff;
         }
         p {
             margin-bottom: 15px;
         }
     </style>
     </head>
        <body>
        <h1>Novo Contato de Usuário</h1>
        <p><strong>Nome:</strong> $name</p>
        <p><strong>E-mail:</strong> $userEmail</p>
        <p><strong>Telefone:</strong> $phone</p>
        <p><strong>Preferência de Contato:</strong> $contactPreference</p>
        </body>
     </html>
     END;


        $mail->send();

        $_SESSION['success'] = "E-mail enviado com sucesso. Irei entrar em contato com você o mais breve possível";
        displayAlert('success');

    } catch (Exception $e) {
        $_SESSION['error'] = "Erro no envio do e-mail.";
        displayAlert('error');
    }
}

