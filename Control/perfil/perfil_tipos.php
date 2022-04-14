<?php

class Perfil {

    private $id_perfil;
    private $perfil_id; 
    private $direccion; 
    private $usuario_estado; 
    private $usuario_ciudad;
    private $codigo_postal;
    private $RFC; 
    private $INE;
    private $perfil_img;  

    private $usuario;
    private $nombre_usuario;
    private $appat_usuario;
    private $apmat_usuario;
    private $edad_usuario;
    private $correo_usuario;
   public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
    
}

?>