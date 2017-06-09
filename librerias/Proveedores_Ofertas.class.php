<?php

if (!class_exists("Proveedores_Ofertas")) {

    class Proveedores_Ofertas {

        var $transaccion;
        var $sesion, $fechas;

        function Ofertas() {
            $this->transaccion = @$_REQUEST['transaccion'];
            $this->sesion = new Sesion();
            $this->fechas = new Fechas();
        }

        function crear($proveedor, $ofertable) {
            $db = new MySQL(Sesion::getConexion());
            $sql = "INSERT INTO `proveedores_ofertas` SET ";
            $sql .= "`proveedor`='" . $proveedor . "',";
            $sql .= "`ofertable`='" . $ofertable . "',";
            $sql .= "`fecha`='" . $this->fechas->hoy() . "'," . "`hora`='" . $this->fechas->ahora() . "',";
            $sql .= "`creador`='" . $this->sesion->getValue("usuario") . "';";
            $consulta = $db->sql_query($sql);
            $db->sql_close();
            return($consulta);
        }

        function proveidas($proveedor) {
            $db = new MySQL(Sesion::getConexion());
            $sql = "SELECT * FROM `proveedores_ofertas` WHERE(`proveedor`='" . $proveedor . "')ORDER BY `ofertable` DESC;";
            $consulta = $db->sql_query($sql);
            $filas = array();
            while ($fila = $db->sql_fetchrow($consulta)) {
                array_push($filas, $fila);
            }
            $db->sql_close();
            return($filas);
        }

        function registrar($proveedor, $listado) {
            $datos = explode('|', $listado);
            foreach ($datos as $ofertable) {
                $this->crear($proveedor, $ofertable);
            }
        }

        /**
         * Elimina toda la oferta asociada a un proveedor especifico
         * @param type $selected
         * @return type String Cadena con foramto HTML que representa un elemento tipo SELECT
         */
        function purgar($proveedor) {
            $db = new MySQL(Sesion::getConexion());
            $sql = "DELETE FROM `proveedores_ofertas` WHERE `proveedor`='" . $proveedor . "';";
            echo($sql);
            $consulta = $db->sql_query($sql);
            $db->sql_close();
            return($consulta);
        }

    }

}
?>