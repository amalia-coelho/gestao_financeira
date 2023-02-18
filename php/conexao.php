<?php 
    try {
        $conn = new PDO('mysql:host=localhost;port=3306;dbname=db_gerenciamento', 'root', 'usbw');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo 'Conexão com banco de dados estabelecida com êxito!';
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
?>
