<?php

include_once(__DIR__ . '/../../modules/authentication/authentication_functions.php');
include_once(__DIR__ . '/../../modules/database/smtp_functions.php');
include_once(__DIR__ . '/../../modules/functions/admin_functions.php');

isUserAdmin();
$smtpConfig = getSmtpConfig();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    handleSmtpConfigFormSubmission();
    exit();
}
?>


<div id="smtpContent" class="wrapper d-flex w-100">
    <!-- container -->
    <div class="w-100 p-md-3">

        <div class="container mt-2 px-md-2 w-100">
            <div class="mt-2 w-100">
                <div class="card shadow p-4 my-3">
                    <h2>Configurações SMTP</h1>
                </div>

                <div class="container">

                    <!-- Formulário para as configurações do SMTP -->
                    <form method="post" action="smtp.php" id="smtpForm" class="card p-4">
                        <div class="form-group">
                            <label for="smtp_host">
                                Servidor SMTP
                                <span title="Informe o endereço do servidor SMTP" data-toggle="tooltip"
                                    data-placement="top" class="d-none d-md-inline"><i class="fa-regular fa-circle-question"></i></span>
                            </label>
                            <input type="text" class="form-control shadow-sm" id="smtp_host" name="smtp_host"
                                value="<?php echo $smtpConfig['host']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="smtp_port">
                                Porta SMTP
                                <span title="Informe a porta do servidor SMTP" data-toggle="tooltip"
                                    data-placement="top" class="d-none d-md-inline"><i class="fa-regular fa-circle-question"></i></span>
                            </label>
                            <input type="number" class="form-control shadow-sm" id="smtp_port" name="smtp_port"
                                value="<?php echo $smtpConfig['port']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="smtp_username">
                                Usuário SMTP
                                <span title="Informe o nome de usuário do servidor SMTP" data-toggle="tooltip"
                                    data-placement="top" class="d-none d-md-inline"><i class="fa-regular fa-circle-question"></i></span>
                            </label>
                            <input type="text" class="form-control shadow-sm" id="smtp_username" name="smtp_username"
                                value="<?php echo $smtpConfig['username']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="smtp_password">
                                Senha SMTP
                                <span title="Informe a senha do servidor SMTP. Caso o servidor seja o google, deverá gerar uma senha do aplicativo." data-toggle="tooltip"
                                    data-placement="top" class="d-none d-md-inline"><i class="fa-regular fa-circle-question"></i></span>
                            </label>
                            <input type="password" class="form-control shadow-sm" id="smtp_password"
                                name="smtp_password" value="<?php echo $smtpConfig['password']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="smtp_system_name">
                                Nome do sistema
                                <span title="Informe o nome do sistema que será utilizado no e-mail." data-toggle="tooltip"
                                    data-placement="top" class="d-none d-md-inline"><i class="fa-regular fa-circle-question"></i></span>
                            </label>
                            <input type="text" class="form-control shadow-sm" id="smtp_system_name"
                                name="smtp_system_name" value="<?php echo $smtpConfig['system_name']; ?>" required>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-primary-2" id="submitSmtp">Salvar
                                Configurações</button>
                        </div>

                        <div id="smtpMessages" class="mt-2">
                            <?php displayAlert('success'); ?>
                            <?php displayAlert('error'); ?>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>



<script src="../../assets/js/smtp_script.js"></script>