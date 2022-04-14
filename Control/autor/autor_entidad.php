<?php

class Autor {

    private $id_destino;
    private $usuario_id;
    private $nom_destinos;
    private $id_estado;
    private $ubicacion_geografica;
    private $referencias;
    private $img_destinos;
    private $status;

    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
    }



?>