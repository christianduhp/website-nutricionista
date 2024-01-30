<?php

include_once(__DIR__ . '/../../modules/mail/send_email_functions.php');
include_once(__DIR__ . '/../../modules/database/users_functions.php');
include_once(__DIR__ . '/../../modules/authentication/authentication_functions.php');

function validatePassword($password, $passwordConfirmation)
{
    if (strlen($password) < 8) {
        throw new Exception("A senha deve ter pelo menos 8 caracteres.");
    }

    if (!preg_match("/[a-z]/i", $password)) {
        throw new Exception("A senha deve conter pelo menos uma letra.");
    }

    if ($password !== $passwordConfirmation) {
        throw new Exception("As senhas não coincidem.");
    }
}

function processResetPasswordForm($token)
{
    $token_hash = hash("sha256", $token);

    $user = getUserByToken($token_hash);

    if (empty($user["id"])) {
        throw new Exception("Token inválido");
    }

    if (strtotime($user["reset_token_expires_at"]) <= strtotime('now')) {
        throw new Exception("Token expirado");
    }

    if (isset($_POST["password"])) {
        try {
            validatePassword($_POST["password"], $_POST["password_confirmation"]);

            $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

            updatePasswordAndToken($password_hash, $user["id"]);

            logout();

            $_SESSION['success'] = 'Senha alterada com sucesso! <a href=' . linkTo('login') . '" >Faça Login</a>';
            exit();

        } catch (Exception $e) {
            $_SESSION['info'] = $e->getMessage();
            return true;
        }
    }

    return true;
}

function handleRecoverPassword()
{
    if (isset($_POST['submit']) && !empty($_POST['email'])) {
        $email = $_POST['email'];

        try {
            $token = generatePasswordResetToken($email);

            if ($token) {
                sendPasswordResetEmail($email, $token);
                $_SESSION['success'] = "Link para alterar a senha enviado por e-mail.";
            }
        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
        }
    }
}

function handleResetPassword()
{
    date_default_timezone_set('America/Sao_Paulo');

    try {
        $token = isset($_GET["token"]) ? $_GET["token"] : null;
        $showForm = processResetPasswordForm($token);

    } catch (Exception $e) {
        $showForm = false;
        $_SESSION['info'] = $e->getMessage();
    }

    return ['token' => $token, 'showForm' => $showForm];
}
