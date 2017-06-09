<?php
$fechas=new Fechas();
$pp = new Proveedores_Perfiles();
/** Valores * */
$v['criterio'] = $validaciones->recibir("criterio");
$v['valor'] = $validaciones->recibir("valor");
/** Campos * */
$f->oculto("fechainicial", "2012-01-01");
$f->oculto("fechafinal", $fechas->hoy());
$f->campos['criterio'] =$f->getSelect(array("id" => "criterio" . $f->id,"values" => $pp->getFieldsList(),"label" => "label", "option" => "option", "onChange" => "","selected"=>$v['criterio']));
$f->campos['valor'] = $f->text("valor". $f->id, $v['valor'], "32", "", false);

$f->campos['buscar'] = $f->button("buscar" . $f->id, "submit", "Filtrar");
/** Celdas * */
$f->celdas["criterio"] = $f->celda("Criterio:", $f->campos['criterio']);
$f->celdas["valor"] = $f->celda("Valor:", $f->campos['valor']);
/** Filas * */
$f->fila["fila1"] = $f->fila($f->celdas["criterio"]);
$f->fila["fila2"] = $f->fila($f->celdas["valor"]);
/** Compilando * */
$f->filas($f->fila['fila1']);
$f->filas($f->fila['fila2']);
/** Botones * */
$f->botones($f->campos['buscar'], "inferior-izquierda");
?>