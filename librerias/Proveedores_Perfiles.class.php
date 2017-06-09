<?php

if (!class_exists('Proveedores_Perfiles')) {

    class Proveedores_Perfiles {

        public function crear($datos = array()) {
            if (is_array($datos)) {
                $db = new MySQL(Sesion::getConexion());
                $sql = "INSERT INTO `proveedores_perfiles` SET "
                        . "`proveedor`='" . $datos['proveedor'] . "',"
                        . "`identificacion`='" . $datos['identificacion'] . "',"
                        . "`digito`='" . $datos['digito'] . "',"
                        . "`documento`='" . $datos['documento'] . "',"
                        . "`nombres`='" . $datos['nombres'] . "',"
                        . "`apellidos`='" . $datos['apellidos'] . "',"
                        . "`cargo`='" . $datos['cargo'] . "',"
                        . "`alias`='" . $datos['alias'] . "',"
                        . "`razon`='" . $datos['razon'] . "',"
                        . "`regimen`='" . $datos['regimen'] . "',"
                        . "`direccion`='" . $datos['direccion'] . "',"
                        . "`ciudad`='" . $datos['ciudad'] . "',"
                        . "`region`='" . $datos['region'] . "',"
                        . "`pais`='" . $datos['pais'] . "',"
                        . "`telefono`='" . $datos['telefono'] . "',"
                        . "`fax`='" . $datos['fax'] . "',"
                        . "`movil`='" . $datos['movil'] . "',"
                        . "`correo`='" . $datos['correo'] . "',"
                        . "`actividad`='" . $datos['actividad'] . "',"
                        . "`texterior`='" . $datos['texterior'] . "',"
                        . "`autoretenedor`='" . $datos['autoretenedor'] . "',"
                        . "`acreedor`='" . $datos['acreedor'] . "',"
                        . "`deudor`='" . $datos['deudor'] . "',"
                        . "`giro`='" . $datos['giro'] . "',"
                        . "`consignacion`='" . $datos['consignacion'] . "',"
                        . "`banco_entidad`='" . $datos['banco_entidad'] . "',"
                        . "`banco_sucursal`='" . $datos['banco_sucursal'] . "',"
                        . "`banco_cuenta`='" . $datos['banco_cuenta'] . "',"
                        . "`banco_cuenta_titular_identificacion`='" . $datos['banco_cuenta_titular_identificacion'] . "',"
                        . "`banco_cuenta_titular`='" . $datos['banco_cuenta_titular'] . "',"
                        . "`nombre_tercero`='" . $datos['nombre_tercero'] . "',"
                        . "`banco_tipo_cuenta`='" . $datos['banco_tipo_cuenta'] . "',"
                        . "`sector_economico`='" . $datos['sector_economico'] . "',"
                        . "`representante_identificacion`='" . $datos['representante_identificacion'] . "',"
                        . "`representante_nombres`='" . $datos['representante_nombres'] . "',"
                        . "`representante_apellidos`='" . $datos['representante_apellidos'] . "',"
                        . "`nombre_externo_origen`='" . $datos['nombre_externo_origen'] . "',"
                        . "`pago_unico`='" . $datos['pago_unico'] . "',"
                        . "`centro_utilidad`='" . $datos['centro_utilidad'] . "',"
                        . "`fecha`='" . $datos['fecha'] . "',"
                        . "`hora`='" . $datos['hora'] . "',"
                        . "`creador`='" . $datos['creador'] . "',"
                        . "`gc`='" . $datos['gc'] . "',"
                        . "`sgc`='" . $datos['sgc'] . "',"
                        . "`imagen`='" . $datos['imagen'] . "'"
                        . ";";
                $db->sql_query($sql);
                $db->sql_close();
            } else {
                echo("Error: Proveedores_Perfiles::crear se esperaba un vector.");
            }
        }

        public function actualizar($proveedor, $campo, $valor) {
            $db = new MySQL(Sesion::getConexion());
            $sql = "UPDATE `proveedores_perfiles` "
                    . "SET `" . $campo . "`='" . $valor . "' "
                    . "WHERE `proveedor`='" . $proveedor . "';";
            $db->sql_query($sql);
            $db->sql_close();
        }

        public function eliminar($proveedor) {
            $db = new MySQL(Sesion::getConexion());
            $sql = "DELETE FROM `proveedores_perfiles` "
                    . "WHERE `proveedor`='" . $proveedor . "';";
            $db->sql_query($sql);
            $db->sql_close();
        }

        public function consultar($proveedor) {
            $db = new MySQL(Sesion::getConexion());
            $sql = "SELECT * FROM `proveedores_perfiles` "
                    . "WHERE `proveedor`='" . $proveedor . "';";
            $consulta = $db->sql_query($sql);
            $fila = $db->sql_fetchrow($consulta);
            $db->sql_close();
            return($fila);
        }

        /**
         * Retorna el numero exacto de proveedores registrados en la base de datos, acepta una expresion SQL
         * como filtro de control para realizar la contabilizacion
         * @return type
         */
        function conteo_sql($sql) {
            $db = new MySQL(Sesion::getConexion());
            $sql = "SELECT Count(`proveedor`) AS `conteo` FROM `proveedores_perfiles` " . $sql . ";";
            $consulta = $db->sql_query($sql);
            $fila = $db->sql_fetchrow($consulta);
            return(intval($fila['conteo']));
        }
        
        /**
         * Retorna el numero total de personas Naturales Registradas en las 
         * base de datos.
         * @return type
         */
    public function getConteoNaturales() {
            $db = new MySQL(Sesion::getConexion());
            $sql = ""
                    . "SELECT Count(`proveedor`) AS `conteo` "
                    . "FROM `proveedores_perfiles` "
                    . "WHERE(`documento`='CM' OR `documento`='NIT');";
            $consulta = $db->sql_query($sql);
            $fila = $db->sql_fetchrow($consulta);
            return(intval($fila['conteo']));
        }
        
        
         public function getConteoJuridicos() {
            $db = new MySQL(Sesion::getConexion());
            $sql = ""
                    . "SELECT Count(`proveedor`) AS `conteo` "
                    . "FROM `proveedores_perfiles` "
                    . "WHERE(`documento`='CC' OR `documento`='CE' OR `documento`='NITT' OR `documento`='TI');";
            $consulta = $db->sql_query($sql);
            $fila = $db->sql_fetchrow($consulta);
            return(intval($fila['conteo']));
        }   
        

        function conteo($opcion) {
            if ($opcion == "todos") {
                return($this->conteo_sql(""));
            } else if ($opcion == "naturales") {
                return($this->conteo_sql("WHERE(`documento`='CC' OR `documento`='CE' OR `documento`='NITT' OR `documento`='TI')"));
            } else if ($opcion == "juridicos") {
                return($this->conteo_sql("WHERE(`documento`='CM' OR `documento`='NIT')"));
            } else {
                return("Error");
            }
        }

        /**
         * Esta funcion evalua si la naturaleza juridica de un proveedor retornando su tipo segun el tipo de documento
         * aportado en el registo CC,CE,NITT,TI indicaran que es una persona natural, CM,NIT indican que es una persona
         * juridica
         * @param type $documento
         */
        public function getPersona($documento) {
            if ($documento == "CC" || $documento == "CE" || $documento == "NITT" || $documento == "TI") {
                return("Natural");
            } elseif ($documento == "NIT" || $documento == "CM") {
                return("Juridica");
            } else {
                return("Error");
            }
        }

        /**
         * Retorna el estado de la información asociada aun proveedor
         * @param type $perfil
         * @return type
         */
        public function getEstados($perfil) {
            $pa = new Proveedores_Archivos();
            $ca = $pa->getEstado($perfil);
            if (intval($ca) > 0) {
                $html = "<span class=\"estado-adjuntos-existentes\">ADJ$ca</span>";
            } else {
                $html = "<span class=\"estado-adjuntos-inexistentes\">ADJ0</span>";
            }
            return($html);
        }

        /**
         * Retorna el valor de todos los pagos asociados a un proveedor
         * @param type $perfil
         * @return type
         */
        function getPagos($proveedor) {
            setlocale(LC_MONETARY, 'es_CO');
            $db = new MySQL(Sesion::getConexion());
            $sql = ""
                    . "SELECT "
                    . "`tesoreria_solicitudes_cheques`.`proveedor` AS `proveedor`,  "
                    . "Sum(`tesoreria_solicitudes_cheques`.`valor`) AS `total` "
                    . "FROM  `tesoreria_solicitudes_cheques`  "
                    . "WHERE(`proveedor` = '$proveedor')"
                    . "GROUP BY   `tesoreria_solicitudes_cheques`.`proveedor`"
                    . ";";
            $consulta = $db->sql_query($sql);
            $fila = $db->sql_fetchrow($consulta);
            $db->sql_close();
            return($fila["total"]);
        }
        
        /**
         * Retorna el listado de los campos utilizables como parametros de consulta
         * sobre la tabla de proveedores_perfiles.
         * @param type $parametros
         * @return type
         */
        public function getFieldsList() {
            $campos[0]=array("value"=>"proveedor","label"=>"Código de Proveedor ");
            $campos[1]=array("value"=>"identificacion","label"=>"Identifiación");
            $campos[2]=array("value"=>"razon","label"=>"Razón Social");
            return($campos);
        }

    }

}
?>