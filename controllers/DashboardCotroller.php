<?php

namespace Controllers;

use MVC\Router;
use Model\Evento;
use Model\Paquete;
use Model\Usuario;
use Model\Registro;

class DashboardCotroller{


    
    public static function index(Router $router){
        //obtener ultimos registros
        
        $registros = Registro::get(5);
        foreach ($registros as $registro){
            $registro->usuario = Usuario::find($registro->usuario_id);
        }

        //calcular los ingresos
        $virtuales = Registro::total('paquete_id',2);
        $presenciales = Registro::total('paquete_id',1);

        //obtener eventos con mas y menos lugares
        $menosLugares = Evento::ordenarLimite('disponibles', 'ASC', 5);
        $masLugares = Evento::ordenarLimite('disponibles', 'DESC', 5);
       
        $ingresos = ($virtuales * 46.41) + ($presenciales * 189.54);
        $router->render('admin/dashboard/index',[
            'titulo' => 'Panel de Administración',
            'registros' => $registros,
            'ingresos' => $ingresos,
            'menosLugares' => $menosLugares,
            'masLugares' =>$masLugares
        ]);
    }
}