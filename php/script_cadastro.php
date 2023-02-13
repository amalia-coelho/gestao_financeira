<?php
    try {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        include('conexao.php');
        
        $sql = "SELECT * FROM tb_usuario WHERE ds_login = '$email' AND ds_senha = '$senha'";
        $registro = $conn->exec($sql);
        
        if ($registro == 0) {
            
            $stmt = $conn->prepare('INSERT INTO tb_usuario (nm_usuario, ds_login, ds_senha) VALUES (:nome, :ds_login, :senha)');
            $stmt->execute(array(
                ':nome' => $_POST['nome'],
                ':ds_login' => $_POST['login'],
                ':senha' => $_POST['senha']
            ));
            session_start();
            

        } else {
            echo 'Email já cadastrado. Tente fazer login!';
        }
    
    } catch(PDOException $e) {
        echo "<br>".$stmt->rowCount();
        echo 'Error: ' . $e->getMessage();
    }
?>