<?php

/*
 * Copyright (c) 2016, Jose Alexis Correa Valencia
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

$html = "<p>Se le notifica que actualmente no posee ningún rol en el sistema que "
        . "le otorgué los privilegios necesarios para adjuntar archivos y/o "
        . "comprobantes de ningún tipo al expediente de un proveedor, de ser esta "
        . "acción necesaria para dar cumplimiento a sus funciones en el sistema "
        . "deberá solicitar al área o departamento de sistemas informáticos que "
        . "le asigné el permiso que se enuncia en la parte inferior de este mensaje, "
        . "para así poder realizar esta acción.</p>"
        . "<p><b>Permiso Requerido</b>: "
        . "<br>[ PROVEEDORES-ARCHIVOS-ADJUNTAR ]"
        . "</p>";
$f->campos['cancelar'] = $f->button("cancelar" . $f->id, "button", "Cancelar");
// Celdas$f->celdas['info'] = $f->celda("", $html, "", "notificacion");
$f->celdas['info'] = $f->celda("", $f->mensaje("advertencia", "", $html), "", "sinfondo");
// Filas
$f->fila["info"] = $f->fila($f->celdas['info'], "notificacion");
//Compilacion
$f->filas($f->fila['info']);
$f->botones($f->campos['cancelar'], "inferior-derecha");
/** JavaScripts * */
$f->JavaScript("MUI.titleWindow($('" . ($f->ventana) . "'), \"Advertencia: Acceso Denegado\");");
$f->JavaScript("MUI.resizeWindow($('" . ($f->ventana) . "'), {width:480, height:260});");
$f->JavaScript("MUI.centerWindow($('" . $f->ventana . "'));");
$f->eClick("cancelar" . $f->id, "MUI.closeWindow($('" . $f->ventana . "'));");
?>