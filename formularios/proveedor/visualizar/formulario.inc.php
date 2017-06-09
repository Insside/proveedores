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

/** Valores * */
$cadenas = new Cadenas();
$pp = new Proveedores_Perfiles();
$valores = $pp->consultar($validaciones->recibir("proveedor"));
/** Campos * */
$persona = $pp->getPersona($valores["documento"]);
/** Campos * */
require_once($_path . "/campos.inc.php");
require_once($_path . "/celdas.inc.php");
require_once($_path . "/segmentos/general.inc.php");
require_once($_path . "/segmentos/contactos.inc.php");
require_once($_path . "/segmentos/regimen.inc.php");
require_once($_path . "/segmentos/pagos.inc.php");
require_once($_path . "/segmentos/linea.inc.php");
require_once($_path . "/segmentos/actividades.inc.php");
require_once($_path . "/segmentos/archivos.inc.php");
$fid = $f->id;
$f->campos['cerrar'] = $f->button("cerrar" . $f->id, "button", "Cerrar");
$f->campos['ayuda'] = $f->button("actualizar" . $f->id, "button", "Ayuda");
/** Tabs * */
$tp = new TabbedPane(array("pagesHeight" => "410px"));
$tp->addTab("Empresa", "empresa", $f->fila["general"]);
if ($persona != "Natural") {
    $tp->addTab("Contactos", "mensaje", $f->fila["contactos"]);
}
$tp->addTab("Regimen", "regimen", $f->fila["regimen"]);
$tp->addTab("Pagos", "pagos", $f->fila["pagos"]);
$tp->addTab("Linea", "oferta", $f->fila["linea"]);
$tp->addTab("Actividades", "portafolio", $f->fila["actividades"]);
$tp->addTab("Archivos", "adjunto", $f->fila["archivos"]);

/** Compilando * */
$f->filas($tp->getPane());
/** Botones * */
$f->botones($f->campos["cerrar"], "inferior-derecha");
$f->botones($f->campos["ayuda"], "inferior-izquierda");
/** JavaScripts * */
$f->JavaScript("MUI.titleWindow($('" . $f->ventana . "'),'Proveedor / " . $valores['razon'] . " <span class=\"version\"> v.1.5</span>');");
$f->JavaScript("MUI.resizeWindow($('" . ($f->ventana) . "'), {width: 800, height:500});");
$f->JavaScript("MUI.centerWindow($('" . $f->ventana . "'));");
$f->eClick("cerrar" . $f->id, "MUI.closeWindow($('" . $f->ventana . "'));");
$f->eClick("actualizar" . $f->id, "MUI.closeWindow($('" . $f->ventana . "'));;MUI.Proveedores_Proveedor_Modificar('" . $valores['proveedor'] . "');");
?>