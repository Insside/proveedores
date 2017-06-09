<?php

// Variables Declaradas
$componentes = new Componentes();
$bancos = new Bancos();
$proveedores = new Proveedores();
$proveedor = $proveedores->consultar($_REQUEST['proveedor']);
//\\//\\//\\//\\//\\//\\//\\
$f->oculto("proveedor", $proveedor['proveedor']);
$f->avance("establecer", "adjuntos"); // Destino de los datos o siguiente paso a controlar
$html = "<h2>Información Bancaria</h2>";
$html.="<p>Si el proveedor desea que sus pagos se realicen directamente por consignación bancaria deberá proporcionar la siguiente información a completitud y presentar copia escaneada de la certificación de la cuenta bancaria. Recuerde si el proveedor solicita que los pagos se realicen mediante consignación bancaria deberá selecciona si en la casilla correspondiente.</p>";
$f->campos['consignacion'] = $componentes->combo_sino("consignacion", $proveedor['consignacion']);
$f->campos['banco_entidad'] = $bancos->combo("bancoentidad", $proveedor['banco_entidad']);
$f->campos['banco_tipo_cuenta'] = $bancos->combo_tipo_cuenta("bancotipocuenta", $proveedor['banco_tipo_cuenta']);
$f->campos['banco_cuenta'] = $f->text('bancocuenta', $proveedor['banco_cuenta'], '128', '', false, false, "");
$f->campos['banco_cuenta_titular'] = $f->text('banco_cuenta_titular', $proveedor['banco_cuenta_titular'], '254', '', false, false, "");
$f->campos['anterior'] = $f->button("cancelar" . $f->id, "button", "Cancelar");
$f->campos['siguiente'] = $f->button("siguiente" . $f->id, "submit", "Actualizar");
// Celdas
$f->celdas['info'] = $f->celda("", $html);
$f->celdas['consignacion'] = $f->celda("Aceptaría que se le consigne en su cuenta bancaria:", $f->campos['consignacion']);
$f->celdas['banco_entidad'] = $f->celda("Entidad Bancaria:", $f->campos['banco_entidad']);
$f->celdas['banco_tipo_cuenta'] = $f->celda("Tipo De Cuenta:", $f->campos['banco_tipo_cuenta']);
$f->celdas['banco_cuenta'] = $f->celda("Numero Cuenta Bancaria::", $f->campos['banco_cuenta']);
$f->celdas['banco_cuenta_titular'] = $f->celda("Titular Cuenta Bancaria:", $f->campos['banco_cuenta_titular']);
// Filas
$f->fila["fila0"] = $f->fila($f->celdas['info']);
$f->fila["fila1"] = $f->fila($f->celdas['consignacion']);
$f->fila["fila2"] = $f->fila($f->celdas['banco_cuenta'] . $f->celdas['banco_tipo_cuenta']);
$f->fila["fila3"] = $f->fila($f->celdas['banco_entidad']);
$f->fila["fila4"] = $f->fila($f->celdas['banco_cuenta_titular']);
//Compilacion
$f->filas($f->fila['fila0']);
$f->filas($f->fila['fila1']);
$f->filas($f->fila['fila2']);
$f->filas($f->fila['fila3']);
$f->filas($f->fila['fila4']);
/** Botones * */
$f->botones($f->campos['siguiente'], "inferior-derecha");
$f->botones($f->campos['anterior'], "inferior-derecha");
/** JavaScript * */
$f->JavaScript("MUI.resizeWindow($('" . ($f->ventana) . "'), {width: 480, height: 370});");
$f->JavaScript("MUI.centerWindow($('" . $f->ventana . "'));");
$f->eClick("cancelar" . $f->id, "MUI.closeWindow($('" . $f->ventana . "'));");
?>