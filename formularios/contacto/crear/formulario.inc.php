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

/** Variables * */
$cadenas = new Cadenas();
$fechas = new Fechas();
$paises = new Paises();
$regiones = new Regiones();
$ciudades = new Ciudades();
$sectores = new Sectores();
$cargos = new Cargos();
$documentos = new Proveedores_Documentos();
$validaciones=new Validaciones();
/** Valores * */
$valores['contacto'] = time();
$valores['identificacion'] =$validaciones->recibir("identificacion"); 
$valores['documento'] = $validaciones->recibir("documento"); 
$valores['nombres'] = $validaciones->recibir("apellidos"); 
$valores['apellidos'] = $validaciones->recibir("identificacion"); 
$valores['direccion'] = $validaciones->recibir("direccion"); 
$valores['telefonos'] = $validaciones->recibir("telefonos"); 
$valores['correo'] =$validaciones->recibir("correo"); 
$valores['fecha'] = $fechas->hoy();
$valores['hora'] = $fechas->ahora();
$valores['proveedor'] = $validaciones->recibir("proveedor"); 
$valores['cargo'] = $validaciones->recibir("cargo"); 
/** Campos * */
$f->campos['contacto'] = $f->text("contacto", $valores['contacto'], "10", "required codigo", true);
$f->campos['identificacion'] = $f->text("identificacion", $valores['identificacion'], "16", "required", false);
$f->campos['documento'] = $documentos->combo("documento", $valores['documento']);
$f->campos['nombres'] = $f->text("nombres", $valores['nombres'], "255", "required", false);
$f->campos['apellidos'] = $f->text("apellidos", $valores['apellidos'], "255", "required", false);
$f->campos['direccion'] = $f->text("direccion", $valores['direccion'], "128", "required", false);
$f->campos['telefonos'] = $f->text("telefonos", $valores['telefonos'], "128", "required", false);
$f->campos['correo'] = $f->text("correo", $valores['correo'], "255", "required", false);
$f->campos['fecha'] = $f->text("fecha", $valores['fecha'], "10", "required automatico", true);
$f->campos['hora'] = $f->text("hora", $valores['hora'], "8", "required automatico", true);
$f->campos['proveedor'] = $f->text("proveedor", $valores['proveedor'], "10", "codigo", true);
$f->campos['cargo'] = $cargos->combo("cargo", $valores['cargo']);
$f->campos['ayuda'] = $f->button("ayuda" . $f->id, "button", "Ayuda");
$f->campos['cancelar'] = $f->button("cancelar" . $f->id, "button", "Cancelar");
$f->campos['registrar'] = $f->button("registrar" . $f->id, "submit", "Registrar");
/** Celdas * */
$f->celdas["contacto"] = $f->celda("Contacto:", $f->campos['contacto']);
$f->celdas["identificacion"] = $f->celda("Identificación:", $f->campos['identificacion']);
$f->celdas["documento"] = $f->celda("Documento:", $f->campos['documento']);
$f->celdas["nombres"] = $f->celda("Nombres:", $f->campos['nombres']);
$f->celdas["apellidos"] = $f->celda("Apellidos:", $f->campos['apellidos']);
$f->celdas["direccion"] = $f->celda("Dirección:", $f->campos['direccion']);
$f->celdas["telefonos"] = $f->celda("Teléfonos :", $f->campos['telefonos'], "", "w100px");
$f->celdas["correo"] = $f->celda("Correo Electrónico:", $f->campos['correo']);
$f->celdas["fecha"] = $f->celda("Fecha:", $f->campos['fecha'], "", "w100px");
$f->celdas["hora"] = $f->celda("Hora:", $f->campos['hora'], "", "w100px");
$f->celdas["proveedor"] = $f->celda("Proveedor:", $f->campos['proveedor']);
$f->celdas["cargo"] = $f->celda("Cargo:", $f->campos['cargo']);
/** Filas * */
$f->fila["fila1"] = $f->fila($f->celdas["contacto"] . $f->celdas["proveedor"] . $f->celdas["identificacion"] . $f->celdas["documento"]);
$f->fila["fila2"] = $f->fila($f->celdas["cargo"]);
$f->fila["fila3"] = $f->fila($f->celdas["nombres"] . $f->celdas["apellidos"] . $f->celdas["direccion"]);
$f->fila["fila4"] = $f->fila($f->celdas["correo"] . $f->celdas["telefonos"] . $f->celdas["fecha"] . $f->celdas["hora"]);
/** Compilando * */
$f->filas($f->fila['fila1']);
$f->filas($f->fila['fila2']);
$f->filas($f->fila['fila3']);
$f->filas($f->fila['fila4']);
/** Botones * */
$f->botones($f->campos['ayuda'], "inferior-izquierda");
$f->botones($f->campos['cancelar'], "inferior-derecha");
$f->botones($f->campos['registrar'], "inferior-derecha");
/** JavaScript * */
$f->JavaScript("MUI.resizeWindow($('" . ($f->ventana) . "'), {width: 640, height: 300});");
$f->JavaScript("MUI.centerWindow($('" . $f->ventana . "'));");
$f->eClick("cancelar" . $f->id, ""
        . "MUI.Proveedores_Proveedor_Consultar('".$valores['proveedor']."');"
        . "MUI.closeWindow($('" . $f->ventana . "'));");
?>
