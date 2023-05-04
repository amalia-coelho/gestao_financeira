<?php
    session_start();
    if (!isset($_SESSION['email'])){
        header('Location: index.php');
    }else{
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dependentes</title>
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="css/homepag.css">
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <!-- IMPORT JQUERY -->
    <script text="text/javascript" src="js/jquery-3.6.1.min.js"></script>
	<!-- Jquery / Ajax -->
    <script type="text/javascript">
		$(document).ready(function(){
            $("#concluir").click(function(){

                // declaração de variáveis
                var email = $('#email').val();

                $.ajax({
                url: "php/script_dependentes.php",
                type: "POST",
                data: "email="+email,
                dataType: "html"

                }).done(function(resposta){
                    $('#exibe').html(resposta);
                    $("#email").val(" ");
                }).fail(function(jqXHR, textStatus ) {
                    console.log("Request failed: " + textStatus);
                });
            });
            
            $("#fechar").click(function(){
                $("#email").val(" ");
            });
        });
	</script>



    <!----===== BootStrap 5 CSS ===== -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="img/startech-logo.png" alt="Logo">
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
            
            <span class="name-profile">Hi, <?php echo $_SESSION['nome'];?></span>
            <i class="uil uil-user-circle"></i>
        </div>

        <div class="dash-content">
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
            </div>
            <div class="overview activity">
                <div class="add">
                    
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Dependentes</span>
                </div>

            <!-- Botão para acionar modal -->
            <button type="button" class="btn btn-primary open" data-toggle="modal" data-target="#modalExemplo">Adicionar</button>

            <!-- Modal -->
            <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content ">
                  <div class="modal-header bg-danger text-light">
                    <h5 class="modal-title" id="exampleModalLabel">Cadastro de dependentes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                        <p>Adicione o email do seu dependente no campo abaixo:</p>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control form-control-sm email" id="email" placeholder="name@example.com" name="email">
                            <label style="color: #000" for="email">Email</label>
                        </div>
                        <div id="exibe">
                            <!-- Exibe as informações -->
                        </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-danger" id="concluir">Concluir</button>
                      <button type="button" class="btn btn-dark" id="fechar" data-dismiss="modal">Fechar</button>
                  </div>
                </div>
              </div>
            </div>

<!-- Fim do modal -->
                </div>

                <div class="activity-data">
                <table class="table" style="">
                    <thead class="thead-dark bg-dark text-white">
                        <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
		                include("php/conexao.php");
		                $sql = "SELECT * FROM tb_usuario WHERE id_responsavel = ".$_SESSION['cd'];

		                foreach ($conn->query($sql) as $row){
			                echo "<tr><td>".$row['nm_usuario']."</td><td>".$row['ds_login']."</td><td>Futuramente...</td></tr>";
		                }
                    ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    
    <script src="js/toggle.js"></script>
    <!-- BootStrap SRC -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>>
</body>
</html>
<?php
    }
?>
