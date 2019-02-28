<?php
require_once "models/productosModel.php";

class  carritoController
{

    public function index()
    {
        if (isset($_SESSION['carrito'])) {
            $sesion_carrito = $_SESSION['carrito'];
        } else {
            $sesion_carrito = false;
        }
        require_once "views/carrito/index.php";
        // echo "Controlador carrito, metodo index";
    }

    public function add()
    {
        if (isset($_GET['id'])) {
            $producto_id = $_GET['id'];
        } else {
            header("Location:".base_url);
        }

        if (isset($_SESSION['carrito'])) {
            $contador = 0;
            foreach ($_SESSION['carrito'] as $indice => $elemento) {
                if ($elemento['producto_id'] == $producto_id) {
                    $_SESSION['carrito'][$indice]['cantidad']++;
                    $contador++;
                }
            }

        }
        if (!isset($contador) || $contador == 0) {
            //Obtenemos el producto que nos mandan por GET
            $prod = new productosModel();
            $prod->setId($producto_id);
            $result = $prod->getOnce();
            //comprobamos que es un objeto y lo agregamos al carrito en un indice nuevo
            if (is_object($result)) {
                $_SESSION['carrito'][] = array(
                    'producto_id' => $result->id,
                    'precio' => $result->precio,
                    'cantidad' => 1,
                    'producto' => $result,

                );
            }

        }

        header("Location:".base_url.'carrito/index');
    }

    public function delete_all()
    {
        if (isset($_SESSION['carrito'])) {
            unset($_SESSION['carrito']);
            header("Location:".base_url.'carrito/index');
        }
    }
}