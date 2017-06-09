<?php

$ROOT = (!isset($ROOT)) ? "../../" : $ROOT;
require_once($ROOT . "modulos/proveedores/librerias/Configuracion.cnf.php");
$proveedores = new Proveedores_Perfiles();
$transaccion = isset($_REQUEST['transaccion']) ? $_REQUEST['transaccion'] : time();
$f = new Forms($transaccion);
echo($f->apertura());
/** Campos * */
$f->campos['activos'] = "<div style=\"font-size:55px; font-weight:bold; line-height:55px; text-align:center; color:#FE3233;background-color:#ffffff\">" . $proveedores->conteo("todos") . "</div>";
$f->campos['juridicos'] = "<div style=\"font-size:55px; font-weight:bold; line-height:55px; text-align:center; color:#CCCCCC;background-color:#ffffff\">" . $proveedores->conteo("juridicos") . "</div>";
$f->campos['naturales'] = "<div style=\"font-size:55px; font-weight:bold; line-height:55px; text-align:center; color:#CCCCCC;background-color:#ffffff\">" . $proveedores->conteo("naturales") . "</div>";
/** Celdas * */
$f->celdas["activos"] = $f->celda("Total Proveedores:", $f->campos['activos']);
$f->celdas["juridicos"] = $f->celda("Proveedores Jurídicos:", $f->campos['juridicos']);
$f->celdas["naturales"] = $f->celda("Proveedores Naturales:", $f->campos['naturales']);
/** Filas * */
$f->fila["fila1"] = $f->fila($f->celdas["activos"]);
$f->fila["fila2"] = $f->fila($f->celdas["juridicos"]);
$f->fila["fila3"] = $f->fila($f->celdas["naturales"]);
/** Compilando* */
$f->filas($f->fila["fila1"]);
$f->filas($f->fila["fila2"]);
$f->filas($f->fila["fila3"]);
echo($f->generar());
echo($f->cierre());
?>