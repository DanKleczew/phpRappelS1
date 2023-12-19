<?php

namespace App\Controller;

use App\Controller\BaseController;
use Twig\Environment;

final class HomeController extends BaseController
{
    public function thanks() : void
    {
        echo $this->render('thanks.html.twig', []);
    }
}
