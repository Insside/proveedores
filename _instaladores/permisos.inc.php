<?php
   $this->modulo=$this->modulos->crear("007", "Proveedores", "Modulo Control de Proveedores.", "");
 
    $this->permisos->permiso_crear($this->modulo, "PROVEEDORES-MODULO-A", "Acceso Modulo De Usuarios", "Permite acceder al modulo Usuarios.", "0000000000");
    $this->permisos->crear("PROVEEDORES", "Permite acceder al modulo proveedores", "SISTEMA");
    $this->permisos->crear("PROVEEDORES-CONSULTAR", "Permite visualizar los proveedores registrados del sistema", "SISTEMA");
    $this->permisos->crear("PROVEEDORES-REGISTRAR", "Permite registrar registrar proveedores en el sistema.", "SISTEMA");
    $this->permisos->crear("PROVEEDORES-ACTUALIZAR", "Permite actualizar la infomacion de los proveedores registrados en el sistema", "SISTEMA");
    $this->permisos->crear("PROVEEDORES-ELIMINAR", "Permite eliminar un proveedor registrado en el sistema", "SISTEMA");
    $this->permisos->crear("PROVEEDORES-ARCHIVOS-ADJUNTAR", "Permite adjuntar archivos a la infomacion de los proveedores registrados en el sistema", "SISTEMA");
    $this->permisos->crear("PROVEEDORES-ARCHIVOS-VISUALIZAR", "Permite visualizar los archivos adjuntos de los proveedores registrados en el sistema", "SISTEMA");
    $this->permisos->crear("PROVEEDORES-ARCHIVOS-ELIMINAR", "Permite eliminar archivos adjuntosde los proveedores registrados en el sistema", "SISTEMA");
    $this->permisos->crear("PROVEEDORES-ARCHIVOS-ELIMINAR-TODOS", "Permite eliminar archivos adjuntosde los proveedores registrados en el sistema", "SISTEMA");
