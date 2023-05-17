<?php
    try{
        session_start();
        include('conexao.php');
        
        $stmt = $conn->prepare("SELECT * FROM tb_usuario WHERE ds_login = :email");
        $stmt->bindValue(':email', $_POST['email']);
        $stmt->execute();
        
        $consulta = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // SE O EMAIL JA FOR CADASTRADO
        if ($consulta){
            echo 'Email já cadastrado, tente fazer login!';
        }else{
            $stmt = $conn->prepare("INSERT INTO tb_usuario (nm_usuario, sn_usuario, ds_login, ds_senha, nr_idade, id_nivel) VALUES(:nome, :sobrenome, :email, :senha, :idade, :nivel)");
            $stmt->execute(array(
                ':nome' => $_POST['nome'],
                ':sobrenome' => $_POST['sobrenome'],
                ':email' => $_POST['email'],
                ':senha' => $_POST['senha'],
                ':idade' => $_POST['idade'],
                ':nivel' => 1
            ));
            
            $stmt_usuario = $conn->prepare("SELECT * FROM tb_usuario WHERE ds_login = :email");
            $stmt_usuario->bindValue(':email', $_POST['email']);
            $stmt_usuario->execute();
            
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            $_SESSION['email'] = $_POST['email'];
            $_SESSION['nome'] = $_POST['nome'];
            $_SESSION['cd'] = $usuario['cd_usuario'];
            $_SESSION['id_nivel'] = $usuario['id_nivel'];
            echo "<meta http-equiv='refresh' content='1'>";
        }
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
        echo "<br>".$stmt->rowCount();
    }
?>
