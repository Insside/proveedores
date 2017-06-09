<?php

if (!class_exists("Proveedores_Regimenes")) {

    class Proveedores_Regimenes {

        var $transaccion;

        function Regimenes() {
            $this->transaccion = @$_REQUEST['transaccion'];
        }

        function consultar($regimen) {
            $db = new MySQL(Sesion::getConexion());
            $sql = "SELECT * FROM `proveedores_regimenes` WHERE(`regimen`='" . $regimen . "')";
            $consulta = $db->sql_query($sql);
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
            $html = $f->combo_consulta($id, "nombre", "regimen", "proveedores_regimenes", $selected, "", $class);
            return($html);
        }

    }

}
?>
