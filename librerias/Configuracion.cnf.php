<?php
$ROOT = (!isset($ROOT)) ? "../../../" : $ROOT;
require_once($ROOT . "librerias/Configuracion.cnf.php");
/** Modulo **/
require_once($ROOT . "modulos/proveedores/librerias/Proveedores.class.php");
require_once($ROOT . "modulos/proveedores/librerias/Proveedores_Actividades.class.php");
require_once($ROOT . "modulos/proveedores/librerias/Proveedores_Archivos.class.php");
require_once($ROOT . "modulos/proveedores/librerias/Proveedores_Categorias.class.php");
require_once($ROOT . "modulos/proveedores/librerias/Proveedores_Contactos.class.php");
require_once($ROOT . "modulos/proveedores/librerias/Proveedores_Documentos.class.php");
require_once($ROOT . "modulos/proveedores/librerias/Proveedores_Responsabilidades.class.php");
require_once($ROOT . "modulos/proveedores/librerias/Proveedores_Regimenes.class.php");
require_once($ROOT . "modulos/proveedores/librerias/Proveedores_Estados.class.php");
require_once($ROOT . "modulos/proveedores/librerias/Proveedores_Ofertas.class.php");
require_once($ROOT . "modulos/proveedores/librerias/Proveedores_Ofertables.class.php");
require_once($ROOT . "modulos/proveedores/librerias/Proveedores_Perfiles.class.php");
require_once($ROOT . "modulos/proveedores/librerias/Proveedores_Usuarios.class.php");
require_once($ROOT . "modulos/proveedores/librerias/Proveedores_Permisos.class.php");
?>