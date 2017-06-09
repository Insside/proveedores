<?php 
$v['archivo']=@$_REQUEST['archivo'];
$f->oculto("archivo",$v['archivo']);

$html="<div class=\"i100x100_irreversible\" style=\"float: left;\"></div>";
$html.="<div class=\"notificacion\"><p><b>Eliminar Archivo del Proveedor.</b><br>";
$html.="Se dispone a eliminar un archivo relacionado con un proveedor se le solicita considere que esta ";
$html.="acción es irreversible antes de proceder, confirme o cancele la presente solicitud para poder continuar.";
$html.="<b>Proveedor</b>: ";
$html.="<b>Archivo</b>: ".$v['archivo'];
$html.="</p></div>";
$f->campos['archivo']=$f->archivo("archivo","application/pdf","");
$f->campos['observacion']=$f->textarea("observacion","","textarea",25,80,false,false,false,255);
$f->campos['eliminar']=$f->button("eliminar".$transaccion,"submit","Confirmar");
$f->campos['cancelar']=$f->button("cancelar".$transaccion,"button","Cancelar");
// Celdas
$f->celdas['info']=$f->celda("",$html,"","notificacion");
// Filas
$f->fila["info"]=$f->fila($f->celdas['info'],"notificacion");
//Compilacion
$f->filas($f->fila['info']);
$f->botones($f->campos['eliminar']);
$f->botones($f->campos['cancelar']);
?>
<script type="text/javascript">
 MUI.resizeWindow($('<?php  echo($f->ventana); ?>'), {width: 390, height: 190, top: 0, left: 0});
 MUI.centerWindow($('<?php  echo($f->ventana); ?>'));

 if ($('cancelar<?php  echo($transaccion); ?>')) {
  $('cancelar<?php  echo($transaccion); ?>').addEvent('click', function(e) {
   MUI.closeWindow($('<?php  echo($f->ventana); ?>'));
  });
 }

</script>