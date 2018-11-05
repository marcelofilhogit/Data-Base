<head>
    <title>DB Compras</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" href="../lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../lib/font-awesome-4.7/css/font-awesome.min.css">
</head>

<?php $aqui = basename($_SERVER['PHP_SELF'],'.php'); ?>

<header class="app-header"><a class="app-header__logo" href="index.php">DB Compras</a>
    <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>

    <ul class="app-nav">

        <li class="dropdown">
            <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu">
                <i class="fa fa-user fa-lg"></i>
            </a>

            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                <li>
                    <a class="dropdown-item" href="sair.php"><i class="fa fa-sign-out fa-lg"></i> Sair</a>
                </li>
            </ul>
        </li>
    </ul>
</header>

<div class="app-sidebar__overlay" data-toggle="sidebar"></div>

<aside class="app-sidebar">
    <div class="app-sidebar__user">
    </div>

    <ul class="app-menu">
        <li>
            <a class="app-menu__item <?php if($aqui == 'index') echo 'active'; ?>" href="index.php">
                <i class="app-menu__icon fa fa-pie-chart"></i>
                <span class="app-menu__label">Produtos</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item <?php if($aqui == 'pedidos') echo 'active'; ?>" href="pedidos.php">
                <i class="app-menu__icon fa fa-cart-plus"></i>
                <span class="app-menu__label">Pedidos</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item <?php if($aqui == 'contato') echo 'active'; ?>" href="contato.php">
                <i class="app-menu__icon fa fa-phone"></i>
                <span class="app-menu__label">Contatos</span>
            </a>
        </li>

    </ul>
</aside>
