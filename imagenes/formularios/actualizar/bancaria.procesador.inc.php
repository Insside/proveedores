<?php
$cadenas = new Cadenas();
$proveedores = new Proveedores();
$proveedor = $proveedores->consultar($_REQUEST['proveedor']);

$valor['consignacion'] = @$_REQUEST['consignacion'];
$valor['banco_entidad'] = @$_REQUEST['bancoentidad'];
$valor['banco_tipo_cuenta'] = @$_REQUEST['bancotipocuenta'];
$valor['banco_cuenta'] = @$_REQUEST['bancocuenta'];
$valor['banco_cuenta_titular'] = $cadenas->capitalizar(@$_REQUEST['banco_cuenta_titular']);

$registro = $proveedores->actualizar($proveedor['proveedor'], 'consignacion', $valor['consignacion']);
$registro.=$proveedores->actualizar($proveedor['proveedor'], 'banco_entidad', $valor['banco_entidad']);
$registro.=$proveedores->actualizar($proveedor['proveedor'], 'banco_tipo_cuenta', $valor['banco_tipo_cuenta']);
$registro.=$proveedores->actualizar($proveedor['proveedor'], 'banco_cuenta', $valor['banco_cuenta']);
$registro.=$proveedores->actualizar($proveedor['proveedor'], 'banco_cuenta_titular', $valor['banco_cuenta_titular']);


echo("<pre>");
print_r($_REQUEST);
echo("</pre>");
?>
<script type="text/javascript">
  MUI.Proveedores_Proveedor('<?php echo($proveedor['proveedor']); ?>');
</script>