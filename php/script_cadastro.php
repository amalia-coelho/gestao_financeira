<?php
    session_start();
    include('conexao.php');

    $stmt = $conn->prepare("SELECT * FROM tb_usuario WHERE ds_login = :email");
    $stmt->bindValue(':email', $_POST['email']);
    $stmt->execute();

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // SE O EMAIL JA FOR CADASTRADO
    if ($usuario){
        // SE A SENHA CADASTRADA BATE COM O DO BANCO
        if(password_verify($_POST['senha'], $usuario['ds_senha'])){
            //SE FUNFAR
            $_SESSION['cd_usuario'] = $usuario['cd_usuario'];
            // VAI PARA HOMEPAGE
            header('Location: /homepage.php');
        }
    }else{
        echo 'Email não cadastrado';
    }
?>