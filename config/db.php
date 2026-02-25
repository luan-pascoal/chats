<?php

$database = 'chat';
$host = 'localhost';
$user = 'root';
$senha = '';

try {
    
    $pdo = new PDO("mysql:host=" . $host . ";dbname=" . $database . ";", $user, $senha);

} catch (PDOException $e) {

    echo "Erro na conexao: " . $e->getMessage();

}