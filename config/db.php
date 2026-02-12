<?php

$database = 'chat';
$host = 'localhost';
$user = 'root';
$senha = '';

try {
    
    $PDO = new PDO("mysql:host=" . $host . ";ndbname=" . $database . ";", $user, $senha);

} catch (PDOException $e) {

    echo "Erro na conexao: " . $e->getMessage();

}