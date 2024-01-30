<?php

include_once(__DIR__ . '/../../modules/authentication/authentication_functions.php');
include_once(__DIR__ . '/../../modules/database/recipes_functions.php');

isLoggedIn();
$recipesData = getRecipes();
?>

<div class="card name_container w-100 d-flex flex-row align-items-center justify-content-center p-3 mt-3">
    <h3 class="name fs-md-2 m-0">
        Receitas
    </h3>
</div>

<div class="row row-cols-1 row-cols-md-4 g-4 my-3 justify-content-center" id="recipeCardsContainer">
    <?php
    function createRecipeCard($recipe)
    {
        return '

      
    <div class="col recipe-card">
        <div class="card h-100 ">
            <img src="' . $recipe['image_src'] . '" class="recipe-img card-img-top" width="200" height="200" alt="Imagem da Receita">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">' . $recipe['title'] . '</h5>
                <small class="card-text my-1 py-1">' . $recipe['description'] . '</small>
                <div class="mt-auto d-flex align-self-end">
                    <button type="button" class="btn btn-primary-2" data-bs-toggle="modal" data-bs-target="#recipeModal"
                        data-recipe-title="' . $recipe['title'] . '"
                        data-recipe-ingredients="' . $recipe['ingredients'] . '" data-recipe-instructions="' . $recipe['instructions'] . '">
                        Ver Receita
                    </button>
                </div>
            </div>
        </div>
    </div>
    ';
    }

    foreach ($recipesData as $recipe) {
        echo createRecipeCard($recipe);
    }
    ?>
</div>

<!-- Modal da Receita -->
<div class="modal fade" id="recipeModal" tabindex="-1" aria-labelledby="recipeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="card modal-content">
            <div class="modal-header d-flex align-items-center justify-content-center">
                <h5 class="modal-title mb-0" id="recipeModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="" class="recipe-img mb-2" alt="Imagem da Receita">
                <h6><i class="mx-3 fas fa-list-ul m-2"></i> Ingredientes:</h6>
                <ul id="recipeIngredients"></ul>
                <h6><i class="mx-3 fas fa-book m-2"></i> Instruções de Preparo:</h6>
                <ul id="recipeInstructions" class="list-unstyled mx-3"></ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<script src="../../assets/js/recipes_script.js"></script>