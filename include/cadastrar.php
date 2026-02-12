<?php

require '../config/db.php';

$error = ''; 
$success = '';

$nome = filter_input(INPUT_POST, 'nome');
$apelido = filter_input(INPUT_POST, 'apelido');
$email = filter_input(INPUT_POST, 'email');
$foto = $_FILES['picture']['name'];
$senha = filter_input(INPUT_POST, 'senha');
$confsenha = filter_input(INPUT_POST, 'confsenha');
$status = 1;

if (empty($nome)) $error = 'Preencha o campo nome';
else if (empty($apelido)) $error = 'Preencha o campo apelido';
else if (empty($email)) $error = 'Preencha o campo email';
else if (empty($senha)) $error = 'Preencha o campo senha';
else if (empty($confsenha)) $error = 'Preencha o campo Confirmar Senha';
else if ($senha != $confsenha) $error = 'As senhas não são iguais, verifique os caractéres';

else {

    $insert = $pdo->prepare('INSERT INTO usuarios (nome, apelido, email, senha, foto_perfil, `status`, data_created, data_updated, data_deleted) VALUES (:nome, :apelido, :email, :senha, :foto, :status,NOW(),NULL,NULL)');

    $insert->bindValue(':nome', $nome);
    $insert->bindValue(':apelido', $apelido);
    $insert->bindValue(':email', $email);
    $insert->bindValue(':senha', md5($senha));
    $insert->bindValue(':foto', $foto);
    $insert->bindValue(':status', $status);

    $insert->execute();


    if($insert->rowCount() > 0) {
        $success = 'Cadastrado com sucesso!';

        move_uploaded_file($_FILES['picture']['temp_name'], `../uploads/$foto`);
    }

}
