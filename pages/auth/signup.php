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

<body class="d-flex align-items-center justify-content-center p-3">
    <section class="login_section d-flex flex-column justify-content-center align-items-center">
        <div class="container shadow bg-white">
            <div class="d-flex justify-content-center align-items-center">
                <div class="col-md-12 my-2 d-flex flex-column justify-content-center align-items-center">
                    <div class="card border-0">
                        <div class="col col-md-4 mx-auto">
                            <img src="../../assets/images/healthy-lifestyle.png"
                                class="img-fluid w-md-25 mx-auto d-block" alt="Security Image" style="max-width: 100%;">
                        </div>
                        <h3 class="text-center my-4">Cadastro</h3>

                        <div class="card-body p-0 p-md-4">
                            <form id="signupForm" action="signup.php" method="POST">
                                <div class="form-page active" id="page1">
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Nome</label>
                                                <input type="text" class="form-control rounded-pill py-2 px-3" id="name"
                                                    name="name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">E-mail</label>
                                                <input type="email" class="form-control rounded-pill py-2 px-3"
                                                    id="email" name="email" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="birthdate">Data de Nascimento</label>
                                                <input type="date" class="form-control rounded-pill py-2 px-3"
                                                    id="birthdate" name="birthdate" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="phone_number">Telefone</label>
                                                <input type="tel" class="form-control rounded-pill py-2 px-3"
                                                    id="phone_number" name="phone_number" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="payment_preference">Preferência de Pagamento</label>
                                                <select class="form-control rounded-pill py-2 px-3"
                                                    id="payment_preference" name="payment_preference" required>
                                                    <option value="" disabled selected>Selecione a Preferência de
                                                        Pagamento
                                                    </option>
                                                    <option value="Cartão de Crédito">Cartão de Crédito</option>
                                                    <option value="Boleto Bancário">Boleto Bancário</option>
                                                    <option value="Transferência">Transferência Bancária</option>
                                                    <option value="Pix">Pix</option>
                                                </select>
                                            </div>


                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="height">Altura (cm)</label>
                                                <input type="number" class="form-control rounded-pill py-2 px-3"
                                                    id="height" name="height" placeholder="Exemplo: 170" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="gender">Gênero</label>
                                                <select class="form-control rounded-pill py-2 px-3" id="gender"
                                                    name="gender" required>
                                                    <option value="" disabled selected>Selecione o Gênero</option>
                                                    <option value="Masculino">Masculino</option>
                                                    <option value="Feminino">Feminino</option>
                                                    <option value="Outro">Outro</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="nationality">Nacionalidade</label>
                                                <input type="text" class="form-control rounded-pill py-2 px-3"
                                                    id="nationality" name="nationality" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="occupation">Ocupação</label>
                                                <input type="text" class="form-control rounded-pill py-2 px-3"
                                                    id="occupation" name="occupation" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="communication_preference">Preferência de Comunicação</label>
                                                <select class="form-control rounded-pill py-2 px-3"
                                                    id="communication_preference" name="communication_preference"
                                                    required>
                                                    <option value="" disabled selected>Escolha uma opção</option>
                                                    <option value="WhatsApp">WhatsApp</option>
                                                    <option value="E-mail">E-mail</option>
                                                    <option value="Ligação">Ligação</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-center my-3">
                                        <button id="nextButton1" type="button" class="btn btn-primary rounded-pill px-5"
                                            onclick="nextPage('page1', 'page2')">Próximo</button>
                                    </div>
                                </div>

                                <div class="form-page" id="page2">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cep">CEP</label>
                                                <input type="number" class="form-control rounded-pill py-2 px-3"
                                                    id="cep" name="cep" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="neighborhood">Bairro</label>
                                                <input type="text" class="form-control rounded-pill py-2 px-3"
                                                    id="neighborhood" name="neighborhood" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="address">Endereço</label>
                                                <input type="text" class="form-control rounded-pill py-2 px-3"
                                                    id="address" name="address" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="address_number">Número</label>
                                                <input type="text" class="form-control rounded-pill py-2 px-3"
                                                    id="address_number" name="address_number" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="address_complement">Complemento</label>
                                                <input type="text" class="form-control rounded-pill py-2 px-3"
                                                    id="address_complement" name="address_complement">
                                            </div>
                                            <div class="form-group">
                                                <label for="city">Cidade</label>
                                                <input type="text" class="form-control rounded-pill py-2 px-3" id="city"
                                                    name="city" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="uf">UF</label>
                                                <input type="text" class="form-control rounded-pill py-2 px-3" id="uf"
                                                    name="uf" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between my-3">
                                        <button type="button" class="btn btn-secondary rounded-pill px-5"
                                            onclick="prevPage('page2', 'page1')">Anterior</button>
                                        <button id="nextButton2" type="button" class="btn btn-primary rounded-pill px-5"
                                            onclick="nextPage('page2', 'page3')">Próximo</button>

                                    </div>



                                </div>

                                <div class="form-page" id="page3">

                                    <div class="form-group">
                                        <label for="password">Senha</label>
                                        <input type="password" class="form-control rounded-pill py-2 px-3" id="password"
                                            name="password" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirmation">Confirme a Senha</label>
                                        <input type="password" class="form-control rounded-pill py-2 px-3"
                                            id="password_confirmation" name="password_confirmation" required>
                                    </div>
                                    <small id="passwordHelp" class="form-text text-muted text-center">
                                        A senha deve ter pelo menos 8 caracteres e conter pelo menos uma letra.
                                    </small>

                                    <div class="d-flex justify-content-between my-3">
                                        <button type="button" class="btn btn-secondary rounded-pill px-5"
                                            onclick="prevPage('page3', 'page2')">Anterior</button>
                                        <button type="submit" name="submit" id="submit"
                                            class="btn btn-primary rounded-pill px-5">Cadastrar</button>
                                    </div>

                                </div>
                                <div id="signupMessages" class="mt-2 text-center"></div>
                            </form>

                        </div>




                        <div class="text-center">
                            <p>Já tem uma conta? <a href="<?php echo linkTo('login'); ?>">Faça login</a></p>
                        </div>
                    </div>
                </div>
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