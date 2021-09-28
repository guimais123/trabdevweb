<?php
session_start();
include("conexao.php");
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
          <li class="nav-item">
            <a class="nav-link" href="forum.php">Fórum</a>
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
          <li class="nav-item">
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
  <header class="masthead" style="background-image: url('img/forumImg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">
            <h1>Fórum de discussões</h1>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Post Content -->
  <article>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
      <?php
        if(isset($_SESSION['usuario'])):
        ?>
          <a href="newTopicForum.php" style="display: flex; justify-content: center"><button href="newTopicForum.php" type="button" class="btn btn-primary">Adicionar novo Tópico</button></a>
        <?php
        endif;
        ?>
        <div class="post-preview">

        <?php
        if(isset($_SESSION['mensagem'])):
        ?>
          <div class="badge-success">
            <?php echo $_SESSION['mensagem']?>
          </div>
        <?php
        endif;
        unset($_SESSION['mensagem']);
        ?>
        <?php
        if(isset($_SESSION['badMensagem'])):
        ?>
          <div class="badge-danger">
            <?php echo $_SESSION['badMensagem']?>
          </div>
        <?php
        endif;
        unset($_SESSION['badMensagem']);
        ?>
          <a>
            <h2 class="post-title">
            Feed de publicações
            </h2>
          </a>
          <?php
					$sql = "SELECT * FROM posts ORDER BY id DESC";
					$resultado = mysqli_query($conexao, $sql);

					if(mysqli_num_rows($resultado)>0):
            while($dados = mysqli_fetch_array($resultado)):
              ?>

              <a>
                <h2 class="post-title">
                  <?php echo $dados ['titulo']; ?>
                </h2>
                <h3 class="post-subtitle">
                  <?php echo $dados ['mensagem']; ?>
                </h3>
              </a>
              <p class="post-meta">Posted by <?php echo $dados ['usuario']; ?>
              <br>
              <a href="deletePost.php"><button type="button" class="btn btn-danger">Excluir post</button></a>
          <?php
			    endwhile;
          else:
          ?>
            <td>Não existe publicações no momento</td>
          <?php	
			    endif;
				  ?>





          <!-- <a>
            <h2 class="post-title">
            Dinheiro gasto pela Google com o Stadia assustou produtores de games
            </h2>
            <h3 class="post-subtitle">
            A Google lançou o Stadia em novembro de 2019 com a expectativa de revolucionar o setor de jogos eletrônicos. Mais de um ano depois, porém, o resultado dessa empreitada é um grande fracasso e uma quantia astronômica de dinheiro gasta em serviços que a essa altura não terão retorno.
            </h3>
          </a>
          <p class="post-meta">Posted by TecMundo
        </div>
        <hr>
        <div class="post-preview">
          <a>
            <h2 class="post-title">
            PS Plus: Final Fantasy VII Remake é um dos games gratuitos de março
            </h2>
            <h3 class="post-subtitle">
            Além disso, a Sony ainda oferece Farpoint e Remnant: From the Ashes para os assinantes do serviço no PS4 e PS5 (via retrocompatibilidade). Exclusivamente para assinantes no PS5 está o game de quebra-cabeças Maquette, que será lançado no próprio mês.
            </h3> 
          </a>
          <p class="post-meta">Posted by IGN Brasil
        </div>
        <hr>
        <div class="post-preview">
          <a>
            <h2 class="post-title">
            Próxima série de quadrinhos do Batman será crossover com Fortnite
            </h2>
            <h3 class="post-subtitle">
            A DC Comics e a Epic Games anunciaram que a próxima série em quadrinhos do Batman será um crossover com o game Fortnite. A produção será uma minissérie de seis edições, intitulada de “Batman/Fortnite: Zero Point”, com data de lançamento prevista para 20 de abril.
            </h3>
          </a>
          <p class="post-meta">Posted by OlharDigital
        </div>
        <hr>
        <div class="post-preview">
          <a>
            <h2 class="post-title">
            Há 25 anos, Pokémon era lançado no mundo dos games
            </h2>
            <h3 class="post-subtitle">
            "Pokémon! Temos que pegar. Isso eu sei. Pegá-los, eu tentarei! Juntos teremos que o mundo defender". O refrão do tema de abertura da série animada Pokémon é uma ótima trilha sonora para este sábado (27/2), quando a franquia dos "animais poderosos e seus donos" completa 25 anos do lançamento.
            </h3>
          </a> -->
          <!-- <p class="post-meta">Posted by Correio Braziliense -->
        </div>
        <hr>
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
