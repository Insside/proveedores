<?php 

$ROOT=(!isset($ROOT))?"../../../":$ROOT;
require_once($ROOT."modulos/proveedores/librerias/Configuracion.cnf.php");
$transaccion=isset($_REQUEST['transaccion'])?$_REQUEST['transaccion']:time();
$archivos=new _Archivos();
$f=new Forms($transaccion);
//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\
echo($f->apertura());
//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\
if(!isset($_REQUEST['trasmision'])){
 require_once($ROOT."modulos/proveedores/formularios/archivo/eliminar.inc.php");
}else{
 require_once($ROOT."modulos/proveedores/formularios/archivo/eliminar.procesador.php");
}
//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\
echo($f->generar());
echo($f->cierre());
?>