<?php
//Iniciamos la session
session_start();
//Carga el autoload de los controladores
require "autoload.php";
//Llamamos a la bd para que siempre este disponible
require_once "config/db.php";
require_once "helpers/helpers.php";
//Carga las constantes de la app
require_once "config/parameters.php";
//Header de la pagina
require_once "views/layout/header.php";
//Aside de la pagina
require_once "views/layout/aside.php";

//Funcion que muestra el error
function show_error()
{
    $error = new errorController();
    $error->index();
}

//Comprueba que exista el controller
if (isset($_GET['controller'])) {
    $clase = $_GET['controller'] . 'Controller';
} elseif (!isset($_GET['controller']) && !isset($_GET['method'])) {
    $clase = controller_default;
} else {
    show_error();
    die();
}

if (class_exists($clase)) {
    $controler = new $clase();
    //Busca el metodo
    if (isset($_GET['method']) && method_exists($controler, $_GET['method'])) {
        $method = $_GET['method'];
        $controler->$method();
    } elseif(!isset($_GET['method'])) {
        $method_default = method_default;
        $controler->$method_default();
    } else {
        show_error();
    }
} else {
    show_error();

}
require_once "views/layout/footer.php";

?>

