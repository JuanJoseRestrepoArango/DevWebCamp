<?php

namespace Model;

class Dia extends ActiveRecord{
    public $id;
    public $nombre;

    protected static $tabla = 'dias';

    protected static $columnasDB = [
        'id',
        'nombre'
    ];

    public function __construct($args =[]){
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
    }
}