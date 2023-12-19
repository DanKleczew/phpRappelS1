<?php

namespace App\Controller;

use App\Controller\BaseController;
use Twig\Environment;

final class PostController extends BaseController
{
    public function list(): array
    {
        return [];
    }

    public function create()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            
        }
        echo $this->render('post/create.html.twig', []);
    }

    public function read()
    {
        // TODO To dev;
        echo $this->render('index.html.twig', [
            'colors' => [
                'red',
                'yellow',
                'green',
            ]
        ]);
    }

    public function update()
    {
        // TODO To dev;
    }

    public function delete()
    {
        // TODO To dev;
    }
}
