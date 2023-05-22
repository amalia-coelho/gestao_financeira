
<!DOCTYPE html>
<html>
<head>
    <title></title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
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
            if ($usuario['ds_senha'] == $_POST['senha']){
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['nome'] = $usuario['nm_usuario'];
                $_SESSION['cd'] = $usuario['cd_usuario'];
                $_SESSION['id_nivel'] = $usuario['id_nivel'];
                echo "<meta http-equiv='refresh' content='1'>";
            }else{

                    ?>
                    <script type="text/javascript">
                    $("#myModal").hide();
                    </script>
                    <?php

                echo "Senha incorreta!";
            }
        }else{
                    ?>
                    <script type="text/javascript">
                    $("#myModal").hide();
                    </script>
                    <?php
              
            echo "Usuário não encontrado!";
        }
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
        echo "<br>".$stmt->rowCount();
    }
?>

</body>
</html>

