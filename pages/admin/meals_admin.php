<?php

include_once(__DIR__ . '/../../modules/authentication/authentication_functions.php');
require_once(__DIR__ . '/../../modules/database/meals_functions.php');
require_once(__DIR__ . '/../../modules/functions/admin_functions.php');

isUserAdmin();
$mealPlans = fetchMealPlans();
handleMealPlanSubmission();

?>

<div id="mealFoodsContainer" class="wrapper d-flex w-100">


    <!-- container -->
    <div class="w-100">


        <div class="container mt-2 px-md-3">
            <div class="container mt-2 w-100">
                <div class="card shadow p-4 my-3">
                    <h2>Planos Alimentares</h2>
                    <div class="d-flex flex-column align-items-center order-2 order-lg-2 flex-grow-1">

                        <!-- Selecionar e Excluir plano -->
                        <div class="input-group">
                            <select class="custom-select" id="planDropdown">
                                <?php foreach ($mealPlans as $planName => $options): ?>
                                    <option value="<?= $planName; ?>">
                                        <?= $planName; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>

                            <div class="input-group-append">
                                <button type="button" class="btn btn-danger btn-remove-plan">
                                    <i class="fas fa-trash"></i> Excluir Plano
                                </button>
                            </div>
                        </div>

                        <!-- Adicionar novo plano -->
                        <div class="my-3 input-group">
                            <input type="text" class="form-control" id="newPlanName"
                                placeholder="Digite o nome do plano" data-plan-input>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-success btn-add-plan"> <i class="fas fa-plus"></i>
                                    Adicionar
                                    Plano</button>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Accordions para opções, refeições e alimentos -->
                <div id="accordionContainer">
                    <?php foreach ($mealPlans as $planName => $options): ?>
                        <div class="accordion accordion-custom " id="accordion<?= str_replace(' ', '', $planName); ?>">
                            <?php foreach ($options as $optionName => $meals): ?>
                                <div class="accordion-item accordion-item-custom" data-plan-name="<?= $planName; ?>">

                                    <h2 class="accordion-header"
                                        id="heading<?= str_replace(' ', '', $optionName) . '_' . str_replace(' ', '', $planName); ?>">

                                        <button class="accordion-button accordion-button-custom collapsed" type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#collapse<?= str_replace(' ', '', $optionName) . '_' . str_replace(' ', '', $planName); ?>"
                                            aria-expanded="true"
                                            aria-controls="collapse<?= str_replace(' ', '', $optionName) . '_' . str_replace(' ', '', $planName); ?>">
                                            <?= $optionName; ?>
                                        </button>
                                    </h2>


                                    <div id="collapse<?= str_replace(' ', '', $optionName) . '_' . str_replace(' ', '', $planName); ?>"
                                        class="accordion-collapse collapse"
                                        aria-labelledby="heading<?= str_replace(' ', '', $optionName) . '_' . str_replace(' ', '', $planName); ?>"
                                        data-bs-parent="#accordion<?= str_replace(' ', '', $planName); ?>">
                                        <div class="accordion-body">
                                            <?php foreach ($meals as $mealName => $foods): ?>
                                                <div class="mb-3 meal_name">
                                                    <strong>
                                                        <?= $mealName; ?>:
                                                    </strong><br>
                                                    <div
                                                        id="mealFoods<?= str_replace(' ', '_', $mealName) . '_' . str_replace(' ', '', $optionName) . '_' . str_replace(' ', '', $planName); ?>">
                                                        <?php foreach ($foods as $food): ?>
                                                            <div class="d-flex align-items-center mb-2">
                                                                <button type="button" class="btn btn-danger btn-delete-food btn-sm mr-2"
                                                                    data-food-id="<?= $food['id']; ?>">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                                <?= $food['food_name']; ?>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    </div>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control"
                                                            id="newFood<?= $mealName . '_' . str_replace(' ', '', $optionName) . '_' . str_replace(' ', '', $planName); ?>"
                                                            placeholder="Novo Alimento" data-food-input>
                                                        <div class="input-group-append">
                                                            <button type="button" class="btn btn-success btn-add-food"
                                                                data-meal-plan="<?= $planName; ?>"
                                                                data-meal-name="<?= $mealName; ?>"
                                                                data-option-name="<?= $optionName; ?>">
                                                                <i class="fas fa-plus"></i> Adicionar
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <hr>

                                                </div>
                                            <?php endforeach; ?>
                                            <!-- Botão de Remover Opção -->
                                            <button
                                                class="btn btn-danger btn-remove-option mx-auto d-flex align-items-center justify-self-center"
                                                data-option-name="<?= $optionName; ?>" data-plan-name="<?= $planName; ?>">
                                                <i class="fas fa-trash mx-1"></i> Remover opção
                                            </button>
                                        </div>

                                    </div>

                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endforeach; ?>
                </div>


                <!-- Botão de Adicionar Opção -->
                <div class="input-group m-3">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-success btn-add-option rounded"> <i
                                class="fas fa-plus"></i> Adicionar
                            Opção</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="../../assets/js/meals_admin_script.js"></script>