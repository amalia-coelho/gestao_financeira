<?php
    try{
        session_start();
        include('conexao.php');
    
        // Posts
        // lancamento; data; valor; id_usuario; id_categoria; id_forma_pagto; id_responsavel
        // Relacionado a parcela = nr_parcelas_atual; nr_parcela_total; dt_vencimento;

        $stmt = $conn->prepare("INSERT INTO tb_lancamento (nm_usuario, sn_usuario, ds_login, ds_senha, nr_idade) VALUES(:nome, :sobrenome, :email, :senha, :idade)");
        $stmt->execute(array(
            ':nome' => $_POST['nome'],
            ':'
        ));
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
        echo "<br>".$stmt->rowCount();
    }
?>
