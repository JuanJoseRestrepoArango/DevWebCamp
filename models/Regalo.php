<?php

namespace Model;

class Regalo extends ActiveRecord{

    public $id;
    public $nombre;
  

    protected static $tabla = 'regalos';

    protected static $columnasDB = [
        'id',
        'nombre',

    ];

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
       
    }
}