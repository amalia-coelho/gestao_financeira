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
            if($_POST['senha'] == $usuario['senha']){
                $_SESSION['cd'] = $usuario['cd_usuario'];
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['nome'] = $usuario['nm_usuario'];
                echo "<meta http-equiv='refresh' content='1'>";
            }else{
                echo 'Email ou senha incorretos!';
            }
        }else{
        echo 'Email não cadastrado!';
        }
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
        echo "<br>".$stmt->rowCount();
    }
?>
