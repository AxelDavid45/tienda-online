<?php

class Database {

    public static function conectar() {
        $db = new mysqli('localhost', 'root', '', 'tienda_camisetas');
        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}
