<?php

class Producto {

    private $id_pro;
    private $usuario_id;
    private $nombre_pro;
    private $marca_pro;
    private $modelo_pro;
    private $categoria_pro;
    private $condicion_pro;
    private $img1_pro;
    private $img2_pro;
    private $img3_pro;
    private $precio_pro;
    private $garantia_pro;
    private $descripcion_pro;
    private $estatus_pro;

   public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
    }



?>