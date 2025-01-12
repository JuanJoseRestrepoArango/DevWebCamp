<?php

namespace Model;

class Paquete extends ActiveRecord{
    public $id;
    public $nombre;

    protected static $tabla = 'paquetes';

    protected static $columnasDB = [
        'id',
        'nombre'
    ];

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->id = $args['nombre'] ?? '';
    }
}