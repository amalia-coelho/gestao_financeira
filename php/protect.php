<?php 
    if(!isset($_SESSION)){
        session_start();
    }

    if (!isset($_SESSION[´'user'])) {
        exit("Acesso bloqueado! Conecte uma conta <p><a href='/index.php'>clicando aqui</a>!</p>");
    }
?>