<?php
$ROOT = (!isset($ROOT)) ? "../../../../../" : $ROOT;
require_once($ROOT . "modulos/proveedores/librerias/Configuracion.cnf.php");
$sesion=new Sesion();
$validaciones=new Validaciones();
/*
 * Copyright (c) 2013, Alexis
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
$usuario=Sesion::usuario();
$v['uid']=$usuario['usuario'];
$v['criterio']=$validaciones->recibir("criterio");
$v['valor']=$validaciones->recibir("valor");
$v['inicio']=$validaciones->recibir("inicio");
$v['fin']=$validaciones->recibir("fin");
$v['transaccion']=$validaciones->recibir("transaccion");
$v['url']="modulos/proveedores/formularios/proveedores/consultar/consultar.json.php?"
        . "uid=".$v['uid']
        . "&criterio=".$v['criterio']
        . "&valor=".$v['valor']
        . "&inicio=".$v['inicio']
        . "&fin=".$v['fin']
        . "&transaccion=".$v['transaccion'];

/** Creación de la tabla **/
$tabla = new Grid(array("id" =>"Grid_". time(), "url" => $v['url'],"perPageOptions"=>array(25,50,100,200,400,800,1600)));
$tabla->boton('btnVer', 'Visualizar', 'proveedor', "MUI.Proveedores_Proveedor_Consultar", "pAbrir");
$tabla->boton('btnCrear', 'Crear', '', "MUI.Proveedores_Proveedor_Crear", "new");
//$tabla->boton('btnEstado', 'Estado', 'usuario', "MUI.Usuarios_Usuario_Estado", "pEliminar");
//$tabla->boton('btnModificar', 'Modificar', 'usuario', "MUI.Usuarios_Usuario_Modificar", "edit");
$tabla->boton('btnBuscar', 'Buscar', '', "MUI.Proveedores_Complementos_Busqueda", "pBuscar");
//$tabla->boton('btnRoles', 'Roles', 'usuario', "MUI.Usuarios_Usuario_Roles", "pRoles");
$tabla->columna('cProveedor', 'Proveedor', 'proveedor', 'string', '90', 'center', 'false');
$tabla->columna('cRUT', 'R.U.T', 'rut', 'string', '100', 'right', 'false');
$tabla->columna('cDetalle', 'Detalles', 'detalle', 'string', '350', 'left', 'false');
//$tabla->columna('cEstado', 'E', 'iconoestado', 'string', '25', 'center', 'false');
//$tabla->columna('cAliasl', 'Alias', 'alias', 'string', '100', 'left', 'false');
$tabla->columna('cEstados', 'Estados', 'estados', 'string', '75', 'center', 'false');
$tabla->columna('cPagos', 'Pagos', 'pagos', 'string', '100', 'right', 'false');
$tabla->columna('cFecha', 'Fecha', 'fecha', 'date', '90', 'center', 'false');
$tabla->columna('cHora', 'Hora', 'hora', 'string', '90', 'center', 'false');
$tabla->generar();
?>