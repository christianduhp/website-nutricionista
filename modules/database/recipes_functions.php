<?php

function getRecipes()
{
    global $connection;

    $recipes = array();

    $sql = "SELECT * FROM recipes";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $recipes[] = $row;
        }
    }

    return $recipes;
}

function addRecipe($title, $description, $ingredients, $instructions, $imageSrc)
{
    global $connection;

    $insertQuery = "INSERT INTO recipes (title, 
                                        description, 
                                        ingredients, 
                                        instructions, 
                                        image_src) 
                                        VALUES (?, ?, ?, ?, ?)";

    $insertStmt = $connection->prepare($insertQuery);

    if (!$insertStmt) {
        return false;
    }

    $insertStmt->bind_param(
        "sssss",
        $title,
        $description,
        $ingredients,
        $instructions,
        $imageSrc
    );

    $result = $insertStmt->execute();
    $insertStmt->close();

    return $result;
}

function deleteRecipe($recipeId)
{
    global $connection;

    // Obter o nome do arquivo da imagem associado à receita
    $getImageQuery = "SELECT image_src FROM recipes WHERE id = ?";
    $getImageStmt = $connection->prepare($getImageQuery);
    $getImageStmt->bind_param("i", $recipeId);
    $getImageStmt->execute();
    $getImageStmt->store_result();

    if ($getImageStmt->num_rows > 0) {
        $getImageStmt->bind_result($imageSrc);
        $getImageStmt->fetch();

        // Excluir o arquivo da imagem do sistema de arquivos
        if (!empty($imageSrc)) {

            if (file_exists($imageSrc)) {
                unlink($imageSrc);
            }
        }
    }

    $getImageStmt->close();

    // Excluir a receita do banco de dados
    $deleteQuery = "DELETE FROM recipes WHERE id = ?";
    $deleteStmt = $connection->prepare($deleteQuery);
    $deleteStmt->bind_param("i", $recipeId);
    
    $result = $deleteStmt->execute();
    $deleteStmt->close();

    return $result;
}


