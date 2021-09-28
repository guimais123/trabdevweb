<?php
session_start();
include("conexao.php");
if(isset($_POST['usuario_id'])):
	$id = mysqli_escape_string($conexao, $_POST['usuario_id']);
	$sql = "SELECT * FROM usuario WHERE usuario_id= '$id'";
	$resultado = mysqli_query($conexao, $sql);
	$dados = mysqli_fetch_array($resultado);
endif;
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Geek Social</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/clean-blog.min.css" rel="stylesheet">

</head>

<body>

  <!-- botoes de navegação do site -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="index.php">Home</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <?php if (isset($_SESSION['usuario'])){ ?>
            <li class="nav-item">
              <a class="nav-link" href="users.php">Users</a>
            </li>
            <?php }else{ ?>
              <li class="nav-item">
              <a class="nav-link" href="painelcontrol.php">Users</a>
              </li>
            <?php } ?>
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
         <!-- Aqui verifico se irá aparecer na navbar usuário logado ou o botão para login -->
         <?php if (isset($_SESSION['usuario'])){ ?>
            <li class="nav-item">
              <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['usuario']; ?></a>
              <div class="dropdown-menu" style="position: relative; margin-top: -45px">
                  <a href="logout.php" class="dropdown-item">Sair</a>
                </div>
            </li>
              <?php }else{ ?>
              <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
              </li>
            <?php } ?>  
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header da página, cada tela tem seu backgroud e descrição -->
  <header class="masthead" style="background-image: url('img/productstheme.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">
            <h1>Edição de usuário</h1>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Post Content -->
  <article>
    <div class="container">
        <div class="row">
	        <div class="col s12 m6 push-m3">
		        <h3 class="light"> Editar Usuário </h3>
		        <form action="update.php" method="POST">
			        <input type="hidden" name = "usuario_id" value="<?php echo $dados['usuario_id']?>">
			    <div class="input-field col s12">
				    <label for="nome">Nome: </label>	
				    <input class="form-control" type="text" name="nome" id="nome" value="<?php echo $dados['nome']?>">
			    </div>
			    <div class="input-field col s12">
				    <label for="sobrenome">Usuário: </label>		
				    <input class="form-control" type="text" name="usuario" id="usuario" value="<?php echo $dados['usuario']?>">
			    </div>
			    <div class="input-field col s12">
				    <label for="email">Senha: </label>	
				    <input class="form-control" type="text" name="senha" id="senha" value="<?php echo $dados['senha']?>">
			    </div>
			        <button type="submit" name="editar" class="btn">Atualizar</button>
			        <a href="users.php" type="submit" class="btn green">Lista de usuários</a>
		        </form>
            </div>
        </div>
    </div>
  </article>

  <hr>

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <ul class="list-inline text-center">
            <li class="list-inline-item">
              <a href="https://twitter.com">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="https://facebook.com">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
          </ul>
          <p class="copyright text-muted">Copyright &copy; Your Website 2020</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/clean-blog.min.js"></script>

</body>

</html>
