<?php
/*
 * Copyright (c) 2013, Alexis
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
$ROOT = (!isset($ROOT)) ? "../../../../" : $ROOT;
require_once($ROOT . "modulos/aplicacion/librerias/Configuracion.cnf.php");
$transaccion = isset($_REQUEST['transaccion']) ? $_REQUEST['transaccion'] : time();
$f = new Forms($transaccion);
echo($f->apertura());

$f->campos['continuar'] = $f->button("continuar" . $transaccion, "button", "Continuar");

$f->celdas['icono'] = "<div class=\"i100x100_advertencia\" style=\"float: left;\"></div>";
$f->celdas['info'] = "<p>No ha seleccionado el proveedor o proveedores a eliminar, seleccione en primera instancia el proveedor que desea eliminar haciendo clic sobre el mismo, si desea realizar una selección múltiple presione mayúsculas sostenido en tanto hace clic sobre los proveedores a seleccionar., luego presione el botón eliminar para completar el procedimiento.</p>";
$f->filas['info'] = $f->fila($f->celdas['icono'] . $f->celdas['info']);

$f->fila($f->filas['info']);
$f->botones($f->campos['continuar'], "inferior-derecha");

echo($f->generar());
echo($f->controles());
echo($f->cierre());
?>
<script type="text/javascript">
  MUI.resizeWindow($('<?php echo($f->ventana); ?>'), {width: 390, height: 170, top: 0, left: 0});
  MUI.centerWindow($('<?php echo($f->ventana); ?>'));

  if ($('continuar<?php echo($transaccion); ?>')) {
    $('continuar<?php echo($transaccion); ?>').addEvent('click', function(e) {
      MUI.closeWindow($('<?php echo($f->ventana); ?>'));
    });
  }
</script>