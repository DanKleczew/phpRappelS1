<?php

namespace App\Controller;

use App\Controller\BaseController;
use App\View\Clients;
use App\View\Personne;

final class HomeController extends BaseController
{
    private $personne;
    private $clients;

    public function __construct()
    {
        $this->personne = new Personne();
        $this->clients = new Clients();
    }

    public function Create(){
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $this->personne->setUser($_POST['nom'],$_POST['prenom'],$_POST['datenaiss'],$_POST['tel'],$_POST['mail'],$_POST['mdp1']);
            $this->clients->addNewUser($this->personne);

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
            echo $this->render('thanks2.html.twig', [
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
    public function Read(){
        echo $this->render('index.html.twig',[]);
    }
}