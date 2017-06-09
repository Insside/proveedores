<?php
$cargos = new Cargos();
$paises = new Paises();
$regiones = new Regiones();
$ciudades = new Ciudades();
$fechas = new Fechas();
$documentos = new Proveedores_Documentos();
$responsabilidades = new Proveedores_Responsabilidades();
$proveedores = new Proveedores();
$proveedor = $proveedores->consultar($_REQUEST['proveedor']);
/** Valores * */
$v = $proveedor;
// Campos
$f->oculto("destino", "procesador");
$f->avance("establecer", "clientes"); // Destino de los datos o siguiente paso a controlar
$f->campos['proveedor'] = $f->text('proveedor', $v['proveedor'], '10', 'required codigo', true, false, "");
$f->campos['documento'] = $documentos->combo("documento" . $f->id, $v['documento']);
$f->campos['identificacion'] = $f->text('identificacion', $v['identificacion'], '16', 'required automatico', true, false, "");
$f->campos['digito'] = $f->text('digito', $v['digito'], '1', 'required', false, false, "");
$f->campos['razon'] = $f->text('razon', $v['razon'], '128', '', false, false, "");
$f->campos['direccion'] = $f->text('direccion', $v['direccion'], '128', 'required', false, false, "");
$f->campos['pais'] = $paises->combo('pais' . $f->id, $v['pais'], "required");
$f->campos['region'] = $regiones->combo('region' . $f->id, $v['region'], $v['pais'], "required");
$f->campos['ciudad'] = $ciudades->combo('ciudad' . $f->id, $v['ciudad'], $v['region'], $v['pais'], "required");
$f->campos['telefono'] = $f->text('telefono', $v['telefono'], '128', '', false, false, "required");
$f->campos['fax'] = $f->text('fax', $v['fax'], '128', '', false, false, "");
$f->campos['movil'] = $f->text('movil', $v['movil'], '128', '', false, false, "");
$f->campos['correo'] = $f->text('correo', $v['correo'], '128', '', false, false, "");
$f->campos['regimen'] = $regimenes->combo("regimen", $v['regimen'], "required");
$f->campos['cancelar'] = $f->button("cancelar" . $f->id, "button", "Cancelar");
$f->campos['registrar'] = $f->button("registrar" . $f->id, "submit", "Registrar");
// Celdas
$s->celdas['info'] = "<h2>1. Perfil del Proveedor.</h2>";
$f->celdas['proveedor'] = $f->celda("Proveedor:", $f->campos['proveedor'], "", "w100px");
$f->celdas['documento'] = $f->celda("Tipo De Documento:", $f->campos['documento'], "", "w200");
$f->celdas['identificacion'] = $f->celda("Numero Identificación Tributaria (" . $v['documento'] . "):", $f->campos['identificacion'], "", "w250");
$f->celdas['digito'] = $f->celda("Digito:", $f->campos['digito'], "", "w050");
$f->celdas['razon'] = $f->celda("Razon Social", $f->campos['razon']);
$f->celdas['direccion'] = $f->celda("Dirección de la empresa y/o sucursal:", $f->campos['direccion']);
$f->celdas['pais'] = $f->celda("País:", $f->campos['pais'], "", "w100px");
$f->celdas['region'] = $f->celda("Región:", $f->campos['region']);
$f->celdas['ciudad'] = $f->celda("Ciudad:", $f->campos['ciudad']);
$f->celdas['telefono'] = $f->celda("Teléfono:", $f->campos['telefono']);
$f->celdas['fax'] = $f->celda("Fax:", $f->campos['fax']);
$f->celdas['movil'] = $f->celda("movil:", $f->campos['movil']);
$f->celdas['correo'] = $f->celda("Correo Electronico", $f->campos['correo']);
$f->celdas['regimen'] = $f->celda("Régimen (Seleccione el régimen al cual pertenece):", $f->campos['regimen']);
/** Fila * */
$f->fila["info"] = $s->celdas['info'];
$f->fila["A"] = $f->fila($f->celdas['proveedor'] . $f->celdas['documento'] . $f->celdas['identificacion'] . $f->celdas['digito']);
$f->fila["B"] = $f->fila($f->celdas['razon']);
$f->fila["C"] = $f->fila($f->celdas['direccion']);
$f->fila["D"] = $f->fila($f->celdas['pais'] . $f->celdas['region'] . $f->celdas['ciudad']);
//$f->fila["C"] = $f->fila($f->celdas['razon']);
$f->fila["E"] = $f->fila($f->celdas['telefono'] . $f->celdas['fax'] . $f->celdas['movil'] . $f->celdas['correo']);
$f->fila["F"] = $f->fila($f->celdas['regimen']);
/** Composicion * */
$f->filas($f->fila["info"]);
$f->filas($f->fila["A"]);
$f->filas($f->fila["B"]);
$f->filas($f->fila["C"]);
$f->filas($f->fila["D"]);
$f->filas($f->fila["E"]);
$f->filas($f->fila["F"]);
/** Botones * */
$f->botones($f->campos['cancelar'], "inferior-derecha");
$f->botones($f->campos['registrar'], "inferior-derecha");
/** JavaScript * */
$f->JavaScript("MUI.titleWindow($('" . ($f->ventana) . "'), \"Persona Juridico v.1.0\");");
$f->JavaScript("MUI.resizeWindow($('" . ($f->ventana) . "'), {width: 640, height: 400});");
$f->JavaScript("MUI.centerWindow($('" . $f->ventana . "'));");
/** JavaScript * */
$f->JavaScript("MUI.titleWindow($('" . ($f->ventana) . "'), \"Persona Natural v.1.1\");");
$f->JavaScript("MUI.resizeWindow($('" . ($f->ventana) . "'), {width: 640, height: 385});");
$f->JavaScript("MUI.centerWindow($('" . $f->ventana . "'));");
$f->eClick("cancelar" . $f->id, "MUI.closeWindow($('" . $f->ventana . "'));");
$f->eChange("documento" . $f->id, "MUI.Proveedores_Ayuda_Naturaleza_Cambio();");
?>
<script type="text/javascript">
  if ($('pais<?php echo($f->id); ?>')) {
    $('pais<?php echo($f->id); ?>').addEvent('change', function(e) {
      actualizacion_regiones<?php echo($f->id); ?>();
      actualizacion_ciudades<?php echo($f->id); ?>();
    });
  }

  if ($('region<?php echo($f->id); ?>')) {
    $('region<?php echo($f->id); ?>').addEvent('change', function(e) {
      actualizacion_ciudades<?php echo($f->id); ?>();
    });
  }


  function actualizacion_regiones<?php echo($f->id); ?>() {
    var transaccion = '<?php echo($f->id); ?>';
    var pais = $('pais<?php echo($f->id); ?>').getElement(':selected').value;
    var parametros = {'pais': pais, 'transaccion': transaccion};
    var datos = JSON.encode(parametros);
    new Request.JSON({
      url: 'modulos/aplicacion/consultas/jsons/regiones.json.php?transaccion=<?php echo($f->id); ?>',
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
        $("divregion<?php echo($f->id); ?>").empty();
        var objeto = djson.objeto;
        var dhtml = djson.html;
        new Element('div', {html: dhtml}).inject('divregion<?php echo($f->id); ?>', 'top');
      }
    }).send();
  }

  function actualizacion_ciudades<?php echo($f->id); ?>() {
    var transaccion = '<?php echo($f->id); ?>';
    var pais = $('pais<?php echo($f->id); ?>').getElement(':selected').value;
    var region = $('region<?php echo($f->id); ?>').getElement(':selected').value;
    MUI.Notificacion("[ Pais:" + pais + "| Región:" + region + "|" + transaccion + "]");
    var parametros = {'pais': pais, 'region': region, 'transaccion': transaccion};
    var datos = JSON.encode(parametros);
    new Request.JSON({
      url: 'modulos/aplicacion/consultas/jsons/ciudades.json.php?transaccion=<?php echo($f->id); ?>',
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
        $("divciudad<?php echo($f->id); ?>").empty();
        var objeto = djson.objeto;
        var dhtml = djson.html;
        new Element('div', {html: dhtml}).inject('divciudad<?php echo($f->id); ?>', 'top');
      }
    }).send();
  }
</script>