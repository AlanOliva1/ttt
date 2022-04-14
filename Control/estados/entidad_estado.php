<?php

class Estado {

    private $id_estado;
    private $nombre_edo;
    private $img_edo;

   public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
    
}

?>