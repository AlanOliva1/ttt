<?php

class Tienda{

    private $id_tien;
    private $nombre_tien;
    private $direccion_tien;
    private $telefono_tien;
    private $ubicacion_tien;

   public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
    }



?>