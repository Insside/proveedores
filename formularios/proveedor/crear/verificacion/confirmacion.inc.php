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
 *
 * Recibe la identificación de un proveedor y permite consultar si el proveedor se hallaba registrado
 * o no en el sistema.
 *
 */
$cadenas = new Cadenas();
$proveedores = new Proveedores();
$documentos = new Proveedores_Documentos();
$identificacion = @$_REQUEST["identificacion"];
$proveedor = $proveedores->identificacion($identificacion);
if (!empty($proveedor)) {
  $html = ""
          . "El número de identificación tributaria que ha ingresado se encuentra registrado en "
          . "el sistema, si desea actualizar la información relacionada con el mismo presione el botón "
          . "<b><i><u>Visualizar</u></i></b> "
          . "en la parte inferior a este mensaje."
          . "<br><b>Proveedor</b>: " . $proveedor['proveedor']
          . "<br><b>Identificación Tributaria</b>: " . $proveedor['documento'] . "" . $proveedor['identificacion'] . "-" . $proveedor['digito']
          . "<br><b>Razon Social</b>: " . $cadenas->capitalizar($proveedor['razon'])
          . "";
} else {
  $html = "El número de identificación ha sido verificado contra los proveedores registrados en el sistema para "
          . "crear el registro correspondiente a este nuevo proveedor presione continuar en la parte inferior a este "
          . "mensaje."
          . "Si desea información adicional de los tipos de proveedores, presione el botón Ayuda."
          . "";
}
/** Valores * */
$v['identificacion'] = @$_REQUEST['identificacion'];

if (!empty($proveedor)) {
  $f->oculto("destino", "confirmacion");
  //$f->campos['contribuyente'] = $componentes->combo_contribuyente("contribuyente", @$v['contribuyente']);
  $f->campos['identificacion'] = $f->text('identificacion', $v['identificacion'], '', 'required', false, false, "");
  $f->campos['cancelar'] = $f->button("cancelar" . $f->id, "button", "Cancelar");
  $f->campos['verificar'] = $f->button("continuar" . $f->id, "submit", "Continuar");
  $f->campos['visualizar'] = $f->button("visualizar" . $f->id, "button", "Visualizar", "visualizar", "");
  $f->celdas['info'] = $f->celda("", $f->mensaje("advertencia", "Proveedor Existente", $html), "", "sinfondo");
  $f->fila["info"] = $f->fila($f->celdas['info']);
  $f->filas($f->fila["info"]);
  $f->botones($f->campos['visualizar'], "inferior-derecha");
  $f->JavaScript("MUI.titleWindow($('" . ($f->ventana) . "'), \"Verificando Proveedor\");");
  $f->JavaScript("MUI.resizeWindow($('" . ($f->ventana) . "'), {width: 480, height: 200});");
  $f->JavaScript("MUI.centerWindow($('" . ($f->ventana) . "'));");
  $f->eClick("visualizar" . $f->id, "MUI.Proveedores_Proveedor_Consultar('" . $proveedor['proveedor'] . "');MUI.closeWindow($('" . $f->ventana . "'));");
} else {
  $f->oculto("destino", "naturaleza");
  $f->campos['documento'] = $documentos->combo("documento", "CC");
  $f->campos['identificacion'] = $f->text('identificacion', $v['identificacion'], '', 'codigo required', true, false, "");
  $f->campos['ayuda'] = $f->button("ayuda" . $f->id, "button", "Ayuda");
  $f->campos['cancelar'] = $f->button("cancelar" . $f->id, "button", "Cancelar");
  $f->campos['verificar'] = $f->button("continuar" . $f->id, "submit", "Continuar");
  $f->campos['visualizar'] = $f->button("visualizar" . $f->id, "button", "Visualizar", "visualizar", "");
  $f->celdas['informacion'] = $f->celda("", $f->mensaje("advertencia", "Registrar", $html), "", "sinfondo");
  $f->celdas['identificacion'] = $f->celda("Identificación", $f->campos['identificacion']);
  $f->celdas['documento'] = $f->celda("Tipo De Documento:", $f->campos['documento']);
  $f->fila["informacion"] = $f->fila($f->celdas['informacion']);
  $f->fila["datos"] = $f->fila($f->celdas['identificacion'] . $f->celdas['documento']);
  $f->filas($f->fila["informacion"]);
  $f->filas($f->fila["datos"]);
  $f->botones($f->campos['ayuda'], "inferior-izquierda");
  $f->botones($f->campos['cancelar'], "inferior-derecha");
  $f->botones($f->campos['verificar'], "inferior-derecha");
  $f->JavaScript("MUI.titleWindow($('" . ($f->ventana) . "'), \"Verificando Proveedor\");");
  $f->JavaScript("MUI.resizeWindow($('" . ($f->ventana) . "'), {width: 480, height: 230});");
  $f->JavaScript("MUI.centerWindow($('" . ($f->ventana) . "'));");
  $f->eClick("cancelar" . $f->id, "MUI.closeWindow($('" . $f->ventana . "'));");
  $f->eClick("ayuda" . $f->id, "MUI.Proveedores_Ayuda_Naturaleza();");
}
// JavaScripts
//$f->JavaScript("\$('" . $pifid . "').setStyle('display', 'none');");
?>