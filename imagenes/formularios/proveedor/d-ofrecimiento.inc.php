<?php 
$ofertables =new Proveedores_Ofertables();
$f->oculto("contribuyente", "01");
$f->avance("establecer", "actividades"); // Destino de los datos o siguiente paso a controlar
//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\
$html = "<h1>4. Productos Ofertados</h1>";
$html.="<p>Seleccione y agregue los productos y/o servicios que el proveedor ofertara a la entidad, a mayor detalle mayor probabilidad de aparecer en las búsquedas.</p>";
$f->campos['cliente_empresa1'] = $f->text("cliente_empresa1", @$_REQUEST['cliente_empresa1'], "128", "requiredNONO", false, false, "Empresa");
$f->campos['productos'] = $ofertables->seleccion("oferta");
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
 MUI.resizeWindow($('<?php  echo($f->ventana); ?>'), {width: 640, height: 430, top: 0, left: 0});
 MUI.centerWindow($('<?php  echo($f->ventana); ?>'));

 if ($('anterior<?php  echo($transaccion); ?>')) {
  $('anterior<?php  echo($transaccion); ?>').addEvent('click', function(e) {
   $('avance<?php  echo($transaccion); ?>').value = "clientes";
  });
 }
</script>