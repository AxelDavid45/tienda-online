<?php
require_once "models/productosModel.php";

class productosController {
    public function index() {
        $prod_random = new productosModel();
        $random = $prod_random->getRandom(8);

        //Renderizamos la vista de prod. destacados
        require_once "views/productos/destacados.php";
    }

    public function ver() {
        //Muestra la pagina individual del producto
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $producto = new productosModel();
            $producto->setId($id);
            $pro = $producto->getOnce();
            require_once "views/productos/ver.php";
        }
    }

    public function gestion() {
        helpers::isAdmin();
        //Obtiene todos y los muestra en la vista para administrarlos
        $products = new productosModel();
        $products_list = $products->getAll();
        require_once "views/productos/gestion.php";
    }

    public function nuevo() {
        helpers::isAdmin();
        //Crea una vista de el formulario para nuevo
        require_once "views/productos/nuevo.php";
    }

    public function save() {
        helpers::isAdmin();
        //Se comunica con el model para ver guardarlo
        if (isset($_POST)) {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $categoria = isset($_POST['categoria']) ? (int) $_POST['categoria'] : false;
            $precio = isset($_POST['precio']) ? (int) $_POST['precio'] : false;
            $oferta = isset($_POST['oferta']) ? (int) $_POST['oferta'] : false;
            $stock = isset($_POST['stock']) ? (int) $_POST['stock'] : false;
            //Datos de la imagen
            $dir = 'uploads/images/';
            $file = isset($_FILES['imagen']) ? $_FILES['imagen'] : false;
            $name_file = $file['name'];
            $mimetype = $file['type'];

            if ($nombre && $descripcion && $categoria && $precio && $stock) {
                $product_save = new productosModel();
                if ($file) {
                    if ($mimetype == 'image/jpeg'
                        || $mimetype == 'image/jpg'
                        || $mimetype == 'image/png'
                        || $mimetype == 'image/gif') {

                        if (!is_dir('uploads/images/')) {
                            mkdir('uploads/images/', 0777, true);
                        }
                        //Movemos el archivo a la carpeta
                        move_uploaded_file($file['tmp_name'], 'uploads/images/' . $file['name']);
                        $product_save->setImagen($dir . $file['name']);

                    }
                }
                //Le asignamos valores a los metodos
                $product_save->setNombre($nombre);
                $product_save->setDescripcion($descripcion);
                $product_save->setCategoriaId($categoria);
                $product_save->setPrecio($precio);
                $product_save->setStock($stock);
                $product_save->setOferta($oferta);

                if(isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $product_save->setId($id);
                    $save = $product_save->edit();
                } else {
                    $save = $product_save->save();
                }


                if ($save) {
                    $_SESSION['producto']['save'] = true;
                } else {
                    $_SESSION['producto']['save'] = false;
                }
                header("Location:" . base_url . 'productos/gestion');
            } else {
                $_SESSION['producto']['save'] = 'incomplete';
                header("Location:" . base_url . 'productos/nuevo');
            }


        }


    }

    public function delete() {
        ///Comprueba si es admin
        helpers::isAdmin();
        //Comprueba que exista get
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $product_delete = new productosModel();
            $product_delete->setId($id);
            $delete = $product_delete->delete();

            if ($delete) {
                $_SESSION['producto']['delete'] = true;
            } else {
                $_SESSION['producto']['delete'] = false;
            }
        }
        header("Location:" . base_url . 'productos/gestion');

    }

    public function edit() {
        if (isset($_GET['id'])) {
            $edit = true;
            $id = $_GET['id'];
            $producto = new productosModel();
            $producto->setId($id);
            $pro = $producto->getOnce();
            require_once "views/productos/nuevo.php";
        }

    }
}
