<?php

if (!class_exists("Proveedores_Contactos")) {

    class Proveedores_Contactos {

        public function crear($datos = array()) {
            if (is_array($datos)) {
                $db = new MySQL(Sesion::getConexion());
                $sql = "INSERT INTO `proveedores_contactos` SET "
                        . "`contacto`='" . $datos['contacto'] . "',"
                        . "`identificacion`='" . $datos['identificacion'] . "',"
                        . "`documento`='" . $datos['documento'] . "',"
                        . "`nombres`='" . $datos['nombres'] . "',"
                        . "`apellidos`='" . $datos['apellidos'] . "',"
                        . "`direccion`='" . $datos['direccion'] . "',"
                        . "`telefonos`='" . $datos['telefonos'] . "',"
                        . "`email`='" . $datos['email'] . "',"
                        . "`fecha`='" . $datos['fecha'] . "',"
                        . "`hora`='" . $datos['hora'] . "',"
                        . "`proveedor`='" . $datos['proveedor'] . "',"
                        . "`cargo`='" . $datos['cargo'] . "',"
                        . "`creador`='" . $datos['creador'] . "'"
                        . ";";
                $db->sql_query($sql);
                $db->sql_close();
            } else {
                echo("Error: Proveedores_Contactos::crear se esperaba un vector.");
            }
        }

        public function actualizar($contacto, $campo, $valor) {
            $db = new MySQL(Sesion::getConexion());
            $sql = "UPDATE `proveedores_contactos` "
                    . "SET `" . $campo . "`='" . $valor . "' "
                    . "WHERE `contacto`='" . $contacto . "';";
            $db->sql_query($sql);
            $db->sql_close();
        }

        public function eliminar($contacto) {
            $db = new MySQL(Sesion::getConexion());
            $sql = "DELETE FROM `proveedores_contactos` "
                    . "WHERE `contacto`='" . $contacto . "';";
            $db->sql_query($sql);
            $db->sql_close();
        }

        public function consultar($contacto) {
            $db = new MySQL(Sesion::getConexion());
            $sql = "SELECT * FROM `proveedores_contactos` "
                    . "WHERE `contacto`='" . $contacto . "';";
            $consulta = $db->sql_query($sql);
            $fila = $db->sql_fetchrow($consulta);
            $db->sql_close();
            return($fila);
        }

        function tabla($proveedor,$tabla,$ventana) {
            $cadenas = new Cadenas();
            $cargos = new Cargos();
            $db = new MySQL(Sesion::getConexion());
            $sql = "SELECT * "
                    . "FROM `proveedores_contactos` "
                    . "WHERE `proveedor` = '" . $proveedor . "';";
            $consulta = $db->sql_query($sql);
            $html = "<div class=\"$tabla\"><table>";
            $html .= ""
                    . "<tr>"
                    . "<th>Fecha</th>"
                    . "<th>Identificación</th>"
                    . "<th>Detalles</th>"
                    . "<th></th>"
                    . "</tr>";
            while ($fila = $db->sql_fetchrow($consulta)) {
                $cargo = $cargos->consultar($fila['cargo']);
                $html .= "<tr>"
                        . "<td align=\"center\">" . $fila['fecha'] . "</td>"
                        . "<td>" . $fila['documento'] . $fila['identificacion'] . "</td>"
                        . "<td>"
                        . "<b>" . $cargo['titulo'] . "</b>: " 
                        . "<a href=\"#\">".$cadenas->capitalizar($fila['nombres'] . " " . $fila['apellidos']) . "</a>"
                        . "</td>"
                        . "<td><a href=\"#\" onClick=\""
                        . "MUI.closeWindow($('" . $ventana . "'));"
                        . "MUI.Proveedores_Contacto_Eliminar('" . $fila['contacto'] . "');\"><img src=\"imagenes/16x16/eliminar.png\"></a></td>"
                        . "</tr>";
            }
            $html .= "</table></div>";

            $db->sql_close();
            return($html);
        }

    }

}
?>