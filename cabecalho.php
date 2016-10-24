<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Não Pertube</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="app/assets/css/bootstrap.min.css" media="screen" title="no title">
    <link rel="stylesheet" href="app/assets/css/bootstrap-theme.min.css" media="screen" title="no title">
    <link rel="stylesheet" href="app/assets/css/naopertube.css" media="screen" title="no title">
  </head>
  <body>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="/?controller=pages&action=home">Procon Paraiba</a>
          <?php if($_GET['action'] == 'empresa') echo '<a class="navbar" href="/?controller=pages&action=home">Pessoa Física</a>';
                else if($_GET['action'] == 'home') echo '<a class="navbar" href="/?controller=produtos&action=empresa">Pessoa Jurídica</a>';
          ?>
        </div>
        <div>
          <ul class="nav navbar-nav navbar-right">
            <?php if(isset($_SESSION['user_name']) && isset($_SESSION['user_id'])){?>
              <li style="color:#fff;"><?php  echo "Bem vindo ".$_SESSION['user_name'];?></li>
                <?php echo '<li><a href="/?controller=produtos&action=lista">Listar telemarketing</a></li>';
                      echo '<li><a href="/?controller=produtos&action=logout">Sair</a></li>';
                } else {
                    echo '<li><a href="/?controller=produtos&action=login">Login</a></li>';
                }
            ?>
          </ul>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="principal">
