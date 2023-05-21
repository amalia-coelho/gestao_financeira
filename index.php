<?php
    session_start();
    if (!isset($_SESSION['email'])) {  
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cadastro.css">
    <link rel="stylesheet" href="css/style.css">
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Lançamentos</title>
    <script crossorigin="anonymous" src="https://unpkg.com/typeit@8.7.1/dist/index.umd.js" defer></script>
    <script src="js/MaquinaDeEscrever.js"></script>

    <script type="text/javascript" src="js/jquery-3.6.1.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
            $('button').attr('disabled', 'disabled');
 
            $('input[type=text]').on('input', function() {
                if ($(this).val() !== '') {
                    $('button').removeAttr("disabled");
                }
                else {
                    $('button').attr('disabled', 'disabled');
                }
            });
			
            $("button").click(function(){

                // declaração de variáveis
                var nome = $('#Nome').val();
                var sobrenome = $('#sobrenome').val();
                var idade = $('#number').val();
                var email = $('#email').val();
                var senha = $('#password').val();

                $.ajax({
                url: "./php/script_cadastro.php",
                type: "POST",
                data: "nome="+nome+"&sobrenome="+sobrenome+"&idade="+idade+"&email="+email+"&senha="+senha,
                dataType: "html"

                }).done(function(resposta){
                    $('#exibe').html(resposta);
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
                </div>
                
                <div class="input-group">
                    <div class="input-box">
                      <label for="Nome">Primeiro Nome</label>
                      <input id="Nome" type="text" name="Nome" placeholder="Digite seu primeiro nome" class="required" oninput="nameValidate()">
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
                      <input id="number" type="number" name="number" placeholder="Digite sua idade" oninput="yearValidate()" class="required">
                      <span class="span-required">Idade inválida</span>
                    </div>

                    <div class="input-box">
                        <div class="text-input">
                            <label for="password">Senha </label>
                            <i class="uil uil-eye" onclick="showPassword()"></i>
                        </div>
                        <input id="password" type="password" name="password" placeholder="Digite sua senha" class="required" oninput="mainPasswordValidate()">
                        <span class="span-required">Senha de no mínimo 8 caracteres</span>
                    </div>
                    
                    
                    <div class="input-box">
                        <div class="text-input">
                            <label for="confirmPassword">Confirme sua Senha</label>
                            <i class="uil uil-eye two" onclick="showPasswordtwo()"></i>
                        </div>
                      <input id="confirmPassword" type="password" name="confirmPassword" placeholder="Digite sua senha novamente" class="required" oninput="comparePassword()">
                      <span class="span-required">Senhas devem ser compatíveis</span>
                    </div>

                </div>
                
                <div class="gender-inputs">
                    <div class="gender-title">
                        <h6>Seja Bem Vindo!</h6>
                    </div>
              </div>
              
              <div class="continue-button">
                  <button  type="button" id="validar" >Finalizar Cadastro</button>
                </div>
            </div>
            <div id="exibe">
          
            </div>
            <div class="login-button">
                <p>Possui uma conta? <a href="login.php">Entrar</a></p>
            </div>
        </div>
  </div>
        <script src="js/cadastro.js"></script>
    </body>
    </html>
<?php 
    }else{
        header('Location:home.php');
}
    ?>