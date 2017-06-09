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
$contactos= new Proveedores_Contactos();
$validaciones=new Validaciones();
$cadenas=new Cadenas();
$contacto = $contactos->consultar($validaciones->recibir("contacto"));
$f->oculto("contacto", $contacto['contacto']);

$html = "Se dispone a eliminar la información de un contacto asociado a un proveedor, esta acción "
        . "es irreversible, para proceder confirme o cancele la presente solicitud, según sus "
        . "requerimientos. <br>"
        . "<br><b>Contacto</b>: " . $contacto['contacto']
        . "<br><b>Nombre</b>: " . $cadenas->capitalizar($contacto['nombres']." ".$contacto['apellidos'])
        . "";
$f->campos['eliminar'] = $f->button("eliminar" . $f->id, "submit", "Confirmar");
$f->campos['cancelar'] = $f->button("cancelar" . $f->id, "button", "Cancelar");
// Celdas$f->celdas['info'] = $f->celda("", $html, "", "notificacion");
$f->celdas['info'] = $f->celda("", $f->mensaje("advertencia", "Advertencia", $html), "", "sinfondo");
// Filas
$f->fila["info"] = $f->fila($f->celdas['info'], "notificacion");
//Compilacion
$f->filas($f->fila['info']);
$f->botones($f->campos['eliminar'], "inferior-derecha");
$f->botones($f->campos['cancelar'], "inferior-derecha");
/** JavaScripts * */
$f->JavaScript("MUI.titleWindow($('" . ($f->ventana) . "'), \"Eliminar Contacto\");");
$f->JavaScript("MUI.resizeWindow($('" . ($f->ventana) . "'), {width: 390, height: 230});");
$f->JavaScript("MUI.centerWindow($('" . $f->ventana . "'));");
$f->eClick("cancelar" . $f->id, "MUI.closeWindow($('" . $f->ventana . "'));");
?>