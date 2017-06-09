<?php

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
$html = "<div class=\"i100x100_advertencia\" style=\"float: left;\"></div>";
$html.="<div class=\"notificacion\"><p><b>Consultar.</b><br>";
$html.="Por favor ingrese el RUT/NIT/CC/CE que identifica el proveedor que desea ingresar, si el proveedor se encuentra registrado en nuestro sistema se le ofertara la opción de visualizar la información relacionada con el mismo, en caso contrario se le permitirá proceder con el registro como un nuevo proveedor relacionado en e sistema.";
$html.="<b>Proveedor</b>: ";
$html.="</p></div>";
/** Campos * */
$f->oculto("destino", "confirmacion");
$f->campos['identificacion'] = $f->text('identificacion', '', '', 'required', false, false, "");
$f->campos['cancelar'] = $f->button("cancelar" . $f->id, "button", "Cancelar");
$f->campos['verificar'] = $f->button("verificar" . $f->id, "submit", "Verificar");
/** Celdas * */
$f->celdas['identificacion'] = $f->celda("Identificación Tributaria", $f->campos['identificacion']);
$f->celdas['info'] = $f->celda("", $html);
/** Filas * */
$f->fila["identificacion"] = $f->fila($f->celdas['identificacion']);
$f->fila["info"] = $f->fila($f->celdas['info']);
/** Compilando * */
$f->filas($f->fila["info"]);
$f->filas($f->fila["identificacion"]);
$f->botones($f->campos['cancelar'], "inferior-derecha");
$f->botones($f->campos['verificar'], "inferior-derecha");
// JavaScripts
//$f->JavaScript("\$('" . $pifid . "').setStyle('display', 'none');");
$f->JavaScript("MUI.titleWindow($('" . ($f->ventana) . "'), \"Verificando Proveedor\");");
$f->JavaScript("MUI.resizeWindow($('" . ($f->ventana) . "'), {width: 480, height: 300});");
$f->JavaScript("MUI.centerWindow($('" . ($f->ventana) . "'));");
$f->eClick("cancelar" . $f->id, "MUI.closeWindow($('" . $f->ventana . "'));");
?>