<?php

require_once '../vendor/autoload.php';
require_once '../src/View/Connexion.php';

use App\Router;

$router = new Router();

$router->addRoute('home', 'HomeController');
$router->addRoute('contact', 'ContactController');

$router->addRoute('post', 'PostController');
$router->addRoute('post2', 'PostController2');
$router->addRoute('inscription','InscriptionController');

$page = isset($_GET['page']) ? $_GET['page'] : 'post';
$action = isset($_GET['action']) ? $_GET['action'] : 'create';
var_dump($page);
var_dump($action);
$router->matchRoute($page,$action);
?>