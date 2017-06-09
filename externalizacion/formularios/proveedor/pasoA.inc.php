<style>
 #divProveedor{ position: relative; border: 1px; border-color: #CCCCCC; width: 100%; }
 #divProveedor  h2{   border: 1px solid #CCCCCC;display: block;font-size: 16px;font-weight: bold;height: 26px;line-height: 30px;margin-top: 10px;margin-bottom: 0px;padding-left: 20px;text-align: left;}

 #divProveedor .titular{ font-size: 12px; font-style: bold; width: 100%; height: 18px; background-color: #EEEEEE}
 #divProveedor p{ font-size: 14px ; line-height: 13px ;}

 #divProveedor .row {display:table; width:100%; border-left:1px solid #cccccc; border-bottom:1px solid #cccccc; }
 #divProveedor .cell {display:table-cell;vertical-align:top; border-right:1px solid #cccccc; padding:4px;font-size: 18;border-collapse: separate; }
 #divProveedor input{ font-size: 20px; height: 36px !important;padding: 0px; width: 100%;border:1px solid #cccccc;}
 #divProveedor select{height: 38px;font-size: 20px; width: 100%;padding: 5px; border:1px solid #cccccc;}

 #divProveedor #fecha{width: 110px;  text-transform: capitalize;}
 #divProveedor #actualizacion{width: 100px;  text-transform: capitalize;}
 #divProveedor #razon{width: 300px;  text-transform: capitalize;}

 #divProveedor #rnombres{width:200px; }
 #divProveedor #rapellidos{width: 200px; }
 #divProveedor #ridentificacion{width: 99%; }
 #divProveedor #rcargo{width: 99%; }

 #divProveedor #edireccion{width: 99%; }
 #divProveedor #eciudad{width: 99%; }
 #divProveedor #etelefonos{width: 99%; }
 #divProveedor #ecorreo{width: 99%; }

 #divProveedor #frnombres{width:200px; }
 #divProveedor #fapellidos{width: 200px; }
 #divProveedor #fdentificacion{width: 99%; }
 #divProveedor #fcargo{width: 99%; }
 #divProveedor #ftelefonos{width: 99%; }
 #divProveedor #fcorreo{width: 99%; }

 #divProveedor #ctipo{width: 99%; }
 #divProveedor #centidad{width: 99%; }
 #divProveedor #ccuenta{width: 99%; }

 #radios{ float: right; margin: 0px; padding-right: 10px;padding-top: 3px;}
 #radios .some-class { float:right; clear:none; }
 #radios label { float:left; clear:none; display:block; padding: 1px !important; }
 #radios input{ float:left; clear:none; margin: 2px 0 0 2px; height: 16px !important; width: 16px !important; }







 #divSolicitud #enviar{width: 150px; }
 #divSolicitud #capcha{width: 150px; }
 #divSolicitud .imgcapcha{border: 1px dashed #cccccc; padding: 20px; }
</style>


<?php 
$suscriptores =new Suscriptores();
$componentes =new Componentes();
$sectores =new Sectores();
$servicios =new Servicios();
$categorias =new Categorias();
$fechas =new Fechas();

$transaccion = @$_REQUEST['transaccion'];
$accion = @$_REQUEST['accion'];
$suscriptor = $suscriptores->consultar(@$_REQUEST['suscriptor']);
$solicitud = empty($_REQUEST['solicitud']) ? time() : $_REQUEST['solicitud'];


$campo['fecha'] = $componentes->text('fecha', $fechas->hoy(), '32', 'required date', true, false, "[ Requerido ]");
$campo['actualizacion'] = $componentes->combo_sino('actualizacion', @$_REQUEST['actualizacion']);
$campo['razon'] = $componentes->text('razon', @$_REQUEST['razon'], '32', 'required', true, false, "[ Requerido ]");
$campo['documento'] = $componentes->combo_documentos("documento", @$_REQUEST['documento']);
$campo['identificacion'] = $componentes->text('identificacion', @$_REQUEST['identificacion'], '32', 'required validate-digits', false, false, "[ Requerido ]");

$campo['rnombres'] = $componentes->text('rnombres', @$_REQUEST['rnombres'], '32', 'required', false, false, "[ Requerido ]");
$campo['rapellidos'] = $componentes->text('rapellidos', @$_REQUEST['rapellidos'], '32', 'required', false, false, "[ Requerido ]");
$campo['ridentificacion'] = $componentes->text('ridentificacion', @$_REQUEST['ridentificacion'], '32', 'required', false, false, "[ Requerido ]");
$campo['rcargo'] = $componentes->text('rcargo', @$_REQUEST['cargo'], '32', 'required', false, false, "[ Requerido ]");
$campo['ridentificacion'] = $componentes->text('ridentificacion', @$_REQUEST['cedula'], '32', 'required', false, false, "[ Requerido ]");


$campo['edireccion'] = $componentes->text('edireccion', @$_REQUEST['edireccion'], '32', 'required', false, false, "[ Requerido ]");
$campo['eciudad'] = $componentes->text('eciudad', @$_REQUEST['eciudad'], '32', 'required', false, false, "[ Requerido ]");
$campo['etelefonos'] = $componentes->text('etelefonos', @$_REQUEST['etelefonos'], '32', 'required', false, false, "[ Requerido ]");
$campo['ecorreo'] = $componentes->text('ecorreo', @$_REQUEST['ecorreo'], '32', 'validate-email', false, false, "[ Opcional ]");

$campo['fnombres'] = $componentes->text('rnombres', @$_REQUEST['fnombres'], '32', 'required', false, false, "[ Requerido ]");
$campo['fapellidos'] = $componentes->text('rapellidos', @$_REQUEST['fapellidos'], '32', 'required', false, false, "[ Requerido ]");
$campo['fidentificacion'] = $componentes->text('ridentificacion', @$_REQUEST['fidentificacion'], '32', 'required', false, false, "[ Requerido ]");
$campo['fcargo'] = $componentes->text('rcargo', @$_REQUEST['fcargo'], '32', 'required', false, false, "[ Requerido ]");
$campo['ftelefonos'] = $componentes->text('ftelefonos', @$_REQUEST['ftelefonos'], '32', 'validate-email', false, false, "[ Opcional ]");
$campo['fcorreo'] = $componentes->text('fcorreo', @$_REQUEST['fcorreo'], '32', 'validate-email', false, false, "[ Opcional ]");

$campo['cuentas'] = $proveedores->cuentas(@$_REQUEST['cuentas']);
$campo['entidades'] = $proveedores->entidades(@$_REQUEST['entidades']);
$campo['numero'] = $componentes->text('numero', @$_REQUEST['numero'], '32', '', false, false, "[ Opcional ]");

$campo['regimen'] = $proveedores->regimen(@$_REQUEST['regimen']);
$campo['calidad'] = $proveedores->calidad(@$_REQUEST['calidad']);
// 2. Linea De Productos Y/O Servicios Ofrecidos
$campo['servicio1'] = $componentes->text('servicio1', @$_REQUEST['servicio1'], '32', 'required', false, false, "[ Requerido ]");
$campo['servicio2'] = $componentes->text('servicio2', @$_REQUEST['servicio2'], '32', '', false, false, "[ Opcional ]");
$campo['servicio3'] = $componentes->text('servicio2', @$_REQUEST['servicio3'], '32', '', false, false, "[ Opcional ]");
$campo['servicio4'] = $componentes->text('servicio2', @$_REQUEST['servicio4'], '32', '', false, false, "[ Opcional ]");
$campo['servicio5'] = $componentes->text('servicio2', @$_REQUEST['servicio5'], '32', '', false, false, "[ Opcional ]");
$campo['servicio6'] = $componentes->text('servicio2', @$_REQUEST['servicio6'], '32', '', false, false, "[ Opcional ]");
$campo['servicio7'] = $componentes->text('servicio2', @$_REQUEST['servicio7'], '32', '', false, false, "[ Opcional ]");
$campo['servicio8'] = $componentes->text('servicio2', @$_REQUEST['servicio8'], '32', '', false, false, "[ Opcional ]");
$campo['servicio9'] = $componentes->text('servicio2', @$_REQUEST['servicio9'], '32', '', false, false, "[ Opcional ]");
// 3. Clientes
$campo['cliente1empresa'] = $componentes->text('cliente1empresa', @$_REQUEST['cliente1empresa'], '32', 'required', false, false, "[ Requerido ]");
$campo['cliente1contacto'] = $componentes->text('cliente1contacto', @$_REQUEST['cliente1contacto'], '32', 'required', false, false, "[ Requerido ]");
$campo['cliente1telefono'] = $componentes->text('cliente1telefono', @$_REQUEST['cliente1telefono'], '32', 'required', false, false, "[ Requerido ]");
$campo['cliente1productos'] = $componentes->text('cliente1productos', @$_REQUEST['cliente1productos'], '32', 'required', false, false, "[ Requerido ]");
$campo['cliente2empresa'] = $componentes->text('cliente2empresa', @$_REQUEST['cliente2empresa'], '32', '', false, false, "[ Opcional ]");
$campo['cliente2contacto'] = $componentes->text('cliente2contacto', @$_REQUEST['cliente2contacto'], '32', '', false, false, "[ Opcional ]");
$campo['cliente2telefono'] = $componentes->text('cliente2telefono', @$_REQUEST['cliente2telefono'], '32', '', false, false, "[ Opcional ]");
$campo['cliente2productos'] = $componentes->text('cliente2productos', @$_REQUEST['cliente2productos'], '32', '', false, false, "[ Opcional ]");
$campo['cliente3empresa'] = $componentes->text('cliente3empresa', @$_REQUEST['cliente3empresa'], '32', '', false, false, "[ Opcional ]");
$campo['cliente3contacto'] = $componentes->text('cliente3contacto', @$_REQUEST['cliente3contacto'], '32', '', false, false, "[ Opcional ]");
$campo['cliente3telefono'] = $componentes->text('cliente3telefono', @$_REQUEST['cliente3telefono'], '32', '', false, false, "[ Opcional ]");
$campo['cliente3productos'] = $componentes->text('cliente3productos', @$_REQUEST['cliente3productos'], '32', '', false, false, "[ Opcional ]");
$campo['cliente4empresa'] = $componentes->text('cliente4empresa', @$_REQUEST['cliente4empresa'], '32', '', false, false, "[ Opcional ]");
$campo['cliente4contacto'] = $componentes->text('cliente4contacto', @$_REQUEST['cliente4contacto'], '32', '', false, false, "[ Opcional ]");
$campo['cliente4telefono'] = $componentes->text('cliente4telefono', @$_REQUEST['cliente4telefono'], '32', '', false, false, "[ Opcional ]");
$campo['cliente4productos'] = $componentes->text('cliente4productos', @$_REQUEST['cliente4productos'], '32', '', false, false, "[ Opcional ]");
$campo['cliente5empresa'] = $componentes->text('cliente5empresa', @$_REQUEST['cliente5empresa'], '32', '', false, false, "[ Opcional ]");
$campo['cliente5contacto'] = $componentes->text('cliente5contacto', @$_REQUEST['cliente5contacto'], '32', '', false, false, "[ Opcional ]");
$campo['cliente5telefono'] = $componentes->text('cliente5telefono', @$_REQUEST['cliente5telefono'], '32', '', false, false, "[ Opcional ]");
$campo['cliente5productos'] = $componentes->text('cliente5productos', @$_REQUEST['cliente5productos'], '32', '', false, false, "[ Opcional ]");
// 4. Proveedores de Laboratorio
$campo['laboratoriotrazabilidad'] = '<div id="radios">
 <div class="some-class">
  <input type="radio" class="radio" name="x" value="y" id="y" />
  <label for="y">Si</label>
  <input type="radio" class="radio" name="x" value="z" id="z" />
  <label for="z">No</label>
 </div>
</div>';












$archivos = "modulos/solicitudes/archivos/index.php?suscriptor=" . $suscriptor['suscriptor'] . "&solicitud=" . $solicitud;
$campo['cargador'] = "<iframe src=\"" . ($archivos) . "\" width=\"100%\" height=\"200\" frameborder=\"0\" scrolling=\"auto\" align=\"top\" allowtransparency=\"1\" style=\"overflow-x:hidden; overflow-y:scroll;\"></iframe>";
?>


<div id="divSolicitud">
 <input type="hidden" name="accion" id="accion" value="verificar">
 <input type="hidden" id="solicitud" name="solicitud" value="<?php  echo($solicitud); ?>">

 <table align="center" class="tabla"><tbody>
   <tr><td colspan="4">
     <div style="border-top:solid 1px;border-bottom:solid 1px;text-align:center;background-color:#F1F6F9"><div><br>
       <b>FORMULARIO DE INSCRIPCIÓN DE PROVEEDORES FT-DAF-018 V. 6.0</b></div>
      <table><tr><td width="100"><div id="i100x100_seguro" style="float: left;"></div></td><td>
         <p align="justify" style=" border:1px; line-height:16px; font-size:16px; padding-right:10px">
          De la completitud y exactitud de la información proporcionada en el presente formulario dependerá la
          aprobación de su registro como proveedor, recuerde diligenciar en lo posible y en detalle todos los campos
          solicitados. No olvide adjuntar los documentos que se le solicitan para legitimar su trámite. Una vez
          completado el proceso sus datos permanecerán a la espera de aprobación, pudiendo consultar el estado de
          dicha aprobación en la opción correspondiente.</p></td></tr></table>
      <br></div></td></tr>
  </tbody>
 </table>


 <h2>1. Información General</h2>
 <div id="divProveedor">
  <div class="row">
   <div class="cell" style=""><div class="titular">Inscripción: </div><?php  echo($campo['fecha']); ?></div>
   <div class="cell" style=""><div class="titular">Actualización: </div><?php  echo($campo['actualizacion']); ?></div>
   <div class="cell" style=""><div class="titular">Razón Social:</div><?php  echo($campo['razon']); ?></div>
   <div class="cell" style=""><div class="titular">Identificación:</div><?php  echo($campo['documento']); ?></div>
   <div class="cell" style=""><div class="titular">Numero:</div><?php  echo($campo['identificacion']); ?></div>
  </div>
  <div class="row">
   <div class="cell" style=""><div class="titular">Representante Legal</div></div>
  </div>
  <div class="row">
   <div class="cell" style=""><div class="titular">Nombres: </div><?php  echo($campo['rnombres']); ?></div>
   <div class="cell" style=""><div class="titular">Apellidos: </div><?php  echo($campo['rapellidos']); ?></div>
   <div class="cell" style=""><div class="titular">Identificación: </div><?php  echo($campo['ridentificacion']); ?></div>
   <div class="cell" style=""><div class="titular">Cargo: </div><?php  echo($campo['rcargo']); ?></div>

  </div>
  <div class="row">
   <div class="cell" style=""><div class="titular">Dirección de la empresa y/o sucursal:</div><?php  echo($campo['edireccion']); ?></div>
   <div class="cell" style=""><div class="titular">Ciudad:</div><?php  echo($campo['eciudad']); ?></div>
   <div class="cell" style=""><div class="titular">Teléfonos (Fijos+movil):</div><?php  echo($campo['etelefonos']); ?></div>
   <div class="cell" style=""><div class="titular">Correo Electrónico: </div><?php  echo($campo['ecorreo']); ?></div>
  </div>
  <div class="row">
   <div class="cell" style=""><div class="titular">Funcionario Asignado</div></div>
  </div>
  <div class="row">
   <div class="cell" style=""><div class="titular">Nombres: </div><?php  echo($campo['fnombres']); ?></div>
   <div class="cell" style=""><div class="titular">Apellidos: </div><?php  echo($campo['fapellidos']); ?></div>
   <div class="cell" style=""><div class="titular">Identificación: </div><?php  echo($campo['fidentificacion']); ?></div>
   <div class="cell" style=""><div class="titular">Cargo:</div><?php  echo($campo['fcargo']); ?></div>
  </div>
  <div class="row">
   <div class="cell" style=""><div class="titular">Teléfonos (Fijos+movil):</div><?php  echo($campo['ftelefonos']); ?></div>
   <div class="cell" style=""><div class="titular">Correo Electrónico: </div><?php  echo($campo['fcorreo']); ?></div>
  </div>
  <div class="row">
   <div class="cell" style=""><div class="titular">Diligencie los siguientes datos si desean aceptar consignaciones en su cuenta bancaria</div></div>
  </div>
  <div class="row">
   <div class="cell" style=""><div class="titular">Tipo De Cuenta:</div><?php  echo($campo['cuentas']); ?></div>
   <div class="cell" style=""><div class="titular">Entidad Bancaria: </div><?php  echo($campo['entidades']); ?></div>
   <div class="cell" style=""><div class="titular">Numero De La Cuenta:</div><?php  echo($campo['numero']); ?></div>
  </div>
  <div class="row">
   <div class="cell" style=""><div class="titular"><b>Régimen del Proveedor</b> (seleccione el régimen al cual pertenece):</div><?php  echo($campo['regimen']); ?></div>
   <div class="cell" style=""><div class="titular">Tiene algún Sistema de Gestión de Calidad implementado:</div><?php  echo($campo['calidad']); ?></div>

  </div>
 </div>
 <h2>2. Línea De Productos Y/O Servicios Ofrecidos</h2>
 <div id="divProveedor">
  <div class="row">
   <div class="cell" style=""><div class="titular">Servicio 1: </div><?php  echo($campo['servicio1']); ?></div>
   <div class="cell" style=""><div class="titular">Servicio 2: </div><?php  echo($campo['servicio2']); ?></div>
   <div class="cell" style=""><div class="titular">Servicio 3: </div><?php  echo($campo['servicio3']); ?></div>
  </div>
  <div class="row">
   <div class="cell" style=""><div class="titular">Servicio 4: </div><?php  echo($campo['servicio4']); ?></div>
   <div class="cell" style=""><div class="titular">Servicio 5: </div><?php  echo($campo['servicio5']); ?></div>
   <div class="cell" style=""><div class="titular">Servicio 6: </div><?php  echo($campo['servicio6']); ?></div>
  </div>
  <div class="row">
   <div class="cell" style=""><div class="titular">Servicio 7: </div><?php  echo($campo['servicio7']); ?></div>
   <div class="cell" style=""><div class="titular">Servicio 8: </div><?php  echo($campo['servicio8']); ?></div>
   <div class="cell" style=""><div class="titular">Servicio 9: </div><?php  echo($campo['servicio9']); ?></div>
  </div>
 </div>
 <h2>3. Clientes (Liste Sus Principales Clientes)</h2>
 <div id="divProveedor">
  <div class="row">
   <div class="cell" style=""><div class="titular">Nombre Empresa: </div><?php  echo($campo['cliente1empresa']); ?></div>
   <div class="cell" style=""><div class="titular">Nombre De Contacto: </div><?php  echo($campo['cliente1contacto']); ?></div>
   <div class="cell" style=""><div class="titular">Teléfono: </div><?php  echo($campo['cliente1telefono']); ?></div>
   <div class="cell" style=""><div class="titular">Productos Que Compra: </div><?php  echo($campo['cliente1productos']); ?></div>
  </div>
  <div class="row">
   <div class="cell" style=""><div class="titular">Nombre Empresa: </div><?php  echo($campo['cliente2empresa']); ?></div>
   <div class="cell" style=""><div class="titular">Nombre De Contacto: </div><?php  echo($campo['cliente2contacto']); ?></div>
   <div class="cell" style=""><div class="titular">Teléfono: </div><?php  echo($campo['cliente2telefono']); ?></div>
   <div class="cell" style=""><div class="titular">Productos Que Compra: </div><?php  echo($campo['cliente2productos']); ?></div>
  </div>
  <div class="row">
   <div class="cell" style=""><div class="titular">Nombre Empresa: </div><?php  echo($campo['cliente3empresa']); ?></div>
   <div class="cell" style=""><div class="titular">Nombre De Contacto: </div><?php  echo($campo['cliente3contacto']); ?></div>
   <div class="cell" style=""><div class="titular">Teléfono: </div><?php  echo($campo['cliente3telefono']); ?></div>
   <div class="cell" style=""><div class="titular">Productos Que Compra: </div><?php  echo($campo['cliente3productos']); ?></div>
  </div>
  <div class="row">
   <div class="cell" style=""><div class="titular">Nombre Empresa: </div><?php  echo($campo['cliente4empresa']); ?></div>
   <div class="cell" style=""><div class="titular">Nombre De Contacto: </div><?php  echo($campo['cliente4contacto']); ?></div>
   <div class="cell" style=""><div class="titular">Teléfono: </div><?php  echo($campo['cliente4telefono']); ?></div>
   <div class="cell" style=""><div class="titular">Productos Que Compra: </div><?php  echo($campo['cliente4productos']); ?></div>
  </div>
  <div class="row">
   <div class="cell" style=""><div class="titular">Nombre Empresa: </div><?php  echo($campo['cliente5empresa']); ?></div>
   <div class="cell" style=""><div class="titular">Nombre De Contacto: </div><?php  echo($campo['cliente5contacto']); ?></div>
   <div class="cell" style=""><div class="titular">Teléfono: </div><?php  echo($campo['cliente5telefono']); ?></div>
   <div class="cell" style=""><div class="titular">Productos Que Compra: </div><?php  echo($campo['cliente5productos']); ?></div>
  </div>

 </div>
 <h2>4. Proveedores De Laboratorio (Uso Exclusivo)</h2>
 <div id="divProveedor">
  <div class="row"><div class="cell" style=""><div class="titular"><b>4.1. Servicio De Calibración De Equipos Críticos De Seguimiento Y Medición.</b></div></div></div>
  <div class="row"><div class="cell" style="width:90%"><div class="titular">Cuentan con patrones de referencia y materiales de referencia, con certificados de trazabilidad nacional o internacional?</div></div><?php  echo($campo['laboratoriotrazabilidad']); ?></div>
  <div class="row"> <div class="cell" style="width:90%"><div class="titular">Cuenta con planes de calibración de los patrones y materiales de referencia?	:</div></div><?php  echo($campo['laboratoriotrazabilidad']); ?></div>
  <div class="row"><div class="cell" style="width:90%"><div class="titular">Aplican estándares validados nacional o internacionalmente para la calibración de equipos?:</div></div><?php  echo($campo['laboratoriotrazabilidad']); ?></div>
  <div class="row"><div class="cell" style="width:90%"><div class="titular">* Adjuntar hoja de vida del personal encargado del servicio de calibración y/o mantenimiento.</div></div><?php  echo($campo['laboratoriotrazabilidad']); ?></div>
  <div class="row"><div class="cell" style="width:90%"><div class="titular"><b>4.2. Servicio Posventa.</b></div></div></div>
  <div class="row"><div class="cell" style="width:90%"><div class="titular">Se ofrece servicio posventa y cuentan con metodología establecida para su prestación?	</div></div><?php  echo($campo['laboratoriotrazabilidad']); ?> </div>
  <div class="row"><div class="cell" style="width:90%"><div class="titular">El personal que presta el servicio posventa, es competente? (adjuntar los certificados que desmuestran la compentencia)</div></div><?php  echo($campo['laboratoriotrazabilidad']); ?> </div>
  <div class="row"><div class="cell" style="width:90%"><div class="titular">Las garantías por daños durante el mantenimiento de los equipos, cubren reposición o reparación de equipos?.</div></div><?php  echo($campo['laboratoriotrazabilidad']); ?> </div>
  <div class="row"> <div class="cell" style=""><div class="titular"><b>4.3. Capacitación / Aseguramiento.</b></div></div></div>
  <div class="row"><div class="cell" style="width:90%"><div class="titular">Cuenta con la competencia técnica para realizar capacitaciones en el tema requerido por el programa de formación (adjuntar hoja de vida).</div></div><?php  echo($campo['laboratoriotrazabilidad']); ?> </div>
  <div class="row"><div class="cell" style="width:90%"><div class="titular">Cuenta con experiencia en la realización de este tipo de capacitaciones (anexar referencias).</div></div><?php  echo($campo['laboratoriotrazabilidad']); ?> </div>
  <div class="row"><div class="cell" style="width:90%"><div class="titular">Aceptaría que trabajadores de Aguas de Buga S.A E.S.P visitaran sus instalaciones para verificar la calidad del producto, previa solicitud nuestra?	.</div></div><?php  echo($campo['laboratoriotrazabilidad']); ?> </div>
 </div>
 <h2>5. Adjuntar La Siguiente Documentación:</h2>
 <div id="divProveedor">
  <div class="row"><div class="cell" style="heigt:100px;">
    <p>
     <b>Persona Natural régimen simplificado</b>: Fotocopia del documento de identificación, certificado de Cámara y Comercio (si tiene), RUT actualizado, fotocopia de la tarjeta profesional (si aplica), certificación dela cuenta bancaria (si la tiene). <br>
     <b>Personal Natural régimen común</b>: Fotocopia del documento de identificación, certificado de Cámara y Comercio, RUT actualizado, fotocopia de la tarjeta profesional (si aplica), certificación de la cuenta bancaria.<br>
     <b>Persona Jurídica: Portafolio de servicios, Fotocopia del documento de identificación del representante legal, RUT actualizado, certificado de Cámara y Comercio reciente, certificación de la cuenta bancaria.</br>
      <u>Documentos adicionales para Proveedores del laboratorio: Certificado de acreditación o certificación de la casa matriz para realizar el servicio, certificado de trazabilidad de los equipos."		</u>
    </p>
   </div>	</div></div>
</b></div>
<script type="text/javascript">
 new OverText('razon', {positionOptions: {offset: {x: 2, y: 2}}});
 new OverText('identificacion', {positionOptions: {offset: {x: 2, y: 2}}});
 new OverText('representante', {positionOptions: {offset: {x: 2, y: 2}}});
 new OverText('cargo', {positionOptions: {offset: {x: 2, y: 2}}});
 new OverText('cedula', {positionOptions: {offset: {x: 2, y: 2}}});
 new OverText('direccion', {positionOptions: {offset: {x: 2, y: 2}}});
 new OverText('ciudad', {positionOptions: {offset: {x: 2, y: 2}}});
 new OverText('telefonos', {positionOptions: {offset: {x: 2, y: 2}}});
 new OverText('correo', {positionOptions: {offset: {x: 2, y: 2}}});
</script>