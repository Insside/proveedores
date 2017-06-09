<?php

$ROOT = (!isset($ROOT)) ? "../../../" : $ROOT;
require_once($ROOT . "modulos/proveedores/librerias/Configuracion.cnf.php");
/*
 * Copyright (c) 2014, Jose Alexis Correa Valencia
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

/**
 * Description of Responsabilidades
 *
 * @author Alexis
 */
if (!class_exists("Proveedores_Responsabilidades")) {

    class Proveedores_Responsabilidades {

        var $sesion;
        var $fechas;

        function Responsabilidades() {
            $this->sesion = new Sesion();
            $this->fechas = new fechas();
        }

        function responsabilidad($responsabilidad) {
            $db = new MySQL(Sesion::getConexion());
            $consulta = $db->sql_query(""
                    . "SELECT * FROM `proveedores_responsabilidades_tributarias` "
                    . "WHERE `responsabilidad` = '" . $responsabilidad . "'");
            $fila = $db->sql_fetchrow($consulta);
            $db->sql_close();
            return($fila);
        }

        /**
         * Esta función retorna un <<select>> con un listado de productos ofertables.
         * @param type $selected
         * @return type String Cadena con foramto HTML que representa un elemento tipo SELECT
         */
        public function seleccion($id, $proveedor) {
            $cadenas = new Cadenas();
            $anno = "2012";
            $db = new MySQL(Sesion::getConexion());
            $sql = "SELECT * FROM `proveedores_responsabilidades_tributarias` ORDER BY `responsabilidad` ASC";
            $consulta = $db->sql_query($sql);
            $html = "<div id=\"iMulti\" class=\"container\">\n";
            $html .= "<div class=\"firstSelection\">\n";
            $html .= "<div class=\"left\">\n";
            $html .= "<h2>Responsabilidades</h2>\n";
            $html .= "<ul class=\"jsMultipleSelect\" data-jsMultipleSelect=\"1\" data-type=\"duplicates\" data-name=\"" . $id . "\">\n";
            $html .= "<li class=\"filter\"><input type=\"text\" placeholder=\"Filtrar?\"></li>";
            while ($fila = $db->sql_fetchrow($consulta)) {
                $html .= "<li class=\"jsMultipleSelectOption\" data-value=\"" . $fila['responsabilidad'] . "\" data-type=\"remove\"><b>" . $fila['responsabilidad'] . "</b>: " . $cadenas->capitalizar($fila['nombre']) . "</li>\n";
            }
            $db->sql_close();
            $html .= "</ul>\n";
            $html .= "</div>\n";
            $html .= "<div class=\"right\">\n";
            $html .= "<h2>Adquiridas [ <a href=\"#\" class=\"clearJsMultipleSelect\" data-jsMultipleSelect=\"1\">Limpiar</a> ] </h2>\n";
            $html .= "<ul class=\"jsMultipleSelectDestination\" data-jsMultipleSelect=\"1\">\n";
            /**
             * Se debe analizar si existe un elemento cuyo nombre coincida con el listado a generado
             * si es asi de deben recomponer los elementos que lo conforman
             */
            $db = new MySQL(Sesion::getConexion());
            $sql = "SELECT * "
                    . "FROM `proveedores_responsabilidades_tributarias_adquiridas`"
                    . "WHERE(`proveedor`='" . $proveedor . "')"
                    . "ORDER BY `responsabilidad` ASC";
            $consulta = $db->sql_query($sql);
            while ($fila = $db->sql_fetchrow($consulta)) {
                $responsabilidad = $this->responsabilidad($fila['responsabilidad']);
                $html .= "<li class=\"jsMultipleSelectOption\" data-value=\"" . $responsabilidad['responsabilidad'] . "\" data-name=\"" . $id . "\"><b>" . $responsabilidad['responsabilidad'] . "</b>: " . $cadenas->capitalizar($responsabilidad['nombre']) . "</li>\n";
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

        //put your code here
        function combo($id, $selected, $class = "") {
            if (empty($selected)) {
                $selected = isset($_REQUEST['_' . $id]) ? $_REQUEST['_' . $id] : "";
            }
            $f = new Forms($this->transaccion);
            $html = $f->combo_consulta($id, "nombre", "responsabilidad", "proveedores_responsabilidades_tributarias", $selected, "", $class);
            return($html);
        }

        /**
         * Recibe y registra un listado de actividades desarrolladas por un proveedor.
         * @param type $proveedor
         * @param type $listado




         */
        function registrar($proveedor, $listado) {
            foreach ($listado as $responsabilidad) {
                $this->asignar($proveedor, $responsabilidad);
            }
        }

        /**
         * Registra el desarrollo de una actividad por parte de un proveedor
         * @param type $proveedor
         * @param type $actividad
         * @return type
         */
        function asignar($proveedor, $responsabilidad) {
            $db = new MySQL(Sesion::getConexion());
            $sql = "INSERT INTO `proveedores_responsabilidades_tributarias_adquiridas` SET ";
            $sql .= "`proveedor`='" . $proveedor . "',";
            $sql .= "`responsabilidad`='" . $responsabilidad . "',";
            $sql .= "`fecha`='" . $this->fechas->hoy() . "'," . "`hora`='" . $this->fechas->ahora() . "',";
            $sql .= "`creador`='" . $this->sesion->getValue("usuario") . "';";
            $consulta = $db->sql_query($sql);
            $db->sql_close();
            return($consulta);
        }

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

        function purgar($proveedor) {
            $db = new MySQL(Sesion::getConexion());
            $sql = "DELETE FROM `proveedores_responsabilidades_tributarias_adquiridas` WHERE `proveedor`='" . $proveedor . "';";
            $consulta = $db->sql_query($sql);
            $db->sql_close();
            return($consulta);
        }

        function tabla($proveedor) {

            $db = new MySQL(Sesion::getConexion());
            $sql = "SELECT * "
                    . "FROM `proveedores_responsabilidades_tributarias_adquiridas` "
                    . "WHERE `proveedor` = '" . $proveedor . "';";
            $consulta = $db->sql_query($sql);
            $html = "<div class=\"etable\"><table>";
            $html .= ""
                    . "<tr>"
                    . "<th>Responsabilidades del Proveedor</th>"
                    . "</tr>";
            while ($fila = $db->sql_fetchrow($consulta)) {
                $responsabilidad = $this->responsabilidad($fila['responsabilidad']);
                $html .= ""
                        . "<tr>"
                        . "<td><b>" . $fila['responsabilidad'] . "</b>: "
                        . "" . $responsabilidad['nombre'] . "</td>"
                        . "</tr>";
            }
            $html .= "</table></div>";

            $db->sql_close();
            return($html);
        }

    }

}
?>