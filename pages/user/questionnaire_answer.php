<?php

require_once(__DIR__ . '/../../modules/database/questionnaire_functions.php');
require_once(__DIR__ . '/../../modules/authentication/authentication_functions.php');
require_once(__DIR__ . '/../../modules/functions/user_functions.php');

isLoggedIn();
$userData = getUserByEmail($_SESSION['email']);
$userId = $userData['id'];
$questionnaireId = isset($_GET['id']) ? $_GET['id'] : null;
$questionnaireName = isset($_GET['name']) ? $_GET['name'] : null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $questionnaireId = isset($_POST['questionnaire_id']) ? $_POST['questionnaire_id'] : null;
    $userId = isset($_POST['user_id']) ? $_POST['user_id'] : null;

    // Check if the user has existing responses in the database
    $existingResponses = getUserQuestionnaireResponses($questionnaireId, $userId);

    foreach ($_POST as $key => $value) {
        if (strpos($key, 'response') === 0 && trim($value) !== '') {
            $questionId = substr($key, 8);

            // Check if the question already has a response in the database
            if (isset($existingResponses[$questionId])) {
                // Update the existing response
                $success = updateAnswer($questionnaireId, $questionId, $userId, $value);
            } else {
                // Insert a new response
                $success = addAnswer($questionnaireId, $questionId, $userId, $value);
            }
        } elseif (strpos($key, 'question') === 0 && !is_array($value)) {
            $questionId = substr($key, 8);

            // Check if the question already has a response in the database
            if (isset($existingResponses[$questionId])) {
                // Update the existing response
                $success = updateAnswer($questionnaireId, $questionId, $userId, $value);
            } else {
                // Insert a new response
                $success = addAnswer($questionnaireId, $questionId, $userId, $value);
            }
        } elseif (strpos($key, 'dropdown') === 0 && !is_array($value)) {
            $questionId = substr($key, 8);

            // Check if the question already has a response in the database
            if (isset($existingResponses[$questionId])) {
                // Update the existing response
                $success = updateAnswer($questionnaireId, $questionId, $userId, $value);
            } else {
                // Insert a new response
                $success = addAnswer($questionnaireId, $questionId, $userId, $value);
            }
        } elseif (strpos($key, 'question') === 0 && is_array($value)) {
            $questionId = substr($key, 8);

            // Check if the question already has a response in the database
            if (isset($existingResponses[$questionId])) {
                // Update the existing response
                $success = updateAnswer($questionnaireId, $questionId, $userId, $value);
            } else {
                // Insert a new response
                $success = addAnswer($questionnaireId, $questionId, $userId, $value);
            }
        }
    }

    if ($success) {       
        $_SESSION['success'] ='Respostas salvas com sucesso.';
        displayAlert('success');
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Erro ao salvar respostas.']);
    }

    exit(); // Exit to avoid further processing after saving responses
}

function escape($string)
{
    // Remove line breaks and extra spaces
    $cleanedString = preg_replace('/\s+/', ' ', $string);

    // Escape special characters, including acentuação
    $escapedString = htmlspecialchars($cleanedString, ENT_QUOTES);

    return $escapedString;
}




if ($questionnaireName !== null) {
    $questionsData = getQuestionsByQuestionnaireId($questionnaireId);
    $userResponses = getUserQuestionnaireResponses($questionnaireId, $userId);

    echo '
    <div class="card name_container w-100 d-flex flex-row align-items-center justify-content-between p-3 mt-3">
    <div class="d-flex align-items-center">
        <button class="btn btn-primary-3 border-0 mx-3" onclick="goBack()"><i class="fa-solid fa-circle-arrow-left fs-1"></i></button>
        <h3 class="name fs-md-2 m-0 text-center w-100">
            ' . $questionnaireName . '
        </h3>
    </div>
</div>';

    echo ' 
    <div class="card my-3 p-3 ">';
    echo '<form id="questionnaireForm">';
    echo '<input type="hidden" name="questionnaire_id" value="' . $questionnaireId . '">';

    foreach ($questionsData as $question) {
        echo '<div>';
        echo '<p class="mt-3">' . escape($question['question']) . '</p>';

        // Verificar o tipo de pergunta
        if ($question['type'] == 'radio') {
            // Pergunta do tipo radio (opções únicas)
            $options = json_decode($question['options'], true);
            $userResponse = isset($userResponses[$question['id']]) ? $userResponses[$question['id']] : '';

            foreach ($options as $option) {
                $escapedOption = escape($option);
                $selector = 'input[name="question' . $question['id'] . '_options"][value="' . $escapedOption . '"]';

                echo '<div class="form-check">';
                echo '<input class="form-check-input" type="radio" name="question' . $question['id'] . '_options" value="' . $escapedOption . '" id="option' . $question['id'] . '_' . $escapedOption . '">';
                echo '<label class="form-check-label" for="option' . $question['id'] . '_' . $escapedOption . '">' . $option . '</label>';
                echo '</div>';

                if ($escapedOption == $userResponse) {
                    echo '<script>$(\'' . $selector . '\').prop("checked", true);</script>';
                }
            }

        } elseif ($question['type'] == 'checkbox') {
            // Pergunta do tipo checkbox (múltipla escolha)
            $options = json_decode($question['options'], true);
            $userResponseArray = isset($userResponses[$question['id']]) ? $userResponses[$question['id']] : [];

            // Verifique se as opções são armazenadas como uma string separada por vírgulas
            if (!is_array($options)) {
                $options = explode(',', $options);
            }

            // Transforma a resposta do usuário em um array se for uma string separada por vírgulas
            if (!is_array($userResponseArray)) {
                $userResponseArray = explode(',', $userResponseArray);
            }

            foreach ($options as $option) {
                $escapedOption = escape(trim($option)); // Remova espaços em branco
                $selector = 'input[name="question' . $question['id'] . '_options"][value="' . $escapedOption . '"]';

                echo '<div class="form-check">';
                echo '<input class="form-check-input" type="checkbox" name="question' . $question['id'] . '_options" value="' . $escapedOption . '" id="option' . $question['id'] . '_' . $escapedOption . '">';
                echo '<label class="form-check-label" for="option' . $question['id'] . '_' . $escapedOption . '">' . $escapedOption . '</label>';
                echo '</div>';

                // Certifique-se de que $userResponseArray seja um array antes de usar in_array
                if (is_array($userResponseArray) && in_array($escapedOption, $userResponseArray)) {
                    echo '<script>$(\'' . $selector . '\').prop("checked", true);</script>';
                }
            }

        } elseif ($question['type'] == 'dropdown') {
            // Pergunta do tipo dropdown (seleção)
            $options = json_decode($question['options'], true);
            echo '<select class="form-select" id="dropdown_' . $question['id'] . '" name="dropdown_' . $question['id'] . '">';
            foreach ($options as $option) {
                $escapedOption = escape($option);
                echo '<option value="' . $escapedOption . '">' . $escapedOption . '</option>';
            }
            echo '</select>';

            $userResponse = isset($userResponses[$question['id']]) ? $userResponses[$question['id']] : '';
            $escapedUserResponse = escape($userResponse);
            echo '<script>$("#dropdown_' . $question['id'] . '").val("' . $escapedUserResponse . '");</script>';
        } else {
            $userResponse = isset($userResponses[$question['id']]) ? $userResponses[$question['id']] : '';
            $escapedUserResponse = escape($userResponse);
            echo '<textarea name="response' . $question['id'] . '" class="form-control" rows="3" placeholder="Sua resposta">' . $escapedUserResponse . '</textarea>';
        }

        echo '<input type="hidden" name="question_id" value="' . $question['id'] . '">';
        echo '<input type="hidden" name="user_id" value="' . $userId . '">';
        echo '</div>';
    }

    echo '<div class="mt-4 d-flex flex-column justify-content-center">';
    echo '<button type="button" id="submitBtn" class="btn btn-primary-2 mx-auto">Salvar</button>';
    echo '</div>';
    echo '</form>';
    echo '<div id="anwsersMessages" class="mt-2 text-center">';
    echo '</div>';



} else {
    exit();
}
?>

<script src="../../assets/js/questionnaires_script.js"></script>