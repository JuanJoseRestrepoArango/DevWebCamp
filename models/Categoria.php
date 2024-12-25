<?php

namespace Model;

class Categoria extends ActiveRecord{
    public $id;
    public $nombre;

    protected static $tabla = 'categorias';

    protected static $columnasDB = [
        'id',
        'nombre'
    ];

    public function __construct($args =[]){
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
    }
}