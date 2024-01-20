<?php

namespace App\Controller;

use App\Controller\BaseController;
use App\Model\Clients;
use App\Model\Personne;

final class HomeController extends BaseController
{
    
    public function Read(){
        echo $this->render('index.html.twig', []);
    }
}