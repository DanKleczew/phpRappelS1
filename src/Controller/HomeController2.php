<?php

namespace App\Controller;

use App\Controller\BaseController;
use Twig\Environment;

final class HomeController2 extends BaseController
{
    public function thanks() : void
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $civilite = $_POST["civilite"];
            $prenom = $_POST["prenom"];
            $nom = $_POST["nom"];
            $naissance = $_POST["datenaiss"];
            $adresse = $_POST["adresse"];
            $codePostal = $_POST["postallocal1"];
            $ville = $_POST["postallocal2"];
            $pays = $_POST["pays"];
            $numero = $_POST["tel"];
        }
        require_once '../src/View/Connexion.php';

        echo $this->render('thanks.html.twig', [
            'civilite'=>$civilite,
            'prenom'=>$prenom,
            'nom'=>$nom,
            'naissance'=>$naissance,
            'adresse'=>$adresse,
            'codePostal'=>$codePostal,
            'ville'=>$ville,
            'pays'=>$pays,
            'numero'=>$numero,
        ]);
    }
}
