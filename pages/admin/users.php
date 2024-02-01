<?php

include_once(__DIR__ . '/../../modules/authentication/authentication_functions.php');
include_once(__DIR__ . '/../../modules/database/users_functions.php');
include_once(__DIR__ . '/../../modules/functions/admin_functions.php');
include_once(__DIR__ . '/../../modules/database/questionnaire_functions.php');

isUserAdmin();
$users = getAllUsers();

$questionnaires = getQuestionnairesData();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    handleMeasurementPostRequest();
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['userId'])) {
    handleMeasurementsAndResponsesGetRequest();
}
?>


<!-- Tabela usuários -->
<div class="wrapper d-flex w-100 px-md-3" id="userContent">
    <!-- container -->
    <div class="w-100">
        <div class="container mt-2 px-0">
            <div class="container mt-2 w-100">
                <div class="card shadow p-4 my-3">
                    <h2>Lista de Usuários</h2>

                    <div class="d-flex align-items-center order-2 order-lg-2 flex-grow-1">

                        <div class="input-group">
                            <input type="text" class="search-input form-control border-0"
                                placeholder="Pesquisar usuário" id="searchInput">
                            <div class="input-group-append">
                                <button class="search-button btn btn-primary-2 border-0" type="button"
                                    id="searchButton">
                                    <i class="fas fa-search"></i>
                                </button>
                                <a href="../../pages/auth/signup.php"
                                    class="btn btn-success ml-2 d-flex align-items-center rounded">
                                    <i class="fas fa-plus mx-1"></i>Novo Usuário</a>
                            </div>
                        </div>

                    </div>



                </div>

                <div class="card shadow h-100">
                    <div class="table-responsive text-nowrap m-4 w-auto ">
                        <table class="shadow table table-hover">
                            <thead class="thead-custum">
                                <tr class='text-center'>
                                    <th>Ações</th>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Data Nascimento</th>
                                    <th>Número Telefone</th>
                                    <th>Altura</th>
                                    <th>Gênero</th>
                                    <th>Nacionalidade</th>
                                    <th>UF</th>
                                    <th>Cidade</th>
                                    <th>CEP</th>
                                    <th>Bairro</th>
                                    <th>Endereço</th>
                                    <th>Número</th>
                                    <th>Complemento</th>
                                    <th>Data de Criação</th>
                                    <th>Ocupação</th>
                                    <th>Preferência Comunicação</th>
                                    <th>Preferência Pagamento</th>
                                    <th>Plano Alimentar</th>
                                    <th>Questionários</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($users as $user) {
                                    echo renderUserRow($user);
                                }

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Formulário de Edição Pop-up -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content card">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Editar Usuário</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body container">
                <form method="post" action="users.php" id="editUserForm">
                    <input type="hidden" name="editUserId" value="">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="editUserName" class="col-form-label">Nome</label>
                                <div>
                                    <input type="text" class="form-control" id="editUserName" name="editUserName">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="editUserEmail" class="col-form-label">Email</label>
                                <div>
                                    <input type="email" class="form-control" id="editUserEmail" name="editUserEmail">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="editUserBirthdate" class="col-form-label">Data de
                                    Nascimento</label>
                                <div>
                                    <input type="date" class="form-control" id="editUserBirthdate"
                                        name="editUserBirthdate">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="editUserPhoneNumber" class="col-form-label">Número de
                                    Telefone</label>
                                <div>
                                    <input type="tel" class="form-control" id="editUserPhoneNumber"
                                        name="editUserPhoneNumber">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="editUserHeight" class="col-form-label">Altura</label>
                                <div>
                                    <input type="number" class="form-control" id="editUserHeight" name="editUserHeight"
                                        step="0.01">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="editUserGender" class="col-form-label">Gênero</label>
                                <div>
                                    <select class="form-control" id="editUserGender" name="editUserGender">
                                        <option value="Masculino">Masculino</option>
                                        <option value="Feminino">Feminino</option>
                                        <option value="Outro">Outro</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="editUserNationality" class="col-form-label">Nacionalidade</label>
                                <div>
                                    <input type="text" class="form-control" id="editUserNationality"
                                        name="editUserNationality">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="editUserCity" class="col-form-label">Cidade</label>
                                <div>
                                    <input type="text" class="form-control" id="editUserCity" name="editUserCity">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="editUserUF" class="col-form-label">UF</label>
                                <div>
                                    <input type="text" class="form-control" id="editUserUF" name="editUserUF">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="editUserCEP" class="col-form-label">CEP</label>
                                <div>
                                    <input type="text" class="form-control" id="editUserCEP" name="editUserCEP">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="editUserNeighborhood" class="col-form-label">Bairro</label>
                                <div>
                                    <input type="text" class="form-control" id="editUserNeighborhood"
                                        name="editUserNeighborhood">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="editUserAddress" class="col-form-label">Endereço</label>
                                <div>
                                    <input type="text" class="form-control" id="editUserAddress" name="editUserAddress">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="editUserAddressNumber" class="col-form-label">Número</label>
                                <div>
                                    <input type="text" class="form-control" id="editUserAddressNumber"
                                        name="editUserAddressNumber">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="editUserComplement" class="col-form-label">Complemento</label>
                                <div>
                                    <input type="text" class="form-control" id="editUserComplement"
                                        name="editUserComplement">
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="editUserCreatedAt" class="col-form-label">Data de
                                    Criação</label>
                                <div>
                                    <input type="text" class="form-control" id="editUserCreatedAt"
                                        name="editUserCreatedAt" disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="editUserOccupation" class="col-form-label">Ocupação</label>
                                <div>
                                    <input type="text" class="form-control" id="editUserOccupation"
                                        name="editUserOccupation">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="editCommunicationPreference" class="col-form-label">Preferência
                                    de
                                    Contato</label>
                                <div>
                                    <select id="editCommunicationPreference" name="editCommunicationPreference"
                                        class="form-control" required>
                                        <option value="WhatsApp">WhatsApp</option>
                                        <option value="E-mail">E-mail</option>
                                        <option value="Ligação">Ligação</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="editPaymentPreference" class="col-form-label">Preferência de
                                    Pagamento</label>
                                <div>
                                    <select id="editPaymentPreference" name="editPaymentPreference" class="form-control"
                                        required>
                                        <option value="Cartão de Crédito">Cartão de Crédito</option>
                                        <option value="boleto">
                                            Boleto Bancário</option>
                                        <option value="Transferência Bancária">Transferência Bancária</option>
                                        <option value="Pix">Pix
                                        </option>
                                    </select>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="editPlanName" class="col-form-label">Plano alimentar</label>
                                <div>
                                    <select id="editPlanName" name="editPlanName" class="form-control" required>
                                        <?php
                                        $mealPlans = fetchMealPlans();
                                        foreach ($mealPlans as $planName => $options) {
                                            echo "<option value=\"$planName\">$planName</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="editQuestionnaires" class="col-form-label">Questionários</label>
                                <div>
                                    <?php
                                    if (!empty($questionnaires)) {
                                        foreach ($questionnaires as $questionnaire) {
                                            $questionnaireId = $questionnaire['id'];
                                            $questionnaireName = $questionnaire['title'];

                                            $checkboxId = 'questionnaire_' . $questionnaireId;

                                            echo '<div class="form-check">';
                                            echo '<input type="checkbox" class="form-check-input questionnaire-checkbox"
                    id="' . $checkboxId . '" name="selectedQuestionnaires[]"
                    value="' . $questionnaireName . '" >';

                                            echo '<label class="form-check-label"
                    for="' . $checkboxId . '">' . $questionnaireName .
                                                '</label>';
                                            echo '</div>';
                                        }
                                    } else {
                                        echo '<p>Nenhum questionário disponível.</p>';
                                    }
                                    ?>
                                </div>
                            </div>

                        </div>
                    </div>


                    <div id="editUserMessages" class="mt-2">
                        <?php displayAlert('success'); ?>
                        <?php displayAlert('error'); ?>
                    </div>
                </form>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-danger" id="deleteUserBtnInEdit" data-toggle="modal"
                    data-target="#deleteUserModal">Excluir Usuário</button>
                <button type="button" id="submitUser" name="submitUser" class="btn btn-primary-2">Salvar
                    Alterações</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Exclusão -->
<div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered w-50">
        <div class="modal-content card">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteUserModalLabel">Confirmar Exclusão</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <div id="deleteUserMessages">
                    <?php displayAlert('success'); ?>
                    <?php displayAlert('error'); ?>
                </div>
                <p>Deseja realmente excluir este usuário e todas as suas informações do sistema?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">Confirmar Exclusão</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal para exibir respostas do usuário -->
<div class="modal fade" id="userResponsesModal" tabindex="-1" aria-labelledby="userResponsesModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content card">
            <div class="modal-header">
                <h5 class="modal-title" id="userResponsesModalLabel">Respostas do Usuário</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive text-nowrap">
                    <table class="shadow table table-hover">
                        <thead>
                            <tr class='text-center'>
                                <th>Questionário</th>
                                <th>Pergunta</th>
                                <th>Resposta</th>
                            </tr>
                        </thead>
                        <tbody id="userResponsesTableBody">
                            <!-- Aqui serão exibidas as respostas -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal para avaliações físicas do usuário -->
<div class="modal fade" id="userMeasurementsModal" tabindex="-1" aria-labelledby="userMeasurementsModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content card">
            <div class="modal-header">
                <h5 class="modal-title" id="userMeasurementsModalLabel">Avaliações Físicas do Usuário</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="container-fluid">

                    <!-- Accordion -->
                    <div class="accordion" id="measurementsAccordion">

                        <!--  Accordion Item (Table) -->
                        <div class="accordion-item existing-measurements">
                            <h2 class="accordion-header" id="measurementsTableHeader">
                                <button class="accordion-button collapsed fw-semibold fs-6" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#measurementsTableCollapse"
                                    aria-expanded="false" aria-controls="measurementsTableCollapse">
                                    Resumo das Avaliações
                                </button>
                            </h2>

                            <div id="measurementsTableCollapse" class="accordion-collapse collapse"
                                aria-labelledby="measurementsTableHeader" data-bs-parent="#measurementsAccordion">
                                <div class="accordion-body">

                                    <!-- Mensagem de nenhum dado -->
                                    <div id="noDataMessage" class="card text-center">
                                        <div class="m-2 card-body">
                                            <h5 class="card-text">Nenhum registro encontrado para esse paciente.</h5>
                                            <img src="../../assets/images/no-data.png" class="img-fluid" width="250"
                                                alt="Nenhum dado encontrado">
                                        </div>
                                    </div>


                                    <div class="table-responsive text-nowrap">
                                        <table class="shadow table table-hover bordered-table">
                                            <tbody id="userMeasurementsTableBody"></tbody>
                                        </table>
                                        <div id="deleteMeasurementsMessages" class="m-2">
                                            <?php displayAlert('success'); ?>
                                            <?php displayAlert('error'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Accordion Item (Form) -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="measurementsTableHeader">
                                <button class="accordion-button collapsed fw-semibold fs-6" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#addMeasurementsFormCollapse"
                                    aria-expanded="false" aria-controls="addMeasurementsFormCollapse">
                                    Adicionar Nova Avaliação
                                </button>
                            </h2>

                            <div id="addMeasurementsFormCollapse" class="accordion-collapse collapse"
                                aria-labelledby="addMeasurementsFormHeader" data-bs-parent="#measurementsAccordion">
                                <div class="accordion-body">
                                    <form id="addMeasurementsForm" class="w-100">
                                        <!-- Add form fields for new measurements -->
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="measuredAt">Data da Avaliação</label>
                                                <input type="date" class="form-control" id="measuredAt"
                                                    name="measuredAt" value="<?php echo date('Y-m-d'); ?>" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="bodyMass">Massa Corporal</label>
                                                <input type="number" class="form-control" id="bodyMass" name="bodyMass"
                                                    step="0.01" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="bodyFat">Percentual de Gordura
                                                    Corporal</label>
                                                <input type="number" class="form-control" id="bodyFat" name="bodyFat"
                                                    step="0.01" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="leanBodyMass">Massa Magra</label>
                                                <input type="number" class="form-control" id="leanBodyMass"
                                                    name="leanBodyMass" step="0.01" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="weight">Peso</label>
                                                <input type="number" class="form-control" id="weight" name="weight"
                                                    step="0.01" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="bmi">Índice de Massa Corporal (IMC)</label>
                                                <input type="number" class="form-control" id="bmi" name="bmi"
                                                    step="0.01" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="age">Idade</label>
                                                <input type="number" class="form-control" id="age" name="age">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="visceralFat">Gordura Visceral</label>
                                                <input type="number" class="form-control" id="visceralFat"
                                                    name="visceralFat" step="0.01">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="basalMetabolism">Metabolismo Basal</label>
                                                <input type="number" class="form-control" id="basalMetabolism"
                                                    name="basalMetabolism" step="0.01">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="waistHipRatio">Razão Cintura/Quadril</label>
                                                <input type="number" class="form-control" id="waistHipRatio"
                                                    name="waistHipRatio" step="0.01">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="trunkMeasurement">Medição do Tronco</label>
                                                <input type="number" class="form-control" id="trunkMeasurement"
                                                    name="trunkMeasurement" step="0.01">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="toracicSkinfold">Dobra Cutânea
                                                    Torácica</label>
                                                <input type="number" class="form-control" id="toracicSkinfold"
                                                    name="toracicSkinfold" step="0.01">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="tricepsSkinfold">Dobra Cutânea
                                                    Tríceps</label>
                                                <input type="number" class="form-control" id="tricepsSkinfold"
                                                    name="tricepsSkinfold" step="0.01">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="abdominalSkinfold">Dobra Cutânea
                                                    Abdominal</label>
                                                <input type="number" class="form-control" id="abdominalSkinfold"
                                                    name="abdominalSkinfold" step="0.01">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="thighSkinfold">Dobra Cutânea Coxa</label>
                                                <input type="number" class="form-control" id="thighSkinfold"
                                                    name="thighSkinfold" step="0.01">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="axillarySkinfold">Dobra Cutânea
                                                    Axilar</label>
                                                <input type="number" class="form-control" id="axillarySkinfold"
                                                    name="axillarySkinfold" step="0.01">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="suprailiacSkinfold">Dobra Cutânea
                                                    Supra-ilíaca</label>
                                                <input type="number" class="form-control" id="suprailiacSkinfold"
                                                    name="suprailiacSkinfold" step="0.01">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="subscapularSkinfold">Dobra Cutânea
                                                    Subescapular</label>
                                                <input type="number" class="form-control" id="subscapularSkinfold"
                                                    name="subscapularSkinfold" step="0.01">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="chestGirth">Circunferência Torácica</label>
                                                <input type="number" class="form-control" id="chestGirth"
                                                    name="chestGirth" step="0.01">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="hipGirth">Circunferência do Quadril</label>
                                                <input type="number" class="form-control" id="hipGirth" name="hipGirth"
                                                    step="0.01">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="waistGirth">Circunferência da
                                                    Cintura</label>
                                                <input type="number" class="form-control" id="waistGirth"
                                                    name="waistGirth" step="0.01">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="abdomenGirth">Circunferência
                                                    Abdominal</label>
                                                <input type="number" class="form-control" id="abdomenGirth"
                                                    name="abdomenGirth" step="0.01">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="leftArm">Braço Esquerdo</label>
                                                <input type="number" class="form-control" id="leftArm" name="leftArm"
                                                    step="0.01">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="rightArm">Braço Direito</label>
                                                <input type="number" class="form-control" id="rightArm" name="rightArm"
                                                    step="0.01">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="leftForearm">Antebraço Esquerdo</label>
                                                <input type="number" class="form-control" id="leftForearm"
                                                    name="leftForearm" step="0.01">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="rightForearm">Antebraço Direito</label>
                                                <input type="number" class="form-control" id="rightForearm"
                                                    name="rightForearm" step="0.01">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="rightThigh">Coxa Direita</label>
                                                <input type="number" class="form-control" id="rightThigh"
                                                    name="rightThigh" step="0.01">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="leftThigh">Coxa Esquerda</label>
                                                <input type="number" class="form-control" id="leftThigh"
                                                    name="leftThigh" step="0.01">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="rightCalf">Panturrilha Direita</label>
                                                <input type="number" class="form-control" id="rightCalf"
                                                    name="rightCalf" step="0.01">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="leftCalf">Panturrilha Esquerda</label>
                                                <input type="number" class="form-control" id="leftCalf" name="leftCalf"
                                                    step="0.01">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <!-- Botão Adicionar Avaliação -->
                                                <button type="button" class="btn btn-primary-2 float-right"
                                                    id="submitMeasurementsBtn">Adicionar Avaliação</button>
                                            </div>
                                        </div>

                                    </form>
                                    <div id="addMeasurementsMessages" class="m-2">
                                        <?php displayAlert('success'); ?>
                                        <?php displayAlert('error'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>

        </div>
    </div>




</div>

<script src="../../assets/js/users_script.js"></script>