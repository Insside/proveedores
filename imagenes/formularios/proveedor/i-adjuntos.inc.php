<?php 
$f->oculto("contribuyente", "01");
$f->avance("establecer", "fin"); // Destino de los datos o siguiente paso a controlar
$html = "<h1>6. Documentos Adjuntos</h1>";
$html.="<p>
 <b>Persona Natural régimen simplificado</b>: Fotocopia del documento de identificación, certificado de Cámara y Comercio (si tiene), RUT actualizado, fotocopia de la tarjeta profesional (si aplica), certificación de la cuenta bancaria (si la tiene).</br>
 <b>Personal Natural régimen común</b>: Fotocopia del documento de identificación, certificado de Cámara y Comercio, RUT actualizado, fotocopia de la tarjeta profesional (si aplica), certificación de la cuenta bancaria.</br>
 <!--<b>Persona Jurídica</b>: Portafolio de servicios, Fotocopia del documento de identificación del representante legal, RUT actualizado, certificado de Cámara y Comercio reciente, certificación de la cuenta bancaria.</br>
 <b>Documentos adicionales para Proveedores del laboratorio</b>: Certificado de acreditación o certificación de la casa matriz para realizar el servicio, certificado de trazabilidad de los equipos.</br>
-->
</p>";
$html.='<iframe src="modulos/proveedores/archivos/index.php" name="adjuntos" width="100%" marginwidth="0" height="250" marginheight="0" align="top" scrolling="auto" frameborder="0"></iframe>';
$f->campos['cliente_empresa1'] = $f->text("cliente_empresa1", @$_REQUEST['cliente_empresa1'], "128", "requiredNONO", false, false, "Empresa");
$f->campos['anterior'] = $f->button("anterior" . $transaccion, "submit", "Anterior");
$f->campos['limpiar'] = $f->button("limpiar" . $transaccion, "button", "Limpiar", "clearJsMultipleSelect");
$f->campos['siguiente'] = $f->button("siguiente" . $transaccion, "submit", "Registrar");
// Celdas
$f->celdas['info'] = $f->celda("", $html);
// Filas
$f->fila["info"] = $f->fila($f->celdas['info']);
//Compilacion
$f->filas($f->fila['info']);
$f->botones($f->campos['siguiente']);
$f->botones($f->campos['anterior']);
?>
<script type="text/javascript">
 MUI.resizeWindow($('<?php  echo($f->ventana); ?>'), {width: 640, height: 450, top: 0, left: 0});
 MUI.centerWindow($('<?php  echo($f->ventana); ?>'));

 if ($('anterior<?php  echo($transaccion); ?>')) {
  $('anterior<?php  echo($transaccion); ?>').addEvent('click', function(e) {
   $('avance<?php  echo($transaccion); ?>').value = "actividades";
  });
 }
</script>