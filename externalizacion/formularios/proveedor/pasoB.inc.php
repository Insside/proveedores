<?php 
//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\ Se reciben los datos del formulario.
?>
<?php 
// Almacenar en la base de datos
/** $pqrs =new PQRS();
 $valor['solicitud'] = @$_REQUEST['solicitud'];
 $valor['dane'] = "0076111000";
 $valor['servicio'] = @$_REQUEST['servicio'];
 $valor['radicado'] = @$_REQUEST['solicitud']; // El radicado es igual al codigo de la solicitud
 $valor['radicacion'] = $fechas->hoy();
 $valor['categoria'] = @$_REQUEST['categoria'];
 $valor['causal'] = @$_REQUEST['causal'];
 $valor['asunto'] = @$_REQUEST['asunto'];
 $valor['detalle'] = @$_REQUEST['detalle'];
 $valor['suscriptor'] = @$_REQUEST['suscriptor'];
 $valor['factura'] = @$_REQUEST['factura'];
 $valor['respuesta'] = @$_REQUEST['respuesta'];
 $valor['contestacion'] = @$_REQUEST['contestacion'];
 $valor['radicada'] = @$_REQUEST['radicada'];
 $valor['notificado'] = @$_REQUEST['notificado'];
 $valor['notificacion'] = @$_REQUEST['notificacion'];
 $valor['sspd'] = @$_REQUEST['sspd'];
 $valor['creador'] = '0000000000';
 $valor['fecha'] = $fechas->hoy();
 $valor['nombres'] = $cadenas->capitalizar(@$_REQUEST['nombres']);
 $valor['apellidos'] = $cadenas->capitalizar(@$_REQUEST['apellidos']);
 $valor['documentos'] = @$_REQUEST['documentos'];
 $valor['identificacion'] = @$_REQUEST['identificacion'];
 $valor['nacimiento'] = @$_REQUEST['nacimiento'];
 $valor['sexo'] = @$_REQUEST['sexo'];
 $valor['telefono'] = @$_REQUEST['telefono'];
 $valor['movil'] = @$_REQUEST['movil'];
 $valor['correo'] = @$_REQUEST['correo'];
 $valor['pais'] = @$_REQUEST['pais'];
 $valor['region'] = @$_REQUEST['region'];
 $valor['ciudad'] = @$_REQUEST['ciudad'];
 $valor['sector'] = @$_REQUEST['sector'];
 $valor['direccion'] = $cadenas->capitalizar(@$_REQUEST['direccion']);
 $valor['referencia'] = $cadenas->capitalizar(@$_REQUEST['referencia']);
 $valor['expiracion'] = $fechas->sumar_diashabiles($valor['radicacion'], 15);

 $pqrs->solicitudes_crear($valor['solicitud']);
 $numero = count($valor);
 $tags = array_keys($valor);
 $valores = array_values($valor);
 for ($i = 0; $i < $numero; $i++) {
 $pqrs->actualizar($valor['solicitud'], $tags[$i], $valores[$i]);
 }
 * * */
?>
<table align="center" class="tabla"><tr><td><h2>Radicación Realizada</h2></td></tr></table>
<table align="center" class="tabla">
 <tr><td>
   <div id="i100x100_seguro" style="float: left;"></div>
   <p align="justify" style=" border:1px; line-height:16px; font-size:16px; padding-right:10px">
    Señor Usuario/Suscriptor Tenga en Cuenta los Términos para Responder las PQR. Aguas De Buga S.A. E.S.P deberá
    resolver la PQR presentada, dentro de los quince (15) días hábiles siguientes a su recibo, este término podrá ampliarse
    si hay lugar a la práctica de pruebas, situación que Aguas De Buga S.A. E.S.P le dará a conocer. En caso que usted no
    reciba respuesta de nuestra parte se aplicará lo relacionado con el silencio administrativo positivo. Recuerde
    conservar el código asignado a su solicitud, de haber proporcionado una dirección de correo electrónico una copia
    del código de su solicitud le ha sido enviada automáticamente.</p><br><br><br>
   <p align="center" style="font-size:50px; padding:25px"><?php  echo($_REQUEST['solicitud']); ?></p>
  </td></tr>
</tbody></table>