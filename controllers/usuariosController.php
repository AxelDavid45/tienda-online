<?php
require_once "models/usuariosModel.php";

class usuariosController {
    public function index() {
        echo "Controlador de Usuarios";
    }

    /*---------------------------------
       REGISTRO DE USUARIOS FORMs
     *------------------------------- */
    public function registro() {
        //Renderizamos la vista
        require_once "views/usuarios/registro.php";
    }

    /*-------------------------------------
    GUARDA EL USUARIO EN LA BD
     --------------------------------------*/
    public function save() {
        if(isset($_POST)) {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $pass = isset($_POST['pass']) ? $_POST['pass'] : false;
            if(!$nombre || !$apellido || !$email || !$pass) {
                $_SESSION['register'] = false;
            } else {
                //Instanciamos el objeto
                $usuario = new usuariosModel();
                //Le asignamos datos al objeto
                $usuario->setNombre($_POST['nombre']);
                $usuario->setApellido($_POST['apellido']);
                $usuario->setEmail($_POST['email']);
                $usuario->setPassword($_POST['pass']);
                //Guardamos el nuevo registro
                $save = $usuario->save();
                if($save) {
                    $_SESSION['register'] = true;
                } else {
                    $_SESSION['register'] = false;
                }

            }
        }
        header("Location:".base_url.'/usuarios/registro');

    }
    /*-------------------------------------
    LOGIN DE LOS USUARIOS
    --------------------------------------*/
    public function login() {
        if(isset($_POST)) {
            //Identificar al usuario
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;

            //Consultar a la base de datos
            $usuario = new usuariosModel();
            //Le asignamos datos a los atributos
            $usuario->setPassword($password);
            $usuario->setEmail($email);
            $user_data = $usuario->login();

            if($user_data && is_object($user_data)) {
                //Crear una sesion para el usuario
                $_SESSION['user_data'] = $user_data;
                if($user_data->rol == 'admin') {
                    $_SESSION['admin'] = true;
                }
            } else {
                $_SESSION['login_fail'] = true;
            }

        }
        header('Location:'.base_url);
    }

    //Termina la sesion del usuario
    public function logout() {
        if(isset($_SESSION['user_data'])) {
            unset($_SESSION['user_data']);
        }
        if(isset($_SESSION['admin'])) {
            unset($_SESSION['admin']);
        }

        header("Location:".base_url);
    }
}
