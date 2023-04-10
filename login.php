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
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/style.css">
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Lançamentos</title>
    <script crossorigin="anonymous" src="https://unpkg.com/typeit@8.7.1/dist/index.umd.js" defer></script>
    <script src="js/MaquinaDeEscrever.js"></script>
  
    <script type="text/javascript" src="js/jquery-3.6.1.min.js"></script>

    <script type="text/javascript">
      $(document).ready(function(){
              $("button").click(function(){

                  // declaração de variáveis
                  var email = $('#email').val();
                  var senha = $('#password').val();

                  $.ajax({
                  url: "./php/script_login.php",
                  type: "POST",
                  data: "email="+email+"&senha="+senha,
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
          <img src="img/login.svg" alt="">
      </div>
      <div class="form">
        <div class="sub-form">
              <div class="form-header">
                  <div class="title">
                      <h1 class="login"></h1>
                  </div>
                </div>
                
              <div class="input-group">
                  <div class="input-box">
                      <label for="email">E-mail</label>
                      <input id="email" type="email" name="email" placeholder="Digite seu e-mail" class="required" oninput="emailValidate()" autocomplete="off">
                      <span class="span-required">Digite um email válido</span>
                  </div>
                  <div class="input-box">
                      <div class="text-input">
                      <label for="password">Senha</label>
                        <i class="uil uil-eye" onclick="showPassword()"></i>
                      </div>
                      <input id="password" type="password" name="password" placeholder="Digite sua senha" class="required" oninput="mainPasswordValidate()">
                      <span class="span-required">Senha de no mínimo 8 caracteres</span>
                  </div>
              </div>

              <div class="robot-inputs">
                  <div class="robot-title">
                      <h6>É bom te ver denovo!</h6>
                      <div id="exibe">
                          
                      </div>
                  </div>
              </div>

              <div class="continue-button">
                  <button type="button" id="validar">Finalizar Login</button>
              </div>
    </div>
         <div class="register-button">
             <p>Não possui uma conta? <a href="index.php">Cadastrar</a></p>
         </div>
  </div>
  <!-- <script src="js/login.js"></script> -->
</body>
</html>
<?php 
    }else{
        header('Location:home.php');
}
?>