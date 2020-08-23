<!DOCTYPE html>
<html>
<head>
    <!-- Meta tags -->
    <meta chaset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content= "ie=edge">
    
    <!-- Bootstrap 4.5 -->
    <link rel="stylesheet"
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
    crossorigin="anonymous">
    
    <!-- Ioni Icons -->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/7d859f8f51.js"
    crossorigin="anonymous"></script>
    
    <!-- Local Styles -->
    <link rel="stylesheet" type="text/css" href="<?php echo ROUTE_URL; ?>/css/styles.css">
    
    <title><?php echo SITENAME; ?></title>

</head>
<body>
<div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a href = "<?php echo ROUTE_URL."/pages/home"; ?>" class= "navbar-brand">TALENT PROJECT</a>
                <form class="form-inline position-relative my-2 my-lg-0" action="<?= ROUTE_URL; ?>/pages/searchPost" method="GET">
                        <input class="form-control mr-sm-2" type="text" name="search" id="search" placeholder="Buscar" aria-label="search">
                        <button class="btn btn-search" type="submit"><i class="icon ion-md-search"></i></button>
                        <input class="form-control mr-sm-2" type="date" name="date" id="date" aria-label="date">

                </form>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $_SESSION['username'] ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Cuenta</a>
                                <a class="dropdown-item" href="<?php echo ROUTE_URL."/pages/profile"; ?>">Mi Perfil</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo ROUTE_URL."/logout"; ?>">Cerrar Sesión</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
</div>


