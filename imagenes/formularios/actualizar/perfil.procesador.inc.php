<?php
$transaccion = @$_REQUEST['transaccion'];
$cadenas = new Cadenas();
$proveedores = new Proveedores();
$ofertas = new Proveedores_Ofertas();
$actividades = new Proveedores_Actividades();

$proveedor = @$_REQUEST['proveedor'];
$valor['rut'] = @$_REQUEST['rut'];
$valor['digito'] = @$_REQUEST['digito'];
$valor['persona'] = @$_REQUEST['persona'];
if ($valor['persona'] == "01") {
  $valor['razon'] = $cadenas->capitalizar(@$_REQUEST['papellido'] . " " . @$_REQUEST['sapellido'] . " " . @$_REQUEST['pnombre'] . " " . @$_REQUEST['snombre']);
} elseif ($valor['persona'] == "02") {
  $valor['razon'] = @$_REQUEST['razon'];
}
$valor['representante'] = @$_REQUEST['representante'];
$valor['identificacion'] = @$_REQUEST['identificacion'];
$valor['cargo'] = @$_REQUEST['cargo'];

$valor['direccion'] = $cadenas->capitalizar(@$_REQUEST['direccion']);
$valor['ciudad'] = @$_REQUEST['ciudad' . $transaccion];
$valor['region'] = @$_REQUEST['region' . $transaccion];
$valor['pais'] = @$_REQUEST['pais' . $transaccion];
$valor['telefono'] = @$_REQUEST['telefono'];
$valor['fax'] = @$_REQUEST['fax'];
$valor['movil'] = @$_REQUEST['movil'];
$valor['email'] = $_REQUEST['email'];
$valor['regimen'] = @$_REQUEST['regimen'];

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
?>
<pre>
  <?php echo($registro); ?>
</pre>
<script type="text/javascript">
  MUI.Proveedores_Proveedor('<?php echo($proveedor); ?>');
  MUI.closeWindow($('<?php echo($f->ventana); ?>'));
</script>