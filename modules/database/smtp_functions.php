<?php

include_once(__DIR__ . '/../../config.php');
include_once(__DIR__ . '/../functions/alerts.php');

function getSmtpConfig()
{
    global $connection;

    $sql = "SELECT host, username, password, port, system_name FROM smtp_config WHERE id = 1";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $smtpConfig = [
            'host' => $row['host'],
            'username' => $row['username'],
            'password' => $row['password'],
            'port' => $row['port'],
            'system_name' => $row['system_name'],
        ];
    }

    return $smtpConfig;
}

function updateSmtpConfig($host, $port, $username, $password, $systemName)
{
    global $connection;

    $query = "UPDATE smtp_config 
              SET host = ?, 
              port = ?, 
              username = ?, 
              password = ?,
              system_name = ?
              WHERE id = 1";

    $stmt = $connection->prepare($query);
    $stmt->bind_param("sssss", $host, $port, $username, $password, $systemName);

    if (!$stmt->execute()) {
        throw new Exception('Erro ao atualizar. Por favor, tente novamente.');
    }
}
