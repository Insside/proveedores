<?php
$actividades = new Proveedores_Actividades();
$html['info'] = "<h2>3. Actividades económicas. [ <a href=\"#\" onClick=\"MUI.Proveedores_Actualizar_Actividades('" . $valores['proveedor'] . "');\">Editar</a> ]</h2>";
$html['info'].= "<p>Para efectos del control y determinación de los impuestos y demás obligaciones tributarias, aduaneras y cambiarias administradas por la Unidad Administrativa Especial Dirección de Impuestos y Aduanas Nacionales el RUP debe contener las actividades comerciales codificadas que desarrolla el proveedor.</p>";
/** Celdas **/
$f->celdas['ac1'] = $f->celda("", $html['info']);
$f->celdas['ac2'] = $f->celda("",$actividades->tabla($valores['proveedor']),"actividades".$f->id,"tActividades");
/** Filas **/
$f->fila['af1'] = $f->fila($f->celdas['ac1']);
$f->fila["af2"] = $f->fila($f->celdas['ac2']);
/** Final **/
$f->fila['actividades']=$f->fila['af1'].$f->fila['af2'];
?>