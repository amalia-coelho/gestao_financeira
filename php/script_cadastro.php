<?php
    try {
        include('conexao.php');

        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);

        $sql = "SELECT * FROM tb_usuario WHERE ds_login = ".$email." AND ds_senha = ".$senha;
        $registro = $conn->query($sql);
        
        if ($registro == 0) {
            
            $stmt = $conn->prepare('INSERT INTO tb_usuario (nm_usuario, ds_login, ds_senha, nr_idade) VALUES (:nome, :email, :senha, :idade)');
            $stmt->execute(array(
                ':nome' => $_POST['nome'],
                ':email' => $_POST['email'],
                ':senha' => $_POST['senha'],
                ':idade' => $_POST['idade']
            ));
            
        } else {
            echo 'Email já cadastrado. Tente fazer login!';
        }
    
    } catch(PDOException $e) {
        echo "<br>".$stmt->rowCount();
        echo 'Error: ' . $e->getMessage();
        exit();
    }
?>
