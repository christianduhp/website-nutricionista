<?php

include_once(__DIR__ . '/../../modules/authentication/authentication_functions.php');
include_once(__DIR__ . '/../../modules/authentication/password_functions.php');
include_once(__DIR__ . '/../../modules/functions/alerts.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  handleRecoverPassword();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="../../assets/images/icon.png" type="image/x-icon">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../assets/css/auth.css">
  <title>Recuperação de Senha</title>
</head>


<body class="d-flex align-items-center justify-content-center  p-3">
  <section class="login_section d-flex flex-column justify-content-center align-items-center">
    <div class="container shadow bg-white">
      <div class="d-flex flex-column-reverse flex-md-row justify-content-center align-items-center">
        <div class="col-md-6 my-2 d-flex flex-column justify-content-center">
          <?php
          displayAlert('error');
          displayAlert('success'); ?>
          <div class="card border-0">
          <h3 class="text-center mb-4">Recuperação de Senha</h3>
            <div class="card-body text-center p-0 p-md-4">
              <form action="recover_password.php" method="POST">
                <div class="form-group">
                  <input type="email" class="form-control rounded-pill py-2 px-3" id="email" name="email"
                    placeholder="E-mail Cadastrado" required>
                </div>

                <div class="d-flex flex-column flex-md-row justify-content-center align-items-stretch mb-3">
                  <a href="login.php" class="btn btn-secondary my-3 mx-md-2 rounded-pill">Ir para Login</a>
                  <button type="submit" name="submit" class="btn btn-primary my-md-3 rounded-pill">Enviar Link de
                    Recuperação</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-6 img-container d-flex flex-column align-items-center">
          <img src="../../assets/images/forgot-password.png" class="img-fluid" style="max-width: 100%;"
            alt="Security Image">
        </div>
      </div>
    </div>
  </section>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>