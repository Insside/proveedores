<?php
 $usuario=Sesion::usuario();
$paises = new Paises();
$regiones = new Regiones();
$ciudades = new Ciudades();
$fechas = new Fechas();
$responsabilidades = new Proveedores_Responsabilidades();
$regimenes=new Proveedores_Regimenes();
/** Valores * */
$v['identificacion'] = @$_REQUEST["identificacion"];
$v['documento'] = @$_REQUEST["documento"];
$v['pais'] = "CO";
$v['region'] = "076";
$v['region'] = "076";
$v['ciudad'] = "76111";
// Campos
$f->oculto("destino", "procesador");
$f->oculto("documento", $v['documento']);
$f->avance("establecer", "clientes"); // Destino de los datos o siguiente paso a controlar
$f->campos['proveedor'] = $f->text('proveedor', time(), '10', 'required codigo', true, false, "");
$f->campos['identificacion'] = $f->text('identificacion', $v['identificacion'], '16', 'required automatico', true, false, "");
$f->campos['digito'] = $f->text('digito', '', '1', 'required', false, false, "");
$f->campos['dpersona'] = $f->text('dpersona', 'Persona Natural', '', 'required', true, false, "");
$f->campos['pnombre'] = $f->text('pnombre', '', '32', 'required', false, false, "");
$f->campos['snombre'] = $f->text('snombre', '', '32', '', false, false, "");
$f->campos['papellido'] = $f->text('papellido', '', '32', 'required', false, false, "");
$f->campos['sapellido'] = $f->text('sapellido', '', '32', '', false, false, "");
//$f->campos['razon'] = $f->text('proveedor', '', '128', '', false, false, "");
$f->campos['direccion'] = $f->text('direccion', '', '128', 'required', false, false, "");
$f->campos['pais'] = $paises->combo('pais' . $f->id, $v['pais'], "required");
$f->campos['region'] = $regiones->combo('region' . $f->id, $v['region'], $v['pais'], "required");
$f->campos['ciudad'] = $ciudades->combo('ciudad' . $f->id, $v['ciudad'], $v['region'], $v['pais'], "required");
$f->campos['telefono'] = $f->text('telefono', '', '128', '', false, false, "required");
$f->campos['fax'] = $f->text('fax', '', '128', '', false, false, "");
$f->campos['movil'] = $f->text('movil', '', '128', '', false, false, "");

$f->campos['correo'] = $f->text('correo', '', '128', '', false, false, "");
$f->campos['regimen'] = $regimenes->combo("regimen", "required");
$f->campos['consignacion'] = $f->text('consignacion', '', '2', '', false, false, "");
$f->campos['cuenta'] = $f->text('cuenta', '', '128', '', false, false, "");
$f->campos['banco'] = $f->text('banco', '', '2', '', false, false, "");
$f->campos['titular'] = $f->text('titular', '', '128', '', false, false, "");
$f->campos['gc'] = $f->text('gc', '', '2', '', false, false, "");
$f->campos['sgc'] = $f->text('proveedor', '', '128', '', false, false, "");
$f->campos['tipo'] = $f->text('proveedor', 'time', '128', '', false, false, "");
$f->campos['fecha'] = $f->text('proveedor', $fechas->hoy(), '10', '', true, false, "");
$f->campos['hora'] = $f->text('proveedor', $fechas->ahora(), '8', '', true, false, "");
$f->campos['creador'] = $usuario["usuario"];
$f->campos['cancelar'] = $f->button("cancelar" . $f->id, "button", "Cancelar");
$f->campos['registrar'] = $f->button("registrar" . $f->id, "submit", "Registrar");
// Celdas
$s->celdas['info'] = "<h2>1. Perfil del Proveedor.</h2>";
$f->celdas['proveedor'] = $f->celda("Proveedor:", $f->campos['proveedor'], "", "w100px");
$f->celdas['identificacion'] = $f->celda("Identificación Tributaria (" . $v['documento'] . "):", $f->campos['identificacion'], "", "w250");
$f->celdas['digito'] = $f->celda("Digito:", $f->campos['digito'], "", "w20");
$f->celdas['pnombre'] = $f->celda("Primer Nombre", $f->campos['pnombre']);
$f->celdas['snombre'] = $f->celda("Segundo Nombre", $f->campos['snombre']);
$f->celdas['papellido'] = $f->celda("Primer Apellido", $f->campos['papellido']);
$f->celdas['sapellido'] = $f->celda("Segundo Apellido", $f->campos['sapellido']);
//$f->celdas['razon'] = $f->celda("Razon", $f->campos['razon']);
$f->celdas['direccion'] = $f->celda("Dirección de residencia registrada (R.U.T):", $f->campos['direccion']);
$f->celdas['pais'] = $f->celda("País:", $f->campos['pais'], "", "w100px");
$f->celdas['region'] = $f->celda("Región:", $f->campos['region']);
$f->celdas['ciudad'] = $f->celda("Ciudad:", $f->campos['ciudad']);
$f->celdas['telefono'] = $f->celda("Teléfono:", $f->campos['telefono']);
$f->celdas['fax'] = $f->celda("Fax:", $f->campos['fax']);
$f->celdas['movil'] = $f->celda("movil:", $f->campos['movil']);
$f->celdas['correo'] = $f->celda("Correo Electronico", $f->campos['correo']);
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
//Fila
$f->fila["info"] = $s->celdas['info'];
$f->fila["A"] = $f->fila($f->celdas['proveedor'] . $f->celdas['identificacion'] . $f->celdas['digito'] . $f->celdas['fecha'] . $f->celdas['hora']);
$f->fila["B"] = $f->fila($f->celdas['pnombre'] . $f->celdas['snombre'] . $f->celdas['papellido'] . $f->celdas['sapellido']);
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
$f->windowTitle("Proveedor / Natural","1.2");
$f->windowResize(array("autoresize"=>false,"width"=>"750","height"=>"480"));
$f->windowCenter();
?>
<script type="text/javascript">


  if ($('cancelar<?php echo($f->id); ?>')) {
    $('cancelar<?php echo($f->id); ?>').addEvent('click', function(e) {
      MUI.closeWindow($('<?php echo($f->ventana); ?>'));
    });
  }


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