<?php
    try{
        session_start();
        include('conexao.php');
        
        $stmt = $conn->prepare("SELECT * FROM tb_usuario WHERE ds_login = :email");
        $stmt->bindValue(':email', $_POST['email']);
        $stmt->execute();
        
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // SE O EMAIL JA FOR CADASTRADO
        if ($usuario){
            $id_update = $usuario['cd_usuario'];
            
            $stmt = $conn->prepare("UPDATE tb_usuario SET id_responsavel = :id_responsavel WHERE cd_usuario = :cd_usuario");
            $stmt->bindValue(':id_responsavel', $_SESSION['cd']);
            $stmt->bindValue(':cd_usuario', $id_update);
            $stmt->execute();

            echo "Usuário adicionado como dependente! <a href='../home.php'>Voltar</a>";
        }else{
            $stmt = $conn->prepare("INSERT INTO tb_usuario (nm_usuario, sn_usuario, ds_login, ds_senha, id_responsavel, id_nivel) VALUES(:nome, :sobrenome, :email, :senha, :id_responsavel, :nivel)");
            $stmt->execute(array(
                ':nome' => $_POST['nome'],
                ':sobrenome' => $_POST['sobrenome'],
                ':email' => $_POST['email'],
                ':senha' => $_POST['senha'],
                ':id_responsavel' => $_SESSION['cd'],
                ':nivel' => 2
            ));
            
            echo "Novo usuário cadastrado e adicionado como seu dependente! <a href='../home.php'>Voltar</a>";
        }
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
        echo "<br>".$stmt->rowCount();
    }
?>
