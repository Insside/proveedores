<?php 

print_r($_GET); // data is store in get
print_r($_FILES); // our images
// Establecemos el directorio donde se guardan los ficheros
$sDirGuardar="archivos/";
$iContFicSubidos=0;

// Recorremos los Ficheros recibidos
foreach($_FILES as $vFichero){

 // Se establece el fichero con el nombre original
 $sFichero=$sDirGuardar.$vFichero["name"];

 // Si el archivo ya existe, no lo guardamos
 if(file_exists($sFichero)){
  echo "<br/>El archivo ".$vFichero["name"]." ya existe, ".$sDirGuardar."<br/>";
  continue;
 }

 // Copiamos de la dirección temporal al directorio final

 if(filesize($vFichero["tmp_name"]))
  if(!(move_uploaded_file($vFichero["tmp_name"],$sFichero))){
   echo "<br/>Error al escribir el archivo ".$vFichero["name"]."<br/>";
  }else{
   chmod($sFichero,0666);
   $iContFicSubidos++;
  }
}

echo "<br/>Fin de ejecución de 'GuardaArchivosFormulario', $iContFicSubidos archivos subidos.<br/>";
?>