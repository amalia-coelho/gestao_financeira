
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cadastro.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Lançamentos</title>
    <script crossorigin="anonymous" src="https://unpkg.com/typeit@8.7.1/dist/index.umd.js" defer></script>
    <script src="js/MaquinaDeEscrever.js"></script>

    <script type="text/javascript" src="js/jquery-3.6.1.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$("#validar").click(function(){
                var nome = $("#nome").val() + " " + $("#sobrenome").val();
                var email = $("#email").val();
                var senha = $("#password").val();
                var idade = $("#idade").val();

				$.ajax({
				url: "php/script_cadastro1.php",
				type: "POST",
                // TODO: completar a lista de inputs e conferir os nomes do script_cadastro com os inputs
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
  <div class="container">
      <div class="form-image">
          <img src="img/bg.svg" alt="">
      </div>
      <div class="form">
        <div class="sub-form">
              <div class="form-header">
                  <div class="title">
                      <h1 class="cadastro"></h1>
                  </div>
                  <div class="login-button">
                      <a href="login.php">Entrar</a>
                  </div>
              </div>

              <div class="input-group">
                  <div class="input-box">
                      <label for="nome">Primeiro Nome</label>
                      <input id="nome" type="text" name="Nome" placeholder="Digite seu primeiro nome" class="required" oninput="nameValidate()">
                      <span class="span-required">Nome deve ter no minímo 3 caracteres</span>
                  </div>

                  <div class="input-box">
                      <label for="sobrenome">Sobrenome</label>
                      <input id="sobrenome" type="text" name="sobrenome" placeholder="Digite seu sobrenome" class="required" oninput="lastnameValidate()">
                      <span class="span-required">Minínimo de 3 caracteres</span>
                  </div>
                  <div class="input-box">
                      <label for="email">E-mail</label>
                      <input id="email" type="email" name="email" placeholder="Digite seu melhor e-mail" class="required" oninput="emailValidate()">
                      <span class="span-required">Digite um email válido</span>
                  </div>

                  <div class="input-box">
                      <label for="number">Idade</label>
                      <input id="idade" type="number" name="idade" placeholder="Digite sua idade" oninput="yearValidate()" class="required">
                      <span class="span-required">Idade inválida</span>
                  </div>

                  <div class="input-box">
                      <label for="password">Senha</label>
                      <input id="password" type="password" name="password" placeholder="Digite sua senha" class="required" oninput="mainPasswordValidate()">
                      <span class="span-required">Senha de no mínimo 8 caracteres</span>
                  </div>


                  <div class="input-box">
                      <label for="confirmPassword">Confirme sua Senha</label>
                      <input id="confirmPassword" type="password" name="confirmPassword" placeholder="Digite sua senha novamente" class="required" oninput="comparePassword()">
                      <span class="span-required">Senhas devem ser compatíveis</span>
                  </div>

              </div>

              <div class="continue-button">
                  <button id="validar">Finalizar Cadastro</button>
              </div>
         </div>
  </div>
</body>
</html>