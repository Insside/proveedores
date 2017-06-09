<?php

if (!class_exists("Proveedores_Actividades")) {

    class Proveedores_Actividades {

        var $sesion;
        var $fechas;

        function Actividades() {
            $this->sesion = new Sesion();
            $this->fechas = new Fechas();
        }

        function consultar($actividad, $anno) {
            $db = new MySQL(Sesion::getConexion());
            $sql = "SELECT * "
                    . "FROM `proveedores_actividades` "
                    . "WHERE (`actividad`='" . $actividad . "' AND `anno`='" . $anno . "') ;";
            $consulta = $db->sql_query($sql);
            $fila = $db->sql_fetchrow($consulta);
            $db->sql_close();
            //echo($sql);
            return($fila);
        }

        /**
         * Esta función retorna un <<select>> con un listado de productos ofertables.
         * @param type $selected
         * @return type String Cadena con foramto HTML que representa un elemento tipo SELECT
         */
        public function seleccion($id, $proveedor) {
            $anno = "2012";
            $db = new MySQL(Sesion::getConexion());
            $sql = "SELECT * FROM `proveedores_actividades` ORDER BY `actividad` ASC";
            $consulta = $db->sql_query($sql);
            $html = "<div id=\"iMulti\" class=\"container\">\n";
            $html .= "<div class=\"firstSelection\">\n";
            $html .= "<div class=\"left\">\n";
            $html .= "<h2>Actividades DIAN</h2>\n";
            $html .= "<ul class=\"jsMultipleSelect\" data-jsMultipleSelect=\"1\" data-type=\"duplicates\" data-name=\"" . $id . "\">\n";
            $html .= "<li class=\"filter\"><input type=\"text\" placeholder=\"Filtrar?\"></li>";
            while ($fila = $db->sql_fetchrow($consulta)) {
                $html .= "<li class=\"jsMultipleSelectOption\" data-value=\"" . $fila['actividad'] . "-" . $fila['anno'] . "\" data-type=\"remove\"><b>" . $fila['anno'] . "-" . $fila['actividad'] . "</b>: " . $fila['descripcion'] . "</li>\n";
            }
            $db->sql_close();
            $html .= "</ul>\n";
            $html .= "</div>\n";
            $html .= "<div class=\"right\">\n";
            $html .= "<h2>Desarrolladas [ <a href=\"#\" class=\"clearJsMultipleSelect\" data-jsMultipleSelect=\"1\">Limpiar</a> ] </h2>\n";
            $html .= "<ul class=\"jsMultipleSelectDestination\" data-jsMultipleSelect=\"1\">\n";
            /**
             * Se debe analizar si existe un elemento cuyo nombre coincida con el listado a generado
             * si es asi de deben recomponer los elementos que lo conforman
             */
            $db = new MySQL(Sesion::getConexion());
            $sql = "SELECT * "
                    . "FROM `proveedores_actividades_desarrolladas`"
                    . "WHERE(`proveedor`='" . $proveedor . "')"
                    . "ORDER BY `actividad`,`anno` ASC";
            $consulta = $db->sql_query($sql);
            while ($fila = $db->sql_fetchrow($consulta)) {
                $actividad = $this->consultar($fila['actividad'], $fila['anno']);
                $html .= "<li class=\"jsMultipleSelectOption\" data-value=\"" . $actividad['actividad'] . "-" . $actividad['anno'] . "\" data-name=\"" . $id . "\"><b>" . $actividad['anno'] . "-" . $actividad['actividad'] . "</b>: " . $actividad['descripcion'] . "</li>\n";
            }
            $db->sql_close();
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
         * Esta función retorna un vector con el listado de las actividades desarrolladas por el proveedor.
         * @param type $selected
         * @return type String Cadena con foramto HTML que representa un elemento tipo SELECT
         */
        function desarrolladas($proveedor) {
            $db = new MySQL(Sesion::getConexion());
            $sql = "SELECT * FROM `proveedores_actividades_desarrolladas` WHERE(`proveedor`='" . $proveedor . "')ORDER BY `actividad` DESC;";
            $consulta = $db->sql_query($sql);
            $filas = array();
            while ($fila = $db->sql_fetchrow($consulta)) {
                array_push($filas, $fila);
            }
            $db->sql_close();
            return($filas);
        }

        /**
         * Esta función retorna un vector con el listado de las actividades desarrolladas por el proveedor.
         * @param type $selected
         * @return type String Cadena con foramto HTML que representa un elemento tipo SELECT
         */
        function purgar($proveedor, $anno = "2012") {
            $db = new MySQL(Sesion::getConexion());
            $sql = "DELETE FROM `proveedores_actividades_desarrolladas` WHERE `proveedor`='" . $proveedor . "' AND  `anno`='" . $anno . "';";
            $consulta = $db->sql_query($sql);
            $db->sql_close();
            return($consulta);
        }

        /**
         * Esta función retorna un implode de un listado de los codigos de las actividades realizadas por un proveedor.
         *
         * @param type $selected
         * @return type String Cadena con foramto HTML que representa un elemento tipo SELECT
         */
        function implode_desarrolladas($proveedor) {
            $db = new MySQL(Sesion::getConexion());
            $sql = "SELECT * FROM `proveedores_actividades_desarrolladas` WHERE(`proveedor`='" . $proveedor . "')ORDER BY `actividad` DESC;
            ";
            $consulta = $db->sql_query($sql);
            $filas = array();
            while ($fila = $db->sql_fetchrow($consulta)) {
                array_push($filas, $fila['actividad']);
            }
            $db->sql_close();
            return(implode("|", $filas));
        }

        /**
         * Registra el desarrollo de una actividad por parte de un proveedor
         * @param type $proveedor
         * @param type $actividad
         * @return type
         */
        function asignar($proveedor, $actividad) {
            $actividad = explode("-", $actividad);
            $db = new MySQL(Sesion::getConexion());
            $sql = "INSERT INTO `proveedores_actividades_desarrolladas` SET ";
            $sql .= "`proveedor`='" . $proveedor . "',";
            $sql .= "`actividad`='" . $actividad[0] . "',";
            $sql .= "`anno`='" . $actividad[1] . "',";
            $sql .= "`fecha`='" . $this->fechas->hoy() . "'," . "`hora`='" . $this->fechas->ahora() . "',";
            $sql .= "`creador`='" . $this->sesion->getValue("usuario") . "';
            ";
            $consulta = $db->sql_query($sql);
            $db->sql_close();
            echo($sql);
            return($consulta);
        }

        /**
         * Recibe y registra un listado de actividades desarrolladas por un proveedor.
         * @param type $proveedor
         * @param type $listado
         */
        function registrar($proveedor, $listado) {
            foreach ($listado as $actividad) {
                $this->asignar($proveedor, $actividad);
            }
        }

        function tabla($proveedor) {
            $cadenas=new Cadenas();
            $db = new MySQL(Sesion::getConexion());
            $sql = "SELECT * "
                    . "FROM `proveedores_actividades_desarrolladas` "
                    . "WHERE `proveedor` = '" . $proveedor . "';";
            $consulta = $db->sql_query($sql);
            $html = "<div class=\"etable\"><table>";
            $html .= ""
                    . "<tr>"
                    . "<th>Histórico / Actividades Desarrolladas</th>"
                    . "</tr>";
            while ($fila = $db->sql_fetchrow($consulta)) {
                $actividad = $this->consultar($fila['actividad'], $fila['anno']);
                $html .= ""
                        . "<tr>"
                        . "<td><b>" . $fila['actividad'] . "-" . $fila['anno'] . "</b>: "
                        . "" . $cadenas->capitalizar($actividad['descripcion']) . "</td>"
                        . "</tr>";
            }
            $html .= "</table></div>";

            $db->sql_close();
            return($html);
        }

    }

}
?>