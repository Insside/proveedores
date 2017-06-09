<?php 
$actividades =new Proveedores_Actividades();
$f->oculto("contribuyente", "01");
$f->avance("establecer", "bancaria"); // Destino de los datos o siguiente paso a controlar
$html = "<h1>5. Clasificación de Actividades del Proveedor</h1>";
$html.="<p>Para efectos del control y determinación de los impuestos y demás obligaciones tributarias, aduaneras y cambiarias administradas por la Unidad Administrativa Especial Dirección de Impuestos y Aduanas Nacionales, seleccione las actividades económicas que aplican al proveedor que desea registrar:</p>";
$f->campos['cliente_empresa1'] = $f->text("cliente_empresa1", @$_REQUEST['cliente_empresa1'], "128", "requiredNONO", false, false, "Empresa");
$f->campos['productos'] = $actividades->seleccion("actividades");
$f->campos['anterior'] = $f->button("anterior" . $transaccion, "submit", "Anterior");
$f->campos['limpiar'] = $f->button("limpiar" . $transaccion, "button", "Limpiar", "clearJsMultipleSelect");
$f->campos['siguiente'] = $f->button("siguiente" . $transaccion, "submit", "Siguiente");
// Celdas
$f->celdas['info'] = $f->celda("", $html);
$f->celdas['productos'] = $f->celda("", $f->campos['productos']);
// Filas
$f->fila["info"] = $f->fila($f->celdas['info']);
$f->fila["productos"] = $f->fila($f->celdas['productos']);
//Compilacion
$f->filas($f->fila['info']);
$f->filas($f->fila['productos']);
$f->botones($f->campos['siguiente']);
$f->botones($f->campos['anterior']);
?>
<style>
 #iMulti div.firstSelection .left,div.secondSelection .left {width: 50%;float:left; height: 290px;}
 #iMulti div.firstSelection .right,div.secondSelection .right {width: 50%;float:right;height: 290px;}
 #iMulti div.firstSelection ul {border-color: #CCCCCC !important;height: 261px;}
</style>
<script type="text/javascript">
 MUI.resizeWindow($('<?php  echo($f->ventana); ?>'), {width: 640, height: 450, top: 0, left: 0});
 MUI.centerWindow($('<?php  echo($f->ventana); ?>'));

 if ($('anterior<?php  echo($transaccion); ?>')) {
  $('anterior<?php  echo($transaccion); ?>').addEvent('click', function(e) {
   $('avance<?php  echo($transaccion); ?>').value = "ofrecimiento";
  });
 }
</script>