<?php

class Turismo {

    private $id_turismo;
    private $nombre_turismo;
    private $descripcion_turismo; 
    private $img_turismo;

   public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
    
}

?>