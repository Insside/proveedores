<div id="menu_modulos">
 <h2>Proveedores</h2>
 <div class="content" style="padding-top: 0px; border-top: medium none; padding-bottom: 0px; border-bottom: medium none; overflow: hidden; opacity: 0; height: 0px;">
  <table width="100%" id="elementos">
   <tr><td width="20" align="center" valign="middle"><img src="imagenes/33x33/funciones-33x33.fw.png"/></td><td valign="middle"><a href="#" onclick="MUI.Proveedores_Consultar();">Consultar<br /><span>Estado Proveedor.</span></a></td></tr>
   <tr><td width="20" align="center" valign="middle"><img src="imagenes/33x33/funciones-33x33.fw.png"/></td><td valign="middle"><a href="#" onclick="MUI.Proveedores_Registrar();">Registrarse<br /><span>Nuevo Proveedor.</span></a></td></tr>
  </table>
 </div>

 <h2>F.A.Q's</h2>
 <div class="content" style="padding-top: 0px; border-top: medium none; padding-bottom: 0px; border-bottom: medium none; overflow: hidden; opacity: 0; height: 0px;">
  <table width="100%" id="elementos">
   <tr><td width="20" align="center" valign="middle"><img src="imagenes/33x33/funciones-33x33.fw.png"/></td><td valign="middle"><a href="#" onclick="MUI.Notificacion('Preguntas Frecuentes');">General<br /><span>Preguntas Frecuentes.</span></a></td></tr>
  </table>
 </div>
</div>
<script>
    var a =new Accordion($('menu_modulos'), '#menu_modulos h2', '#menu_modulos .content');
</script>