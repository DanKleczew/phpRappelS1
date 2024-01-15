<?php

namespace App;

use App\Controller\HomeController;
use App\Controller\PostController;
use App\Controller\PostController2;
use App\Controller\GeneralConditionsController;
use App\Controller\ContactController;
use App\Controller\InscriptionController;

final class Router
{
    private array $routes = [];

    public function __construct(){
        $this->addRoute('cgv', "GeneralConditionsController");
    }

    // public function __construct($page , $action){
    //     $this->addRoute($page, $action);
    // }

    public function addRoute(string $name, string $controller): void
    {
        $this->routes[$name] = $controller;
    }

    public function matchRoute(string $name, ?string $action): bool
    {
        try {
            if (!$action) {
                throw new \Exception('Controller action needed!');
            }

            $controller = null;

            if (key_exists($name, $this->routes)) {
                $controller = $this->routes[$name];
            }
            var_dump($name);
            var_dump($this->routes);
            var_dump($controller);
            if (!file_exists(__DIR__ . "/Controller/{$controller}.php")) {
                throw new \Exception(sprintf('File '.$controller.' not exist!', "{$controller}.php"));
            }
            switch ($controller){
                case 'PostController':
                    $controller = new PostController(); 
                    var_dump($controller);
                    break;
                case 'PostController2':
                    var_dump($controller);
                    $controller = new PostController2(); 
                    var_dump($controller);
                    break;
                case 'HomeController':
                    $controller = new HomeController(); break;
                case 'ContactController':
                    $controller = new ContactController(); break;
                case 'GeneralConditionsController':
                    $controller = new GeneralConditionsController(); break;
                case 'InscriptionController': 
                    var_dump($controller);
                    $controller = new InscriptionController(); break;
            }

            if (!method_exists($controller, $action)) {
                throw new \Exception(sprintf('Action %s does not exist in %s!', $action, $controller));
            }

            $controller->$action();
        } catch (\Exception $exception) {
            var_dump($exception->getMessage());
        }

        return true;
    }
}
