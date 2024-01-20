<?php

require_once '../vendor/autoload.php';
require_once '../src/View/Connexion.php';
session_start();
use App\Router;

$router = new Router();

$router->addRoute('home', 'HomeController');
$router->addRoute('contact', 'ContactController');
$router->addRoute('post', 'PostController');
$router->addRoute('Inscription','InscriptionController');

//Si il le GET n'est pas encore spécifié (On vient d'arriver sur le site)
//On arrive sur la page d'accueil.
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : 'Read';

$router->matchRoute($page,$action);
?>