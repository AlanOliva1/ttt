<?php

class Turismo {

    private $id_usario;
    private $usuario;
    private $appat_usuario; 
    private $apmat_usuario;
    private $correo_usuario;
    private $contrasena; 
    private $id_rol;
    private $id_permiso;

   public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
    
}

?>