<?php

namespace Controllers;

use Classes\Paginacion;
use MVC\Router;
use Model\Ponente;
use Intervention\Image\ImageManagerStatic as Image;

class PonentesController{

    public static function index(Router $router){
        
        $pagina_actual = $_GET['page'];

        $pagina_actual = filter_var($pagina_actual,FILTER_VALIDATE_INT);

    
        if(!$pagina_actual || $pagina_actual < 1){
            header('Location: /admin/ponentes?page=1');
        }



        $registros_por_pagina = 10;

        $total_registros = Ponente::total('id');

        $paginacion = new Paginacion($pagina_actual,$registros_por_pagina, $total_registros);

        $ponentes = Ponente::all();

        if(!is_admin()){
            header('Location:/login');
        }

        $router->render('admin/ponentes/index',[
            'titulo' => 'Ponentes / Conferencistas',
            'ponentes' => $ponentes,
            'paginacion' => $paginacion->paginacion()
        ]);
    } 
    public static function crear(Router $router){
        $alertas = [];

        if(!is_admin()){
            header('Location:/login');
        }

        $ponente = new Ponente;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(!is_admin()){
                header('Location:/login');
            }
            //LEER IMAGEN
            if(!empty($_FILES['imagen']['tmp_name'])){
                $carpeta_imagenes = '../public/img/speakers';

                //Crear la carpeta si no existe
                if(!is_dir($carpeta_imagenes)){
                    mkdir($carpeta_imagenes, 0777, true);
                }

                $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('png', 80);
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('webp', 80);

                $nombre_imagen = md5(uniqid(rand(), true));

                $_POST['imagen'] = $nombre_imagen;
            }

            $_POST['redes'] = json_encode($_POST['redes'], JSON_UNESCAPED_SLASHES);
            
            $ponente->sincronizar($_POST);



            //VALIDAR
            $alertas = $ponente->validar();

            //GUardar el registro
            if(empty($alertas)){
                //Guardar las imagenes
                $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".png");
                $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp");
                //Guardar en la base de datos
                $resultado = $ponente->guardar();

                if($resultado){
                    header('Location: /admin/ponentes');
                }
            }
        }

        $redes = json_decode($ponente->redes);
        
        $router->render('admin/ponentes/crear',[
            'titulo' => 'Registrar Ponente',
            'alertas'=>$alertas,
            'ponente' => $ponente,
            'redes' => $redes 
        ]);
    } 

    public static function editar(Router $router){

        $alertas =[];

        if(!is_admin()){
            header('Location:/login');
        }
        //Validar id
        $id  = $_GET['id'];

        $id = filter_var($id, FILTER_VALIDATE_INT);
        if(!$id){
            header('Location:/admin/ponentes');
        }

        $ponente = Ponente::find($id);
        if(!$ponente){
            header('Location:/admin/ponentes');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(!is_admin()){
                header('Location:/login');
            }
            //Revisar si hay unanueva imagen 
            if(!empty($_FILES['imagen']['tmp_name'])){
                $carpeta_imagenes = '../public/img/speakers';

                //Crear la carpeta si no existe
                if(!is_dir($carpeta_imagenes)){
                    mkdir($carpeta_imagenes, 0777, true);
                }

                $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('png', 80);
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('webp', 80);

                $nombre_imagen = md5(uniqid(rand(), true));

                $_POST['imagen'] = $nombre_imagen;
            }else{
                $_POST['imagen'] = $ponente->imagen_actual;
            }

            $_POST['redes'] = json_encode($_POST['redes'], JSON_UNESCAPED_SLASHES);

            $ponente->sincronizar($_POST);

            $alertas = $ponente->validar();

            if(empty($alertas)){
                if(isset($nombre_imagen)){
                     //Guardar las imagenes
                    $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".png");
                    $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp");
                }

                $resultado = $ponente->guardar();

                if($resultado){
                    header('Location: /admin/ponentes');
                }
            }


        }


        $ponente->imagen_actual = $ponente->imagen;

        $redes = json_decode($ponente->redes);        
        

        $router->render('admin/ponentes/editar',[
            'titulo' => 'Editar Ponente',
            'alertas'=>$alertas,
            'ponente' => $ponente,
            'redes' => $redes 
        ]);
    }

    public static function eliminar(){

        if(!is_admin()){
            header('Location:/login');
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(!is_admin()){
                header('Location:/login');
            }
            $id = $_POST['id'];

            $ponente = Ponente::find($id);

            if(!isset($ponente)){
                header('Location: /admin/ponentes');
            }

           $resultado = $ponente->eliminar();

           if($resultado){
                header('Location: /admin/ponentes');
           }
        }
    }
}