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
$acciones=new Acciones();
$transaccion = @$_REQUEST['transaccion'];
$cadenas = new Cadenas();
$proveedores = new Proveedores();
$ofertas = new Proveedores_Ofertas();
$actividades = new Proveedores_Actividades();

$documento = @$_REQUEST["documento" . $f->id];
$persona = $proveedores->tipo_persona($documento);
$proveedor = "";
if ($persona == "Natural") {
  $proveedor = $_REQUEST['proveedor'];
  $nombres = $cadenas->capitalizar(@$_REQUEST['nombres']);
  $apellidos = $cadenas->capitalizar(@$_REQUEST['apellidos']);
  $razon = $cadenas->capitalizar($apellidos . " " . $nombres);
  $alias = @$_REQUEST['alias'];
  $direccion = $cadenas->capitalizar($_REQUEST['direccion']);
  $proveedores->actualizar($proveedor, 'identificacion', $_REQUEST['identificacion']);
  $proveedores->actualizar($proveedor, 'documento', $_REQUEST['documento' . $f->id]);
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
  $acciones->crear($proveedores->usuario, $proveedores->modulo,"ACTUALIZAR","Actualizar Proveedor","1","");
} else if ($persona == "Juridica") {
  $proveedor = $_REQUEST['proveedor'];
  $razon = $cadenas->capitalizar(@$_REQUEST['razon']);
  $direccion = $cadenas->capitalizar($_REQUEST['direccion']);
  $proveedores->actualizar($proveedor, 'identificacion', $_REQUEST['identificacion']);
  $proveedores->actualizar($proveedor, 'documento', $_REQUEST['documento' . $f->id]);
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
  $acciones->crear($proveedores->usuario, $proveedores->modulo,"ACTUALIZAR","Actualizar Proveedor","1","");
} else {
  echo("Imposible de procesar: " . $persona);
}
?>
<script type="text/javascript">
  MUI.closeWindow($('<?php echo($f->ventana); ?>'));
  MUI.Proveedores_Proveedor_Consultar("<?php echo($proveedor); ?>");
</script>
