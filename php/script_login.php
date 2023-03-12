<?php
    try{
        session_start();
        include('conexao.php');

        $stmt = $conn->prepare("SELECT * FROM tb_usuario WHERE ds_login = :email");
        $stmt->bindValue(':email', $_POST['email']);
        $stmt->execute();
        
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        // SE O EMAIL JÁ FOR CADASTRADO
        if($usuario){

            echo "Usuário encontrado!";
            
        }else{
            echo "Usuário não cadastrado!";
        }
    }catch(PDOException $e){
        echo 'ERROR: ' . $e->getMessage();
        echo "<br>".$stmt->rowCount();
    }
?>