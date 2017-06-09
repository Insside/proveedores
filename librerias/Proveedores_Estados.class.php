<?php

if (!class_exists("Proveedores_Estados")) {

    class Proveedores_Estados {

        var $proveedores;
        var $proveedor;

        function Estados($proveedor) {
            $this->proveedores = new Proveedores();
            $this->proveedor = $this->proveedores->consultar($proveedor);
        }

        /**
         * Esta clase recibe un <<Proveedor>> y evalua dependiendo de su tipo y regimen los ducumentos que
         * como minimo debe contener registrados en el sistema los cuales a saber son:
         * 1. Persona Natural régimen común: Fotocopia del documento de identificación, certificado de Cámara y Comercio, RUT actualizado, fotocopia de la tarjeta profesional (si aplica), certificación de la cuenta bancaria.
         * 2. Persona Natural régimen simplificado: Fotocopia del documento de identificación, certificado de Cámara y Comercio (si tiene), RUT actualizado, fotocopia de la tarjeta profesional (si aplica), certificación dela cuenta bancaria (si la tiene).
         * 3. Persona Jurídica: Portafolio de servicios, Fotocopia del documento de identificación del representante legal, RUT actualizado, certificado de Cámara y Comercio reciente, certificación de la cuenta bancaria.
         * 4. Documentos adicionales para Proveedores del laboratorio: Certificado de acreditación o certificación de la casa matriz para realizar el servicio, certificado de trazabilidad de los equipos.
         * Personas:
         *  01: Naturales
         *  02: Juridicas
         * Regimenes:
         *  01,"Régimen Común"
         *  02,"Régimen Simplificado"
         *  03,"Auto Retenedores"
         *  04,"Grandes Contribuyentes"
         *  05,"Grandes Contribuyentes & Autoretenedores"
         *  06,"Grandes Contribuyentes & Auto Retenedores & Regimen Común"
         *  07,"Regimen Especial"
         *  09,"Personas Naturales"
         * @return type
         */
        function documental() {
            $persona = $this->proveedor['persona'];
            $regimen = $this->proveedor['regimen'];
            if ($persona == "01" && $regimen == "01") {
                
            } elseif ($persona == "01" && $regimen == "02") {
                
            }


            return(true);
        }

    }

}
?>