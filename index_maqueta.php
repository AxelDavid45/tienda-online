<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
          crossorigin="anonymous">
    <title>Tienda online de camisetas</title>
</head>
<body>
<div class="container">
    <!--  CABECERA  --->
    <header id="header">
        <div id="logo">
            <img src="assets/img/camiseta.png" alt="Logotipo de la pagina">
            <a href="index.php">
                TIENDA DE CAMISETAS
            </a>
        </div>
    </header>
    <!--  MENU --->
    <nav id="menu">
        <ul>
            <li>
                <a href="#">Inicio</a>
            </li>
            <li>
                <a href="#">Categoria 1</a>
            </li>
            <li>
                <a href="#">Categoria 2</a>
            </li>
            <li>
                <a href="#">Categoria 3</a>
            </li>
            <li>
                <a href="#">Categoria 4</a>
            </li>
            <li>
                <a href="#">Categoria 5</a>
            </li>
            <li>
                <a href="#">Categoria 6</a>
            </li>
        </ul>
    </nav>
    <div id="content">
        <!--  BARRA LATERAL --->
        <aside id="lateral">
            <div id="login" class="block-aside">
                <h3 class="tit-block-aside">Inicia sesión</h3>
                <form action="#" method="POST">
                    <label>
                        <p>Email:</p>
                        <input type="text" name="email">
                    </label>
                    <label>
                        <p>Contraseña:</p>
                        <input type="password" name="password">
                    </label>
                    <input type="submit" value="Enviar">
                </form>
                <ul class="gestion">
                    <li>
                        <i class="fas fa-cubes"></i>
                        <a href="#">Mis pedidos</a>
                    </li>
                    <li>
                        <i class="fas fa-sliders-h"></i>
                        <a href="#">Gestionar pedidos</a>
                    </li>
                    <li>
                        <i class="fas fa-align-justify"></i>
                        <a href="#">Gestionar categorias</a>
                    </li>

                </ul>
            </div>
        </aside>
        <!--  CONTENIDO PRINCIPAL --->

        <div id="central">
            <h1>Productos destacados</h1>
            <div class="flex-products">
                <div class="product">
                    <img src="assets/img/productos-destacados.png" alt="">
                </div>
                <div class="product">
                    <img src="assets/img/camiseta.png" alt="">
                    <h2>Camiseta azul</h2>
                    <p>$100 pesos</p>
                    <a href="#">Agregar al carrito</a>
                </div>
                <div class="product">
                    <img src="assets/img/camiseta.png" alt="">
                    <h2>Camiseta azul</h2>
                    <p>$100 pesos</p>
                    <a href="#">Agregar al carrito</a>
                </div>
                <div class="product">
                    <img src="assets/img/camiseta.png" alt="">
                    <h2>Camiseta azul</h2>
                    <p>$100 pesos</p>
                    <a href="#">Agregar al carrito</a>
                </div>
                <div class="product">
                    <img src="assets/img/camiseta.png" alt="">
                    <h2>Camiseta azul</h2>
                    <p>$100 pesos</p>
                    <a href="#">Agregar al carrito</a>
                </div>
                <div class="product">
                    <img src="assets/img/camiseta.png" alt="">
                    <h2>Camiseta azul</h2>
                    <p>$100 pesos</p>
                    <a href="#">Agregar al carrito</a>
                </div>
                <div class="product">
                    <img src="assets/img/camiseta.png" alt="">
                    <h2>Camiseta azul</h2>
                    <p>$100 pesos</p>
                    <a href="#">Agregar al carrito</a>
                </div>
            </div>
        </div>
    </div>


    <!--  PIE DE PAGINA --->
    <footer id="pie">
        <p>Diseño por Victor Robles, programación Axel Espinosa &copy; <?= date('Y'); ?></p>
    </footer>
</div>
</body>
</html>
