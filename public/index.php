<?php 

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\AuthController;
use Controllers\EventosController;
use Controllers\PonentesCotroller;
use Controllers\RegalosController;
use Controllers\DashboardCotroller;
use Controllers\PonentesController;
use Controllers\RegistradosController;

$router = new Router();


// Login
$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'login']);
$router->post('/logout', [AuthController::class, 'logout']);

// Crear Cuenta
$router->get('/registro', [AuthController::class, 'registro']);
$router->post('/registro', [AuthController::class, 'registro']);

// Formulario de olvide mi password
$router->get('/olvide', [AuthController::class, 'olvide']);
$router->post('/olvide', [AuthController::class, 'olvide']);

// Colocar el nuevo password
$router->get('/reestablecer', [AuthController::class, 'reestablecer']);
$router->post('/reestablecer', [AuthController::class, 'reestablecer']);

// Confirmación de Cuenta
$router->get('/mensaje', [AuthController::class, 'mensaje']);
$router->get('/confirmar-cuenta', [AuthController::class, 'confirmar']);

//area de admiistracio
$router->get('/admin/dashboard', [DashboardCotroller::class, 'index']);


//area de ponentes
$router->get('/admin/ponentes', [PonentesController::class, 'index']);
$router->get('/admin/ponentes/crear', [PonentesController::class, 'crear']);
$router->post('/admin/ponentes/crear', [PonentesController::class, 'crear']);




//area de eventos
$router->get('/admin/eventos', [EventosController::class, 'index']);
//area de registrados
$router->get('/admin/registrados', [RegistradosController::class, 'index']);
//area de regalos
$router->get('/admin/regalos', [RegalosController::class, 'index']);
$router->comprobarRutas(); 