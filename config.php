<?php
$dbHost = 'localhost';
$dbUserName = 'root';
$dbPassword = '';
$dbName = 'health_journey';

$connection = new mysqli($dbHost, $dbUserName, $dbPassword, $dbName);
$pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUserName, $dbPassword);
$connection->set_charset("utf8mb4");

// if ($connection->connect_errno) {
//     echo "Error: " . $connection->connect_error;
// } else {
//     echo "Conexão bem-sucedida!";
// }

// Obtém o nome do host
$host = $_SERVER['HTTP_HOST'];

// Obtém o caminho do diretório do script atual
$directory = dirname($_SERVER['PHP_SELF']);

define('BASE_PATH', 'https://' . $host);

$routes = [
    'landingpage' => BASE_PATH . '/index',
    'dashboard' => BASE_PATH . '/pages/user/dashboard',
    'admin' => BASE_PATH . '/pages/admin/admin_dashboard',
    'login' => BASE_PATH . '/pages/auth/login',
    'recoverPassword' => BASE_PATH . '/pages/auth/recover_password',
    'adminUsers' => BASE_PATH . '/pages/admin/users',
    'adminSmtp' => BASE_PATH . '/pages/admin/smtp',
    'adminLandingPage' => BASE_PATH . '/pages/admin/landingpage',
    'adminMeals' => BASE_PATH . '/pages/admin/meals_admin',
    'adminRecipes' => BASE_PATH . '/pages/admin/recipes_admin',
    'exit' => BASE_PATH . '/modules/authentication/exit',
];
