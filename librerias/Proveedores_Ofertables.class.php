<?php

if (!class_exists("Proveedores_Ofertables")) {

    class Proveedores_Ofertables {

        var $transaccion;

        function Ofertables() {
            $this->transaccion = @$_REQUEST['transaccion'];
        }

        function consultar($ofertable) {
            $db = new MySQL(Sesion::getConexion());
            $consulta = $db->sql_query("SELECT * FROM `proveedores_ofertables` WHERE `ofertable`='" . $ofertable . "' ;");
            $fila = $db->sql_fetchrow($consulta);
            $db->sql_close();
            return($fila);
        }

        /**
         * $nombre, $etiquetas, $valores, $tabla, $selected, $condicion = "", $class = ""
         * * */
        function combo($id, $selected, $class = "") {
            if (empty($selected)) {
                $selected = isset($_REQUEST['_' . $id]) ? $_REQUEST['_' . $id] : "";
            }
            $f = new Forms($this->transaccion);
            $html = $f->combo_consulta($id, "nombre", "ofertable", "proveedores_ofertables", $selected, "", $class);
            return($html);
        }

        /**
         * Esta función retorna un <<select>> con un listado de productos ofertables.
         * @param type $selected
         * @return type String Cadena con foramto HTML que representa un elemento tipo SELECT
         */
        public function seleccion($id = "oferta") {
            $db = new MySQL(Sesion::getConexion());
            $sql = "SELECT * FROM `proveedores_ofertables` ORDER BY `ofertable` ASC,`categoria` ASC";
            $consulta = $db->sql_query($sql);
            $html = "<div id=\"iMulti\" class=\"container\">\n";
            $html .= "<div class=\"firstSelection\">\n";
            $html .= "<div class=\"left\">\n";
            $html .= "<h2>Productos Comunes</h2>\n";
            $html .= "<ul class=\"jsMultipleSelect\" data-jsMultipleSelect=\"1\" data-type=\"remove\" data-name=\"" . $id . "\">\n";
            $html .= "<li class=\"filter\"><input type=\"text\" placeholder=\"Filtrar?\"></li>";
            while ($fila = $db->sql_fetchrow($consulta)) {
                $html .= "<li class=\"jsMultipleSelectOption\" data-value=\"" . $fila['ofertable'] . "\"><b>" . $fila['ofertable'] . "</b>: " . $fila['nombre'] . "</li>\n";
            }
            $db->sql_close();
            $html .= "</ul>\n";
            $html .= "</div>\n";
            $html .= "<div class=\"right\">\n";
            $html .= "<h2>Productos Proveidos [ <a href=\"#\" class=\"clearJsMultipleSelect\" data-jsMultipleSelect=\"1\">Limpiar</a> ] </h2>\n";
            $html .= "<ul class=\"jsMultipleSelectDestination\" data-jsMultipleSelect=\"1\">\n";
            /**
             * Se debe analizar si existe un elemento cuyo nombre coincida con el listado a generado
             * si es asi de deben recomponer los elementos que lo conforman
             */
            if (isset($_REQUEST['_' . $id])) {
                $datos = explode('|', $_REQUEST['_' . $id]);
                foreach ($datos as $ofertable) {
                    $registro = $this->consultar($ofertable);
                    $html .= "<li class=\"jsMultipleSelectOption\" data-value=\"" . $registro['ofertable'] . "\" data-name=\"" . $id . "\"><b>" . $registro['ofertable'] . "</b>: " . $registro['nombre'] . "</li>\n";
                }
            }
            $html .= "</ul>\n";
            //$html.="<a href=\"#\" class=\"clearJsMultipleSelect\" data-jsMultipleSelect=\"1\">Limpiar</a>\n";
            $html .= "</div>\n";
            $html .= "</div>\n";
            $html .= "</div>\n";
            $html .= "<script type=\"text/javascript\">\n";
            $html .= "window.addEvent('domready', function() {\n";
            $html .= "$$('ul.jsMultipleSelectDestination').addEvent('parsed', function(value, name, option, clone, optionBox) {\n";
            $html .= "});\n";
            $html .= "new jsMultipleSelect({highlightColor: '#fff'});\n";
            $html .= "$$('ul.jsMultipleSelectDestination').addEvent('select', function(value, name, option, clone, optionBox) {\n";
            $html .= "});\n";
            $html .= "});\n";
            $html .= "</script>\n";
            return($html);
        }

        /**
         * Esta función retorna un implode de un listado de los codigos de las actividades realizadas por un proveedor.
         *
         * @param type $selected
         * @return type String Cadena con foramto HTML que representa un elemento tipo SELECT
         */
        function implode_oferta($proveedor) {
            $db = new MySQL(Sesion::getConexion());
            $sql = "SELECT * FROM `proveedores_ofertas` WHERE(`proveedor`='" . $proveedor . "')ORDER BY `ofertable` DESC;";
            $consulta = $db->sql_query($sql);
            $filas = array();
            while ($fila = $db->sql_fetchrow($consulta)) {
                array_push($filas, $fila['ofertable']);
            }
            $db->sql_close();
            return(implode("|", $filas));
        }

        function tabla($proveedor) {

            $db = new MySQL(Sesion::getConexion());
            $sql = "SELECT * "
                    . "FROM `proveedores_ofertas` "
                    . "WHERE `proveedor` = '" . $proveedor . "';";
            $consulta = $db->sql_query($sql);
            $html = "<div class=\"etable\"><table>";
            $html .= ""
                    . "<tr>"
                    . "<th>Productos / Servicios Ofertados</th>"
                    . "</tr>";
            while ($fila = $db->sql_fetchrow($consulta)) {
                $ofertable = $this->consultar($fila['ofertable']);
                $html .= ""
                        . "<tr>"
                        . "<td><b>" . $fila['ofertable'] . "</b>: "
                        . "" . $ofertable['nombre'] . "</td>"
                        . "</tr>";
            }
            $html .= "</table></div>";

            $db->sql_close();
            return($html);
        }

    }

}
?>