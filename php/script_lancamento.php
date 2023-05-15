<?php
    try{
        session_start();
        include('conexao.php');
        
            $stmt = $conn->prepare("INSERT INTO tb_lancamento (ds_lancamento, dt_lancamento, vl_lancamentos, id_usuario, id_categoria, id_forma_pagto, id_responsavel) VALUES(:descricao, :data_lancamento, :valor, :usuario, :categoria, :forma_pagto, :responsavel)");
            $stmt->execute(array(
                ':descricao' => $_POST['descricao'],
                ':data_lancamento' => $_POST['data'],
                ':valor' => $_POST['valor'],
                ':usuario' => $_SESSION['cd'],
                ':categoria' => $_POST['categoria'],
                ':forma_pagto' => $_POST['pagamento'],
                ':responsavel' => $_POST['responsavel']
            ));

            echo "Registro cadastrado com sucesso!";
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
        echo "<br>".$stmt->rowCount();
    }
?>
