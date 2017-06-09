<?php

$contactos = new Proveedores_Contactos();
$f->celdas['cn1'] = $f->celda("", "<h2>Contactos Legales & Comerciales</h2>");
$f->celdas["cn2"] = $f->celda("", "<p>Se considera un contacto comercial a toda persona natural, que permita establecer "
        . "comunicación o relación con el proveedor Jurídico especificado en el presente expediente. "
        . "La gerarquia del contacto está determinada por el cargo desempeñado al interior del ente "
        . "jurídicamente constituido, en instancia más básica y como mínimo el ente jurídico debe tener un "
        . "representante legal, de no poseer este dato el expediente estará incompleto. Para agregar un "
        . "nuevo contacto presione "
        . "[ <a href=\"#\" onClick=\""
        . "MUI.closeWindow($('" . $f->ventana . "'));"
        . "MUI.Proveedores_Contacto_Crear('" . $valores['proveedor'] . "');\">“Nuevo Contacto”</a> ]"
        . ".</p>");
$f->celdas['contactos'] = $f->celda("", $contactos->tabla($valores['proveedor'], "etable", $f->ventana), "contactos" . $f->id);
/** Filas * */
$f->fila["cn1"] = $f->fila($f->celdas['cn1']);
$f->fila["cn2"] = $f->fila($f->celdas['cn2']);
$f->fila["cn3"] = $f->fila($f->celdas['contactos']);
/** Final **/
$f->fila["contactos"] =$f->fila["cn1"].$f->fila["cn2"].$f->fila["cn3"];
?>