<?php
$archivos=new _Archivos();

$f->oculto("proveedor",$_REQUEST['proveedor']);
$html="<h1>Adjuntar Archivo del Proveedor.</h1>";
$html.="<p>En este formulario podrá adjuntar los archivos de la digitalización de los diferentes documentos físicos solicitados a los proveedores. Para adjuntar un documento deberá hacer clic en Adjuntar archivo local-Examinar. Recuerde que “no debe tener el archivo abierto” cuando lo vaya a adjuntar y debe verificar que el archivo esté guardado con un nombre “corto”.</p>";
$f->campos['archivo']=$f->archivo("archivo","application/pdf","");
$f->campos['categoria']=$archivos->categorias("categoria",$v['categoria']);
$f->campos['observacion']=$f->textarea("observacion","","textarea",25,80,false,false,false,255);
$f->campos['adjuntar']=$f->button("adjuntar".$transaccion,"button","Adjuntar");
// Celdas
$f->celdas['info']=$f->celda("",$html);
$f->celdas['archivo']=$f->celda("Archivo a cargar (*.pdf):",$f->campos['archivo']);
$f->celdas['categoria']=$f->celda("Categoria del archivo a cargar:",$f->campos['categoria']);
$f->celdas['observacion']=$f->celda("Observación / Comentario:",$f->campos['observacion']);
$f->celdas['siguiente']=$f->campos['adjuntar'];
// Filas
$f->fila["info"]=$f->fila($f->celdas['info']);
$f->fila["archivo"]=$f->fila($f->celdas['archivo']);
$f->fila["categoria"]=$f->fila($f->celdas['categoria']);
$f->fila["observacion"]=$f->fila($f->celdas['observacion']);
//Compilacion
$f->filas($f->fila['info']);
$f->filas($f->fila['categoria']);
$f->filas($f->fila['archivo']);
$f->filas($f->fila["observacion"]);
$f->botones($f->campos['adjuntar']);
?>
<script type="text/javascript">
  MUI.resizeWindow($('<?php echo($f->ventana); ?>'), {width: 390, height: 440, top: 0, left: 0});
  MUI.centerWindow($('<?php echo($f->ventana); ?>'));

  if ($('adjuntar<?php echo($transaccion); ?>')) {
    $('adjuntar<?php echo($transaccion); ?>').addEvent('click', function(e) {
      var upload = new File.Upload({
        url: 'modulos/proveedores/archivos/iUpload.php',
        data: {transaccion: '<?php echo($_REQUEST['transaccion']); ?>', proveedor: '<?php echo($_REQUEST['proveedor']); ?>', categoria: $('categoria').value, observacion: $('observacion').value},
        archivos: ['archivo'],
        onComplete: function(response) {
          //alert(response);
          var dhtml = response;
          $('<?php echo($f->interno); ?>').empty();
          new Element('div', {html: dhtml}).inject('<?php echo($f->interno); ?>', 'top');
        }
      });
      upload.send();
    });
  }


  function terminar<?php echo($transaccion); ?>() {
    MUI.Proveedores_Proveedor('<?php echo($_REQUEST['proveedor']); ?>');
    MUI.closeWindow($('<?php echo($f->ventana); ?>'));
  }













</script>