<?php
    session_start();
    if (!isset($_SESSION['email'])){
        header('Location: ../index.php');
    }else{
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Finanças</title>
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="../css/homepag.css">
    <!-- BOOSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    
    <!----===== BootStrap 5 CSS ===== -->
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    
    <script type="text/javascript" src="./js/jquery-3.6.1.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $("button").click(function(){
                var nomeCompleto = $('#nm_usuario').val();
                var nome_sobrenome = nomeCompleto.split(" ");

                $.ajax({
                    url: "../php/script_dependente.php",
                    type: "POST",
                    data: "nome="+nome_sobrenome[0]+"&sobrenome="+nome_sobrenome[1]+"&email="+$("#ds_login").val()+"&senha="+$("#ds_senha").val(),
                    dataType: "html"

                    }).done(function(resposta){
                        $('#exibe').html(resposta);
                    }).fail(function(jqXHR, textStatus ) {
                        $('#exibe').html("Request failed: " + textStatus);
                    });
            });
        });
    </script>
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="../img/startech-logo.png" alt="Logo">
            </div>
            
            <span class="logo_name">StarTech</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
            <li><a href="/home.php">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dashboard</span>
                </a></li>
                <li><a href="categorias.php">
                    <i class="uil uil-files-landscapes"></i>
                    <span class="link-name">Categorias</span>
                </a></li>
                <li><a href="formas.php">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">Formas</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-thumbs-up"></i>
                    <span class="link-name">Responsável</span>
                </a></li>
                <li><a href="dependentes.php">
                    <i class="uil uil-comments"></i>
                    <span class="link-name">Dependente</span>
                </a></li>
            </ul>
            <ul class="logout-mode"> 
                <li><a href="logout.php">
                <i class="uil uil-signout"></i>
                <span class="link-name">Logout</span>
            </a></li>

            <li class="mode">
                <a href="#">
                <i class="uil uil-moon"></i>
                <span class="link-name">Dark Mode</span>
            </a>
            
            <div class="mode-toggle">
                <span class="switch"></span>
            </div>
        </li>
        </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Buscar Finanças...">
            </div>
            
            <span class="name-profile">Hi, <?php echo $_SESSION['nome'];?> </span>
            <i class="uil uil-user-circle"></i>
        </div>

        <!-- <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Dashboard</span>
                </div>
                <div class="boxes">
                    <div class="box box1">
                        <i class="uil uil-thumbs-up"></i>
                        <span class="text">Total Money</span>
                        <span class="number">50,000</span>
                    </div>
                    <div class="box box2">
                        <i class="uil uil-comments"></i>
                        <span class="text">Entrada</span>
                        <span class="number">40,000</span>
                    </div>
                    <div class="box box3">
                        <i class="uil uil-share"></i>
                        <span class="text">Saída</span>
                        <span class="number">30,000</span>
                    </div>
                </div>
            </div> -->
            <div class="content">
                <!-- Style - Content -->
                <style>
                    .form{
                        padding-top: 10em;
                        width:80%;
                        display: flex;
                        justify-content: space-between;

                    }

                    #button{
                        width: 80%;
                        margin-top: 20px;
                        display: flex;
                        justify-content: center;
                    }

                    #text-input input{
                        width: 240px;
                        height: 2.3em;
                        border-radius: 9px;

                        font-size: 1em;
                        padding-left: 0.5em;
                    }

                    #button button{
                        width: 200px;
                        background-color: green;
                        color: #FFF;
                        font-size: 1em;
                    } 

                    #button{
                        display: flex;
                        flex-direction: column;
                        justify-content: center;
                        align-itens: center;
                    }
                </style>
                <div class="title">
                    <h4>Cadastro de Dependente</h4>
                </div>
                <div class="form">
                    <div id="text-input">
                        <p>Nome:</p>
                        <input type="text" id="nm_usuario">
                    </div>
                    <div id="text-input">
                        <p>Email:</p>
                        <input type="text" id="ds_login">
                    </div>
                    <div id="text-input">
                        <p>Senha:</p>
                        <input type="password" id="ds_senha">
                    </div>
                </div>
                <div id="button">
                    <button type="button" id="validar">Cadastrar</button>
                    <p id="exibir"></p>
                </div>
            </div>
            </div>
            </div>
        </div>
    </section>
    
    <script src="../js/toggle.js"></script>
    <!-- BootStrap SRC -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>>
</body>
</html>
<?php
    }
?>