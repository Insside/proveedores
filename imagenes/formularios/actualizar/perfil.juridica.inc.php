<?php
// Campos
$cargos = new Cargos();
$paises = new Paises();
$regiones = new Regiones();
$ciudades = new Ciudades();
$fechas = new Fechas();

$f->oculto("contribuyente", "01");
$f->oculto("persona", "02");
$f->campos['proveedor'] = $f->text('proveedor', $proveedor['proveedor'], '10', 'required codigo', true, false, "");
$f->campos['rut'] = $f->text('rut', $proveedor['rut'], '16', 'required', false, false);
$f->campos['digito'] = $f->text('digito', $proveedor['digito'], '1', 'required', false, false);
$f->campos['dpersona'] = $f->text('dpersona', 'Persona Juridica', '', 'required', true, false, "");

$f->campos['razon'] = $f->text('razon', $proveedor['razon'], '128', 'required', false, false, "", "", true);
$f->campos['representante'] = $f->text('representante', $proveedor['representante'], '254', 'required', false, false, "");
$f->campos['identificacion'] = $f->text('identificacion', $proveedor['identificacion'], '254', 'required', false, false, "");
$f->campos['cargo'] = $cargos->combo("cargo", $proveedor['cargo'], "required");

$f->campos['direccion'] = $f->text('direccion', $proveedor['direccion'], '128', 'required', false, false, "");
$f->campos['pais'] = $paises->combo('pais' . $transaccion, $proveedor['pais'], "required");
$f->campos['region'] = $regiones->combo('region' . $transaccion, $proveedor['region'], $proveedor['pais'], "required");
$f->campos['ciudad'] = $ciudades->combo('ciudad' . $transaccion, $proveedor['ciudad'], $proveedor['region'], $proveedor['pais'], "required");
$f->campos['telefono'] = $f->text('telefono', $proveedor['telefono'], '128', '', false, false, "required");
$f->campos['fax'] = $f->text('telefono', $proveedor['fax'], '128', '', false, false, "");
$f->campos['movil'] = $f->text('telefono', $proveedor['movil'], '128', '', false, false, "");
$f->campos['email'] = $f->text('email', $proveedor['email'], '128', '', false, false, "", "email", true);
$f->campos['regimen'] = $regimenes->combo("regimen", $proveedor['regimen'], "required");
$f->campos['consignacion'] = $f->text('consignacion', '', '2', '', false, false, "");
$f->campos['cuenta'] = $f->text('cuenta', '', '128', '', false, false, "");
$f->campos['banco'] = $f->text('banco', '', '2', '', false, false, "");
$f->campos['titular'] = $f->text('titular', '', '128', '', false, false, "");
$f->campos['gc'] = $f->text('gc', '', '2', '', false, false, "");
$f->campos['sgc'] = $f->text('proveedor', '', '128', '', false, false, "");
$f->campos['tipo'] = $f->text('proveedor', 'time', '128', '', false, false, "");
$f->campos['fecha'] = $f->text('proveedor', $fechas->hoy(), '10', '', true, false, "");
$f->campos['hora'] = $f->text('proveedor', $fechas->ahora(), '8', '', true, false, "");
$f->campos['creador'] = $sesion->getValue("usuario");
$f->campos['cancelar'] = $f->button("cancelar" . $transaccion, "button", "Cancelar");
$f->campos['siguiente'] = "<input name=\"enviar\"  id=\"enviar\" type=\"submit\" value=\"Actualizar\"/>";
// Celdas
$s->celdas['info'] = "<h1>1. Perfil del Proveedor.</h1>";
$f->celdas['proveedor'] = $f->celda("Proveedor:", $f->campos['proveedor'], "", "w110");
$f->celdas['rut'] = $f->celda("Numero Identificación Tributaria (NIT):", $f->campos['rut'], "", "w250");
$f->celdas['digito'] = $f->celda("Digito:", $f->campos['digito'], "", "w20");
$f->celdas['persona'] = $f->celda("Tipo Contribuyente:", $f->campos['dpersona']);
$f->celdas['razon'] = $f->celda(" Razón social:", $f->campos['razon']);
$f->celdas['representante'] = $f->celda("Nombre del representante legal:", $f->campos['representante']);
$f->celdas['identificacion'] = $f->celda("Identificación (CC/CE):", $f->campos['identificacion']);
$f->celdas['cargo'] = $f->celda("Cargo:", $f->campos['cargo'], "w200");

$f->celdas['direccion'] = $f->celda("Dirección de la empresa y/o sucursal: :", $f->campos['direccion']);
$f->celdas['pais'] = $f->celda("País:", $f->campos['pais']);
$f->celdas['region'] = $f->celda("Región:", $f->campos['region']);
$f->celdas['ciudad'] = $f->celda("Ciudad:", $f->campos['ciudad']);
$f->celdas['telefono'] = $f->celda("Teléfono:", $f->campos['telefono']);
$f->celdas['fax'] = $f->celda("Fax:", $f->campos['fax']);
$f->celdas['movil'] = $f->celda("movil:", $f->campos['movil']);
$f->celdas['email'] = $f->celda("Correo Electronico", $f->campos['email']);
$f->celdas['regimen'] = $f->celda("Régimen (Seleccione el régimen al cual pertenece):", $f->campos['regimen']);
$f->celdas['consignacion'] = $f->celda("Consignacion", $f->campos['consignacion']);
$f->celdas['cuenta'] = $f->celda("Cuenta", $f->campos['cuenta']);
$f->celdas['banco'] = $f->celda("Banco", $f->campos['banco']);
$f->celdas['titular'] = $f->celda("Titular", $f->campos['titular']);
$f->celdas['gc'] = $f->celda("Gestion De Calidad", $f->campos['gc']);
$f->celdas['sgc'] = $f->celda("Sistema De Gestion De Calidad", $f->campos['sgc']);
$f->celdas['tipo'] = $f->celda("Tipo", $f->campos['tipo']);
$f->celdas['fecha'] = $f->celda("Fecha", $f->campos['fecha']);
$f->celdas['hora'] = $f->celda("Hora", $f->campos['hora']);
$f->celdas['creador'] = $f->celda("Creador", $f->campos['creador']);
$f->celdas['cancelar'] = $f->campos['cancelar'];
$f->celdas['siguiente'] = $f->campos['siguiente'];
//Fila
$f->fila["info"] = $s->celdas['info'];
$f->fila["A"] = $f->fila($f->celdas['proveedor'] . $f->celdas['rut'] . $f->celdas['digito'] . $f->celdas['persona']);
$f->fila["razon"] = $f->fila($f->celdas['razon']);
$f->fila["representacion"] = $f->fila($f->celdas['representante'] . $f->celdas['identificacion'] . $f->celdas['cargo']);
$f->fila["C"] = $f->fila($f->celdas['direccion']);
$f->fila["D"] = $f->fila($f->celdas['pais'] . $f->celdas['region'] . $f->celdas['ciudad']);
//$f->fila["C"] = $f->fila($f->celdas['razon']);
$f->fila["E"] = $f->fila($f->celdas['telefono'] . $f->celdas['fax'] . $f->celdas['movil'] . $f->celdas['email']);
$f->fila["F"] = $f->fila($f->celdas['regimen']);
//Composicion
$f->filas($f->fila["info"]);
$f->filas($f->fila["A"]);
$f->filas($f->fila["razon"]);
$f->filas($f->fila["representacion"]);
$f->filas($f->fila["C"]);
$f->filas($f->fila["D"]);
$f->filas($f->fila["E"]);
$f->filas($f->fila["F"]);
$f->botones($f->campos['siguiente']);
$f->botones($f->campos['cancelar']);
?>
<style>
  .cargo{width: 200px !important;}
</style>

<script type="text/javascript">
  MUI.resizeWindow($('<?php echo($f->ventana); ?>'), {width: 640, height: 430, top: 0, left: 0});
  MUI.centerWindow($('<?php echo($f->ventana); ?>'));

  if ($('cancelar<?php echo($transaccion); ?>')) {
    $('cancelar<?php echo($transaccion); ?>').addEvent('click', function(e) {
      MUI.closeWindow($('<?php echo($f->ventana); ?>'));
    });
  }


  if ($('pais<?php echo($transaccion); ?>')) {
    $('pais<?php echo($transaccion); ?>').addEvent('change', function(e) {
      actualizacion_regiones<?php echo($transaccion); ?>();
      actualizacion_ciudades<?php echo($transaccion); ?>();
    });
  }

  if ($('region<?php echo($transaccion); ?>')) {
    $('region<?php echo($transaccion); ?>').addEvent('change', function(e) {
      actualizacion_ciudades<?php echo($transaccion); ?>();
    });
  }


  function actualizacion_regiones<?php echo($transaccion); ?>() {
    var transaccion = '<?php echo($transaccion); ?>';
    var pais = $('pais<?php echo($transaccion); ?>').getElement(':selected').value;
    var parametros = {'pais': pais, 'transaccion': transaccion};
    var datos = JSON.encode(parametros);
    new Request.JSON({
      url: 'modulos/aplicacion/consultas/jsons/regiones.json.php?transaccion=<?php echo($transaccion); ?>',
      data: "datos=" + datos,
      requestOptions: {
        spinnerOptions: {
          message: 'Actualizando Regiones...'
        }
      },
      onRequest: function() {
        $('spinner').show();
        MUI.Notificacion("Actualizando...");
      },
      onComplete: function(djson) {
        $('spinner').hide();
        $("divregion<?php echo($transaccion); ?>").empty();
        var objeto = djson.objeto;
        var dhtml = djson.html;
        new Element('div', {html: dhtml}).inject('divregion<?php echo($transaccion); ?>', 'top');
      }
    }).send();
  }

  function actualizacion_ciudades<?php echo($transaccion); ?>() {
    var transaccion = '<?php echo($transaccion); ?>';
    var pais = $('pais<?php echo($transaccion); ?>').getElement(':selected').value;
    var region = $('region<?php echo($transaccion); ?>').getElement(':selected').value;
    MUI.Notificacion("[ Pais:" + pais + "| Región:" + region + "|" + transaccion + "]");
    var parametros = {'pais': pais, 'region': region, 'transaccion': transaccion};
    var datos = JSON.encode(parametros);
    new Request.JSON({
      url: 'modulos/aplicacion/consultas/jsons/ciudades.json.php?transaccion=<?php echo($transaccion); ?>',
      data: "datos=" + datos,
      requestOptions: {
        spinnerOptions: {
          message: 'Actualizando Regiones...'
        }
      },
      onRequest: function() {
        $('spinner').show();
      },
      onComplete: function(djson) {
        $('spinner').hide();
        $("divciudad<?php echo($transaccion); ?>").empty();
        var objeto = djson.objeto;
        var dhtml = djson.html;
        new Element('div', {html: dhtml}).inject('divciudad<?php echo($transaccion); ?>', 'top');
      }
    }).send();
  }
</script>