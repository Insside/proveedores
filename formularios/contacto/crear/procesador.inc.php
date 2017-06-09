<?php
$cadenas = new Cadenas();
$fechas = new Fechas();
$validaciones = new Validaciones();
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
/** Clase representativa Del Objeto **/
$clase=new Proveedores_Contactos();
/** Campos Recibidos **/
$datos=array();
$datos['contacto']=$validaciones->recibir("contacto");
$datos['identificacion']=$validaciones->recibir("identificacion");
$datos['documento']=$validaciones->recibir("documento");
$datos['nombres']=$validaciones->recibir("nombres");
$datos['apellidos']=$validaciones->recibir("apellidos");
$datos['direccion']=$validaciones->recibir("direccion");
$datos['telefonos']=$validaciones->recibir("telefonos");
$datos['email']=$validaciones->recibir("email");
$datos['fecha']=$validaciones->recibir("fecha");
$datos['hora']=$validaciones->recibir("hora");
$datos['proveedor']=$validaciones->recibir("proveedor");
$datos['cargo']=$validaciones->recibir("cargo");
$datos['creador']=$validaciones->recibir("creador");
$codigo=$clase->crear($datos);
/** JavaScript **/
$f->windowClose();
$f->JavaScript("MUI.Proveedores_Proveedor_Consultar('".$datos['proveedor']."');");
?>