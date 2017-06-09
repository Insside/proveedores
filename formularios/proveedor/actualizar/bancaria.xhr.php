<?php

$ROOT = (!isset($ROOT)) ? "../../../../../" : $ROOT;
require_once($ROOT . "modulos/proveedores/librerias/Configuracion.cnf.php");
$transaccion = isset($_REQUEST['transaccion']) ? $_REQUEST['transaccion'] : time();
$archivos = new _Archivos();
$f = new Forms($transaccion);
//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\
echo($f->apertura());
//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\
if (!isset($_REQUEST['trasmision'])) {
  require_once($ROOT . "modulos/proveedores/formularios/proveedor/actualizar/bancaria/formulario.inc.php");
} else {
  require_once($ROOT . "modulos/proveedores/formularios/proveedor/actualizar/bancaria/procesador.inc.php");
}
//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\
echo($f->generar());
echo($f->controles());
echo($f->cierre());
?>