<?php
$componentes=new Componentes();
$html="<h1>1. Categoría del Proveedor.</h1>";
$html.="<p><b>Personas Naturales</b>: Son personas naturales todos los individuos de la especie humana, cualquiera que sea su edad, sexo, estirpe o condición y que tiene responsabilidad ilimitada, es decir responde por sus actos por la via civil y/o con indemnizaciones según el caso que se dé. La Constitución colombiana en el artículo 14 establece que toda persona tiene el derecho a su reconocimiento de su personalidad jurídica. Las personas naturales tienen, por el solo hecho de existir, atributos dados por el Derecho. La persona desde el punto de vista jurídico tiene muchos atributos como lo son el nombre, el domicilio, la nacionalidad, etc. Todas las personas poseen un patrimonio que es inalienable, es decir, que no se puede separar de su dueño, el cual puede contraer nuevas obligaciones o derechos y ser cedidos entre unos y otros pero el patrimonio continuara vinculado indefinidamente a la persona mientras subsista, el patrimonio es lo único que las personas nunca pierden sea cual sea.</p>";
$html.="<p><b>Personas Juridicas</b>: Persona jurídica es la que esta constituida por papeles, es decir escritura pública o formato de constitución, tiene responsabilidad limitada, es decir responde por obligaciones solamente por la vía monetaria con indemnizaciones. Se llama persona jurídica a un ente de creacion legal, ficticio, capaz de contraer obligaciones y ejercer derechos y de ser reprepresentada judicial y extrajudicialmente. Las personas jurídicas tienen en su historia varios nombres y han atravesado por diversas etapas, bien sean estas teóricas o prácticas. El nacimiento de esta institución tiene lugar en Roma, y específicamente en el derecho romano, donde los primeros Peritos y Pretores le dan nacimiento jurídico a una institución que sin saber perduraría por decenas de siglos y aún dos mil años después seguiría hablándose de ésta y perfeccionándose en el sistema jurídico.</p>";
$f->campos['contribuyente']=$componentes->combo_contribuyente("contribuyente",$v['contribuyente']);
$f->campos['siguiente']="<input name=\"enviar\"  id=\"enviar\" type=\"submit\" value=\"Continuar\"/>";
// Celdas
$f->celdas['info']=$f->celda("",$html);
$f->celdas['contribuyente']=$f->campos['contribuyente'];
$f->celdas['siguiente']=$f->campos['siguiente'];
// Filas
$f->fila["info"]=$f->fila($f->celdas['info']);
$f->fila["controles"]=$f->fila($f->celdas['siguiente'].$f->celdas['contribuyente'],"herramientas");
//Compilacion
$f->filas($f->fila['info']);
$f->filas($f->fila['controles']);
?>
<style>
  #contribuyente{width: 350px;}
</style>