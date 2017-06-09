<?php

$ROOT = (!isset($ROOT)) ? "../../../" : $ROOT;
require_once($ROOT . "modulos/proveedores/librerias/Configuracion.cnf.php");
$transaccion = isset($_REQUEST['transaccion']) ? $_REQUEST['transaccion'] : time();
$proveedores = new Proveedores();
$proveedor = $proveedores->consultar($_REQUEST['proveedor']);
$persona = $proveedor['persona'];

$f = new Forms($transaccion);
//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\
echo($f->apertura());
//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\
if (!isset($_REQUEST['trasmision'])) {
  if ($persona == "01") {
    require_once($ROOT . "modulos/proveedores/formularios/actualizar/perfil.natural.inc.php");
  } else {
    require_once($ROOT . "modulos/proveedores/formularios/actualizar/perfil.juridica.inc.php");
  }
} else {
  require_once($ROOT . "modulos/proveedores/formularios/actualizar/perfil.procesador.inc.php");
}
//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\
echo($f->generar());
echo($f->cierre());
?>