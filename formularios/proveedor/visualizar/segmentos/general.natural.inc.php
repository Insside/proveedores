<?php
/** Celdas **/
$f->celdas['gn1'] =$f->celda("","<h2>Información General [ <a href=\"#\" onClick=\"MUI.Proveedores_Actualizar_Perfil('".$valores['proveedor']."');\">Editar</a> ]</h2>");
$f->celdas['gn2'] =$f->celda("","<h2>Localización / Contacto</h2>");
$f->celdas['gn3'] =$f->celda("","<h2>Información Telefonica y/o de Contacto</h2>");
$f->celdas['rut']=$f->celda("Registro Unico Tributario (RUT):",$f->campos['rut']);
$f->celdas['nombre_comercial'] = $f->celda("Alias Comercial:", $cadenas->capitalizar($f->campos['razon']));
/** Filas * */
$f->fila["gn1"] = $f->fila($f->celdas['gn1']);
$f->fila["gn2"] = $f->fila($f->celdas['proveedor'] .$f->celdas['rut'].$f->celdas['nombre_comercial']);
$f->fila["gn3"]=$f->fila($f->celdas['documento']. $f->celdas['identificacion'] .$f->celdas['nombres'] . $f->celdas['apellidos']);
$f->fila["gn4"] = $f->fila($f->celdas['gn2']);
$f->fila["gn5"] = $f->fila($f->celdas['direccion'] . $f->celdas['pais'] . $f->celdas['region'] . $f->celdas['ciudad']);
$f->fila["gn6"] = $f->fila($f->celdas['gn3']);
$f->fila["gn7"] = $f->fila($f->celdas['telefono'] . $f->celdas['fax'] . $f->celdas['movil']);
$f->fila["gn8"] = $f->fila($f->celdas['correo']);
/** Final **/
$f->fila["general"] =$f->fila["gn1"].
        $f->fila["gn2"].
        $f->fila["gn3"].
        $f->fila["gn4"].
        $f->fila["gn5"].
        $f->fila["gn6"].
        $f->fila["gn7"].
        $f->fila["gn8"];
?>