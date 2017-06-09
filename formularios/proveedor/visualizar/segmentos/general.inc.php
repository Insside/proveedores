<?php

if($persona=="Juridica"){
    require_once($_path . "/segmentos/general.juridico.inc.php");
}else{
    require_once($_path . "/segmentos/general.natural.inc.php");
}
?>