<?php
// Funcion que carga los controller
function controllers_autoload($clase) {
    require "controllers/".$clase.'.php';
}

spl_autoload_register('controllers_autoload');
