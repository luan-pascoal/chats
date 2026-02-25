<?php

require '../config/db.php';

$saida = '';

$select = $pdo->prepare('SELECT * FROM usuarios WHERE status = 1');

$select->execute();


if ($select->rowCount() > 0) {

    $dados = $select->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($dados as $dado) {
        $saida .= '
            <div class="usuario" data-value="' . $dado['id'] . '">
                <div class="perfil">
                    <img src="../uploads/' . $dado['foto_perfil'] . '" alt="??" srcset="">
                </div>
                <div class="perfil_name">
                    <div class="name">
                        <p>' . $dado['apelido'] . '</p>
                    </div>
                    <div class="texto">
                        <p>Mensagem</p>
                    </div>
                </div>
            </div>
        ';
    }
    echo $saida;
} else {
    echo '<center><h4>Sem Resultados</h4></center>';
}