<?php 

namespace App\Controller;

use App\Controller\BaseController;
use App\Model\Personne;
use App\Model\Clients;

class InscriptionController extends BaseController{
    private $personne;
    private $clients;
    

    public function __construct()
    {
        $this->clients = new Clients();
    }

    public function Create(){
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            echo $this->render('post/registered.html.twig', ['nom' => $_POST['nom'], 'prenom' => $_POST['prenom']]);
            $this->clients->setUser($_POST['nom'],$_POST['prenom'],$_POST['datenaiss'],$_POST['tel'],$_POST['mail'],$_POST['mdp1']);
            $this->clients->addNewUser();
        }
        else{
            echo $this->render('post/create.html.twig', []);
        }
    }

    public function Read(){
        
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