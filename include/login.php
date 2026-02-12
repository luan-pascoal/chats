<?php
session_start();
require '../config/db.php';

$email = filter_input(INPUT_POST, 'email');
$senha = filter_input(INPUT_POST, 'senha');


if (empty($email)) $error = 'Preencha o campo email';
else if (empty($senha)) $error = 'Preencha o campo senha';

else {

    $select = $pdo->prepare('SELECT id, email, senha, status FROM usuarios WHERE email = :email and senha = :senha');
    
    $select->bindValue(':email', $email);
    $select->bindValue(':senha', md5($senha));

    $select->execute();

    if ($select->rowCount() > 0) {

        $dados = $select->fetch();

        if($dados['status'] == 1) {
            $_SESSION['admin'] = $dados['id'];
            
            $success = 'Logado com sucesso!';

        }

    } else $error = 'Dados incorretos!';

}