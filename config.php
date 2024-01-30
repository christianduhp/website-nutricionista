<?php
$dbHost = 'localhost';
$dbUserName = 'root';
$dbPassword = '';
$dbName = 'health_journey';

$connection = new mysqli($dbHost, $dbUserName, $dbPassword, $dbName);
$pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUserName, $dbPassword);

// if ($connection->connect_errno) {
//     echo "Error: " . $connection->connect_error;
// } else {
//     echo "Conexão bem-sucedida!";
// }

// Obtém o nome do host
$host = $_SERVER['HTTP_HOST'];

// Obtém o caminho do diretório do script atual
$directory = dirname($_SERVER['PHP_SELF']);

define('BASE_PATH', 'http://' . $host . '/health_journey');

$routes = [
    'landingpage' => BASE_PATH . '/index.html',
    'home' => BASE_PATH . '/pages/user/dashboard.php',
    'admin' => BASE_PATH . '/pages/admin/admin_dashboard.php',
    'login' => BASE_PATH . '/pages/auth/login.php',
    'recoverPassword' => BASE_PATH . '/pages/auth/recover_password.php',
    'adminUsers' => BASE_PATH . '/pages/admin/users.php',
    'adminSmtp' => BASE_PATH . '/pages/admin/smtp.php',
    'adminLandingPage' => BASE_PATH . '/pages/admin/landingpage.php',
    'adminMeals' => BASE_PATH . '/pages/admin/meals_admin.php',
    'adminRecipes' => BASE_PATH . '/pages/admin/recipes_admin.php',
    'exit' => BASE_PATH . '/modules/authentication/exit.php',
    'index' => BASE_PATH . '/index.html',
];
