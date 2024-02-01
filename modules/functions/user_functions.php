<?php

require_once(__DIR__ . '/../../modules/functions/routes.php');
include_once(__DIR__ . '/../../modules/functions/alerts.php');
require_once(__DIR__ . '/../../modules/database/users_functions.php');

function handleProfileRequest()
{
    isLoggedIn();
    $response = array();

    if (isset($_SESSION['email'])) {
        $userData = getUserByEmail($_SESSION['email']);
        $userId = $userData['id'];
        $planName = $userData['plan_name'];
        $selectedQuestionnaires = $userData['selected_questionnaires'];
        $currentProfilePicture = $userData['profile_picture'];
        $defaultProfilePicture = '../../assets/images/default_profile_img.png';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $userId = $userData['id'];
            $email = $userData['email'];
            $name = isset($_POST['name']) ? $_POST['name'] : $userData['name'];
            $birthdate = isset($_POST['birthdate']) ? $_POST['birthdate'] : $userData['birthdate'];
            $phone_number = isset($_POST['phone_number']) ? $_POST['phone_number'] : $userData['phone_number'];
            $height = isset($_POST['height']) ? $_POST['height'] : $userData['height'];
            $gender = isset($_POST['gender']) ? $_POST['gender'] : $userData['gender'];
            $nationality = isset($_POST['nationality']) ? $_POST['nationality'] : $userData['nationality'];
            $city = isset($_POST['city']) ? $_POST['city'] : $userData['city'];
            $address = isset($_POST['address']) ? $_POST['address'] : $userData['address'];
            $addressNumber = isset($_POST['address_number']) ? $_POST['address_number'] : $userData['address_number'];
            $address_CEP = isset($_POST['cep']) ? $_POST['cep'] : $userData['cep'];
            $address_complement = isset($_POST['complement']) ? $_POST['complement'] : $userData['address_complement'];
            $address_uf = isset($_POST['uf']) ? $_POST['uf'] : $userData['uf'];
            $address_neighborhood = isset($_POST['neighborhood']) ? $_POST['neighborhood'] : $userData['neighborhood'];

            
            $occupation = isset($_POST['occupation']) ? $_POST['occupation'] : null;
            $communication_preference = isset($_POST['communication_preference']) ? $_POST['communication_preference'] : null;
            $payment_preference = isset($_POST['payment_preference']) ? $_POST['payment_preference'] : null;

            if (!isset($_POST['delete'])) {
                updateUser(
                    $userId,
                    $email,
                    $name,
                    $birthdate,
                    $phone_number,
                    $height,
                    $gender,
                    $nationality,
                    $city,
                    $address,
                    $addressNumber,
                    $occupation,
                    $communication_preference,
                    $payment_preference,
                    $planName,
                    $selectedQuestionnaires,
                    $address_CEP,
                    $address_complement,
                    $address_uf,
                    $address_neighborhood                    
                );

                if (isset($_FILES["profile_picture"]) && $_FILES["profile_picture"]["error"] === UPLOAD_ERR_OK) {
                    $uniqueName = uniqid() . '_' . $_FILES["profile_picture"]["name"];
                    $target_dir = "../../uploads/profiles/";
                    $target_file = $target_dir . $uniqueName;

                    if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
                        updateProfilePicture($userId, $target_file, $defaultProfilePicture);
                        $response['newProfilePicture'] = $target_file;
                        $response['message'] = 'Foto de perfil atualizada com sucesso.';
                        $_SESSION['success'] = $response['message'];
                    }
                } else {
                    $response['message'] = 'Dados atualizados com sucesso.';
                    $_SESSION['success'] = $response['message'];
                }

                // Saída JSON com o cabeçalho
                header('Content-Type: application/json');
                echo json_encode($response);
                exit;
            }

        }

        if (isset($_POST['delete']) && $_POST['delete'] == true) {
            deleteProfilePicture($userId, $currentProfilePicture, $defaultProfilePicture);

            // Saída JSON com o cabeçalho
            header('Content-Type: application/json');
            echo json_encode([
                'message' => 'Foto de perfil deletada com sucesso.',
                'newProfilePicture' => $defaultProfilePicture,
                'defaultProfilePicture' => $defaultProfilePicture
            ]);
            exit;
        }
    }
}