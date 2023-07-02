<?php
    require("conexao.php");
    try{
        $stmt_update = $conn->prepare("UPDATE tb_lancamento SET ds_lancamento = :descricao, dt_lancamento = :data_lancamento, vl_lancamentos = :valor, id_tipo_registro = :tipo_registro, id_categoria = :categoria, id_forma_pagto = :forma_pagto, id_responsavel = :responsavel WHERE cd_lancamento = :codigo");
        $stmt_update->execute(array(
            ":codigo" => $_POST['codigo'],
            ":descricao" => $_POST['descricao'],
            ":data_lancamento" => $_POST['data'],
            ":valor" => $_POST['valor'],
            ":forma_pagto" => $_POST['pagamento'],
            ":responsavel" => $_POST['responsavel'],
            ":categoria" => $_POST['categoria'],
            ":tipo_registro" => $_POST['tipo_registro']
        ));

        // echo "Registro alterado com sucesso!";
        echo "<meta http-equiv='refresh' content='0'>";
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
        echo "<br>".$stmt->rowCount();
    }
?>