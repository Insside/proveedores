<?php
$ofertas=new Proveedores_Ofertas();
$ofertables=new Proveedores_Ofertables();
/** Celdas **/
$f->celdas['l1'] =$f->celda("","<h2>Línea de bienes y/o servicios ofrecidos.</h2>");
$f->celdas['l2'] = $f->celda("",$ofertables->tabla($valores['proveedor']),"oferta".$f->id,"tOferta");
/** Filas **/
$f->fila["l1"] = $f->fila($f->celdas['l1']);
$f->fila["l2"] = $f->fila($f->celdas['l2']);
/** Final **/
$f->fila["linea"]=$f->fila["l1"].$f->fila["l2"];

?>