<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= base_url ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url ?>assets/css/normalize.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="shortcut icon" href="<?= base_url ?>favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?= base_url ?>favicon.ico" type="image/x-icon">
    <title>Tienda online de camisetas</title>
</head>
<body>
<div class="container">
    <!--  CABECERA  --->
    <header id="header">
        <div id="logo">
            <img src="<?= base_url ?>assets/img/camiseta.png" alt="Logotipo de la pagina">
            <a href="<?= base_url ?>index.php">
                TIENDA DE CAMISETAS
            </a>
        </div>
    </header>
    <!--  MENU --->
    <nav id="menu">
        <ul>
            <li>
                <a href="<?= base_url ?>">Inicio</a>
            </li>
            <?php $categorias = helpers::getAllCategories(); ?>
            <?php while ($cat = $categorias->fetch_object()): ?>
                <li>
                    <a href="<?= base_url?>categorias/ver&id=<?=$cat->id?>"><?= $cat->nombre; ?></a>
                </li>
            <?php endwhile; ?>

        </ul>
    </nav>
    <div id="content">

