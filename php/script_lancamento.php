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

            $sql = "SELECT * FROM tb_lancamento WHERE id_usuario = ".$_SESSION['cd'];
            foreach ($conn->query($sql) as $row){
                echo "<tr><td>".$row['ds_descricao']."</td><td>".$row['vl_lancamentos']."</td><td>".$row['dt_lancamento']."</td><td>".$row['id_categoria']."</td><td>".$row['id_forma_pagto']."</td><td>".$row['id_responsavel']."</td><td>Futuramente...</td></tr>";
            }
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
        echo "<br>".$stmt->rowCount();
    }
?>
