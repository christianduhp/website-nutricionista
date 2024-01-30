<?php
include_once(__DIR__ . '/../../modules/functions/routes.php');
include_once(__DIR__ . '/../../modules/database/users_functions.php');

session_start();

function isLoggedIn()
{
    if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['password']) == true)) {
        unset($_SESSION['email']);
        unset($_SESSION['password']);
        route('login');
    }
}
function isUserAdmin()
{
    if (!isset($_SESSION['email']) || !isAdmin($_SESSION['email'])) {
        route('login');
    }
}
function logout()
{
    unset($_SESSION['email']);
    unset($_SESSION['password']);
    route('login');
}
function handleLogin()
{
    $response = array();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $email = sanitizeInput($_POST['email']);
            $enteredPassword = sanitizeInput($_POST['password']);

            try {
                $user = getUserByEmail($email);

                if ($user && password_verify($enteredPassword, $user['password'])) {
                    $_SESSION['email'] = $email;

                    if (isAdmin($email)) {
                        $response['status'] = 'success';
                        $response['redirect'] = getRoute('admin');
                    } else {
                        $response['status'] = 'success';
                        $response['redirect'] = getRoute('home');
                    }
                } else {
                    $response['status'] = 'error';
                    $response['message'] = "Senha ou usuário inválidos.";
                }
            } catch (Exception $e) {
                $response['status'] = 'error';
                $response['message'] = $e->getMessage();
            }
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Campos obrigatórios não preenchidos.';
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Método de requisição inválido.';
    }

    // Send the JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}

function sanitizeInput($input)
{
    return htmlspecialchars(trim($input));
}

function handleSignup()
{
    $response = array();

    if (
        !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) &&
        !empty($_POST['password_confirmation']) && !empty($_POST['birthdate']) &&
        !empty($_POST['phone_number']) && !empty($_POST['height']) && !empty($_POST['gender']) &&
        !empty($_POST['nationality']) && !empty($_POST['city']) && !empty($_POST['address']) &&
        !empty($_POST['address_number']) && !empty($_POST['occupation']) &&
        !empty($_POST['communication_preference']) && !empty($_POST['payment_preference'])
    ) {
        $name = sanitizeInput($_POST['name']);
        $email = sanitizeInput($_POST['email']);
        $password = sanitizeInput($_POST['password']);
        $birthdate = sanitizeInput($_POST['birthdate']);
        $phone_number = sanitizeInput($_POST['phone_number']);
        $height = sanitizeInput($_POST['height']);
        $gender = sanitizeInput($_POST['gender']);
        $nationality = sanitizeInput($_POST['nationality']);
        $city = sanitizeInput($_POST['city']);
        $address = sanitizeInput($_POST['address']);
        $address_number = sanitizeInput($_POST['address_number']);
        $occupation = sanitizeInput($_POST['occupation']);
        $communication_preference = sanitizeInput($_POST['communication_preference']);
        $payment_preference = sanitizeInput($_POST['payment_preference']);

        try {
            // Validate password and confirmation
            validatePassword($password, $_POST["password_confirmation"]);

            // Check if email is already registered
            if (isEmailRegistered($email)) {

                $response['status'] = 'error';
                $response['message'] = "Este e-mail já está cadastrado. Por favor, use outro e-mail.";


            } else {
                // Email is not registered, proceed with the insertion
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                if (insertUser($name, $email, $hashedPassword, $birthdate, $phone_number, $height, $gender, $nationality, $city, $address, $address_number, $occupation, $communication_preference, $payment_preference)) {
                    // User inserted successfully, handle login
                    handleLogin();
                    $response['status'] = 'success';
                    $response['message'] = 'O cadastro foi feito com sucesso! Faça login para acessar.';

                } else {
                    // Error while inserting data
                    $response['status'] = 'error';
                    $response['message'] = 'Erro ao cadastrar. Por favor, tente novamente mais tarde.';
                }
            }
        } catch (Exception $e) {
            // Handle exception
            $response['status'] = 'error';
            $response['message'] = $e->getMessage();
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Campos obrigatórios não preenchidos.';
    }

    // Send the JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}

