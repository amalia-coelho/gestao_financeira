<?php
    try{
        session_start();
        include('conexao.php');

        $stmt = $conn->prepare("SELECT * FROM tb_usuario WHERE ds_login = :email AND ds_senha =  :senha");
        $stmt->bindValue(':email', $_POST['email']);
        $stmt->bindValue(':senha', $_POST['senha']);
        $stmt->execute();
        
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        // SE O EMAIL JÁ FOR CADASTRADO
        if($usuario['ds_login'] == $_POST['email'] && $usuario['ds_senha'] == $_POST['senha']){
            echo "Pronto para fazer login!";
        }else{
            echo "Email ou senha incorretos";
        }
    }catch(PDOException $e){
        echo 'ERROR: ' . $e->getMessage();
        echo "<br>".$stmt->rowCount();
    }
?>