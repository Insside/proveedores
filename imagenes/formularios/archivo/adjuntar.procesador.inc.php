<?php 

$ruta="../archivos/".$_REQUEST['proveedor'];

if(!file_exists($ruta)){
 mkdir($ruta);
}else{

}

print_r($_FILES); // our images
// Establecemos el directorio donde se guardan los ficheros
$ruta="archivos/";
$iContFicSubidos=0;

// Recorremos los Ficheros recibidos
foreach($_FILES as $vFichero){

 // Se establece el fichero con el nombre original
 $sFichero=$ruta.$vFichero["name"];

 // Si el archivo ya existe, no lo guardamos
 if(file_exists($sFichero)){
  echo "<br/>El archivo ".$vFichero["name"]." ya existe, ".$ruta."<br/>";
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








/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

