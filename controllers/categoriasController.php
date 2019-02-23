<?php
require_once "models/categoriasModel.php";
require_once "models/productosModel.php";
class categoriasController {
    public function index() {
        helpers::isAdmin();
        $categorias = new categoriasModel();
        //Llamamos al metodo del modelo
        $categorias_query = $categorias->getAll();
        require_once  "views/categorias/index.php";
    }

    public function ver() {
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            //Obtenemos la categoria
            $categoria = new categoriasModel();
            $categoria->setId($id);
            $categorias = $categoria->getAllCategory();
            $cat = $categorias->fetch_object();

            //Obtiene los productos de las categorias
            $products = new productosModel();
            $products->setCategoriaId($id);
            $products_list = $products->getAllCategory();
        }
        require_once "views/categorias/ver.php";
    }

    public function crear() {
        helpers::isAdmin();
        //Creamos una vista
        require_once "views/categorias/crear.php";
    }
    //Se comunica con el model para guardar los datos
    public function save() {
        helpers::isAdmin();
        if(isset($_POST)) {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;

            if($nombre) {
                $categoria = new categoriasModel();
                $categoria->setNombre($nombre);
                $result = $categoria->save();

                if(!$result) {
                    $_SESSION['error_query'] = true;
                }
                $_SESSION['error_query'] = false;

            }
        }
        header("Location:".base_url.'categorias/index');
    }

    public function delete() {
        //Se comunica con model para borrar el registro
        helpers::isAdmin();
        if(isset($_GET['id'])) {
            $id = (int) $_GET['id'];
            $categoria = new categoriasModel();
            $categoria->setId($id);
            $delete = $categoria->delete();

            if(!$delete) {
                $_SESSION['error_delete'] = true;
            }

            $_SESSION['error_delete'] = false;

        }
        header("Location:".base_url.'categorias/index');
    }

    public function edit_view() {
        //Manda a la vista de edicion pasandole el id de parametro
        if(isset($_GET['id'])) {
            $id = (int) $_GET['id'];
            $categoria = new categoriasModel();
            $categoria->setId($id);
            $result = $categoria->getOnce();
            $data = $result->fetch_object();
        }
        require_once "views/categorias/edit.php";
    }
    public function edit() {
        //Edita la categoria y se comunica con el model de categoriass
        helpers::isAdmin();
        if(isset($_POST)) {
            $id = (int) $_POST['id'];
            $categoria = new categoriasModel();
            $categoria->setId($id);
            $categoria->setNombre($_POST['nombre']);
            $delete = $categoria->edit();


            if(!$delete) {
                $_SESSION['error_edit'] = true;
            }

            $_SESSION['error_edit'] = false;

        }
        header("Location:".base_url.'categorias/index');
    }
}

