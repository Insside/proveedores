<?php

$ROOT = (!isset($ROOT)) ? "../../../../../" : $ROOT;
require_once($ROOT . "modulos/proveedores/librerias/Configuracion.cnf.php");
$transaccion = isset($_REQUEST['transaccion']) ? $_REQUEST['transaccion'] : time();
$trasmision = @$_REQUEST['trasmision'];
$f = new Forms($transaccion);
//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\
echo($f->apertura());
//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\
if (empty($tranmision)) {
  require_once($ROOT . "modulos/proveedores/formularios/proveedor/crear/formulario.inc.php");
} else {
  require_once($ROOT . "modulos/proveedores/formularios/proveedor/crear/procesador.inc.php");
}
//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\
echo($f->generar());
echo($f->controles());
echo($f->cierre());
?>