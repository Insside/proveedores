<?php 
$cargos =new imis\Cargos();
$f->oculto("contribuyente", "01");
$f->avance("establecer", "ofrecimiento"); // Destino de los datos o siguiente paso a controlar
$html = "<h1>3. Experiencia Contractual</h1>";
$html.="<p>Liste sus principales clientes por líneas de productos, se le solicita mínimo proporcionar tres(3) referencias constatables de personas naturales o jurídicas a las cuales usted provea o proporcione sus productos y/o servicios.</p>";
$f->campos['cliente_empresa1'] = $f->text("cliente_empresa1", @$_REQUEST['cliente_empresa1'], "128", "requiredNONO", false, false, "Empresa");
$f->campos['cliente_contacto1'] = $f->text("cliente_contacto1", @$_REQUEST['cliente_contacto1'], "128", "requiredNO", false, false, "Contacto");
$f->campos['cliente_cargo1'] = $cargos->combo("cliente_cargo1", "");
$f->campos['cliente_telefonos1'] = $f->text("cliente_telefonos1", @$_REQUEST['cliente_telefonos1'], "128", "requiredNO", false, false, "Teléfonos");
$f->campos['cliente_email1'] = $f->text("cliente_email1", @$_REQUEST['cliente_email1'], "128", "", false, false, "Correo Electrónico");
$f->campos['cliente_productos1'] = $f->text("cliente_productos1", @$_REQUEST['cliente_productos1'], "128", "requiredNO", false, false, "Productos");
$f->campos['cliente_empresa2'] = $f->text("cliente_empresa2", @$_REQUEST['cliente_empresa2'], "128", "requiredNO", false, false, "Empresa");
$f->campos['cliente_contacto2'] = $f->text("cliente_contacto2", @$_REQUEST['cliente_contacto2'], "128", "requiredNO", false, false, "Contacto");
$f->campos['cliente_cargo2'] = $cargos->combo("cliente_cargo2", "");
$f->campos['cliente_telefonos2'] = $f->text("cliente_telefonos2", @$_REQUEST['cliente_telefonos2'], "128", "requiredNO", false, false, "Teléfonos");
$f->campos['cliente_email2'] = $f->text("cliente_email2", @$_REQUEST['cliente_email2'], "128", "", false, false, "Correo Electrónico");
$f->campos['cliente_productos2'] = $f->text("cliente_productos2", @$_REQUEST['cliente_productos2'], "128", "requiredNO", false, false, "Productos");
$f->campos['cliente_empresa3'] = $f->text("cliente_empresa3", @$_REQUEST['cliente_empresa3'], "128", "requiredNO", false, false, "Empresa");
$f->campos['cliente_contacto3'] = $f->text("cliente_contacto3", @$_REQUEST['cliente_contacto3'], "128", "requiredNO", false, false, "Contacto");
$f->campos['cliente_cargo3'] = $cargos->combo("cliente_cargo3", "");
$f->campos['cliente_telefonos3'] = $f->text("cliente_telefonos3", @$_REQUEST['cliente_telefonos3'], "128", "requiredNO", false, false, "Teléfonos");
$f->campos['cliente_email3'] = $f->text("cliente_email3", @$_REQUEST['cliente_email3'], "128", "", false, false, "Correo Electrónico");
$f->campos['cliente_productos3'] = $f->text("cliente_productos3", @$_REQUEST['cliente_productos3'], "128", "requiredNO", false, false, "Productos");
$f->campos['anterior'] = $f->button("anterior" . $transaccion, "submit", "Anterior");
$f->campos['siguiente'] = $f->button("siguiente" . $transaccion, "submit", "Siguiente");
// Celdas
$f->celdas['info'] = $f->celda("", $html);
$f->celdas['cliente_empresa1'] = $f->celda("Empresa (1):", $f->campos['cliente_empresa1']);
$f->celdas['cliente_contacto1'] = $f->celda("Contacto (1):", $f->campos['cliente_contacto1']);
$f->celdas['cliente_cargo1'] = $f->celda("Cargo (1):", $f->campos['cliente_cargo1']);
$f->celdas['cliente_telefonos1'] = $f->celda("Teléfonos (1):", $f->campos['cliente_telefonos1']);
$f->celdas['cliente_email1'] = $f->celda("Correo Electrónico (1):", $f->campos['cliente_email1']);
$f->celdas['cliente_productos1'] = $f->celda("Productos Proveídos (1): ", $f->campos['cliente_productos1']);
$f->celdas['cliente_empresa2'] = $f->celda("Empresa (2):", $f->campos['cliente_empresa2']);
$f->celdas['cliente_contacto2'] = $f->celda("Contacto (2):", $f->campos['cliente_contacto2']);
$f->celdas['cliente_cargo2'] = $f->celda("Cargo (2):", $f->campos['cliente_cargo2']);
$f->celdas['cliente_telefonos2'] = $f->celda("Teléfonos (2):", $f->campos['cliente_telefonos2']);
$f->celdas['cliente_email2'] = $f->celda("Correo Electrónico (2):", $f->campos['cliente_email2']);
$f->celdas['cliente_productos2'] = $f->celda("Productos Proveídos (2): ", $f->campos['cliente_productos2']);
$f->celdas['cliente_empresa3'] = $f->celda("Empresa (3):", $f->campos['cliente_empresa3']);
$f->celdas['cliente_contacto3'] = $f->celda("Contacto (3):", $f->campos['cliente_contacto3']);
$f->celdas['cliente_cargo3'] = $f->celda("Cargo (3):", $f->campos['cliente_cargo3']);
$f->celdas['cliente_telefonos3'] = $f->celda("Teléfonos (3):", $f->campos['cliente_telefonos3']);
$f->celdas['cliente_email3'] = $f->celda("Correo Electrónico (3):", $f->campos['cliente_email3']);
$f->celdas['cliente_productos3'] = $f->celda("Productos Proveídos (3): ", $f->campos['cliente_productos3']);
$f->celdas['siguiente'] = $f->campos['siguiente'];
// Filas
$f->fila["info"] = $f->fila($f->celdas['info']);
$f->fila["cliente1A"] = $f->fila($f->celdas['cliente_empresa1'] . $f->celdas['cliente_contacto1'] . $f->celdas['cliente_cargo1'] . $f->celdas['cliente_telefonos1'] . $f->celdas['cliente_email1']);
$f->fila["cliente1B"] = $f->fila($f->celdas['cliente_productos1']);
$f->fila["cliente2A"] = $f->fila($f->celdas['cliente_empresa2'] . $f->celdas['cliente_contacto2'] . $f->celdas['cliente_cargo2'] . $f->celdas['cliente_telefonos2'] . $f->celdas['cliente_email2']);
$f->fila["cliente2B"] = $f->fila($f->celdas['cliente_productos2']);
$f->fila["cliente3A"] = $f->fila($f->celdas['cliente_empresa3'] . $f->celdas['cliente_contacto3'] . $f->celdas['cliente_cargo3'] . $f->celdas['cliente_telefonos3'] . $f->celdas['cliente_email3']);
$f->fila["cliente3B"] = $f->fila($f->celdas['cliente_productos3']);

//Compilacion
$f->filas($f->fila['info']);
$f->filas($f->fila['cliente1A']);
$f->filas($f->fila['cliente1B']);
$f->filas($f->fila['cliente2A']);
$f->filas($f->fila['cliente2B']);
$f->filas($f->fila['cliente3A']);
$f->filas($f->fila['cliente3B']);
$f->botones($f->campos['siguiente']);
$f->botones($f->campos['anterior']);
?>
<script type="text/javascript">
 MUI.resizeWindow($('<?php  echo($f->ventana); ?>'), {width: 640, height: 430, top: 0, left: 0});
 MUI.centerWindow($('<?php  echo($f->ventana); ?>'));

 if ($('anterior<?php  echo($transaccion); ?>')) {
  $('anterior<?php  echo($transaccion); ?>').addEvent('click', function(e) {
   $('avance<?php  echo($transaccion); ?>').value = "perfil";
  });
 }


</script>