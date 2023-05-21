<?php
    try{
        session_start();
        include('conexao.php');
        
        $stmt = $conn->prepare("SELECT * FROM tb_usuario WHERE ds_login = :email");
        $stmt->bindValue(':email', $_POST['email']);
        $stmt->execute();
        
        $dependente = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // SE O EMAIL JA FOR CADASTRADO
            if ($dependente){
                if($dependente['id_nivel'] == 2){
                    echo "O usuário já é dependente";
                }else{
                    //Cadastra o usuário como dependente
                    $stmt = $conn->prepare("UPDATE tb_usuario SET id_responsavel = :id_responsavel, id_nivel = 2 WHERE cd_usuario = :cd_usuario");
                    $stmt->execute(array(
                        ':id_responsavel' => $_SESSION['cd'],
                        ':cd_usuario' => $dependente['cd_usuario']
                    ));
                    
                    echo "Usuário cadastrado como dependente!";

                    //Define como responsável todos os dependentes deste usuário
                    $sql = "SELECT * FROM tb_usuario WHERE id_responsavel =".$dependente['cd_usuario'];
                    foreach ($conn->query($sql) as $descadastro) {
                        $stmt = $conn->prepare("UPDATE tb_usuario SET id_responsavel = null, id_nivel = 1");
                        $stmt->execute();
                    }
                }
            }else{
                echo "Usuário não cadastrado ou email incorreto!";
            }
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
        echo "<br>".$stmt->rowCount();
    }
?>
