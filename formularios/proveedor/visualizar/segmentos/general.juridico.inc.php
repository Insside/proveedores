<?php

$contactos = new Proveedores_Contactos();
$f->celdas['gn1'] = $f->celda("", "<h2>Persona Jurídica - Información General [ <a href=\"#\" onClick=\"MUI.Proveedores_Actualizar_Perfil('".$valores['proveedor']."');\">Editar</a> ]</h2>");
$f->celdas['gn2'] = $f->celda("", "<h2>Contactos Legales & Comerciales</h2>");
$f->celdas["gn3"] = $f->celda("", "<p>Se considera un contacto comercial a toda persona natural, que permita establecer "
        . "comunicación o relación con el proveedor Jurídico especificado en el presente expediente. "
        . "La gerarquia del contacto está determinada por el cargo desempeñado al interior del ente "
        . "jurídicamente constituido, en instancia más básica y como mínimo el ente jurídico debe tener un "
        . "representante legal, de no poseer este dato el expediente estará incompleto. Para agregar un "
        . "nuevo contacto presione "
        . "[ <a href=\"#\" onClick=\""
        . "MUI.closeWindow($('" . $f->ventana . "'));"
        . "MUI.Proveedores_Contacto_Crear('" . $valores['proveedor'] . "');\">“Nuevo Contacto”</a> ]"
        . ".</p>");
$f->celdas['rut'] = $f->celda("Registro Unico Tributario (RUT):", $f->campos['rut']);
/** Filas * */
$f->fila["gn1"] = $f->fila($f->celdas['gn1']);
$f->fila["gn2"] = $f->fila($f->celdas['proveedor'] . $f->celdas['rut'] . $f->celdas['razon']);
$f->fila["gn3"] = $f->fila($f->celdas['direccion']);
$f->fila["gn4"] = $f->fila($f->celdas['ciudad'] . $f->celdas['region'].$f->celdas['pais']);
$f->fila["gn5"] = $f->fila($f->celdas['telefono'] . $f->celdas['fax'] . $f->celdas['movil']);
$f->fila["gn6"] = $f->fila($f->celdas['correo']);
/** Final * */
$f->fila["general"] = $f->fila["gn1"]
        . $f->fila["gn2"]
        . $f->fila["gn3"]
        . $f->fila["gn4"]
        . $f->fila["gn5"]
        . $f->fila["gn6"];
?>