<?php

include_once(__DIR__ . '/../../modules/authentication/authentication_functions.php');
include_once(__DIR__ . '/../../modules/functions/alerts.php');
include_once(__DIR__ . '/../../modules/database/users_functions.php');
include_once(__DIR__ . '/../../modules/authentication/password_functions.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  handleLogin();
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
  <title>Página de Login</title>
</head>

<body class="login_section d-flex flex-column p-3 justify-content-center align-items-center">
  <section class="login_section d-flex flex-column justify-content-center align-items-center">
    <div class="container shadow bg-white">
      <div class="d-flex flex-column-reverse flex-md-row justify-content-center align-items-center">
        <div class="col-md-6 my-2 d-flex flex-column justify-content-center">

          <div class="card border-0">
            <h3 class="text-center my-4">Login</h3>

            <div class="card-body text-center p-0 p-md-4">
              <form id="loginForm" action="login.php" method="post">

                <div class="form-group">
                  <label for="email" class="sr-only">E-mail</label>
                  <input type="email" class="form-control rounded-pill py-2 px-3" id="email" name="email"
                    placeholder="E-mail" required>
                </div>

                <div class="form-group">
                  <label for="password" class="sr-only">Senha</label>
                  <input type="password" class="form-control rounded-pill py-2 px-3" id="password" name="password"
                    placeholder="Senha" required>
                </div>

                <div class="d-flex justify-content-center my-3">
                  <button type="submit" name="submit" id="submit"
                    class="btn btn-primary rounded-pill px-5">Entrar</button>
                </div>

                <div id="loginMessages" class="mt-2">
                </div>

                <a href="recover_password.php">Esqueci minha senha</a>

              </form>
            </div>
          </div>
        </div>
        <div class="col-md-6 img-container d-flex flex-column align-items-center">
          <img src="../../assets/images/login.png" class="img-fluid" style="max-width: 100%;" alt="Security Image">
        </div>

      </div>
      <div class="my-2 text-center">
        <p>Não tem uma conta? <a href="../../index.html#consulta">Entre em contato</a></p>
      </div>
    </div>
  </section>

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script src="../../assets/js/login_script.js"></script>

</body>

</html>