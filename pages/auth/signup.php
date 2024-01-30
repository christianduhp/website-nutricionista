<?php

include_once(__DIR__ . '/../../modules/functions/alerts.php');
include_once(__DIR__ . '/../../modules/authentication/password_functions.php');
include_once(__DIR__ . '/../../modules/authentication/authentication_functions.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    handleSignup();
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
    <title>Página de Cadastro</title>
</head>

<body class="d-flex align-items-center justify-content-center  p-3">
    <section class="login_section d-flex flex-column justify-content-center align-items-center">
        <div class="container shadow bg-white">
            <div class="d-flex flex-column-reverse justify-content-center align-items-center">
                <div class="col-md-12 my-2 d-flex flex-column justify-content-center">
                    <div class="card border-0">
                        <h3 class="text-center my-4">Cadastro</h3>

                        <div class="card-body p-0 p-md-4">
                            <form id="signupForm" action="signup.php" method="POST">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Nome:</label>
                                            <input type="text" class="form-control rounded-pill py-2 px-3" id="name"
                                                name="name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">E-mail:</label>
                                            <input type="email" class="form-control rounded-pill py-2 px-3" id="email"
                                                name="email" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="birthdate">Data de Nascimento:</label>
                                            <input type="date" class="form-control rounded-pill py-2 px-3"
                                                id="birthdate" name="birthdate" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone_number">Telefone:</label>
                                            <input type="tel" class="form-control rounded-pill py-2 px-3"
                                                id="phone_number" name="phone_number" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="height">Altura (cm):</label>
                                            <input type="number" class="form-control rounded-pill py-2 px-3" id="height"
                                                name="height" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="gender">Gênero:</label>
                                            <select class="form-control rounded-pill py-2 px-3" id="gender"
                                                name="gender" required>
                                                <option value="" disabled selected>Selecione o Gênero</option>
                                                <option value="male">Masculino</option>
                                                <option value="female">Feminino</option>
                                                <option value="other">Outro</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="nationality">Nacionalidade:</label>
                                            <input type="text" class="form-control rounded-pill py-2 px-3"
                                                id="nationality" name="nationality" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="occupation">Ocupação:</label>
                                            <input type="text" class="form-control rounded-pill py-2 px-3"
                                                id="occupation" name="occupation" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="city">Cidade:</label>
                                            <input type="text" class="form-control rounded-pill py-2 px-3" id="city"
                                                name="city" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Endereço:</label>
                                            <input type="text" class="form-control rounded-pill py-2 px-3" id="address"
                                                name="address" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="address_number">Número:</label>
                                            <input type="text" class="form-control rounded-pill py-2 px-3"
                                                id="address_number" name="address_number" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="payment_preference">Preferência de Pagamento:</label>
                                            <select class="form-control rounded-pill py-2 px-3" id="payment_preference"
                                                name="payment_preference" required>
                                                <option value="" disabled selected>Selecione a Preferência de Pagamento
                                                </option>
                                                <option value="Cartão de Crédito">Cartão de Crédito</option>
                                                <option value="Boleto Bancário">Boleto Bancário</option>
                                                <option value="Transferência">Transferência Bancária</option>
                                                <option value="Pix">Pix</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="communication_preference">Preferência de Comunicação:</label>
                                            <select class="form-control rounded-pill py-2 px-3"
                                                id="communication_preference" name="communication_preference" required>
                                                <option value="" disabled selected>Escolha uma opção</option>
                                                <option value="WhatsApp">WhatsApp</option>
                                                <option value="E-mail">E-mail</option>
                                                <option value="Ligação">Ligação</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Senha:</label>
                                            <input type="password" class="form-control rounded-pill py-2 px-3"
                                                id="password" name="password" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="password_confirmation">Confirme a Senha:</label>
                                            <input type="password" class="form-control rounded-pill py-2 px-3"
                                                id="password_confirmation" name="password_confirmation" Senha" required>
                                        </div>
                                        <small id="passwordHelp" class="form-text text-muted text-center">
                                            A senha deve ter pelo menos 8 caracteres e conter pelo menos uma letra.
                                        </small>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="d-flex justify-content-center my-3">
                                            <button type="submit" name="submit" id="submit"
                                                class="btn btn-primary rounded-pill px-5">Cadastrar</button>
                                        </div>
                                    </div>
                                </div>
                                <div id="signupMessages" class="mt-2 text-center"></div>
                            </form>


                            <div class="text-center">
                                <p>Já tem uma conta? <a href="login.php">Faça login</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 img-container d-flex flex-column align-items-center">
                    <img src="../../assets/images/healthy-lifestyle.png" class="img-fluid" style="max-width: 100%;"
                        alt="Security Image">
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="../../assets/js/signup_script.js"></script>

</body>


</html>