<?php
    try{
        session_start();
        include('conexao.php');
        
        $stmt = $conn->prepare("SELECT * FROM tb_usuario WHERE ds_login = :email");
        $stmt->bindValue(':email', $_POST['email']);
        $stmt->execute();
        
        $dependente = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // SE O EMAIL JA FOR CADASTRADO
            # code...
            if ($dependente){
                $stmt = $conn->prepare("UPDATE tb_usuario SET id_responsavel = :id_responsavel, id_nivel = 2 WHERE cd_usuario = :cd_usuario");
                $stmt->execute(array(
                    ':id_responsavel' => $_SESSION['cd'],
                    ':cd_usuario' => $dependente['cd_usuario']
                ));
                
                echo "<p>Usuário cadastrado como dependente!</p><meta http-equiv='refresh' content='1'>";
            }else{
                echo "<p>Email incorreto ou usuário não cadastrado!</p><meta http-equiv='refresh' content='1'>";
            }
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
        echo "<br>".$stmt->rowCount();
    }
?>
