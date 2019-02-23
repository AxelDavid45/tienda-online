<?php

class productosModel {
    //Atributoss
    private $id, $categoria_id, $nombre, $descripcion, $precio, $stock, $oferta, $fecha;
    private $imagen;

    private $db;

    public function __construct() {
        //Guarda todos los metodos de la base de datos en db
        $this->db = Database::conectar();
    }

    /*---------------
    GETTERS AND SETTERS
    -------------------*/

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getCategoriaId() {
        return $this->categoria_id;
    }

    public function setCategoriaId($categoria_id) {
        $this->categoria_id = $this->db->real_escape_string($categoria_id);
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $this->db->real_escape_string($descripcion);
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function setPrecio($precio) {
        $this->precio = $this->db->real_escape_string($precio);
    }

    public function getStock() {
        return $this->stock;
    }

    public function setStock($stock) {
        $this->stock = $this->db->real_escape_string($stock);
    }

    public function getOferta() {
        return $this->oferta;
    }

    public function setOferta($oferta) {
        $this->oferta = $this->db->real_escape_string($oferta);
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function getImagen() {
        return $this->imagen;
    }

    public function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    public function getAll() {
        //Obtiene todos los elementos de las categorias
        $sql = "SELECT * FROM productos ORDER BY id DESC";
        $query = $this->db->query($sql);
        if ($query) {
            return $query;
        }
        return false;
    }

    public function getAllCategory() {
        //Obtiene todos los objetos de una categoria
        $sql = "SELECT * FROM productos WHERE categoria_id = {$this->getCategoriaId()}";
        $query = $this->db->query($sql);
        if ($query) {
            return $query;
        }
        return false;

    }

    public function getRandom($limit = null) {
        //Consigue registros aleatorios de la bd
        $sql = "SELECT * FROM productos ORDER BY RAND() DESC ";
        if($limit != null) {
            $sql .= " LIMIT $limit";
        }

        $query = $this->db->query($sql);
        if ($query) {
            return $query;
        }
        return false;

    }

    public function getOnce() {
        //Obtiene solo un producto
        $sql = "SELECT * FROM productos WHERE id = {$this->getId()}";
        $query = $this->db->query($sql);
        if ($query) {
            return $query->fetch_object();
        }
        return false;
    }


    public function save() {
        //Guarda los datos en la bd
        $sql = "INSERT INTO productos VALUES(NULL, {$this->getCategoriaId()}, '{$this->getNombre()}','{$this->getDescripcion()}', {$this->getPrecio()}, {$this->getStock()}, {$this->getOferta()}, CURDATE(), '{$this->getImagen()}')";
        $query = $this->db->query($sql);


        if ($query) {
            return true;
        }
        return false;
    }

    public function edit() {
        $sql = "UPDATE productos SET nombre = '{$this->getNombre()}', categoria_id =  {$this->getCategoriaId()}, descripcion =  '{$this->getDescripcion()}', precio = {$this->getPrecio()}, stock = {$this->getStock()}, oferta = {$this->getOferta()}, fecha = CURDATE()";

        if ($this->getImagen() != null) {
            $sql .= ", imagen = '{$this->getImagen()}'";
        }

        $sql .= " WHERE id = {$this->getId()}";


        $query = $this->db->query($sql);


        if ($query) {
            return true;
        }
        return false;


    }

    public function delete() {
        //Borra un elemento
        $sql = "DELETE FROM productos WHERE id = {$this->getId()}";
        $query = $this->db->query($sql);
        if ($query) {
            return true;
        }
        return false;

    }

}
