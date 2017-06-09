<?php
$usuario= Sesion::usuario();
$archivos= new Proveedores_Archivos();
$html['info']="<a name=\"adjuntos\"></a><h2>Archivos adjuntos. </h2>
  <p>En este segmento se visualizan todos los archivos adjuntos al registro del proveedor
 que actualmente está siendo consultado, el orden de los archivos visualizados está en orden cronológico
 descendente del ingreso o carga al sistema, cada archivo cargado y registrado esta categorizado según su
 tipo de contenido y en ese orden de ideas se visualiza su acceso en el listado inferior a este mensaje. Si
 desea cargar un nuevo archivo ingrese a [ <a href=\"#\" onClick=\"MUI.Proveedores_Actualizar_Adjuntos('".$valores['proveedor']."');\">Adjuntar Nuevo Archivo!</a> ].</p>
 <p><b>Persona Natural régimen simplificado</b>: Fotocopia del documento de identificación, certificado de Cámara y Comercio (si tiene), RUT actualizado, fotocopia de la tarjeta profesional (si aplica), certificación dela cuenta bancaria (si la tiene). </br>
<b>Personal Natural régimen común</b>: Fotocopia del documento de identificación, certificado de Cámara y Comercio, RUT actualizado, fotocopia de la tarjeta profesional (si aplica), certificación de la cuenta bancaria.</br>
<b>Persona Jurídica</b>: Portafolio de servicios, Fotocopia del documento de identificación del representante legal, RUT actualizado, certificado de Cámara y Comercio reciente, certificación de la cuenta bancaria.</br>
<b>Documentos adicionales para Proveedores del laboratorio</b>: Certificado de acreditación o certificación
de la casa matriz para realizar el servicio, certificado de trazabilidad de los equipos.
</p>";
$f->celdas['pac1'] = $f->celda("", $html['info']);
$f->celdas['pac2'] = $f->celda("",$archivos->tabla($valores['proveedor'],$usuario["usuario"]),"archivos".$f->id,"etable");
/** Filas **/
$f->fila["paf1"]=$f->fila($f->celdas['pac1']);
$f->fila["paf2"]=$f->fila($f->celdas['pac2']);
/** Final **/
$f->fila['archivos']=$f->fila['paf1'].$f->fila['paf2'];
?>