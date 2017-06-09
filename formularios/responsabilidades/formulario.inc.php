<?php
$validaciones=new Validaciones();
$responsabilidades = new Proveedores_Responsabilidades();
$proveedores = new Proveedores();
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
$proveedor = $proveedores->consultar($validaciones->recibir("proveedor"));
$desarrolladas = $responsabilidades->implode_desarrolladas($proveedor['proveedor']);
/** Campos **/
$f->oculto("proveedor", $proveedor['proveedor']);
$html = "<p>Para efectos del control y determinación de los impuestos y demás obligaciones tributarias, aduaneras y cambiarias administradas por la Unidad Administrativa Especial Dirección de Impuestos y Aduanas Nacionales, seleccione las actividades económicas que aplican al proveedor que desea registrar:</p>";
$f->campos['responsabilidades'] = $responsabilidades->seleccion("responsabilidades",$proveedor['proveedor']);
$f->campos['anterior'] = $f->button("anterior" . $transaccion, "submit", "Anterior");
$f->campos['limpiar'] = $f->button("limpiar" . $transaccion, "button", "Limpiar", "clearJsMultipleSelect");
$f->campos['actualizar'] = $f->button("actualizar" . $transaccion, "submit", "Actualizar");
// Celdas
$f->celdas['responsabilidades'] = $f->celda("", $f->campos['responsabilidades']);
// Filas
$f->fila["responsabilidades"] = $f->fila($f->celdas['responsabilidades']);
//Compilacion
$f->filas($f->fila['responsabilidades']);
$f->botones($f->campos['actualizar'],"inferior-derecha");
/** JavaScripts **/
$f->JavaScript("MUI.titleWindow($('" . ($f->ventana) . "'), \"Actualizar Responsabilidades\");");
$f->JavaScript("MUI.resizeWindow($('" . ($f->ventana) . "'), {width: 750, height: 360});");
$f->JavaScript("MUI.centerWindow($('" . $f->ventana . "'));");
?>
<style>
  #iMulti div.firstSelection .left,div.secondSelection .left {width: 50%;float:left; height: 290px;}
  #iMulti div.firstSelection .right,div.secondSelection .right {width: 50%;float:right;height: 290px;}
  #iMulti div.firstSelection ul {border-color: #CCCCCC !important;height: 261px;}
</style>