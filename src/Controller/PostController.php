<?php

namespace App\Controller;

use App\Controller\BaseController;

final class PostController extends BaseController
{
    public function list(): array
    {
        return [];
    }

    public function create()
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
        echo $this->render('post/create.html.twig', [
            'civilite'->$civilite,
            'prenom'->$prenom,
            'nom'->$nom,
            'naissance'->$naissance,
            'adresse'->$adresse,
            'codePostal'->$codePostal,
            'ville'->$ville,
            'pays'->$pays,
            'numero'->$numero,
        ]);
    }

    public function read()
    {
        // TODO To dev;
        echo $this->render('index.html.twig', [
            'colors' => [
                'red',
                'yellow',
                'green',
            ],
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
