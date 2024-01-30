<?php

include_once(__DIR__ . '/../../config.php');

function getTotalDatabaseSize()
{
    global $connection;

    // Consulta SQL para obter informações sobre o tamanho de todas as tabelas
    $sql = "SHOW TABLE STATUS";
    $stmt = $connection->prepare($sql);
    $stmt->execute();

    $result = $stmt->get_result();

    $totalSize = 0;

    while ($tableInfo = $result->fetch_assoc()) {
        // Exibe o tamanho da tabela em megabytes
        $totalSize += $tableInfo["Data_length"] / (1024 * 1024);
    }

    return round($totalSize, 2);
}
