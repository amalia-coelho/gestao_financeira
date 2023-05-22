<?php
    session_start();
    if (!isset($_SESSION['email'])) {
        ?>
<!DOCTYPE html>
<html lang="pt">
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="js/jquery-3.6.1.min.js"></script>
    <style type="text/css">
      
    </style>
    <script>
        $(document).ready(function(){
            $("#myModal").hide();
            $("button").click(function(){

                $("#myModal").show();
                  setTimeout(()=> {
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
                  }, "3000"); 
                  
            });
		});
    </script>
  </head>
<body>
 <!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">

      <!-- Modal body -->
      <div class="modal-body" style="display:flex; justify-content: center; align-items: center;">
        
<div class="preloader">
  <svg class="cart" role="img" aria-label="Shopping cart line animation" viewBox="0 0 128 128" width="128px" height="128px" xmlns="http://www.w3.org/2000/svg">
    <g fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="8">
      <g class="cart__track" stroke="hsla(0,10%,10%,0.1)">
        <polyline points="4,4 21,4 26,22 124,22 112,64 35,64 39,80 106,80" />
        <circle cx="43" cy="111" r="13" />
        <circle cx="102" cy="111" r="13" />
      </g>
      <g class="cart__lines" stroke="currentColor">
        <polyline class="cart__top" points="4,4 21,4 26,22 124,22 112,64 35,64 39,80 106,80" stroke-dasharray="338 338" stroke-dashoffset="-338" />
        <g class="cart__wheel1" transform="rotate(-90,43,111)">
          <circle class="cart__wheel-stroke" cx="43" cy="111" r="13" stroke-dasharray="81.68 81.68" stroke-dashoffset="81.68" />
        </g>
        <g class="cart__wheel2" transform="rotate(90,102,111)">
          <circle class="cart__wheel-stroke" cx="102" cy="111" r="13" stroke-dasharray="81.68 81.68" stroke-dashoffset="81.68" />
        </g>
      </g>
    </g>
  </svg>
  <div class="preloader__text">
    <p class="preloader__msg">Carregando…</p>
    <p class="preloader__msg preloader__msg--last">Isso está demorando. Algo está errado.
</p>
  </div>
</div>
      </div>



    </div>
  </div>
</div>
<!-- fim do modal -->
     
    </div>
  </div>
</div>
  <div class="container">
      <div class="form-image">
          <img src="img/login.svg" alt="">
      </div>
      <div class="form">
        <div class="sub-form">
              <div class="form-header">
                  <div class="title">
                      <h1 class="login" style="font-size: 1.5em; margin-top: 1rem; font-weight: 900;"></h1>
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
                  </div>
              </div>

              <div class="continue-button">
                  <button><a id="login" href="#">Finalizar Login</a> </button>
                  <div id="exibe"></div>
              </div>
    </div>
         <div class="register-button">
             <p>Não possui uma conta? <a href="index.php">Cadastrar</a></p>
         </div>
  </div>
  <script src="js/login.js"></script>
</body>
</html>
<?php 
    }else{
        header('Location:home.php');
}
    ?>