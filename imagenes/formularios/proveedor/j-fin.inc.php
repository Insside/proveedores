<?php 
$transaccion = @$_REQUEST['transaccion'];
$cadenas =new Cadenas();
$proveedores =new Proveedores();
$ofertas =new Proveedores_Ofertas();
$actividades =new Proveedores_Actividades();

$proveedor = $proveedores->crear();
$valor['rut'] = @$_REQUEST['_rut'];
$valor['digito'] = @$_REQUEST['_digito'];
$valor['persona'] = @$_REQUEST['_persona'];
if ($valor['persona'] == "01") {
 $valor['razon'] = $cadenas->capitalizar(@$_REQUEST['_papellido'] . " " . @$_REQUEST['_sapellido'] . " " . @$_REQUEST['_pnombre'] . " " . @$_REQUEST['_snombre']);
} elseif ($valor['persona'] == "02") {
 $valor['razon'] = @$_REQUEST['_razon'];
}
$valor['representante'] = @$_REQUEST['_representante'];
$valor['identificacion'] = @$_REQUEST['_identificacion'];
$valor['cargo'] = @$_REQUEST['_cargo'];

$valor['direccion'] = $cadenas->capitalizar(@$_REQUEST['_direccion']);
$valor['ciudad'] = @$_REQUEST['_ciudad' . $transaccion];
$valor['region'] = @$_REQUEST['_region' . $transaccion];
$valor['pais'] = @$_REQUEST['_pais' . $transaccion];
$valor['telefono'] = @$_REQUEST['_telefono'];
$valor['fax'] = @$_REQUEST['_fax'];
$valor['movil'] = @$_REQUEST['_movil'];
$valor['email'] = $_REQUEST['_email'];
$valor['regimen'] = @$_REQUEST['_regimen'];
$valor['consignacion'] = @$_REQUEST['_consignacion'];
$valor['banco_entidad'] = @$_REQUEST['_bancoentidad'];
$valor['banco_tipo_cuenta'] = @$_REQUEST['_bancotipocuenta'];
$valor['banco_cuenta'] = @$_REQUEST['_bancocuenta'];
$valor['banco_cuenta_titular'] = $cadenas->capitalizar(@$_REQUEST['_bancocuentatitular']);
$valor['gc'] = @$_REQUEST['_gc'];
$valor['sgc'] = @$_REQUEST['_sgc'];
$valor['tipo'] = @$_REQUEST['_tipo'];
$valor['oferta'] = @$_REQUEST['_oferta'];
$valor['actividades'] = @$_REQUEST['_actividades'];


$registro = $proveedores->actualizar($proveedor, 'rut', $valor['rut']);
$registro.=$proveedores->actualizar($proveedor, 'digito', $valor['digito']);
$registro.=$proveedores->actualizar($proveedor, 'persona', $valor['persona']);
$registro.=$proveedores->actualizar($proveedor, 'razon', $valor['razon']);
$registro.=$proveedores->actualizar($proveedor, 'representante', $valor['representante']);
$registro.=$proveedores->actualizar($proveedor, 'identificacion', $valor['identificacion']);
$registro.=$proveedores->actualizar($proveedor, 'cargo', $valor['cargo']);
$registro.=$proveedores->actualizar($proveedor, 'direccion', $valor['direccion']);
$registro.=$proveedores->actualizar($proveedor, 'ciudad', $valor['ciudad']);
$registro.=$proveedores->actualizar($proveedor, 'region', $valor['region']);
$registro.=$proveedores->actualizar($proveedor, 'pais', $valor['pais']);
$registro.=$proveedores->actualizar($proveedor, 'telefono', $valor['telefono']);
$registro.=$proveedores->actualizar($proveedor, 'fax', $valor['fax']);
$registro.=$proveedores->actualizar($proveedor, 'movil', $valor['movil']);
$registro.=$proveedores->actualizar($proveedor, 'email', $valor['email']);
$registro.=$proveedores->actualizar($proveedor, 'regimen', $valor['regimen']);
$registro.=$proveedores->actualizar($proveedor, 'consignacion', $valor['consignacion']);
$registro.=$proveedores->actualizar($proveedor, 'banco_entidad', $valor['banco_entidad']);
$registro.=$proveedores->actualizar($proveedor, 'banco_tipo_cuenta', $valor['banco_tipo_cuenta']);
$registro.=$proveedores->actualizar($proveedor, 'banco_cuenta', $valor['banco_cuenta']);
$registro.=$proveedores->actualizar($proveedor, 'banco_cuenta_titular', $valor['banco_cuenta_titular']);
$registro.=$proveedores->actualizar($proveedor, 'gc', $valor['gc']);
$registro.=$proveedores->actualizar($proveedor, 'sgc', $valor['sgc']);
$registro.=$proveedores->actualizar($proveedor, 'tipo', $valor['tipo']);
// Se deben registrar las ofertas y actividades indicadas
$ofertas->registrar($proveedor, $valor['oferta']);
$actividades->registrar($proveedor, $valor['actividades']);
?>
<pre>
 <?php  echo($registro); ?>
</pre>
<script type="text/javascript">
 //MUI.closeWindow($('<?php  echo($f->ventana); ?>'));
 MUI.Proveedores_Consultas('proveedores');
</script>