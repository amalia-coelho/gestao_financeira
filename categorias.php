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

    <!-- Import jquery -->
    <script src="js/jquery-3.6.1.min.js"></script>

    <!-- jquery -->
    <script type="text/javascript">
        
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
            <li><a href="home.php">
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

        <div class="dash-content">
            <div class="overview activity">
                <div class="add">
                    
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Categorias</span>
                </div>
                
            <!-- Botão para acionar modal -->
            <button type="button" class="btn btn-primary open" data-toggle="modal" data-target="#modalExemplo">Adicionar categoria</button>

            <!-- Modal -->
            <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content ">
                  <div class="modal-header bg-danger text-light">
                    <h5 class="modal-title" id="exampleModalLabel">Cadastro de categorias</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control form-control-sm categoria" id="floatingInput" placeholder="..." name="categoria">
                            <label style="color: #000" for="categoria">Nome</label>
                
                        </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-danger">Concluir</button>
                      <button type="button" class="btn btn-dark" data-dismiss="modal">Fechar</button>
                  </div>
                </div>
              </div>
            </div>

<!-- Fim do modal -->
                </div>

                <div class="activity-data">
                    <div class="table dependentes">
                            <table class="table">
                                <thead class="thead-dark bg-dark text-white">
                                    <tr>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Ações</th>
                                    </tr>
                                </thead>
                            <tbody>
                            <?php
                                include("php/conexao.php");
                                $sql_categoria = "SELECT * FROM tb_categoria WHERE id_usuario_busca is null OR id_usuario_busca = ".$_SESSION['cd'];

                                foreach ($conn->query($sql_categoria) as $categoria) {?>
                                    <tr>
                                        <td><?php echo $categoria['nm_categoria'];?></td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-outline-primary open alterar" data-toggle="modal" data-target="#exampleModal" 
                                            cod="<?php echo $categoria['cd_categoria'];?>" 
                                            nome="<?php echo $categoria['nm_categoria']?>">Alterar</button>
                                            <a href='php/deletar_categoria.php?cod=<?php echo $categoria['cd_categoria'];?>' class="btn btn-outline-danger btn-sm">Excluir</a>
                                        </td>
                                    </tr>
                                <?php
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <script src="js/toggle.js"></script>
</body>
</html>
<?php
    }
?>