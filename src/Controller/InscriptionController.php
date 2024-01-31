<?php

namespace App\Controller;

use App\Controller\BaseController;
use App\Model\Clients;

class InscriptionController extends BaseController
{
    private $personne;
    private $clients;

    public function __construct()
    {
        $this->clients = new Clients();
        session_start();
    }

    public function Choix()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            switch ($_POST["objet"]) {
                case 'C':
                    echo $this->render('post/C.html.twig', []);
                    break;
                case 'R':
                    echo $this->render('post/R.html.twig', []);
                    break;
                case 'U':
                    echo $this->render('post/U.html.twig', []);
                    break;
                case 'D':
                    echo $this->render('post/D.html.twig', []);
                    break;
            }
        }
    }

    public function Create()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($_POST['mdp1'] === $_POST['mdp2']) {
                $this->clients->setUser($_POST['nom'], $_POST['prenom'], $_POST['datenaiss'], $_POST['tel'], $_POST['mail'], $_POST['mdp1']);
                if ($this->clients->verifMail()) {
                    $this->clients->addNewUser();
                    echo $this->render('post/registered.html.twig', ['nom' => $_POST['nom'], 'prenom' => $_POST['prenom']]);
                } else {
                    echo $this->render("post/mailUsed.html.twig", []);
                }
            } else {
                echo $this->render('post/modification.html.twig', [
                    "info" => "Vos mots de passe ne correspondent pas",
                ]);
            }
        } else {
            echo $this->render('post/create.html.twig', []);
        }
    }

    public function Update()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->clients->setUser($_POST['nom'], $_POST['prenom'], $_POST['datenaiss'], $_POST['tel'], $_POST['mail'], $_POST['mdp1']);
            $mail = $_POST["mail"];
            $mdp = $_POST["mdp1"];
            if ($this->clients->verifUser($mail, $mdp)) {
                $this->clients->updateInfo();
                echo $this->render('post/modification.html.twig', [
                    "info" => "Vos informations ont bien été modifiées",
                ]);
            } else {
                echo $this->render('post/erreur.html.twig', []);
            }
            session_destroy();

        }

    }
    public function Read()
    {
        $mail = $_POST["MailInformation"];
        $mdp = $_POST["MDPInformation"];
        if ($this->clients->verifUser($mail, $mdp)) {
            $donne = $this->clients->getInformation($_POST["MailInformation"]);
            echo $this->render('post/information.html.twig', [
                "nom" => $donne->Nom,
                "prenom" => $donne->Prenom,
                "dateNaiss" => $donne->DateNaissance,
                "numTel" => $donne->NumeroTel,
            ]);
        } else {
            echo $this->render('post/erreur.html.twig', []);
        }
        session_destroy();
    }

    public function Destroy()
    {
        $mail = $_POST["MailInformation"];
        $mdp = $_POST["MDPInformation"];
        if ($this->clients->verifUser($mail, $mdp)) {
            if ($this->clients->destroy($mail)) {
                echo $this->render('post/compteSupprime.html.twig', []);
            } else {
                echo $this->render('post/modification.html.twig', [
                    "info" => "Vous ne pouvez pas supprimer ce compte car il a créer des coussins",
                ]);
            }
        } else {
            echo $this->render('post/erreur.html.twig', []);
        }

    }

}
