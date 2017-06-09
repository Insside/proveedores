<?php
/**
 * Este archivo recibe el nombre del archivo a eliminar y realiza la accion si valoraciones adiciones su
 * proceso implica dos acciones eliminar el registro de la base de datos y eliminar fisicamente el archivo
 * */
$archivos=new _Archivos();
$validaciones=new Validaciones();

$archivo=$archivos->_consultar($validaciones->recibir("archivo"));
$archivos->_eliminar($archivo['archivo']);
$f->windowClose();
$f->JavaScript("MUI.Proveedores_Proveedor_Consultar('".$archivo['proveedor']."');");
?>