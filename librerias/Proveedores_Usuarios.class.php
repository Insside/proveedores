<?php

if (!class_exists('Proveedores_Usuarios')) {
    $ROOT = (!isset($ROOT)) ? "../../../" : $ROOT;
    require_once($ROOT . "modulos/usuarios/librerias/Usuarios.class.php");
    class Proveedores_Usuarios extends Usuarios{ 
    }

}
?>