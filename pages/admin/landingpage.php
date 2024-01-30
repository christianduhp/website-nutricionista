<?php

include_once(__DIR__ . '/../../modules/authentication/authentication_functions.php');
include_once(__DIR__ . '/../../modules/functions/admin_functions.php');
include_once(__DIR__ . '/../../modules/functions/alerts.php');

isUserAdmin();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    handleLandingpageSubmitForm();
    exit();
}

?>

<div id="landingpageContent" class="wrapper d-flex w-100">
    <!-- container -->
    <div class="w-100 p-md-3">
        <div class="container mt-2 px-md-2 w-100">
            <div class="mt-2 w-100">
                <div class="card shadow p-4 my-3">
                    <h2>Configurações Landing Page</h2>
                </div>

                <div class="container">

                    <!-- Formulário para as configurações da Landing Page -->
                    <form method="post" action="landingpage.php" id="landingpageForm" class="card p-4"
                        enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-4 d-flex flex-column align-items-center">
                                <img src="../../assets/images/professional.png" class="img-fluid w-50"
                                    alt="Foto Profissional" id="imagePreview">
                                <div class="form-group mt-3">
                                    <input type="file" class="d-none form-control" id="imageInput" name="imageInput"
                                        accept="image/*">
                                    <label for="imageInput" class="form-label btn btn-primary-2"><i
                                            class="fa-solid fa-arrow-up-from-bracket"></i> Selecionar Imagem</label>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="title">Título</label>
                                    <input type="text" class="form-control" id="title" placeholder="Insira o título"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="paragraph">Parágrafo</label>
                                    <textarea class="form-control" id="paragraph" rows="15"
                                        placeholder="Insira o parágrafo" maxlength="1200" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Nome</label>
                                    <input type="text" class="form-control" id="name" placeholder="Insira o seu nome">
                                </div>
                                <div class="form-group">
                                    <label for="instagram">Instagram</label>
                                    <input type="text" class="form-control" id="instagram"
                                        placeholder="Insira o Instagram">
                                </div>
                                <div class="form-group">
                                    <label for="whatsapp">WhatsApp</label>
                                    <input type="number" class="form-control" id="whatsapp"
                                        placeholder="Insira o número WhatsApp. Exemplo: 5548999999999">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="whatsapp_message">Mensagem WhatsApp</label>
                                    <input type="text" class="form-control" id="whatsapp_message"
                                        placeholder="Insira a mensagem automática">
                                </div>
                                <div class="form-group">
                                    <label for="linkedin">LinkedIn</label>
                                    <input type="text" class="form-control" id="linkedin"
                                        placeholder="Insira o LinkedIn">
                                </div>
                                <div class="form-group">
                                    <label for="crn">CRN</label>
                                    <input type="text" class="form-control" id="crn" placeholder="Insira o CRN">
                                </div>
                            </div>
                        </div>


                        <div class="row ml-auto">
                            <div>
                                <button type="submit" class="btn btn-primary-2"
                                    id="submitLandingpage">Atualizar</button>
                            </div>
                        </div>
                        <div id="landingpageMessages" class="mt-2">
                            <?php displayAlert('success'); ?>
                            <?php displayAlert('error'); ?>
                        </div>
                    </form>



                </div>
            </div>
        </div>
    </div>
</div>

<script src="../../assets/js/landingpage_admin_script.js"></script>