<?php
/**
 * Este archivo recibe el nombre del archivo a eliminar y realiza la accion si valoraciones adiciones su
 * proceso implica dos acciones eliminar el registro de la base de datos y eliminar fisicamente el archivo
 * */
$archivos=new _Archivos();
$archivo=(@$_REQUEST['archivo']);
$archivo=$archivos->_eliminar($archivo);
?>
<script type="text/javascript">
  MUI.closeWindow($('<?php echo($f->ventana); ?>'));
  MUI.Proveedores_Proveedor('<?php echo($archivo['proveedor']); ?>');
</script>