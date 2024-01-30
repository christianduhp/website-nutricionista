<?php

require_once(__DIR__ . '../../mail/send_email_functions.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['floatingName'];
    $email = $_POST['floatingEmail'];
    $phone = $_POST['floatingPhone'];
    $contactPreference = $_POST['contactPreference'];

    if (!empty($name) && !empty($email) && !empty($phone) && !empty($contactPreference)) {
        // Validação de e-mail
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = "O formato do e-mail é inválido.";
            displayAlert('error');
        } else {
            // Validação de número de telefone
            if (!preg_match("/^\d{11}$/", $phone)) {
                $_SESSION['error'] = "O formato do telefone é inválido.";
                displayAlert('error');
            } else {
                sendNewContactEmail($name, $email, $phone, $contactPreference);
            }
        }
    } else {
        $_SESSION['error'] = "Todos os campos devem ser preenchidos.";
        displayAlert('error');
    }

}