<?php
namespace App\Model;
use Connexion;
use Exception;

class Coussin{

    private \Connexion $BDD;

    public function __construct() {
        $this->BDD = new Connexion();
    }

    public function createCoussin($nom, $prix, $quantite, $mail){
        $SQL1 = $this->BDD->getConnection()->query("SELECT ID FROM CLIENTS WHERE Mail = '$mail'")->fetch();
        if ($SQL1 == false){
            return false;
        }
        else {
            $SQL = $this->BDD->getConnection()->query("INSERT INTO COUSSIN (Quantité, Prix, Nom, IDCreateur) VALUES ('$quantite' , '$prix', '$nom', '$SQL1->ID')");
            return true;
        }
    }

    public function getAllCoussins(){
        $answer = $this->BDD->getConnection()->query("SELECT * FROM COUSSIN")->fetchAll();
        return $answer;
    }

    public function updateCoussin($nom, $prix, $quantite, $IDCoussin){
        $this->BDD->getConnection()->query("UPDATE COUSSIN SET Quantité = '$quantite', Prix = '$prix', Nom = '$nom' WHERE IDCoussin = '$IDCoussin'");
    }

    public function deleteCoussin($IDCoussin){
        $this->BDD->getConnection()->query("DELETE FROM COUSSIN WHERE IDCoussin = '$IDCoussin'");
    }

}
