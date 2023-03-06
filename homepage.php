<?php
    if (!isset($_SESSION['cd'])) {
        header('Location: index.php');
    }else{
        echo 'BEM VINDO FILHO DA PUTA!';
    }
?>