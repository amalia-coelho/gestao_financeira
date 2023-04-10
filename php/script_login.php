<?php
	session_start();
	include('conexao.php');

	$stmt = $conn->prepare("SELECT * FROM tb_usuario WHERE ds_login = :email");
	$stmt->bindValue(':email', $_POST['email']);
	$stmt->execute();

	$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

	if($usuario){ //USUARIO ENCONTRADO
		if ($usuario['ds_senha'] == $_POST['senha']) {
			$_SESSION['email'] = $_POST['email'];
            $_SESSION['nome'] = $usuario['nm_usuario'];
            $_SESSION['cd'] = $usuario['cd_usuario'];
            echo "<meta http-equiv='refresh' content='1'>";
		}else{
			echo "Email ou senha incorretos!";
		}
	}else{
		echo "Login não encontrado! Email pode estar incorreto.";
	}
?>