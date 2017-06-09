<?php

$ROOT = (!isset($ROOT)) ? "../../../../" : $ROOT;
require_once($ROOT . "modulos/aplicacion/librerias/Configuracion.cnf.php");
/*
 * Copyright (c) 2014, Jose Alexis Correa Valencia
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *
 * * Redistributions of source code must retain the above copyright notice, this
 *   list of conditions and the following disclaimer.
 * * Redistributions in binary form must reproduce the above copyright notice,
 *   this list of conditions and the following disclaimer in the documentation
 *   and/or other materials provided with the distribution.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 */

$transaccion = isset($_REQUEST['transaccion']) ? $_REQUEST['transaccion'] : time();
$f = new Forms($transaccion);
echo($f->apertura());

$f->campos['continuar'] = $f->button("cancelar" . $f->id, "button", "Cerrar");

$f->celdas['icono'] = "<div class=\"i100x100_advertencia\" style=\"float: left;\"></div>";
$f->celdas['info'] = "<p><u><b>Advertencia</b></u>: El cambio en el tipo de documento que "
        . "identificación de un proveedor, puede generar un cambio en el tipo de naturaleza "
        . "explicita del mismo, alternando entre persona natural o jurídica dependiendo del tipo "
        . "de documento indicado. <u><i>Si su objetivo es cambiar tipificación del proveedor seleccione "
        . "el nuevo tipo de documento de identificación, verifique el número de identidad "
        . "tributaria, el digito de comprobación y presione actualizar</i></u>. </p>";
$f->filas['info'] = $f->fila($f->celdas['icono'] . $f->celdas['info']);

$f->fila($f->filas['info']);
$f->botones($f->campos['continuar'], "inferior-derecha");
/** JavaScripts * */
$f->JavaScript("MUI.resizeWindow($('" . ($f->ventana) . "'), {width: 480, height: 180});");
$f->JavaScript("MUI.centerWindow($('" . $f->ventana . "'));");
$f->eClick("cancelar" . $f->id, "MUI.closeWindow($('" . $f->ventana . "'));");
echo($f->generar());
echo($f->controles());
echo($f->cierre());
?>