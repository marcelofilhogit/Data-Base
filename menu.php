<head>
    <meta charset="utf-8">
    <title>DB Compras</title>
    <link rel="stylesheet" href="lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <!--script type="text/javascript" src="lib/bootstrap/bootstrap.min.js"></script-->
    <link rel="stylesheet" href="lib/font-awesome-4.7/css/font-awesome.min.css">
</head>

<?php $url = basename($_SERVER['PHP_SELF'],'.php'); ?>

<nav class="navbar navbar-expand-md fixed-top bg-dark">
    <div class="container">
        <a class="navbar-brand text-white" href="index.php">
            <h3>DB Compras</h3>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars fa-6" aria-hidden="true" style="color: #fff; font-size:35px;"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item <?php if($url == 'index') echo 'active'; ?>">
                    <a class="nav-link" href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                </li>

                <li class="nav-item <?php if($url == 'cadastre-se') echo 'active'; ?>">
                    <a class="nav-link" href="cadastre-se.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Cadastre-se</a>
                </li>

                <li class="nav-item <?php if($url == 'entrar') echo 'active'; ?>">
                    <a class="nav-link" href="entrar.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Entrar</a>
                </li>

                <li class="nav-item <?php if($url == 'contato') echo 'active'; ?>"">
                    <a class="nav-link " href="contato.php"><i class="fa fa-phone" aria-hidden="true"></i> Contato</a>
                </li>
            </ul>
        </div>
    </div>
</nav><br><br><br>
