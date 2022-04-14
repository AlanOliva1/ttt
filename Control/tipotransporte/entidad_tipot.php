<?php

class Tipot {

    private $id_tipot;
    private $nombre_t;
    private $img_t;

    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
    
}

?>