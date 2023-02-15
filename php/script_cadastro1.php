<?php 
    try {
        include('conexao.php');

        if (isset($_POST['email']) && isset($_POST['senha'])){
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);

            $sql = "SELECT * FROM tb_usuario WHERE ds_login = '$email' AND ds_senha = '$senha'";
            $sql_query = $conn->query($sql) or exit("Falha na execução do código SQL: ")."Error: ".$e->getMessage();

            $registro = $sql_query->rowCount();

            if($registro == 1){
                $usuario = $sql->fetch(PDO::FETCH_ASSOC);
                
                if(!isset($_SESSION)){
                    session_start();
                }

                $_SESSION['user'] = $usuario['cd_usuario'];
                $_SESSION['name'] = $usuario['nm_usuario'];

                header('Location: /homepage.php');
            }else if($registro == 0){
                $stmt = $conn->prepare('INSERT INTO tb_usuario (nm_usuario, ds_login, ds_senha, nr_idade) VALUES (:nome, :email, :senha, :idade)');
                $stmt->execute(array(
                    ':nome' => $_POST['nome'],
                    ':email' => $_POST['email'],
                    ':senha' => $_POST['senha'],
                    ':idade' => $_POST['idade']
                ));

                $sql = "SELECT * FROM tb_usuario WHERE ds_login = '$email' AND ds_senha = '$senha'";
                $usuario = $sql->fetch(PDO::FETCH_ASSOC);

                if(!isset($_SESSION)){
                    session_start();
                }

                $_SESSION['user'] = $usuario['cd_usuario'];
                $_SESSION['name'] = $usuario['nm_usuario'];

                header('Location: /homepage.php');
            }
        }
    } catch (PDOException $e) {
        echo "<br>".$stmt->rowCount();
        echo 'Error: ' . $e->getMessage();
        exit();
    }
?>