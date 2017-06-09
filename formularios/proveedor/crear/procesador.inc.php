<?php
$ROOT = (!isset($ROOT)) ? "../../../../../" : $ROOT;
require_once($ROOT . "modulos/proveedores/librerias/Configuracion.cnf.php");
/*
 * Copyright (c) 2014, Jose Alexis Correa Valencia
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *
 * * Redistributions of source code must retain the above copyright notice, this
 *   list of conditions and the following disclaimer.
 * * Redistributions in binary form must reproduce the above copyright notice,
 *   this list of conditions and the following disclaimer in the documentation
 *   and/or other materials provided with the distribution.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 */

$transaccion = @$_REQUEST['transaccion'];
$cadenas = new Cadenas();
$proveedores = new Proveedores();
$ofertas = new Proveedores_Ofertas();
$actividades = new Proveedores_Actividades();

$documento = @$_REQUEST["documento"];
$persona = $proveedores->tipo_persona($documento);
$proveedor = "";
if ($persona == "Natural") {
  $proveedor = $proveedores->crear();
  $nombres = $cadenas->capitalizar(@$_REQUEST['pnombre'] . " " . @$_REQUEST['snombre']);
  $apellidos = $cadenas->capitalizar(@$_REQUEST['papellido'] . " " . @$_REQUEST['sapellido']);
  $razon = $cadenas->capitalizar($apellidos . " " . $nombres);
  $alias = @$_REQUEST['alias'];
  $direccion = $cadenas->capitalizar($_REQUEST['direccion']);
  $proveedores->actualizar($proveedor, 'identificacion', $_REQUEST['identificacion']);
  $proveedores->actualizar($proveedor, 'documento', $_REQUEST['documento']);
  $proveedores->actualizar($proveedor, 'identificacion', $_REQUEST['identificacion']);
  $proveedores->actualizar($proveedor, 'digito', $_REQUEST['digito']);
  $proveedores->actualizar($proveedor, 'nombres', $nombres);
  $proveedores->actualizar($proveedor, 'apellidos', $apellidos);
  $proveedores->actualizar($proveedor, 'razon', $razon);
  $proveedores->actualizar($proveedor, 'alias', $alias);
  $proveedores->actualizar($proveedor, 'direccion', $direccion);
  $proveedores->actualizar($proveedor, 'pais', $_REQUEST['pais' . $f->id]);
  $proveedores->actualizar($proveedor, 'region', $_REQUEST['region' . $f->id]);
  $proveedores->actualizar($proveedor, 'ciudad', $_REQUEST['ciudad' . $f->id]);
  $proveedores->actualizar($proveedor, 'telefono', @$_REQUEST['telefono']);
  $proveedores->actualizar($proveedor, 'fax', @$_REQUEST['fax']);
  $proveedores->actualizar($proveedor, 'movil', @$_REQUEST['movil']);
  $proveedores->actualizar($proveedor, 'correo', $_REQUEST['correo']);
  $proveedores->actualizar($proveedor, 'regimen', $_REQUEST['regimen']);
} else if ($persona == "Juridica") {
  $proveedor = $proveedores->crear();
  $razon = $cadenas->capitalizar(@$_REQUEST['razon']);
  $direccion = $cadenas->capitalizar($_REQUEST['direccion']);
  $proveedores->actualizar($proveedor, 'identificacion', $_REQUEST['identificacion']);
  $proveedores->actualizar($proveedor, 'documento', $_REQUEST['documento']);
  $proveedores->actualizar($proveedor, 'identificacion', $_REQUEST['identificacion']);
  $proveedores->actualizar($proveedor, 'digito', $_REQUEST['digito']);
  $proveedores->actualizar($proveedor, 'razon', $razon);
  $proveedores->actualizar($proveedor, 'direccion', $direccion);
  $proveedores->actualizar($proveedor, 'pais', $_REQUEST['pais' . $f->id]);
  $proveedores->actualizar($proveedor, 'region', $_REQUEST['region' . $f->id]);
  $proveedores->actualizar($proveedor, 'ciudad', $_REQUEST['ciudad' . $f->id]);
  $proveedores->actualizar($proveedor, 'telefono', @$_REQUEST['telefono']);
  $proveedores->actualizar($proveedor, 'fax', @$_REQUEST['fax']);
  $proveedores->actualizar($proveedor, 'movil', @$_REQUEST['movil']);
  $proveedores->actualizar($proveedor, 'correo', $_REQUEST['correo']);
  $proveedores->actualizar($proveedor, 'regimen', $_REQUEST['regimen']);
} else {
  echo("Imposible de procesar: " . $persona);
}







































/**


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
 *
 *
 */
?>

<?php print_r($_REQUEST); ?>

<script type="text/javascript">
  MUI.closeWindow($('<?php echo($f->ventana); ?>'));
  MUI.Proveedores_Proveedor_Consultar("<?php echo($proveedor); ?>");
</script>
