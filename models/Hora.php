<?php

namespace Model;

class Hora extends ActiveRecord{
    public $id;
    public $hora;

    protected static $tabla = 'horas';

    protected static $columnasDB = [
        'id',
        'hora'
    ];

    public function __construct($args =[]){
        $this->id = $args['id'] ?? null;
        $this->hora = $args['hora'] ?? '';
    }
}