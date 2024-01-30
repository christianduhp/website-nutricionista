<?php

include_once(__DIR__ . '/../../modules/functions/alerts.php');
include_once(__DIR__ . '/../../modules/authentication/password_functions.php');

$result = handleResetPassword();
$token = isset($result['token']) ? $result['token'] : ''; 
$token = htmlspecialchars($token);
$showForm = $result['showForm'];

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="../../assets/images/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/auth.css">
    <title>Redefinir Senha</title>
</head>

<body class="d-flex align-items-center justify-content-center p-3">
    <section class="login_section d-flex flex-column justify-content-center align-items-center">
        <div class="container shadow bg-white">
            <div class="d-flex flex-column-reverse flex-md-row justify-content-center align-items-center">
                <div class="col-md-6 my-2 d-flex flex-column justify-content-center">
                    <div class="card border-0">
                        <div class="card-body">
                            <?php displayAlert('info');
                            displayAlert('success'); ?>
                            <form action="reset_password.php?token=<?= $token ?>" method="post">
                                <?php if ($showForm) { ?>
                                    <h3 class="text-center mb-4">Redefinir senha</h3>
                                    <div class="form-group">
                                        <label for="password">Nova senha</label>
                                        <input type="password" class="form-control" name="password" id="password" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirmation">Confirme a senha</label>
                                        <input type="password" class="form-control" name="password_confirmation"
                                            id="password_confirmation" required>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary btn-block">Enviar</button>
                                </form>
                            <?php } else { ?>
                                <a href="<?php linkTo('recoverPassword'); ?>" class="btn btn-primary btn-block">Redefinir
                                    senha</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 img-container d-flex flex-column align-items-center">
                    <img src="../../assets/images/reset-password.png" class="img-fluid my-md-5" style="max-width: 100%;"
                        alt="Security Image">
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>