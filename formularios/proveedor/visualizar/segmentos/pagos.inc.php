<?php

/** Celdas **/
$f->celdas['p1'] =$f->celda("","<h2>Información Relativa a Pagos</h2>");
$f->celdas['p2'] =$f->celda("","<p>Cada proveedor puede solicitar que sus pagos se realicen directamente a su cuenta bancaria, para lo cual siendo persona natural o jurídica deberá presentar la certificación bancaria correspondiente, la cual deberá ser escaneada y adjuntada a este perfil, la existencia de la información bancaria y la solicitud de que el pago se realice por este medio están contempladas en este segmento.Para actualizar los datos de la cuenta bancaria registrada para este proveedor ingrese a [ actualizar ].</p>");
$f->celdas['consignacion'] = $f->celda("Consignacion", $f->campos['consignacion'], "", "w50");
$f->celdas['banco_entidad'] = $f->celda("Entidad Financiera / Banco:", $f->campos['banco_entidad'], "", "w300");
$f->celdas['banco_tipo_cuenta'] = $f->celda("Tipo Cuenta:", $f->campos['banco_tipo_cuenta']);
$f->celdas['banco_cuenta'] = $f->celda("Número de cuenta:", $f->campos['banco_cuenta']);
$f->celdas['banco_cuenta_titular'] = $f->celda("Titular Bancario", $f->campos['banco_cuenta_titular'], "", "w300");


/** Filas **/
$f->fila["p1"] = $f->fila($f->celdas['p1']);
$f->fila['p2'] = $f->fila($f->celdas['p2']);
$f->fila["p3"] = $f->fila($f->celdas['consignacion'] . $f->celdas['banco_entidad'] . $f->celdas['banco_tipo_cuenta']);
$f->fila["p4"] = $f->fila($f->celdas['banco_cuenta'] . $f->celdas['banco_cuenta_titular']);

/** Final **/
$f->fila["pagos"]=$f->fila["p1"].$f->fila["p2"].$f->fila["p3"].$f->fila["p4"];

?>