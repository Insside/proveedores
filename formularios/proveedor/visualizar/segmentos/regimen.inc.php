<?php
$responsabilidades=new Proveedores_Responsabilidades();
/** Celdas **/
$f->celdas['r1'] =$f->celda("","<h2>Régimen Contributivo</h2>");
$f->celdas['r2'] =$f->celda("Responsabilidades Tributarias","<p>En el RUT de todo contribuyente se le asignan una serie de responsabilidades u obligaciones tributarias, que varían según el tipo de contribuyente y el tipo de actividades que desarrolla cada uno. Estas responsabilidades están identificadas con un código, el cual figura en el RUT, permitiendo a quien lo consulte, conocer las responsabilidades tributarias de ese contribuyente, algo muy necesario cuando se hace un pago a este proveedor. Para actualizar las responsabilidades tributarias ingrese a [ Actualizar ].</p>");
$f->celdas['r3'] = $f->celda("",$responsabilidades->tabla($valores['proveedor']),"contactos".$f->id,"tResponsabilidades");
/** Filas **/
$f->fila["r1"] = $f->fila($f->celdas['r1']);
$f->fila["r2"] = $f->fila($f->celdas['regimen']);
$f->fila["r3"] = $f->fila($f->celdas['r2']);
$f->fila["r4"] = $f->fila($f->celdas['r3']);
/** Final **/
$f->fila["regimen"]=$f->fila["r1"].$f->fila["r2"].$f->fila["r3"].$f->fila["r4"];

?>