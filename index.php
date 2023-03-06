<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>

    <script type="text/javascript" src="js\jquery-3.6.1.min.js"></script>

    <script type="text/javascript">
		$(document).ready(function(){
			$("button").click(function(){

                // declaração de variáveis
                var nome = $('#nome').val();
                var email = $('#email').val();
                var senha = $('#senha').val();

				$.ajax({
				url: "php/script_cadastro.php",
				type: "POST",
				data: "nome="+nome+"&email="+email+"&senha="+senha,
				dataType: "html"

				}).done(function(resposta){
                    $(".exibe").html('Test: ' + resposta);
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
    <button type="button" id="validar">Cadastrar</button>
</body>
</html>