<?php
    try{
        session_start();
        include('conexao.php');

        $stmt = $conn->prepare("DELETE FROM tb_categoria WHERE cd_categoria = :cd");
        $stmt->execute(array(
            ':cd' => $_GET['cod']
        ));
        
        header('Location: ../categoria.php');
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
        echo "<br>".$stmt->rowCount();
    }
?>
