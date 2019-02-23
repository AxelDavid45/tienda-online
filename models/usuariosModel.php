<?php

//Clase que tiene el control sobre la entidad en la bd
class usuariosModel {
    //Propiedades
    private $nombre, $apellido, $email, $rol, $password, $imagen, $db;

    public function __construct() {
        //Constructor que asigna el valor de conectar a la db
        $this->db = Database::conectar();
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        //Escapamos el string
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function setApellido($apellido) {
        //Escapamos el string
        $this->apellido = $this->db->real_escape_string($apellido);
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        //Escapamos los strings
        $this->email = $this->db->real_escape_string($email);
    }

    public function getRol() {
        return $this->rol;
    }

    public function setRol($rol) {
        $this->rol = $rol;
    }

    public function getPassword() {
        //Encriptamos la password
        return password_hash($this->db->real_escape_string($this->password),PASSWORD_BCRYPT,['cost' => 4]);
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getImagen() {
        return $this->imagen;
    }

    public function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    /*----------------------------
      GUARDA EL USUARIO EN LA BD Y LOS DATOS VIENEN DEL CONTROLLER
     --------------------------- */
    public function save() {
        $sql = "INSERT INTO usuarios VALUES(NULL, '{$this->getNombre()}', '{$this->getApellido()}','{$this->getEmail()}','{$this->getPassword()}','usuario',NULL)";

        $query = $this->db->query($sql);

        $save = false;

        if ($query) {
            $save = true;
        }

        return $save;
    }

    /*------------------------------------------
     * CONSULTA PARA EL LOGIN DEL CONTROLADOR
     *--------------------------------------- */
    public function login() {
        $data = false;
        //Hacemos la consulta para buscar el usuario
        $sql = "SELECT * FROM usuarios WHERE email = '{$this->email}';";
        $result = $this->db->query($sql);

        //Comprobamos que solo nos devuelva una fila la consulta
        if($result && $result->num_rows == 1) {
            $data = $result->fetch_object();
            //Comprobamos la password
            $verify = password_verify($this->password,$data->password);

            if($verify) {
                return $data;
            }
        }
        return $data;
    }
}
