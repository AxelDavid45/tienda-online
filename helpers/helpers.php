<?php

class helpers
{
    //Elimina las sesiones
    public static function deleteSession($name)
    {
        if (isset($_SESSION[$name])) {
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);
        }
    }

    //Redirige si no eres administrador
    public static function isAdmin()
    {
        if (!isset($_SESSION['admin'])) {
            header("Location:".base_url);
        } else {
            return true;
        }
    }

    //Obtiene todas las categorias
    public static function getAllCategories()
    {
        require_once "models/categoriasModel.php";
        $categorias = new categoriasModel();
        //Llamamos al metodo del modelo
        $categorias_query = $categorias->getAll();

        return $categorias_query;
    }

    public static function stats()
    {
        $stats = ['nProductos' => 0, 'total' => 0];
        if(isset($_SESSION['carrito'])) {
           $stats['nProductos'] = count($_SESSION['carrito']);
           foreach ($_SESSION['carrito'] as $elemento) {
               $stats['total'] += $elemento['precio'] * $elemento['cantidad'];
           }
        }
        return $stats;
    }


}
