<?php

namespace App\Controller;

use App\Controller\BaseController;
use App\View\Clients;
use App\View\Personne;

final class HomeController extends BaseController
{
    
    public function Read(){
        echo $this->render('index.html.twig', []);
    }
}