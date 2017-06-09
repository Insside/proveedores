<?php 
$ROOT = (!isset($ROOT)) ? "../../../" : $ROOT;
require_once($ROOT . "modulos/proveedores/librerias/Configuracion.cnf.php");
//\\//\\//\\//\\ Variables Generadas //\\//\\//\\//\\
$sesion =new Sesion();
$transaccion = @$_REQUEST['transaccion'];
$accion = @$_REQUEST['accion'];
$formulario =new Forms($transaccion);
echo($formulario->apertura());
if (empty($accion) || $accion == "cancelar") {
 require_once($ROOT . "modulos/proveedores/formularios/proveedor/pasoA.inc.php");
} else {
 require_once($ROOT . "modulos/proveedores/formularios/proveedor/pasoB.inc.php");
}
echo($formulario->cierre());
?>
<?php  if (empty($accion)) { ?>
 <script type="text/javascript">
  var fv =new Form.Validator.Inline($('<?php  echo($formulario['id'] ); ?>'));
  new Form.Request($('<?php  echo($formulario['id'] ); ?>'), $('<?php  echo($formulario['interno'] ); ?>'), {
   requestOptions: {
    spinnerOptions: {
     message: 'Trasmitiendo datos...'
    }
   },
   onSend: function() {

   },
   onSuccess: function() {
    if ($('<?php  echo($formulario['interno'] ); ?>') && MUI.options.standardEffects == true) {
     $('<?php  echo($formulario['interno'] ); ?>').setStyle('opacity', 0).get('morph').start({'opacity': 1});
    }
   }
  });
 </script>
<?php  } ?>