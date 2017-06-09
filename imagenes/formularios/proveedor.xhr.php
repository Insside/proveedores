<?php 

$ROOT = (!isset($ROOT)) ? "../../../" : $ROOT;
require_once($ROOT . "modulos/proveedores/librerias/Configuracion.cnf.php");
$transaccion = isset($_REQUEST['transaccion']) ? $_REQUEST['transaccion'] : time();
$f =new Forms($transaccion);

//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\
$v['contribuyente'] = @$_REQUEST['contribuyente'];
echo($f->apertura());
//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\
if (empty($v['contribuyente'])) {
 require_once($ROOT . "modulos/proveedores/formularios/proveedor/a-contribuyente.inc.php");
} else {
 $avance = $f->avance("consultar");
 if (($avance == "perfil" || $avance == "") && ($v['contribuyente'] == "01")) {
  require_once($ROOT . "modulos/proveedores/formularios/proveedor/b-natural.inc.php");
 } elseif (($avance == "perfil" || $avance == "") && ($v['contribuyente'] == "02")) {
  require_once($ROOT . "modulos/proveedores/formularios/proveedor/c-juridica.inc.php");
 } elseif ($avance == "clientes") {
  require_once($ROOT . "modulos/proveedores/formularios/proveedor/e-clientes.inc.php");
 } elseif ($avance == "ofrecimiento") {
  require_once($ROOT . "modulos/proveedores/formularios/proveedor/d-ofrecimiento.inc.php");
 } elseif ($avance == "actividades") {
  require_once($ROOT . "modulos/proveedores/formularios/proveedor/f-actividades.inc.php");
 } elseif ($avance == "radicar") {
  require_once($ROOT . "modulos/proveedores/formularios/proveedor/x-radicar.inc.php");
 } elseif ($avance == "bancaria") {
  require_once($ROOT . "modulos/proveedores/formularios/proveedor/h-banco.inc.php");
 } elseif ($avance == "adjuntos") {
  require_once($ROOT . "modulos/proveedores/formularios/proveedor/i-adjuntos.inc.php");
 } elseif ($avance == "fin") {
  require_once($ROOT . "modulos/proveedores/formularios/proveedor/j-fin.inc.php");
 }
}
//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\
echo($f->generar());
echo($f->cierre());
?>