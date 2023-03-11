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
            echo 'Email já cadastrado, tente fazer login!';
        }else{
            $stmt = $conn->prepare("INSERT INTO tb_usuario (nm_usuario, sn_usuario, ds_login, ds_senha, nr_idade) VALUES(:nome, :sobrenome, :email, :senha, :idade)");
            $stmt->execute(array(
                ':nome' => $_POST['nome'],
                ':sobrenome' => $_POST['sobrenome'],
                ':email' => $_POST['email'],
                ':senha' => $_POST['senha'],
                ':idade' => $_POST['idade']
            ));
            
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['nome'] = $_POST['nome'];
            $_SESSION['cd'] = $usuario['cd_usuario'];
            echo "<meta http-equiv='refresh' content='1'>";
        }
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
        echo "<br>".$stmt->rowCount();
    }
?>
