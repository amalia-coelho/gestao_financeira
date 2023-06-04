<?php
    try{
        session_start();
        include('conexao.php');

        $stmt = $conn->prepare("DELETE FROM tb_lancamento WHERE cd_lancamento = :cd");
        $stmt->execute(array(
            ':cd' => $_GET['cod']
        ));
        
        header('Location: ../home.php');
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
        echo "<br>".$stmt->rowCount();
    }
?>
