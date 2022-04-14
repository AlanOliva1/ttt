<?php

class Producto {

    private $id_pro;
    private $nombre_pro;
    private $marca_pro;
    private $modelo_pro;
    private $categoria_pro;
    private $condicion_pro;
    private $img_pro;
    private $precio_pro;
    private $garantia_pro;
    private $descripcion_pro;
    private $estatus_pro;

   public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
    }



?>