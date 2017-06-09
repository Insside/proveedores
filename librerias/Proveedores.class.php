<?php

$ROOT = (!isset($ROOT)) ? "../../../" : $ROOT;
require_once($ROOT . "modulos/proveedores/librerias/Configuracion.cnf.php");

class Proveedores {

    var $sesion;
    var $fechas;
    var $componentes;
    var $permisos;
    var $modulos;
    var $modulo;
    var $usuario;

    function Proveedores() {
        $this->sesion = new Sesion();
        $this->fechas = new Fechas();
        $this->componentes = new Componentes();
        $this->permisos = new Usuarios_Permisos();
        $this->modulos = new Aplicacion_Modulos();
        $this->usuario = $this->sesion->getValue("usuario");
    }

    /**
     * Permite crear un nuevo proveedor
     */
    public function crear() {
        $proveedor = time();
        $db = new MySQL(Sesion::getConexion());
        $sql = "INSERT INTO `proveedores_perfiles` SET ";
        $sql .= "`proveedor`='" . $proveedor . "',";
        $sql .= "`fecha`='" . $this->fechas->hoy() . "',";
        $sql .= "`hora`='" . $this->fechas->ahora() . "',";
        $sql .= "`creador`='" . $this->sesion->getValue("usuario") . "';";
        $consulta = $db->sql_query($sql);
        $db->sql_close();
        return($proveedor);
    }

    function actualizar($proveedor, $campo, $valor) {
        $db = new MySQL(Sesion::getConexion());
        $sql = "UPDATE `proveedores_perfiles` SET ";
        $sql .= "`" . $campo . "`='" . $valor . "' ";
        $sql .= " WHERE `proveedor`='" . $proveedor . "'";
        $sql .= ";";
        $consulta = $db->sql_query($sql);
        $db->sql_close();
        return($sql);
    }

    /**
     * Retorna toda la información asociada a un proveedor con solo consultar su codigo de identificación
     * @param type $proveedor
     * @return type
     */
    function consultar($proveedor) {
        $db = new MySQL(Sesion::getConexion());
        $acentos = $db->sql_query("SET NAMES 'utf8'");
        $consulta = $db->sql_query("SELECT * FROM `proveedores_perfiles` WHERE `proveedor` = '" . $proveedor . "'");
        $fila = $db->sql_fetchrow($consulta);
        $db->sql_close();

        return($fila);
    }

    function eliminar($proveedor) {
        $db = new MySQL(Sesion::getConexion());
        $sql = "DELETE FROM `proveedores_perfiles` WHERE `proveedor`='" . $proveedor . "';";
        $consulta = $db->sql_query($sql);
        $db->sql_close();
        return($consulta);
    }

    /**
     * Retorna toda la información asociada a un proveedor con solo consultar su codigo de identificación
     * @param type $proveedor
     * @return type
     */
    function identificacion($identificacion) {
        $db = new MySQL(Sesion::getConexion());
        $sql = ("SELECT * FROM `proveedores_perfiles` WHERE `identificacion` = '" . $identificacion . "'");
        $consulta = $db->sql_query($sql);
        $fila = $db->sql_fetchrow($consulta);
        $db->sql_close();
        if ($fila['identificacion'] == $identificacion) {
            return($fila);
        } else {
            return(null);
        }
    }

  

    function nombre($empleado) {
        return($this->dato($empleado, 'nombres') . " " . $this->dato($empleado, 'apellidos'));
    }

    function dato($empleado, $dato) {
        $db = new MySQL(Sesion::getConexion());
        $sql = "SELECT * FROM `datos` WHERE `empleado` = '" . $empleado . "' AND `dato` = '" . $dato . "';";
        //echo($sql);
        $consulta = $db->sql_query($sql);
        $fila = $db->sql_fetchrow($consulta);
        $db->sql_close();
        return($fila['valor']);
    }

    /**
     * Retorna el tipo de cuenta indicada por el proveedor en el formulario correspondiente.
     * @param type $selected
     * @return type
     */
    function cuentas($selected) {
        $componentes = new Componentes();
        $name = "cuentas";
        $etiquetas = array("Ahorro", "Corriente");
        $valores = array("Ahorro", "Corriente");
        return($componentes->combo($name, $etiquetas, $valores, $selected));
    }

    /**
     * Retorna el tipo de cuenta indicada por el proveedor en el formulario correspondiente.
     * @param type $selected
     * @return type
     */
    function entidades($selected) {
        $componentes = new Componentes();
        $name = "entidades";
        $etiquetas = array("Bancafé", "Banco AV Villas", "Banco Bilbao Vizcaya Argentaria Colombia S.A. (BBVA )", "Banco Caja Social BCSC", "Banco de Bogotá", "Banco de Credito", "Banco de la República de Colombia", "Banco de Occidente", "Banco GNB Sudameris", "Banco Granahorrar", "Banco Popular", "Banco Popular Colombia", "Banco Santander Colombia", "Bancoldex", "Bancolombia", "BBVA Banco Ganadero", "Citi Bank", "Colmena BCSC", "Colpatria", "Conavi", "Credit Suisse Representaciõn para Colombia", "Davivienda", "Deutsche Bank", "Helm Financial Services", "Megabanco", "UBS AG in Bogotá");
        $valores = array("Bancafé", "Banco AV Villas", "Banco Bilbao Vizcaya Argentaria Colombia S.A. (BBVA )", "Banco Caja Social BCSC", "Banco de Bogotá", "Banco de Credito", "Banco de la República de Colombia", "Banco de Occidente", "Banco GNB Sudameris", "Banco Granahorrar", "Banco Popular", "Banco Popular Colombia", "Banco Santander Colombia", "Bancoldex", "Bancolombia", "BBVA Banco Ganadero", "Citi Bank", "Colmena BCSC", "Colpatria", "Conavi", "Credit Suisse Representaciõn para Colombia", "Davivienda", "Deutsche Bank", "Helm Financial Services", "Megabanco", "UBS AG in Bogotá");
        return($componentes->combo($name, $etiquetas, $valores, $selected));
    }

    function regimen($selected) {
        $componentes = new Componentes();
        $name = "regimen";
        $etiquetas = array("Común", "Simplificado", "Autoretenedores", "Grandes Contribuyentes", "Especial");
        $valores = array("Común", "Simplificado", "Autoretenedores", "Grandes Contribuyentes", "Especial");
        return($componentes->combo($name, $etiquetas, $valores, $selected));
    }

    /**
     * Esta función retorna un <<select>> con un listado textual de referencias de sistemas de calidad SGC. Los Sistemas de
     * Gestión de la Calidad son un conjunto de normas y estándares internacionales que se interrelacionan entre si
     * para hacer cumplir los requisitos de calidad que una empresa requiere para satisfacer los requerimientos acordados
     * con sus clientes a través de una mejora continua, de una manera ordenada y sistemática.
     * Los estándares internacionales contribuyen a hacer más simple la vida y a incrementar la efectividad de los
     * productos y servicios que usamos diariamente. Nos ayudan a asegurar que dichos materiales, productos, procesos
     * y servicios son los adecuados para sus propósitos.
      Existen varios Sistemas de Gestión de la Calidad, que dependiendo del giro de la organización, es el que se va a emplear. Todos los sistemas se encuentran normados bajo un organismo internacional no gubernamental llamado ISO, International Organization for Standardization (Organización Internacional para la Estandarización).
     * @param type $selected
     * @return type String Cadena con foramto HTML que representa un elemento tipo SELECT
     */
    function calidad($selected) {
        $componentes = new Componentes();
        $name = "regimen";
        $etiquetas = array("Ninguno", "ISO 9000", "ISO 9001", "ISO 9004", "ISO 10015", "ISO 14001", "ISO 15189", "ISO 17025", "ISO 19011", "OHSAS 18001", "ISO 20000-1", "ISO/IEC 27001", "AS9100(C)");
        $valores = array("Ninguno", "ISO 9000", "ISO 9001", "ISO 9004", "ISO 10015", "ISO 14001", "ISO 15189", "ISO 17025", "ISO 19011", "OHSAS 18001", "ISO 20000-1", "ISO/IEC 27001", "AS9100(C)");
        return($componentes->combo($name, $etiquetas, $valores, $selected));
    }

    function persona($id, $selected) {
        $etiquetas = array("Persona Natural", "Persona Juridica");
        $valores = array("01", "02");
        return($this->componentes->combo($id, $etiquetas, $valores, $selected));
    }

    /**
     * Esta funcion evalua si la naturaleza juridica de un proveedor retornando su tipo segun el tipo de documento
     * aportado en el registo CC,CE,NITT,TI indicaran que es una persona natural, CM,NIT indican que es una persona
     * juridica
     * @param type $documento
     */
    function tipo_persona($documento) {
        if ($documento == "CC" || $documento == "CE" || $documento == "NITT" || $documento == "TI") {
            return("Natural");
        } elseif ($documento == "NIT" || $documento == "CM") {
            return("Juridica");
        } else {
            return("Error");
        }
    }

}

?>