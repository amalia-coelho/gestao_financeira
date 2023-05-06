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
    <title>Gestão de Finanças</title>
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="css/homepag.css">
    <!-- BOOSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


    <!----===== BootStrap 5 CSS ===== -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- JQUERY AJAX -->
	<script type="text/javascript">
		$(document).ready(function(){
            $("#concluir").click(function(){

                // declaração de variáveis
                var descricao = $('#descricao').val();
                var data = $('#data').val();
                var valor = $('#valor').val();
                var categoria = $('#categoria').val();
                var pagamento = $('#pagamento').val();
                var responsavel = $('#responsavel').val();

                $.ajax({
                url: "php/script_lancamento.php",
                type: "POST",
                data: "descricao="+descricao+"&data="+data+"&valor="+valor+"&categoria="+categoria+"&pagamento="+pagamento+"&responsavel="+responsavel,
                dataType: "html"

                }).done(function(resposta){
                    // exibir os lançamentos
                    $('#exibe').html(resposta);

                    // Limpar os inputs
                    $('#responsavel').val(' ');
                    $('#pagamento').val(' ');
                    $('#categoria').val(' ');
                    $('#valor').val(' ');
                    $('#data').val(' ');
                    $('#descricao').val(' ');

                    //fechar o modal
                    $('#fechar').click();
                }).fail(function(jqXHR, textStatus ) {
                    console.log("Request failed: " + textStatus);
                });
            });
		});
	</script>
    
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
                <li><a href="#">
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
                <?php 
                    if($_SESSION['id_nivel'] == 1){
                    ?>  
                    <li><a href="dependentes.php">
                        <i class="uil uil-comments"></i>
                        <span class="link-name">Dependente</span>
                    </a></li>
                    <?php
                    }
                ?>
            </ul>
        <ul class="logout-mode"><li><a href="logout.php">
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
                    <span class="text">Gestões recentes</span>
                </div>

            <!-- Botão para acionar modal -->
            <button type="button" class="btn btn-primary open" data-toggle="modal" data-target="#modalExemplo">
              Adicionar registro
            </button>

            <!-- Modal -->
            <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content ">
                  <div class="modal-header bg-danger text-light">
                    <h5 class="modal-title" id="exampleModalLabel">Gestão Financeira</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control form-control-sm editora" id="descricao" name="ds_lancamento">
                            <label style="color: #000" for="ds_lancamento">Descrição</label>
                
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control form-control-sm editora" id="data" name="dt_lancamento">
                            <label style="color: #000" for="dt_lancamento">Data</label>
                
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control form-control-sm editora" id="valor" name="vl_lancamento">
                            <label style="color: #000" for="vl_lancamento">Valor</label>
                
                        </div>
                        <div class="mb-3">
                            <select class="form-select" id="categoria">
                                <option value="" date-default disable selected>categoria</option>
                                <?php 
                                    require('php/conexao.php');
                                    $option = "";
                                    $sql = 'SELECT * FROM tb_categoria';

                                    foreach ($conn->query($sql) as $row){
                                        $option .= "<option value='".$row['cd_categoria']."'>".$row['nm_categoria']."</option>";
                                    }
                                    echo $option;
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <select class="form-select" id="pagamento">
                                <option>Pagamento</option>
                                <?php 
                                    require('php/conexao.php');
                                    $option = "";
                                    $sql = "SELECT * FROM tb_forma_pagto";

                                    foreach ($conn->query($sql) as $row){
                                        $option .= "<option value='".$row['cd_forma_pagto']."'>".$row['nm_forma_pagto']."</option>";
                                    }
                                    echo $option;
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <select class="form-select" id="responsavel">
                                <option>Responsável</option>
                                <?php 
                                    require('php/conexao.php');
                                    $option = "";
                                    $sql = 'SELECT * FROM tb_responsavel';

                                    foreach ($conn->query($sql) as $row){
                                        $option .= "<option value='".$row['cd_responsavel']."'>".$row['nm_responsavel']."</option>";
                                    }
                                    echo $option;
                                ?>
                            </select>
                        </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" id="concluir" class="btn btn-danger">Concluir</button>
                      <button type="button" id="fechar" class="btn btn-dark" data-dismiss="modal">Fechar</button>
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
									<th scope="col">Descrição</th>
									<th scope="col">Valor</th>
									<th scope="col">Data</th>
									<th scope="col">Categoria</th>
									<th scope="col">Pagamento</th>
									<th scope="col">Responsavel</th>
									<th scope="col">Ações</th>
								</tr>
							</thead>
							<tbody id="exibe">
                                <!-- lancamentos -->
							</tbody>
						</table>
                </div>
            </div>
        </div>
    </section>
    
    <script src="js/toggle.js"></script>
    <!-- BootStrap SRC -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>>
</body>
</html>
<?php
    }
?>