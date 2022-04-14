<?php

class Transportista {

    private $id_transportista;
    private $usuario_id;
    private $nombre_empresa;
    private $domicilio_fiscal;
    private $ine;
    private $RFC;
    private $foto_edo_cuenta;
    private $logotipo_personal;
    private $foto_ext;
    private $foto_int;
    private $curp;
    
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
    
}
    

?>

   
  