<?php

require_once(__DIR__ . '/../../modules/database/meals_functions.php');

function renderUserRow($user)
{

    return <<<HTML
        <tr>
            <td>
                <i class="fas fa-edit edit-icon mx-3 p-1" title="Editar Usuário" data-toggle="modal" data-target="#editUserModal" data-user-id="{$user['id']}"></i>
                <!-- <i class="fas fa-toggle-on activate-icon mx-3 p-1" title="Ativar Usuário" data-toggle="tooltip" data-placement="top" data-user-id="{$user['id']}"></i> -->
                <i class="fas fa-solid fa-book mx-3 p-1" title="Informações do usuário" data-toggle="modal" data-target="#userResponsesModal" data-placement="top" data-user-id="{$user['id']}"></i>       
                <i class="fas fa-solid fa-notes-medical mx-3 p-1" title="Adicionar Avaliação" data-toggle="modal" data-target="#userMeasurementsModal" data-placement="top" data-user-id="{$user['id']}"></i>
            </td>
   
            <td><img src="{$user['profile_picture']}" alt="Foto do Usuário" class="object-fit-cover rounded-circle" width="20" height="20">
            {$user['name']}</td>
            <td>{$user['email']}</td>            
            <td>{$user['birthdate']}</td>
            <td>{$user['phone_number']}</td>
            <td>{$user['height']}</td>
            <td>{$user['gender']}</td>
            <td>{$user['nationality']}</td>
            <td>{$user['city']}</td>
            <td>{$user['address']}</td>
            <td>{$user['address_number']}</td>
            <td>{$user['created_at']}</td>
            <td>{$user['occupation']}</td>
            <td>{$user['communication_preference']}</td>
            <td>{$user['payment_preference']}</td>
            <td>{$user['plan_name']}</td>
            <td>{$user['selected_questionnaires']}</td>
        </tr>
    HTML;
}

function handleUserFormSubmission()
{
    if (!empty($_POST['editUserName']) && !empty($_POST['editUserEmail']) && !empty($_POST['editUserId'])) {
        try {
            $selectedQuestionnairesString = isset($_POST['editQuestionnaires']) ? implode(',', $_POST['editQuestionnaires']) : '';
            updateUser(
                $_POST['editUserId'],
                $_POST['editUserEmail'],
                $_POST['editUserName'],
                $_POST['editUserBirthdate'],
                $_POST['editUserPhoneNumber'],
                $_POST['editUserHeight'],
                $_POST['editUserGender'],
                $_POST['editUserNationality'],
                $_POST['editUserCity'],
                $_POST['editUserAddress'],
                $_POST['editUserAddressNumber'],
                $_POST['editUserOccupation'],
                $_POST['editCommunicationPreference'],
                $_POST['editPaymentPreference'],
                $_POST['editPlanName'],
                $selectedQuestionnairesString
            );

            $_SESSION['success'] = "Os dados foram alterados com sucesso.";
            displayAlert('success');
        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
            displayAlert('error');
        }
    } elseif (!empty($_POST['userId'])) {
        // Se não estiver editando, mas excluindo
        $userId = $_POST['userId'];
        try {
            deleteUser($userId);
            $_SESSION['success'] = "Usuário excluído com sucesso.";
            displayAlert('success');
        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
            displayAlert('error');
        }
    } else {
        $_SESSION['error'] = "Nenhuma ação válida fornecida.";
    }
}

function countAndSizeImages($directory)
{
    $files = glob($directory . '/*.{jpg,jpeg,png,gif}', GLOB_BRACE);

    $imageCount = count($files);

    $totalSize = 0;
    foreach ($files as $file) {
        $totalSize += filesize($file);
    }

    return ['count' => $imageCount, 'size' => $totalSize];
}

function handleAddMeasurementsForm()
{

    // Get the user ID and other form data
    $userId = $_POST['userId'];
    $measuredAt = $_POST['measuredAt'];
    $bodyMass = $_POST['bodyMass'];
    $bodyFat = $_POST['bodyFat'];
    $leanBodyMass = $_POST['leanBodyMass'];
    $weight = $_POST['weight'];
    $bmi = $_POST['bmi'];
    $age = $_POST['age'];
    $visceralFat = $_POST['visceralFat'];
    $basalMetabolism = $_POST['basalMetabolism'];
    $waistHipRatio = $_POST['waistHipRatio'];
    $trunkMeasurement = $_POST['trunkMeasurement'];
    $toracicSkinfold = $_POST['toracicSkinfold'];
    $tricepsSkinfold = $_POST['tricepsSkinfold'];
    $abdominalSkinfold = $_POST['abdominalSkinfold'];
    $thighSkinfold = $_POST['thighSkinfold'];
    $axillarySkinfold = $_POST['axillarySkinfold'];
    $suprailiacSkinfold = $_POST['suprailiacSkinfold'];
    $subscapularSkinfold = $_POST['subscapularSkinfold'];
    $chestGirth = $_POST['chestGirth'];
    $hipGirth = $_POST['hipGirth'];
    $waistGirth = $_POST['waistGirth'];
    $abdomenGirth = $_POST['abdomenGirth'];
    $leftArm = $_POST['leftArm'];
    $rightArm = $_POST['rightArm'];
    $leftForearm = $_POST['leftForearm'];
    $rightForearm = $_POST['rightForearm'];
    $rightThigh = $_POST['rightThigh'];
    $leftThigh = $_POST['leftThigh'];
    $rightCalf = $_POST['rightCalf'];
    $leftCalf = $_POST['leftCalf'];

    // Construct an associative array with column names and values
    $data = [
        'user_id' => $userId,
        'measured_at' => $measuredAt,
        'body_mass' => $bodyMass,
        'body_fat' => $bodyFat,
        'lean_body_mass' => $leanBodyMass,
        'weight' => $weight,
        'bmi' => $bmi,
        'age' => $age,
        'visceral_fat' => $visceralFat,
        'basal_metabolism' => $basalMetabolism,
        'waist_hip_ratio' => $waistHipRatio,
        'trunk_measurement' => $trunkMeasurement,
        'toracic_skinfold' => $toracicSkinfold,
        'triceps_skinfold' => $tricepsSkinfold,
        'abdominal_skinfold' => $abdominalSkinfold,
        'thigh_skinfold' => $thighSkinfold,
        'axillary_skinfold' => $axillarySkinfold,
        'suprailiac_skinfold' => $suprailiacSkinfold,
        'subscapular_skinfold' => $subscapularSkinfold,
        'chest_girth' => $chestGirth,
        'hip_girth' => $hipGirth,
        'waist_girth' => $waistGirth,
        'abdomen_girth' => $abdomenGirth,
        'left_arm' => $leftArm,
        'right_arm' => $rightArm,
        'left_forearm' => $leftForearm,
        'right_forearm' => $rightForearm,
        'right_thigh' => $rightThigh,
        'left_thigh' => $leftThigh,
        'right_calf' => $rightCalf,
        'left_calf' => $leftCalf,
    ];


    $requiredFields = ['userId', 'measuredAt', 'bodyMass', 'bodyFat', 'leanBodyMass', 'weight', 'bmi', 'age', 'visceralFat', 'basalMetabolism', 'waistHipRatio', 'trunkMeasurement', 'toracicSkinfold', 'tricepsSkinfold', 'abdominalSkinfold', 'thighSkinfold', 'axillarySkinfold', 'suprailiacSkinfold', 'subscapularSkinfold', 'chestGirth', 'hipGirth', 'waistGirth', 'abdomenGirth', 'leftArm', 'rightArm', 'leftForearm', 'rightForearm', 'rightThigh', 'leftThigh', 'rightCalf', 'leftCalf'];

    foreach ($requiredFields as $field) {
        if (empty($_POST[$field])) {
            $_SESSION['error'] = "Por favor, preencha todos os campos.";
            displayAlert('error');
            return;
        }
    }
    // Insert data into the database
    $success = addUserMeasurements($data);

    if ($success) {

        $_SESSION['success'] = "Avaliação física adicionada com sucesso.";
        displayAlert('success');

    } else {
        $_SESSION['error'] = "Erro ao adicionar avaliação física.";
        displayAlert('error');
    }
}

function handleSmtpConfigFormSubmission()
{
    if (!empty($_POST['smtp_host']) && !empty($_POST['smtp_port']) && !empty($_POST['smtp_username']) && !empty($_POST['smtp_password'])) {
        // Lógica para atualizar configurações SMTP no banco de dados
        $smtpHost = $_POST['smtp_host'];
        $smtpPort = $_POST['smtp_port'];
        $smtpUsername = $_POST['smtp_username'];
        $smtpPassword = $_POST['smtp_password'];
        $smtpSystemName = $_POST['smtp_system_name'];

        updateSmtpConfig($smtpHost, $smtpPort, $smtpUsername, $smtpPassword, $smtpSystemName);

        $_SESSION['success'] = "Os dados foram alterados com sucesso.";
        displayAlert('success');
    } else {
        $_SESSION['error'] = "Todos os campos precisam ser preenchidos.";
        displayAlert('error');
    }
}

function handleMealPlanSubmission()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
        if ($_POST['action'] === 'removeFood' && isset($_POST['foodId'])) {
            // Lógica para remover alimento
            removeFood($_POST['foodId']);
        } elseif ($_POST['action'] === 'addFood' && isset($_POST['mealName']) && isset($_POST['newFoodName'])) {
            // Lógica para adicionar alimento
            addFood($_POST['planName'], $_POST['optionName'], $_POST['mealName'], $_POST['newFoodName']);
        } elseif ($_POST['action'] === 'removeOption' && isset($_POST['optionName']) && isset($_POST['planName'])) {
            // Lógica para remover opção
            removeOption($_POST['optionName'], $_POST['planName']);
        } elseif ($_POST['action'] === 'addOption') {
            // Lógica para adicionar opção
            addOption($_POST['selectedPlan']);
        } elseif ($_POST['action'] === 'addPlan' && isset($_POST['newPlanName'])) {
            // Lógica para adicionar plano
            addPlan($_POST['newPlanName']);
        } elseif ($_POST['action'] === 'removePlan' && isset($_POST['selectedPlan'])) {
            // Lógica para remover plano
            removePlan($_POST['selectedPlan']);
        }
    }
}

function handleImageUpload($file)
{

    $uploadDir = '../../uploads/recipes/';
    $uniqueName = uniqid() . '_' . $file['name'];

    $targetFilePath = $uploadDir . $uniqueName;

    if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {

        return $targetFilePath;
    } else {

        return '';
    }
}

function handleRecipeAddition()
{
    $recipeTitle = $_POST['recipeTitle'];
    $recipeDescription = $_POST['recipeDescription'];
    $recipeIngredients = $_POST['recipeIngredients'];
    $recipeInstructions = $_POST['recipeInstructions'];

    // Processa a imagem
    $imageFileName = '';
    $maxFileSize = 1024 * 1024;
    if ($_FILES['recipeImage']['error'] == 0) {
        if ($_FILES['recipeImage']['size'] > $maxFileSize) {
            echo json_encode(['status' => 'error', 'message' => 'O tamanho do arquivo excede 1 MB.']);
            exit;
        } else {
            $imageFileName = handleImageUpload($_FILES['recipeImage']);
        }
    }

    try {
        addRecipe($recipeTitle, $recipeDescription, $recipeIngredients, $recipeInstructions, $imageFileName);
        echo json_encode(['status' => 'success', 'message' => 'A receita foi criada com sucesso']);
        exit;
    } catch (Exception $e) {
        $_SESSION['error'] = $e->getMessage();
        echo json_encode(['status' => 'error', 'message' => $_SESSION['error']]);
        exit;
    }
}

function handleRecipeDeletion()
{
    $recipeId = $_POST['recipeId'];

    try {
        deleteRecipe($recipeId);
        echo json_encode(['status' => 'success']);
        exit;
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        exit;
    }
}

function replaceNewlines($str)
{
    return str_replace("\n\n", '<br><br>', $str);
}

function uploadImage()
{
    $targetDir = '../../assets/images/';

    // Renomeie o arquivo para "professional.png"
    $targetFileRenamed = $targetDir . 'professional.png';

    // Mova o arquivo carregado para o diretório de destino com o novo nome
    if (move_uploaded_file($_FILES['imageInput']['tmp_name'], $targetFileRenamed)) {
        return true;
    } else {
        // Log the error message
        error_log('Error moving uploaded file: ' . $_FILES['imageInput']['error']);
        return false;
    }

}
function handleLandingpageSubmitForm()
{
    // Obtenha os dados JSON do POST
    $jsonData = json_decode($_POST['data'], true);

    // Substitui as quebras de linha normais por <br><br>
    $jsonData['paragraph'] = replaceNewlines($jsonData['paragraph']);

    $jsonFile = '../../data/landingpage.json';

    // Verifique se o campo de upload de imagem foi enviado
    if (!empty($_FILES['imageInput']['name'])) {
        // Faça o upload da nova imagem
        if (uploadImage()) {
            $_SESSION['success'] = "Imagem foi enviada com sucesso. A atualização da foto pode demorar para ser refletida no site. ";
            displayAlert('success');
        } else {
            $_SESSION['error'] = "Ocorreu um erro ao carregar a imagem. Detalhes: " . error_get_last()['message'];
            displayAlert('error');
            exit();
        }
    }

    if (file_put_contents($jsonFile, json_encode($jsonData, JSON_PRETTY_PRINT))) {
        $_SESSION['success'] = "Os dados foram alterados com sucesso.";
        displayAlert('success');
    } else {
        $_SESSION['error'] = "Ocorreu um erro ao atualizar.";
        displayAlert('error');
    }

}


function handleMeasurementPostRequest()
{
    if (isset($_POST['dataType'])) {
        if ($_POST['dataType'] === 'addMeasurements') {
            handleAddMeasurementsForm();
            exit();
        } elseif ($_POST['dataType'] === 'deleteRecord' && isset($_POST['recordId'])) {
            deleteMeasurement($_POST['recordId']);
            exit();
        }
    } else {
        handleUserFormSubmission();
        exit();
    }
}

function handleMeasurementsAndResponsesGetRequest()
{
    if (isset($_GET['dataType'])) {
        if ($_GET['dataType'] === 'responses') {
            getUserResponsesAsJSON($_GET['userId']);
        } elseif ($_GET['dataType'] === 'measurements') {
            getUserMeasurementsAsJSON($_GET['userId']);
        } else {
            echo json_encode(['error' => 'Invalid dataType parameter']);
        }
    }

    exit();
}

function getUserResponsesAsJSON($userId)
{
    $userResponses = getUserResponses($userId);

    // Prepare an associative array to represent the responses
    $responseArray = [
        'user_responses' => [],
    ];

    foreach ($userResponses as $questionId => $response) {
        // Get question and questionnaire information
        $questionInfo = getQuestionInfo($questionId);
        $questionnaireInfo = getQuestionnaireInfo($questionInfo['questionnaire_id']);

        // Add the response to the array
        $responseArray['user_responses'][] = [
            'questionnaire_title' => $questionnaireInfo['title'],
            'question' => $questionInfo['question'],
            'response' => $response,
        ];
    }

    // Convert the array to JSON and print it
    echo json_encode($responseArray);
}

function getUserMeasurementsAsJSON($userId)
{
    $measurementData = getMeasurementsByUserId($userId);
    $parameterNames = [];
    $evaluationDates = [];

    if (!empty($measurementData)) {
        $parameterNames = array_keys($measurementData[0]);
        $parameterNames = array_diff($parameterNames, ['id', 'user_id', 'measured_at', 'created_at']);
        $evaluationDates = array_column($measurementData, 'measured_at');
    }

    echo json_encode(['column_names' => $parameterNames, 'data' => $measurementData, 'evaluation_dates' => $evaluationDates]);
}