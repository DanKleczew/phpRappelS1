<?php 

namespace App\Controller;

use App\Controller\BaseController;
use App\Model\Personne;
use App\Model\Clients;

class InscriptionController extends BaseController{
    private $personne;
    private $clients;
    
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
        echo $this->render('post/create.html.twig', []);
    }
    public function update()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $mail = $_POST['mailUser'];
            $mdp = $_POST['mdpUser'];
        }
        $this->clients->verifUser($mail,$mdp);
        $liste = $this->clients->getHistoric($_SESSION['ID']);
        var_dump($liste);
        echo $this->render('post/profil.html.twig',['liste'=>$liste]);
        
    }
}


?>