<?php
// Variables Declaradas
$componentes = new Componentes();
$bancos = new Bancos();
//\\//\\//\\//\\//\\//\\//\\
$f->oculto("contribuyente", "01");
$f->avance("establecer", "adjuntos"); // Destino de los datos o siguiente paso a controlar
$html = "<h1>6. Información Bancaria</h1>";
$html.="<p>Si el proveedor desea que sus pagos se realicen directamente por consignación bancaria deberá proporcionar la siguiente información a completitud y presentar copia escaneada de la certificación de la cuenta bancaria.</p>";
$f->campos['consignacion'] = $componentes->combo_sino("consignacion");
$f->campos['banco_entidad'] = $bancos->combo("bancoentidad");
$f->campos['banco_cuenta_tipo'] = $bancos->combo_tipo_cuenta("bancotipocuenta");
$f->campos['banco_cuenta'] = $f->text('bancocuenta', '', '128', '', false, false, "");
$f->campos['banco_titular'] = $f->text('bancocuentatitular', '', '254', '', false, false, "");
$f->campos['anterior'] = $f->button("anterior" . $transaccion, "submit", "Anterior");
$f->campos['siguiente'] = $f->button("siguiente" . $transaccion, "submit", "Siguiente");
// Celdas
$f->celdas['info'] = $f->celda("", $html);
$f->celdas['consignacion'] = $f->celda("Aceptaría que se le consigne en su cuenta bancaria:", $f->campos['consignacion']);
$f->celdas['banco_entidad'] = $f->celda("Entidad Bancaria:", $f->campos['banco_entidad']);
$f->celdas['banco_cuenta_tipo'] = $f->celda("Tipo De Cuenta:", $f->campos['banco_cuenta_tipo']);
$f->celdas['banco_cuenta'] = $f->celda("Numero Cuenta Bancaria::", $f->campos['banco_cuenta']);
$f->celdas['banco_titular'] = $f->celda("Titular Cuenta Bancaria:", $f->campos['banco_titular']);
// Filas
$f->fila["info"] = $f->fila($f->celdas['info']);
$f->fila["consignacion"] = $f->fila($f->celdas['consignacion']);
$f->fila["banco"] = $f->fila($f->celdas['banco_entidad'] . $f->celdas['banco_cuenta_tipo']);
$f->fila["banco_cuenta"] = $f->fila($f->celdas['banco_cuenta']);
$f->fila["banco_titular"] = $f->fila($f->celdas['banco_titular']);
//Compilacion
$f->filas($f->fila['info']);
$f->filas($f->fila['consignacion']);
$f->filas($f->fila['banco']);
$f->filas($f->fila['banco_cuenta']);
$f->filas($f->fila['banco_titular']);
$f->botones($f->campos['siguiente']);
$f->botones($f->campos['anterior']);
?>
<style>
  #iMulti div.firstSelection .left,div.secondSelection .left {width: 50%;float:left; height: 290px;}
  #iMulti div.firstSelection .right,div.secondSelection .right {width: 50%;float:right;height: 290px;}
  #iMulti div.firstSelection ul {border-color: #CCCCCC !important;height: 261px;}
</style>
<script type="text/javascript">
  MUI.resizeWindow($('<?php echo($f->ventana); ?>'), {width: 640, height: 450, top: 0, left: 0});
  MUI.centerWindow($('<?php echo($f->ventana); ?>'));

  if ($('anterior<?php echo($transaccion); ?>')) {
    $('anterior<?php echo($transaccion); ?>').addEvent('click', function(e) {
      $('avance<?php echo($transaccion); ?>').value = "actividades";
    });
  }
</script>