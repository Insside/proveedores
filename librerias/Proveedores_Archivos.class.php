<?php

if (!class_exists("Proveedores_Archivos")) {

    class Proveedores_Archivos extends Archivos {

        var $transaccion;
        var $fechas;

        function _Archivos() {
            $this->fechas = new Fechas();
            $this->transaccion = @$_REQUEST['transaccion'];
        }

        /**
         * Permite registrar un archivo cargado al sistema relacionalmente con un proveedor.
         * @param type $categoria
         * @param type $nombre
         * @param type $observacion
         * @param type $ruta
         * @param type $tamanno
         */
        public function registrar($archivo, $proveedor, $categoria, $nombre, $observacion, $ruta, $tamanno, $creador) {
            $db = new MySQL(Sesion::getConexion());
            $sql = "INSERT INTO `proveedores_archivos` SET ";
            $sql .= "`archivo`='" . $archivo . "',";
            $sql .= "`proveedor`='" . $proveedor . "',";
            $sql .= "`categoria`='" . $categoria . "',";
            $sql .= "`nombre`='" . $nombre . "',";
            $sql .= "`observacion`='" . $observacion . "',";
            $sql .= "`ruta`='" . $ruta . "',";
            $sql .= "`tamanno`='" . $tamanno . "',";
            $sql .= "`fecha`='" . $this->fechas->hoy() . "',";
            $sql .= "`hora`='" . $this->fechas->ahora() . "',";
            $sql .= "`creador`='" . $creador . "';";
            $consulta = $db->sql_query($sql);
            $db->sql_close();
            return($consulta);
        }

        /**
         * Retorna el HTML corespondiente a un elemento tipo <<select>> el cual contiene el listado de las
         * categorias asignables a los archivos que se adjuntan en el formulario de proveedores
         * */
        function categoria($categoria) {
            $db = new MySQL(Sesion::getConexion());
            $consulta = $db->sql_query("SELECT * FROM `proveedores_archivos_categorias` WHERE `categoria` = '" . $categoria . "'");
            $fila = $db->sql_fetchrow($consulta);
            $db->sql_close();
            return($fila);
        }

        /**
         * Retorna el HTML corespondiente a un elemento tipo <<select>> el cual contiene el listado de las
         * categorias asignables a los archivos que se adjuntan en el formulario de proveedores
         * */
        function categorias($id, $selected, $class = "") {
            if (empty($selected)) {
                $selected = isset($_REQUEST['_' . $id]) ? $_REQUEST['_' . $id] : "";
            }
            $f = new Forms($this->transaccion);
            $html = $f->combo_consulta($id, "nombre", "categoria", "proveedores_archivos_categorias", $selected, "", $class);
            return($html);
        }

        /**
         * Permite consultar los datos de un archivo registrado en la tabla <<proveedores_archivos>>, no se relaciona
         * con ningun ancestro conocido asta la fecha
         * @param type $archivo
         * @return type
         */
        function _consultar($archivo) {
            $db = new MySQL(Sesion::getConexion());
            $sql = "SELECT * FROM `proveedores_archivos` WHERE `archivo` = '" . $archivo . "'";
            $consulta = $db->sql_query($sql);
            $fila = $db->sql_fetchrow($consulta);
            $db->sql_close();
            return($fila);
        }

        /**
         * Esta funcion implementa el procedimiento necesario para eliminar un archivo relacionado con un proveedor
         * en primera instancia elimina el registro de la tabla correspondiente en la base de datos <<proveedores_archivos>>
         * en segunda instancia elimina el archivo fisicamnete valiendose de la funcion implementada por su
         * ancestro <<Archivos::Eliminar>>
         * @param type $archivo
         * @return type
         */
        function _eliminar($archivo) {
            $db = new MySQL(Sesion::getConexion());
            $sql = "DELETE FROM `proveedores_archivos` WHERE `archivo`='" . $archivo . "';";
            echo($sql);
            $consulta = $db->sql_query($sql);
            $db->sql_close();
            return($consulta);
        }

        function tabla($proveedor, $usuario) {
            $usuarios = new Proveedores_Usuarios();
            $db = new MySQL(Sesion::getConexion());
            $consulta = $db->sql_query("SELECT * FROM `proveedores_archivos` WHERE `proveedor` = '" . $proveedor . "' ORDER BY `fecha` DESC, `hora` DESC");
            $html = "<div class=\"etable\"><table>";
            $html .= "<tr>"
                    . "<th>Archivo</th>"
                    . "<th>Detalles</th>"
                    . "<th>Fecha</th>"
                    . "<th>Hora</th>"
                    . "<th></th>"
                    . "</tr>";
            while ($fila = $db->sql_fetchrow($consulta)) {
                $categoria = $this->categoria($fila['categoria']);
                $html .= "<tr>";
                $html .= "<td><b>" . $fila['archivo'] . "</b></td>";
                $html .= "<td><a href=\"" . $fila['ruta'] . "\" target=\"_blanck\"> " . $categoria['nombre'] . "</a> <i>" . $fila['nombre'] . "</i></td>";
                $html .= "<td>" . $fila['fecha'] . "</td>";
                $html .= "<td>" . $fila['hora'] . "</td>";
                $permiso["pae"] = $usuarios->permiso("PROVEEDORES-ARCHIVOS-ELIMINAR", $usuario);
                $permiso["paet"] = $usuarios->permiso("PROVEEDORES-ARCHIVOS-ELIMINAR-TODOS", $usuario);
                if ($permiso["paet"]) {
                    $html .= "<td><a href=\"#\" onClick=\"MUI.Proveedores_Archivo_Eliminar('" . $fila['archivo'] . "');\"><img src=\"imagenes/16x16/eliminar.png\"></a></td>";
                } elseif ($permiso["pae"] && $fila["creador"] == $usuario) {
                    $html .= "<td><a href=\"#\" onClick=\"MUI.Proveedores_Archivo_Eliminar('" . $fila['archivo'] . "');\"><img src=\"imagenes/16x16/eliminar.png\"></a></td>";
                }
                $html .= "</tr>";
            }
            $html .= "</table></div>";
            $db->sql_close();
            return($html);
        }

        /**
         * Obtiene el listado de archivos adjuntos a un perfil de proveedor
         */
        public function getArchivos($proveedor) {
            $db = new MySQL(Sesion::getConexion());
            $sql = "SELECT * "
                    . "FROM `proveedores_archivos` "
                    . "WHERE `proveedor` = '" . $proveedor . "'";
            $consulta = $db->sql_query($sql);
            $archivos = array();
            while ($fila = $db->sql_fetchrow($consulta)) {
                array_push($archivos, $fila);
            }
            $db->sql_close();
            return($archivos);
        }

        /**
         * Verifica el estado de los archivos de un proveedor dependiendo del tipo
         * es necesario que algunos archivos especificos se encuentren adjuntos 
         * en el sistema de lo contrario retornara error.
         * @param type $proveedor
         */
        public function getEstado($proveedor) {
            $archivos=$this->getArchivos($proveedor);
            return(count($archivos));
        }

    }

}
?>