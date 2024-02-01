<?php

include_once(__DIR__ . '/../../config.php');
include_once(__DIR__ . '/../../modules/functions/alerts.php');


function insertUser($name, $email, $hashedPassword, $birthdate, $phone_number, $height, $gender, $nationality, $city, $address, $address_number, $occupation, $communication_preference, $payment_preference)
{
    global $connection;
    $insertQuery = "INSERT INTO users (name, email, password, birthdate, phone_number, height, gender, nationality, city, address, address_number, occupation, communication_preference, payment_preference) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $insertStmt = $connection->prepare($insertQuery);
    $insertStmt->bind_param("ssssssssssssss", $name, $email, $hashedPassword, $birthdate, $phone_number, $height, $gender, $nationality, $city, $address, $address_number, $occupation, $communication_preference, $payment_preference);

    return $insertStmt->execute();
}

function isEmailRegistered($email)
{
    global $connection;

    $checkEmailQuery = "SELECT * FROM users WHERE email = ?";
    $checkEmailStmt = $connection->prepare($checkEmailQuery);
    $checkEmailStmt->bind_param("s", $email);
    $checkEmailStmt->execute();
    $checkEmailStmt->store_result();

    return ($checkEmailStmt->num_rows > 0);
}

function isAdmin($email)
{
    global $connection;

    $checkAdminQuery = "SELECT is_admin FROM users WHERE email = ?";
    $checkAdminStmt = $connection->prepare($checkAdminQuery);
    $checkAdminStmt->bind_param("s", $email);
    $checkAdminStmt->execute();
    $checkAdminStmt->store_result();

    if ($checkAdminStmt->num_rows > 0) {
        $checkAdminStmt->bind_result($is_admin);
        $checkAdminStmt->fetch();
        return ($is_admin == 1);
    } else {
        return false;
    }
}

function getUserByToken($token_hash)
{
    global $connection;

    $sql = "SELECT * FROM users WHERE reset_token_hash = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("s", $token_hash);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        throw new Exception("Token não encontrado");
    }

    return $result->fetch_assoc();
}

function getUserByEmail($email)
{
    global $connection;

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
}

function getAllUsers()
{
    global $connection;

    $sql = "SELECT * FROM users";
    $stmt = $connection->prepare($sql);
    $stmt->execute();

    $result = $stmt->get_result();

    $users = array();

    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }

    return $users;
}

function getUsersByMonth()
{
    global $connection;

    $sql = "SELECT COUNT(*) as user_count, MONTH(created_at) as month
            FROM users
            WHERE YEAR(created_at) = YEAR(CURRENT_DATE())
            GROUP BY MONTH(created_at)";

    $stmt = $connection->prepare($sql);
    $stmt->execute();

    $result = $stmt->get_result();

    $userStats = array();

    while ($row = $result->fetch_assoc()) {
        $userStats[$row['month']] = $row['user_count'];
    }

    return $userStats;
}


function getMeasurementsByUserId($userId)
{
    global $connection;

    $sql = "SELECT * FROM users_measurements WHERE user_id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);

    } else {
        return null;
    }
}

function addUserMeasurements($data)
{
    global $connection;


    foreach ($data as $key => $value) {
        $data[$key] = mysqli_real_escape_string($connection, $value);
    }

    $columns = implode(', ', array_keys($data));
    $values = "'" . implode("', '", $data) . "'";
    $query = "INSERT INTO users_measurements ($columns) VALUES ($values)";

    $result = mysqli_query($connection, $query);

    if ($result) {
        mysqli_close($connection);
        return true;
    } else {
        // Log the detailed error message
        error_log("Error: " . mysqli_error($connection));

        // Check if it's a foreign key constraint violation
        if (mysqli_errno($connection) == 1452) {
            // Log the error
            error_log("User ID does not exist in the users table.");
            // Provide a more user-friendly response
            echo json_encode(['success' => false, 'message' => 'User ID does not exist.']);
        } else {
            // Provide a generic error response
            echo json_encode(['success' => false, 'message' => 'Failed to add measurements.']);
        }

        mysqli_close($connection);
        return false;
    }

}

function deleteMeasurement($recordId)
{
    global $connection;

    $recordId = mysqli_real_escape_string($connection, $recordId);

    $query = "DELETE FROM users_measurements WHERE id = $recordId";

    $result = mysqli_query($connection, $query);

    if ($result) {

        $_SESSION['success'] = "Registro deletado com sucesso.";
        displayAlert('success');

    } else {

        error_log("Error: " . mysqli_error($connection));

        $_SESSION['success'] = "Erro ao deletar registro.";
        displayAlert('success');
    }

    mysqli_close($connection);
}



function updateUser(
    $id,
    $email,
    $name,
    $birthdate,
    $phone_number,
    $height,
    $gender,
    $nationality,
    $city,
    $address,
    $address_number,
    $occupation,
    $communication_preference,
    $payment_preference,
    $plan_name,
    $selected_questionnaires,
    $address_CEP,
    $address_complement,
    $address_uf,
    $address_neighborhood
) {
    global $connection;

    $query = "UPDATE users 
              SET name = ?, 
                  email = ?, 
                  birthdate = ?,
                  phone_number = ?,
                  height = ?,
                  gender = ?,
                  nationality = ?,
                  city = ?,
                  address = ?,
                  address_number = ?,
                  occupation = ?,
                  communication_preference = ?,
                  payment_preference = ?,
                  plan_name = ?,
                  selected_questionnaires = ?,
                  cep = ?,
                  complement = ?,
                  uf = ?,
                  neighborhood = ?
              WHERE id = ?";

    $stmt = $connection->prepare($query);

    $stmt->bind_param(
        "sssssssssssssssssssi",
        $name,
        $email,
        $birthdate,
        $phone_number,
        $height,
        $gender,
        $nationality,
        $city,
        $address,
        $address_number,
        $occupation,
        $communication_preference,
        $payment_preference,
        $plan_name,
        $selected_questionnaires,
        $address_CEP,
        $address_complement,
        $address_uf,
        $address_neighborhood,
        $id
    );

    if (!$stmt->execute()) {
        throw new Exception('Erro ao atualizar as informações do usuário. Por favor, tente novamente.');
    }
}


function updateProfilePicture($userId, $profilePicturePath, $defaultProfilePicturePath)
{
    global $connection;

    // Obtenha o caminho da foto de perfil atual
    $querySelect = "SELECT profile_picture FROM users WHERE id = ?";
    $stmtSelect = $connection->prepare($querySelect);
    $stmtSelect->bind_param("s", $userId);
    $stmtSelect->execute();
    $stmtSelect->store_result();

    if ($stmtSelect->num_rows > 0) {
        $stmtSelect->bind_result($currentProfilePicture);
        $stmtSelect->fetch();

        // Exclua a foto de perfil anterior se existir
        if ($currentProfilePicture && file_exists($currentProfilePicture) && ($currentProfilePicture !== $defaultProfilePicturePath)) {
            unlink($currentProfilePicture);
        }
    }

    // Atualize o caminho da nova foto de perfil no banco de dados
    $queryUpdate = "UPDATE users SET profile_picture = ? WHERE id = ?";
    $stmtUpdate = $connection->prepare($queryUpdate);
    $stmtUpdate->bind_param("ss", $profilePicturePath, $userId);

    if (!$stmtUpdate->execute()) {
        throw new Exception('Erro ao atualizar a foto de perfil. Por favor, tente novamente.');
    }
}


function deleteProfilePicture($userId, $profilePicturePath, $defaultProfilePicturePath)
{
    global $connection;

    // Obtenha o caminho da foto de perfil atual
    $querySelect = "SELECT profile_picture FROM users WHERE id = ?";
    $stmtSelect = $connection->prepare($querySelect);
    $stmtSelect->bind_param("s", $userId);
    $stmtSelect->execute();
    $stmtSelect->bind_result($currentProfilePicture);
    $stmtSelect->fetch();
    $stmtSelect->close();

    // Exclua a foto de perfil anterior se existir
    if ($currentProfilePicture && file_exists($currentProfilePicture) && ($currentProfilePicture !== $defaultProfilePicturePath)) {
        unlink($currentProfilePicture);
    }

    // Atualize o caminho da nova foto de perfil no banco de dados para a foto padrão
    $queryUpdate = "UPDATE users SET profile_picture = ? WHERE id = ?";
    $stmtUpdate = $connection->prepare($queryUpdate);
    $stmtUpdate->bind_param("si", $defaultProfilePicturePath, $userId);

    if (!$stmtUpdate->execute()) {
        throw new Exception('Erro ao atualizar a foto de perfil. Por favor, tente novamente.');
    }

    $stmtUpdate->close();
}

function updatePasswordAndToken($password_hash, $userId)
{
    global $connection;

    $query = "UPDATE users
            SET password = ?,
                reset_token_hash = NULL,
                reset_token_expires_at = NULL
            WHERE id = ? ";

    $stmt = $connection->prepare($query);
    $stmt->bind_param("si", $password_hash, $userId);

    if (!$stmt->execute()) {
        throw new Exception('Erro ao atualizar a senha. Por favor, tente novamente.');
    }
}

function deleteUser($id)
{
    global $connection;

    $query = "DELETE FROM users WHERE id = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("s", $id);

    if (!$stmt->execute()) {
        throw new Exception('Erro ao excluir usuário. Por favor, tente novamente.');
    }

    if ($stmt->affected_rows === 0) {
        throw new Exception('Nenhum usuário encontrado com o ID fornecido.');
    }
}
function generatePasswordResetToken($email)
{
    global $connection;

    if (!isEmailRegistered($email)) {
        // O e-mail não está cadastrado, exiba uma mensagem de erro
        $_SESSION['error'] = "E-mail não encontrado. Por favor, use outro e-mail.";
    } else {
        // E-mail cadastrado, prosseguir com a redefinição de senha
        $token = bin2hex(random_bytes(16));
        $token_hash = hash("sha256", $token);
        date_default_timezone_set('America/Sao_Paulo');
        $expiry = date("Y-m-d H:i:s", strtotime('+1 hour'));

        $sql = "UPDATE users
              SET reset_token_hash = ?,
                  reset_token_expires_at = ?
              WHERE email = ?";

        $stmt = $connection->prepare($sql);
        $stmt->bind_param("sss", $token_hash, $expiry, $email);
        $stmt->execute();

        if ($stmt->affected_rows) {
            return $token;
        }
    }

    return null;
}

function getCompletionPercentage($questionnaireId, $userId)
{
    global $connection;

    $sql = "
        SELECT 
            COUNT(qq.id) AS total_questions,
            SUM(CASE WHEN a.response IS NOT NULL THEN 1 ELSE 0 END) AS answered_questions
        FROM
            questionnaire_questions qq
        LEFT JOIN
            answers a ON qq.id = a.question_id AND a.user_id = ?
        WHERE
            qq.questionnaire_id = ?
    ";

    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ii", $userId, $questionnaireId);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $totalQuestions = $row['total_questions'];
        $answeredQuestions = $row['answered_questions'];

        // Calculate the completion percentage
        if ($totalQuestions > 0) {
            $percentage = ($answeredQuestions / $totalQuestions) * 100;
        } else {
            $percentage = 0;
        }

        return round($percentage, 2);
    } else {
        return 0; // No data found, default to 0%
    }
}
