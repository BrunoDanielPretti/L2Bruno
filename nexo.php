<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';
require 'php/llamarItems.php';
require 'php/items/itemsXml.php';

//\slim\Slim::registerAutoloader();
//$app = new \Slim\App();

$config['displayErrorDetails'] = false;
$config['addContentLengthHeader'] = false;

$app = new \Slim\App(["settings" => $config]);
//------------------------------------------------------------------//
//---------------------- Partes ------------------------------------//
    $app->get('/partes/{pParte}', function(Request $request, Response $response, $args){
        $p = $args['pParte'];
        include("partes/$p.php");        
    });
//---------------------- ItemsXML ----------------------------------//
    $app->get('/Prueba', function(){
        Prueba();
    });
    $app->get('/TodosLosItems', function(){
        Item_MostrarTodos();
    });
    $app->get('/Item_MostrarPorId/{pId}', function(Request $request, Response $response, $args){
        $pId = $args['pId'];
        Item_MostrarPorId($pId);
    });
//------------------------------------------------------------------//
$app->run();
?>