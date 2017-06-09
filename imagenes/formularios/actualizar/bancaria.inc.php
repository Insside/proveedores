<?php
// Variables Declaradas
$componentes = new Componentes();
$bancos = new Bancos();
$proveedores = new Proveedores();
$proveedor = $proveedores->consultar($_REQUEST['proveedor']);
//\\//\\//\\//\\//\\//\\//\\
$f->oculto("proveedor", $proveedor['proveedor']);
$f->avance("establecer", "adjuntos"); // Destino de los datos o siguiente paso a controlar
$html = "<h1>1.1. Actualizar Información Bancaria</h1>";
$html.="<p>Si el proveedor desea que sus pagos se realicen directamente por consignación bancaria deberá proporcionar la siguiente información a completitud y presentar copia escaneada de la certificación de la cuenta bancaria.</p>";
$f->campos['consignacion'] = $componentes->combo_sino("consignacion", $proveedor['consignacion']);
$f->campos['banco_entidad'] = $bancos->combo("bancoentidad", $proveedor['banco_entidad']);
$f->campos['banco_tipo_cuenta'] = $bancos->combo_tipo_cuenta("bancotipocuenta", $proveedor['banco_tipo_cuenta']);
$f->campos['banco_cuenta'] = $f->text('bancocuenta', $proveedor['banco_cuenta'], '128', '', false, false, "");
$f->campos['banco_cuenta_titular'] = $f->text('banco_cuenta_titular', $proveedor['banco_cuenta_titular'], '254', '', false, false, "");
$f->campos['anterior'] = $f->button("cancelar" . $transaccion, "button", "Cancelar");
$f->campos['siguiente'] = $f->button("siguiente" . $transaccion, "submit", "Actualizar");
// Celdas
$f->celdas['info'] = $f->celda("", $html);
$f->celdas['consignacion'] = $f->celda("Aceptaría que se le consigne en su cuenta bancaria:", $f->campos['consignacion']);
$f->celdas['banco_entidad'] = $f->celda("Entidad Bancaria:", $f->campos['banco_entidad']);
$f->celdas['banco_tipo_cuenta'] = $f->celda("Tipo De Cuenta:", $f->campos['banco_tipo_cuenta']);
$f->celdas['banco_cuenta'] = $f->celda("Numero Cuenta Bancaria::", $f->campos['banco_cuenta']);
$f->celdas['banco_cuenta_titular'] = $f->celda("Titular Cuenta Bancaria:", $f->campos['banco_cuenta_titular']);
// Filas
$f->fila["info"] = $f->fila($f->celdas['info']);
$f->fila["consignacion"] = $f->fila($f->celdas['consignacion']);
$f->fila["banco"] = $f->fila($f->celdas['banco_entidad'] . $f->celdas['banco_tipo_cuenta']);
$f->fila["banco_cuenta"] = $f->fila($f->celdas['banco_cuenta']);
$f->fila["banco_titular"] = $f->fila($f->celdas['banco_cuenta_titular']);
//Compilacion
$f->filas($f->fila['info']);
$f->filas($f->fila['consignacion']);
$f->filas($f->fila['banco']);
$f->filas($f->fila['banco_cuenta']);
$f->filas($f->fila['banco_titular']);
$f->botones($f->campos['siguiente']);
$f->botones($f->campos['anterior']);
?>
<script type="text/javascript">
  MUI.resizeWindow($('<?php echo($f->ventana); ?>'), {width: 640, height: 350, top: 0, left: 0});
  MUI.centerWindow($('<?php echo($f->ventana); ?>'));
  if ($('cancelar<?php echo($transaccion); ?>')) {
    $('cancelar<?php echo($transaccion); ?>').addEvent('click', function(e) {
      MUI.closeWindow($('<?php echo($f->ventana); ?>'));
    });
  }



</script>