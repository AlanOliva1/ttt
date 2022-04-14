<?php

class Transporte {

    private $id_transporte;
    private $usuario_id;
    private $nom_transporte;
    private $id_tipot;
    private $img_transporte;
    private $link_youtube;
    private $descripcion;
    private $incluye;
    private $no_incluye;
    private $id_estado;
    private $zona_cobertura;
    private $ubicacion_transporte;
    private $contacto_transporte;
    
   
    
    
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
    
}

?>