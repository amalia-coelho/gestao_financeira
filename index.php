<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>

    <script type="text/javascript" src="js/jquery-3.6.1.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$("button").click(function(){
                var nome = $("#nome").val();
                var email = $("#email").val();
                var senha = $("#password").val();
                var idade = $("#idade").val();

				$.ajax({
				url: "php/script_cadastro.php",
				type: "POST",
				data: "nome="+nome+"&email="+email+"&senha="+senha+"&idade="+idade,
				dataType: "html"

				}).done(function(resposta) {
	    			console.log("Test Unit:" + resposta);
	    			
					
					}).fail(function(jqXHR, textStatus ) {
					    console.log("Request failed: " + textStatus);
					});
			});
		});
	</script>
  </head>
<body>
    <p>Nome: <input type="text" id="nome"></p>
    <p>Email: <input type="email" id="email"></p>
    <p>Senha: <input type="password" id="senha"></p>
    <p>Idade: <input type="number" id="idade"></p>
    <button type="submit" id="validar">Cadastrar</button>
</body>
</html>