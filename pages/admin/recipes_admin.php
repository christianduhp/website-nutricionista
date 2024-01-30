<?php
include_once(__DIR__ . '/../../modules/authentication/authentication_functions.php');
include_once(__DIR__ . '/../../modules/database/recipes_functions.php');
include_once(__DIR__ . '/../../modules/functions/admin_functions.php');

isLoggedIn();
$recipesData = getRecipes();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['recipeId'])) {
        handleRecipeDeletion();
    } else {
        handleRecipeAddition();
    }
}

?>

<section id="recipesAdminContainer" class="w-100">
    <div class="w-100 px-md-3 py-3">
        <div class="container mt-2 px-0">
            <div class="container mt-2">
                <div class="card shadow p-4 my-3">
                    <h2>Receitas</h2>
                    <div class="d-flex align-items-center order-2 order-lg-2 flex-grow-1">

                        <div class="input-group">
                            <input type="text" class="search-input form-control border-0"
                                placeholder="Pesquisar receita" id="searchInput">
                            <div class="input-group-append">
                                <button class="search-button btn btn-primary-2 border-0" type="button"
                                    id="searchButton">
                                    <i class="fas fa-search"></i>
                                </button>
                                <button type="button" class="btn btn-success ml-2 d-flex align-items-center rounded"
                                    data-bs-toggle="modal" data-bs-target="#addRecipeModal">
                                    <i class="fas fa-plus mx-1"></i> Nova Receita
                                </button>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>


    <div class="row row-cols-4 row-cols-md-6 g-4 mb-3 d-flex justify-content-center" id="recipeCardsContainer">
        <?php
        function createAdminRecipeCard($recipe)
        {
            return '
        <div class="col recipe-card my-2">
            <div class="card h-100 ">
                <img src="' . $recipe['image_src'] . '" class="recipe-img card-img-top" width="200" height="100" alt="Imagem da Receita">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">' . $recipe['title'] . '</h5>
                    <small class="card-text my-1 py-1">' . $recipe['description'] . '</small>
                    <div class="mt-auto d-flex justify-content-between">
                    <button type="button" class="btn btn-danger ml-2 delete-recipe" data-recipe-id="' . $recipe['id'] . '"><i class="fas fa-trash"></i></button>
                        <button type="button" class="btn btn-primary-2" data-bs-toggle="modal" data-bs-target="#recipeModal"
                            data-recipe-title="' . $recipe['title'] . '"
                            data-recipe-ingredients="' . $recipe['ingredients'] . '" data-recipe-instructions="' . $recipe['instructions'] . '">
                            Ver Receita
                        </button>
                        
                    </div>
                </div>
            </div>
        </div>';
        }

        foreach ($recipesData as $recipe) {
            echo createAdminRecipeCard($recipe);
        }

        ?>
    </div>
</section>

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

<!-- Modal para adicionar nova receita -->
<div class="modal fade" id="addRecipeModal" tabindex="-1" aria-labelledby="addRecipeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content card">
            <div class="modal-header">
                <h5 class="modal-title" id="addRecipeModalLabel">Adicionar Nova Receita</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex flex-column">
                <!-- Formulário para adicionar nova receita -->
                <form id="addRecipeForm" action="recipes_admin.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="recipeTitle" class="form-label">Título da Receita</label>
                        <input type="text" class="form-control" id="recipeTitle" name="recipeTitle" required>
                    </div>

                    <div class="mb-3">
                        <label for="recipeImage" class="form-label">Imagem da Receita
                            (JPEG)</label>
                        <input type="file" class="form-control" id="recipeImage" name="recipeImage" accept="image/jpeg"
                            maxlength="1024" required>
                    </div>

                    <div class="mb-3">
                        <label for="recipeDescription" class="form-label">Descrição da Receita
                            (máx. 100
                            caracteres)</label>
                        <textarea class="form-control" id="recipeDescription" name="recipeDescription" rows="2"
                            maxlength="100" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="recipeIngredients" class="form-label">Ingredientes</label>
                        <textarea class="form-control" id="recipeIngredients" name="recipeIngredients" rows="4"
                            placeholder="Escreva cada ingrediente em uma linha. Exemplo: 
    2 Ovos
    1/2 Xícara de Tapioca
    Morangos
    Mel" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="recipeInstructions" class="form-label">Instruções de
                            Preparo</label>
                        <textarea class="form-control" id="recipeInstructions" name="recipeInstructions" rows="4"
                            placeholder="Escreva cada instrução em uma linha. Exemplo:
    1. Bata os ovos em uma tigela.
    2. Adicione espinafre, tomate e queijo feta.
    3. Despeje a mistura em uma frigideira quente.
    4. Cozinhe até que o omelete esteja firme.
    5. Dobre ao meio e sirva." required></textarea>
                    </div>

                    <div class="d-flex">
                        <button type="submit" class="btn btn-primary-2 ml-auto">Adicionar
                            Receita
                        </button>
                    </div>


                    <div id="addRecipeMessages" class="mt-2 text-center">
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>


<script src="../../assets/js/recipes_script.js"></script>