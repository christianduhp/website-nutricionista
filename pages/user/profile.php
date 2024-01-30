<?php

require_once(__DIR__ . '/../../modules/authentication/authentication_functions.php');
require_once(__DIR__ . '/../../modules/functions/user_functions.php');

isLoggedIn();

$userData = getUserByEmail($_SESSION['email']);
$userId = $userData['id'];
$currentProfilePicture = $userData['profile_picture'];
$defaultProfilePicture = '../../assets/images/default_profile_img.png';

handleProfileRequest();
?>

<div class="card p-3 m-3 w-100">

    <form id="profileFormContainer" method="POST" action="profile.php" enctype="multipart/form-data">
        <div class="row">
            <div class="d-flex justify-content-center align-items-center">
                <div class="form-group text-center">
                    <img src="<?= $currentProfilePicture; ?>" class="profile_picture rounded-circle"
                        alt="Foto de Perfil" style="width: 150px; height: 150px;" id="profilePicture1">
                </div>
                <div class="d-flex flex-column gap-2 mx-2">
                    <input class="d-none" type="file" name="profile_picture" id="profile_picture">
                    <label for="profile_picture" class="btn btn-primary-2"><i
                            class="fa-solid fa-arrow-up-from-bracket"></i></label>

                    <input class="d-none btn-delete" type="submit" name="delete" id="delete">

                    <label id="delete_btn" for="delete"
                        class="btn btn-primary-2  <?php echo ($currentProfilePicture == $defaultProfilePicture) ? 'd-none' : ''; ?>"><i
                            class="fas fa-trash"></i></label>
                </div>
            </div>

            <div class="col-md-4 my-3">
                <h4 class="mb-3">Dados</h4>
                <hr>

                <div class="form-group my-3">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" class="form-control text-muted"
                        value="<?= $userData['email']; ?>" disabled>
                </div>

                <div class="form-group my-3">
                    <label for="name">Nome</label>
                    <input type="text" id="name" name="name" class="form-control" value="<?= $userData['name']; ?>">
                </div>

                <div class="form-group my-3">
                    <label for="birthdate">Data de Nascimento</label>
                    <input type="date" id="birthdate" name="birthdate" class="form-control"
                        value="<?= $userData['birthdate']; ?>" required>
                </div>

                <div class="form-group my-3">
                    <label for="phone_number">Número de Celular</label>
                    <input type="text" id="phone_number" name="phone_number" class="form-control"
                        value="<?= $userData['phone_number']; ?>" required>
                </div>

                <div class="form-group my-3">
                    <label for="gender">Gênero</label>
                    <select id="gender" name="gender" class="form-control">
                        <option value="Masculino" <?= ($userData['gender'] == 'Masculino') ? 'selected' : ''; ?>>Masculino
                        </option>
                        <option value="Feminino" <?= ($userData['gender'] == 'Feminino') ? 'selected' : ''; ?>>Feminino
                        </option>
                        <option value="Outro" <?= ($userData['gender'] == 'Outro') ? 'selected' : ''; ?>>Outro</option>
                    </select>
                </div>

                <div class="form-group my-3">
                    <label for="nationality">Nacionalidade</label>
                    <input type="text" id="nationality" name="nationality" class="form-control"
                        value="<?= $userData['nationality']; ?>" required>
                </div>
            </div>

            <div class="col-md-4 my-3">
                <h4 class="mb-3">Endereço</h4>
                <hr>
                <div class="form-group my-3">
                    <label for="city">Cidade</label>
                    <input type="text" id="city" name="city" class="form-control" value="<?= $userData['city']; ?>"
                        required>
                </div>

                <div class="form-group my-3">
                    <label for="address">Endereço</label>
                    <input type="text" id="address" name="address" class="form-control"
                        value="<?= $userData['address']; ?>" required>
                </div>

                <div class="form-group my-3">
                    <label for="address_number">Número</label>
                    <input type="text" id="address_number" name="address_number" class="form-control"
                        value="<?= $userData['address_number']; ?>" required>
                </div>
            </div>

            <div class="col-md-4 my-3">
                <h4 class="mb-3">Informações Adicionais</h4>
                <hr>

                <div class="form-group my-3">
                    <label for="communication_preference">Preferência de Contato</label>
                    <select id="communication_preference" name="communication_preference" class="form-control" required>
                        <option value="" <?= ($userData['communication_preference'] == '') ? 'selected' : ''; ?> disabled>
                            Escolha uma opção</option>
                        <option value="WhatsApp" <?= ($userData['communication_preference'] == 'WhatsApp') ? 'selected' : ''; ?>>WhatsApp</option>
                        <option value="E-mail" <?= ($userData['communication_preference'] == 'E-mail') ? 'selected' : ''; ?>>
                            E-mail</option>
                        <option value="Ligação" <?= ($userData['communication_preference'] == 'Ligação') ? 'selected' : ''; ?>>Ligação</option>
                    </select>
                </div>

                <div class="form-group my-3">
                    <label for="height">Altura (cm)</label>
                    <input type="number" id="height" name="height" class="form-control"
                        value="<?= $userData['height']; ?>" required>
                </div>

                <div class="form-group my-3">
                    <label for="payment_preference">Preferência de Pagamento</label>
                    <select id="payment_preference" name="payment_preference" class="form-control" required>
                        <option value="" <?= ($userData['payment_preference'] == '') ? 'selected' : ''; ?> disabled>Escolha
                            uma opção</option>
                        <option value="Cartão de Crédito" <?= ($userData['payment_preference'] == 'Cartão de Crédito') ? 'selected' : ''; ?>>Cartão de Crédito</option>
                        <option value="Boleto Bancário" <?= ($userData['payment_preference'] == 'Boleto Bancário') ? 'selected' : ''; ?>>
                            Boleto Bancário</option>
                        <option value="Transferência" <?= ($userData['payment_preference'] == 'Transferência') ? 'selected' : ''; ?>>Transferência Bancária</option>
                        <option value="Pix" <?= ($userData['payment_preference'] == 'Pix') ? 'selected' : ''; ?>>Pix
                        </option>
                    </select>
                </div>

                <div class="form-group my-3">
                    <label for="occupation">Ocupação</label>
                    <input type="text" id="occupation" name="occupation" class="form-control"
                        value="<?= $userData['occupation']; ?>" required>
                </div>

                <div class="form-group text-center mt-4 ">
                    <a href="../auth/recover_password.php"
                        class="card flex-row align-items-center justify-content-center gap-2"> <i
                            class="fa-solid fa-key"></i> Trocar de senha</a>
                </div>

            </div>

        </div>

        <div class="text-center">
            <button type="button" class="btn btn-primary-2" id="submitForm">Salvar alterações</button>

            <div id="messages" class="messages_alerts mx-auto my-2">
                <?php displayAlert('success'); ?>
                <?php displayAlert('error'); ?>
            </div>
        </div>


    </form>
</div>

<script src="../../assets/js/profile_user_script.js"></script>