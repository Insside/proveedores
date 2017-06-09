<?php
$ROOT = (!isset($ROOT)) ? "../../../../../../../" : $ROOT;
require_once($ROOT . "modulos/proveedores/librerias/Configuracion.cnf.php");
/** Clases **/
$sesion=new Sesion();
$validaciones=new Validaciones();
/*
 * Este archivo XHR retorna las estadisticas asociadas a las solicitudes procesadas por un usuario
 * del sistema las cuales a saber estan distribuidas como recibidas, procesadas y pendientes.
 * La información se proporsiona en cifras y prorcentajes exactos. 
 * 
 * Copyright (c) 2015, Jose Alexis Correa Valencia
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

/** Variables **/
$usuario=Sesion::usuario();
$pp=new Proveedores_Perfiles();
$id_naturales="naturales".time();
$id_juridicos="juridicos".time();
$naturales=$pp->getConteoNaturales();
$juridicos=$pp->getConteoJuridicos();

$total=$naturales+$juridicos;
echo("<div id=\"".$id_naturales."\"></div>");
echo("<div id=\"".$id_juridicos."\"></div>");

echo("<script>");
echo("new MUI.Score('$id_naturales',{'title':'Naturales','number':'$naturales','total':'$total','link':'javascript::MUI.Solicitudes_Propias_Pendientes();'});");
echo("new MUI.Score('$id_juridicos',{'title':'Juridicos','number':'$juridicos','total':'$total'});");
echo("</script>");
?>


<hr>
<p class="nota">
Para poder postularse como oferente en los procesos de menor cuantía el ciudadano o empresa debe inscribirse previamente en el directorio de proponentes. 
</p>
<hr>
<p>El término oferente se refiere a la persona natural o jurídica que está en capacidad de ofrecer bienes o servicios a una entidad.
</p>