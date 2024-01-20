<?php
namespace App\Model;
use Connexion;


class Coussin{

    private \Connexion $BDD;

    public function __construct() {
        $this->BDD = new Connexion();
    }

    public function createCoussin($quantite, $prix, $nom, $IDCreateur){
        $SQL = $this->BDD->getConnection()->query("INSERT INTO COUSSIN (Quantité, Prix, Nom, IDCreateur) VALUES ($quantite , $prix, $nom, $IDCreateur)");
    }

    public function getAllCoussins(){
        $answer = $this->BDD->getConnection()->query("SELECT * FROM COUSSIN")->fetchAll();
        return $answer;
    }

    public function updateCoussin($quantite, $prix, $nom){
        //TODO : To dev
    }

    public function deleteCoussin($IDCoussin){
        //TODO : To dev
    }

}
