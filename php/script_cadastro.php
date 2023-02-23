<?php 
    try {
        include('conexao.php');

        if (isset($_POST['email']) && isset($_POST['senha'])){
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);

        $sql = "SELECT * FROM tb_usuario WHERE ds_login = ".$email." AND ds_senha = ".$senha;
        $pesquisa = $conn->prepare($sql);
        $pesquisa->execute();

        $registro = $pesquisa->rowCount();
        
        echo $registro;
    } catch (PDOException $e) {
        echo "<br>".$stmt->rowCount();
        echo 'Error: ' . $e->getMessage();
        exit();
    }
?>
