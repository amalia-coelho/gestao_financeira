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

    <!-- IMPORT JQUERY -->
    <script src="js/jquery-3.6.1.min.js"></script>

    <!-- JQUERY AJAX -->
	<script type="text/javascript">
		$(document).ready(function(){
            // CADASTRO DE REGISTROS
            $("#concluir").click(function(){
                // declaração de variáveis
                var descricao = $('#descricao').val();
                var data = $('#data').val();
                var valor = $('#valor').val();
                var categoria = $('#categoria').val();
                var pagamento = $('#pagamento').val();
                var responsavel = $('#responsavel').val();
                var tipo_registro = $('#tipo_registro').val();

                $.ajax({
                url: "php/script_lancamento.php",
                type: "POST",
                data: "descricao="+descricao+"&data="+data+"&valor="+valor+"&categoria="+categoria+"&pagamento="+pagamento+"&responsavel="+responsavel+"&tipo_registro="+tipo_registro,
                dataType: "html"

                }).done(function(resposta){
                    //fechar o modal
                    $('#fechar').click();

                    // Notificar o cadastro
                    alert(resposta);

                    // Exibir o lançamento
                    $('.activity-data').load(' .activity-data');
                    
                    //Atualizar o dashboard
                    $('.boxes').load(' .box');

                    // Limpar os inputs
                    $('#valor').val(' ');
                    $('#data').val(' ');
                    $('#descricao').val(' ');

                    //resetar os select
                    $('#pagamento option:first').prop('selected',true);
                    $('#categoria option:first').prop('selected',true);
                    $('#responsavel option:first').prop('selected',true);
                    $('#tipo_registro option:first').prop('selected',true);
                }).fail(function(jqXHR, textStatus ) {
                    console.log("Request failed: " + textStatus);
                });
            });

            //Pegar os valores dos inputs
            $(".alterar").on("click", function(){
                $("#exibir-codigo").text($(this).attr('cod'));
                $("#alterar_descricao").val($(this).attr('descricao'));
                $("#alterar_data").val($(this).attr('data'));
                $("#alterar_valor").val($(this).attr('valor'));
                $("#alterar_tipo_registro").val($(this).attr('tipo_registro'));
                $("#alterar_categoria").val($(this).attr('categoria'));
                $("#alterar_pagamento").val($(this).attr('pagamento'));
                $("#alterar_responsavel").val($(this).attr('responsavel'));
            });

            // Quando apertar para "salvar alterações"
            $("#salvar").click(function(){
                var codigo = $("#exibir-codigo").text();
                var descricao = $("#alterar_descricao").val();
                var data = $("#alterar_data").val();
                var valor = $("#alterar_valor").val();
                var tipo_registro = $("#alterar_tipo_registro").val();
                var categoria = $("#alterar_categoria").val();
                var pagamento = $("#alterar_pagamento").val();
                var responsavel = $("#alterar_responsavel").val();

                $.ajax({
                url: "php/script_update_registro.php",
                type: "POST",
                data: "codigo="+codigo+"&descricao="+descricao+"&data="+data+"&valor="+valor+"&categoria="+categoria+"&pagamento="+pagamento+"&responsavel="+responsavel+"&tipo_registro="+tipo_registro,
                dataType: "html"

                }).done(function(resposta){
                    $("#exibir-resposta").html(resposta);
                }).fail(function(jqXHR, textStatus ) {
                    console.log("Request failed: " + textStatus);
                });
            });

            $('#fechar').click(function(){
                // Limpar os inputs
                $('#valor').val(' ');
                $('#data').val(' ');
                $('#descricao').val(' ');

                //resetar os select
                $('#pagamento option:first').prop('selected',true);
                $('#categoria option:first').prop('selected',true);
                $('#responsavel option:first').prop('selected',true);
                $('#tipo_registro option:first').prop('selected',true);
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
                    <li><a href="dependentes.php">
                        <i class="uil uil-comments"></i>
                        <span class="link-name">Dependente</span>
                    </a></li>
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
                        <?php
                            require('php/conexao.php');
                            $total = 0;
                            $sql_total = "SELECT vl_lancamentos, id_tipo_registro FROM tb_lancamento WHERE id_usuario =".$_SESSION['cd'];

                            foreach ($conn->query($sql_total) as $row){
                                if ($row['id_tipo_registro'] == 1){
                                    $total += $row['vl_lancamentos'];
                                }else{
                                    $total -= $row['vl_lancamentos'];
                                }
                            }
                            echo "<span class='number'>$".number_format($total, 2, ',', '.')."</span>";
                            ?>
                    </div>
                    <div class="box box2">
                        <i class="uil uil-comments"></i>
                        <span class="text">Entrada</span>
                        <?php
                            $ganho = 0;
                            $sql_ganho = "SELECT vl_lancamentos FROM tb_lancamento WHERE id_usuario =".$_SESSION['cd']." AND id_tipo_registro = 1";

                            foreach ($conn->query($sql_ganho) as $row){
                                $ganho += $row['vl_lancamentos'];
                            }
                            echo "<span class='number'>$".number_format($ganho, 2, ',', '.')."</span>";
                        ?>       
                    </div>
                    <div class="box box3">
                        <i class="uil uil-share"></i>
                        <span class="text">Saída</span>
                        <?php
                            $gasto = 0;
                            $sql_gasto = "SELECT vl_lancamentos FROM tb_lancamento WHERE id_usuario =".$_SESSION['cd']." AND id_tipo_registro = 2";

                            foreach ($conn->query($sql_gasto) as $row){
                                $gasto += $row['vl_lancamentos'];
                            }
                            echo "<span class='number'>$".number_format($gasto, 2, ',', '.')."</span>";
                        ?>   
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
                    <button type="button" class="btn btn-primary open" data-toggle="modal" data-target="#modalExemplo">Adicionar registro</button>

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
                                        <select class="form-select" id="tipo_registro">
                                            <option value="" date-default disable selected>Tipo de registro</option>
                                            <?php 
                                                $option = "";
                                                $sql = 'SELECT * FROM tb_tipo_registro';

                                                foreach ($conn->query($sql) as $row){
                                                    $option .= "<option value='".$row['cd_tipo_registro']."'>".$row['nm_tipo_registro']."</option>";
                                                }
                                                echo $option;
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <select class="form-select" id="categoria">
                                            <option value="" date-default disable selected>categoria</option>
                                            <?php 
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
					<table class="table">
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
                            <?php
                                include('php/conexao.php');

                                $sql = "SELECT * FROM tb_lancamento WHERE id_usuario = ".$_SESSION['cd'];
                                
                                foreach ($conn->query($sql) as $row){
                                    // ID_CATEGORIA
                                    $stmt_categoria = $conn->prepare("SELECT nm_categoria FROM tb_categoria WHERE cd_categoria = :categoria");
                                    $stmt_categoria->bindValue(':categoria', $row['id_categoria']);
                                    $stmt_categoria->execute();
                                    $categoria = $stmt_categoria->fetchColumn();

                                    // ID_FORMA_PAGTO
                                    $stmt_pagamento = $conn->prepare("SELECT nm_forma_pagto FROM tb_forma_pagto WHERE cd_forma_pagto = :pagamento");
                                    $stmt_pagamento->bindValue(':pagamento', $row['id_forma_pagto']);
                                    $stmt_pagamento->execute();
                                    $pagamento = $stmt_pagamento->fetchColumn();
                                    
                                    // ID__RESPONSAVEL
                                    $stmt_responsavel = $conn->prepare("SELECT nm_responsavel FROM tb_responsavel WHERE cd_responsavel = :responsavel");
                                    $stmt_responsavel->bindValue(':responsavel', $row['id_responsavel']);
                                    $stmt_responsavel->execute();
                                    $responsavel = $stmt_responsavel->fetchColumn();
                                    
                                    ?>
                                    <tr>
                                        <td><?php echo $row['ds_lancamento'];?></td>
                                        <td><?php echo $row['vl_lancamentos'];?></td>
                                        <td><?php echo $row['dt_lancamento'];?></td>
                                        <td><?php echo $categoria;?></td>
                                        <td><?php echo $pagamento;?></td>
                                        <td><?php echo $responsavel;?></td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-outline-primary open alterar" data-toggle="modal" data-target="#exampleModal" 
                                            cod="<?php echo $row['cd_lancamento'];?>" 
                                            descricao="<?php echo $row['ds_lancamento'];?>" 
                                            valor="<?php echo $row['vl_lancamentos'];?>" 
                                            data="<?php echo $row["dt_lancamento"];?>" 
                                            categoria="<?php echo $row['id_categoria'];?>" 
                                            responsavel="<?php echo $row['id_responsavel'];?>"  
                                            pagamento="<?php echo $row['id_forma_pagto'];?>" 
                                            tipo_registro="<?php echo $row['id_tipo_registro'];?>">Alterar</button>
                                            <a href='php/deletar_registro.php?cod=<?php echo $row['cd_lancamento'];?>' class="btn btn-outline-danger btn-sm">Excluir</a>
                                        </td>
                                    </tr>

                                    <?php
                                }
                                ?>
                        </tbody>
                    </table>
                    <?php
                        $stmt = $conn->prepare("SELECT * FROM tb_usuario WHERE id_responsavel = :id");
                        $stmt->bindValue(':id', $_SESSION['cd']);
                        $stmt->execute();
                        
                        $dependentes = $stmt->fetch(PDO::FETCH_ASSOC);
                        if ($dependentes) {
                            $sql_dependente = "SELECT * FROM tb_usuario WHERE id_responsavel = ".$_SESSION['cd'];
                            
                            foreach ($conn->query($sql_dependente) as $info_dependente) {?>
                            <div class="dashboard-dependentes">
                                <h3><?php echo $info_dependente['nm_usuario'] . " " . $info_dependente['sn_usuario']; ?></h3>
                                <!-- Local para o dashboard geral/balanço total -->
                            </div>
                            <?php
                            }
                        }
                    ?>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Alterar registro</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control form-control-sm" id="alterar_descricao" name="ds_lancamento">
                                        <label style="color: #000" for="ds_lancamento">Descrição</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="date" class="form-control form-control-sm" id="alterar_data" name="dt_lancamento">
                                        <label style="color: #000" for="dt_lancamento">Data</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control form-control-sm" id="alterar_valor" name="vl_lancamento">
                                        <label style="color: #000" for="vl_lancamento">Valor</label>
                                    </div>
                                     <div class="mb-3">
                                        <select class="form-select" id="alterar_tipo_registro">
                                            <option value="" date-default disable selected>Tipo de registro</option>
                                            <?php 
                                                $option = "";
                                                $sql = 'SELECT * FROM tb_tipo_registro';

                                                foreach ($conn->query($sql) as $row){
                                                    $option .= "<option value='".$row['cd_tipo_registro']."'>".$row['nm_tipo_registro']."</option>";
                                                }
                                                echo $option;
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <select class="form-select" id="alterar_categoria">
                                            <option value="" date-default disable selected>categoria</option>
                                            <?php 
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
                                        <select class="form-select" id="alterar_pagamento">
                                            <option>Pagamento</option>
                                            <?php 
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
                                        <select class="form-select" id="alterar_responsavel">
                                            <option>Responsável</option>
                                            <?php 
                                                $option = "";
                                                $sql = 'SELECT * FROM tb_responsavel';

                                                foreach ($conn->query($sql) as $row){
                                                    $option .= "<option value='".$row['cd_responsavel']."'>".$row['nm_responsavel']."</option>";
                                                }
                                                echo $option;
                                            ?>
                                        </select>
                                    </div>
                                    <p id="exibir-codigo"></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="button" class="btn btn-primary" id="salvar">Salvar alterações</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <p id="exibir-resposta"></p>
        </div>
    </section>
    
    <script src="js/toggle.js"></script>
    <!-- BootStrap SRC -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
<?php
    }
?>