<?php
    session_start();
    if (!isset($_SESSION['email'])) {
        header('Location: index.php');
    }else{
        echo 'BEM VINDO FILHO DA PUTA!';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    LOGADO 
    <?php 
        echo "Bem vindo".$_POST['nome'];
    ?>
</body>
</html>
<?php
    }
?>
