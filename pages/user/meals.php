<?php

require_once(__DIR__ . '/../../modules/database/meals_functions.php');
require_once(__DIR__ . '/../../modules/authentication/authentication_functions.php');
require_once(__DIR__ . '/../../modules/functions/user_functions.php');

isLoggedIn();

$mealImages = [
    'Café da Manhã' => '../../assets/images/meals/breakfast.png',
    'Lanche da Manhã' => '../../assets/images/meals/fruit-salad.png',
    'Almoço' => '../../assets/images/meals/lunch.png',
    'Lanche da Tarde' => '../../assets/images/meals/snack.png',
    'Jantar' => '../../assets/images/meals/dinner.png',
];

$userData = getUserByEmail($_SESSION['email']);
$planName = $userData['plan_name'];

$mealPlans = getMealPlan($planName);
$mealOptions = array_keys($mealPlans);

?>

<div class="card name_container w-100 d-flex flex-row align-items-center justify-content-center p-3 mt-3">
    <h3 class="name fs-md-2 m-0">
        Seu Plano Alimentar
    </h3>
</div>

<section class="card d-flex p-3 my-3 mw-100">
    <div class="table-responsive m-3">
        <table class="table bordered-table">
            <thead>
                <tr class="text-center">
                    <th scope="col">Refeição</th>
                    <?php foreach ($mealOptions as $option): ?>
                        <th scope="col d-flex flex-column justify-content-center align-items-center">
                            <?= $option ?>
                        </th>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($mealPlans[$mealOptions[0]] as $mealData): ?>
                    <tr>
                        <th scope="row" class="text-center">
                            <div class="d-flex flex-column align-items-center justify-content-center">
                                <?= $mealData['meal_name']; ?>
                                <?php
                                // Verifica se existe uma imagem associada a essa refeição
                                if (isset($mealImages[$mealData['meal_name']])) {
                                    $imagePath = $mealImages[$mealData['meal_name']];
                                    echo '<img src="' . $imagePath . '" alt="Imagem da Refeição" width="100" class="mt-2">';
                                }
                                ?>
                            </div>
                        </th>

                        <?php foreach ($mealOptions as $option): ?>
                            <td>
                                <?php
                                $currentMeal = array_filter($mealPlans[$option], function ($meal) use ($mealData) {
                                    return $meal['meal_name'] === $mealData['meal_name'];
                                });

                                if (!empty($currentMeal)) {
                                    $currentMeal = array_shift($currentMeal);
                                    echo '<ul>';
                                    foreach ($currentMeal['foods'] as $food) {
                                        echo '<li>' . $food . '</li>';
                                    }
                                    echo '</ul>';
                                } else {
                                    echo 'Nenhum plano disponível';
                                }
                                ?>
                            </td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>