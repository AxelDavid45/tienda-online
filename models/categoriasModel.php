<?php

class categoriasModel {
    //Atributos
    private $id, $nombre, $db;

    public function __construct() {
        $this->db = Database::conectar();
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    public function getOnce() {
        $sql = "SELECT * FROM categorias WHERE id = {$this->getId()}";
        $query = $this->db->query($sql);
        if($query) {
            return $query;
        }
        return false;
    }

    public function getAll() {
        //Obtiene todos los elementos de las categorias
        $sql = "SELECT * FROM categorias ORDER BY id DESC";
        $query = $this->db->query($sql);
        if($query) {
            return $query;
        }
        return false;
    }

    public function getAllCategory() {
        $sql = "SELECT * FROM categorias WHERE id = {$this->getId()}";
        $query = $this->db->query($sql);
        if($query) {
            return $query;
        }
        return false;

    }

    public function save() {
        //Guarda los datos en la bd
        $sql = "INSERT INTO categorias VALUES(NULL, '{$this->getNombre()}');";
        $query = $this->db->query($sql);
        if($query) {
            return true;
        }
        return false;
    }

    public function delete() {
        //Borra un elemento
        $sql = "DELETE FROM categorias WHERE id = {$this->getId()}";
        $query = $this->db->query($sql);
        if($query) {
            return true;
        }
        return false;
    }

    public function edit() {
        //Edita la categoria
        $sql = "UPDATE categorias SET nombre = '{$this->getNombre()}' WHERE id = {$this->getId()}";
        $query = $this->db->query($sql);

        if($query) {
            return true;
        }
        return false;
    }
}
