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
$ofertables=new Proveedores_Ofertables();
$proveedores=new Proveedores();
$proveedor=$proveedores->consultar(@$_REQUEST['proveedor']);

$_REQUEST['_oferta']=$ofertables->implode_oferta($proveedor['proveedor']);
$f->oculto("proveedor",$proveedor['proveedor']);

$html="<p>Seleccione y agregue los productos y/o servicios que el proveedor ofertara a la entidad, a mayor detalle mayor probabilidad de aparecer en las búsquedas.</p>";
$f->campos['cliente_empresa1']=$f->text("cliente_empresa1",@$_REQUEST['cliente_empresa1'],"128","requiredNONO",false,false,"Empresa");
$f->campos['oferta']=$ofertables->seleccion("oferta");
$f->campos['anterior']=$f->button("anterior".$transaccion,"submit","Anterior");
$f->campos['limpiar']=$f->button("limpiar".$transaccion,"button","Limpiar","clearJsMultipleSelect");
$f->campos['actualizar']=$f->button("actualizar".$transaccion,"submit","Actualizar");
// Celdas
$f->celdas['info']=$f->celda("",$html);
$f->celdas['oferta']=$f->celda("",$f->campos['oferta']);
// Filas
$f->fila["info"]=$f->fila($f->celdas['info']);
$f->fila["oferta"]=$f->fila($f->celdas['oferta']);
//Compilacion
$f->filas($f->fila['info']);
$f->filas($f->fila['oferta']);
$f->botones($f->campos['actualizar']);
?>
<style>
  #iMulti div.firstSelection .left,div.secondSelection .left {width: 50%;float:left; height: 290px;}
  #iMulti div.firstSelection .right,div.secondSelection .right {width: 50%;float:right;height: 290px;}
  #iMulti div.firstSelection ul {border-color: #CCCCCC !important;height: 261px;}
</style>
<script type="text/javascript">
  MUI.resizeWindow($('<?php echo($f->ventana); ?>'), {width: 640, height: 430, top: 0, left: 0});
  MUI.centerWindow($('<?php echo($f->ventana); ?>'));
</script>

