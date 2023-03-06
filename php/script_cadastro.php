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
            echo 'Email já cadastrado';
        }else{
            $stmt = $conn->prepare("INSERT INTO tb_usuario (nm_usuario, ds_login, ds_senha) VALUES(:nome, :email, :senha)");
            $stmt->execute(array(
                ':nome' => $_POST['nome'],
                ':email' => $_POST['email'],
                ':senha' => $_POST['senha']
            ));
            $_SESSION['email'] = $_POST['email'];
            echo "<meta http-equiv='refresh' content='1'>";
        }
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
        echo "<br>".$stmt->rowCount();
    }
?>
