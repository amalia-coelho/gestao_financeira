<?php 
    try {
        $conn = new PDO('mysql:host=localhost;dbname=bd_gestao_financeira', 'root', 'usbw');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
        echo "<br>".$stmt->rowCount();
    }
?>
