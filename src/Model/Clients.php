<?php
namespace App\Model;
use App\Model\Connexion;

class Clients
{
    private $connexion;
    private $name;
    private $firstName;
    private $dateNaissance;
    private $Ville;
    private $CodePostal;
    private $numTel;
    private $email;
    private $mdp;

    public function __construct() {
        include '../src/Model/Connexion.php';
        $this->connexion = $connexionBDD;
    }

    public function addNewUser(){
        $SQL = $this->connexion->prepare("INSERT INTO CLIENTS (Nom,Prenom,DateNaissance,NumeroTel,Mail,MDP) VALUES (:name1,:firstName,:dateNaissance,:numTel,:email,:mdp)");
        $requeteTest = $SQL->execute(array("name1"=>$this->name,"firstName"=>$this->firstName,"dateNaissance"=>$this->dateNaissance,"numTel"=>$this->numTel,"email"=>$this->email,"mdp"=>$this->mdp));
        if($requeteTest){
            echo"compte crée";
        }
    
    }

    public function verifUser($mail,$mdp){
        $SQL = $this->connexion->query("SELECT MDP,Prenom,ID FROM CLIENTS WHERE Mail='$mail'")->fetch();
        if ($mdp == $SQL[0]){
            $_SESSION['user'] = $SQL[1];
            $_SESSION['id'] = $SQL[2];
        }
    }
    public function getHistoric($id){
        $SQL = $this->connexion->query("SELECT achat.IDAchat, coussin.Nom AS NomCoussin, coussin.Prix
        FROM achat
        JOIN coussin ON achat.IDCoussin = coussin.IDCoussin
        JOIN clients ON achat.IDClients = clients.ID
        WHERE achat.IDClients = $id
        ORDER BY achat.IDAchat DESC
        LIMIT 10;")->fetchall();
        return $SQL;
    }

    public function getInformation($id){
        
    }






    public function setUser($name,$firstName,$dateNaissance,$numTel,$email,$mdp)
    {
        $this->name = $name;
        $this->firstName = $firstName;
        $this->dateNaissance = $dateNaissance;
        $this->numTel = $numTel;
        $this->email = $email;
        $this->mdp = $mdp;
        
    }

    public function getname() {
        return $this->name;
    }
    public function setname( $Name) {
        $this->name = $Name;
    }
    public function getfirstName() {
        return $this->firstName;
    }
    public function setfirstName( $FirstName) {
        $this->firstName = $FirstName;
    }
    public function getdateNaissance() {
        return $this->dateNaissance;
    }
    public function setdateNaissance( $DateNaissance) {
        $this->dateNaissance = $DateNaissance;
    }
    public function getVille() {
        return $this->Ville;
    }
    public function setVille( $ville) {
        $this->Ville = $ville;
    }
    public function getCodePostal() {
        return $this->CodePostal;
    }
    public function setCodePostal( $codePostal) {
        $this->CodePostal = $codePostal;
    }
    public function getnumTel() {
        return $this->numTel;
    }
    public function setnumTel( $NumTel) {
        $this->numTel = $NumTel;
    }
    public function getemail() {
        return $this->email;
    }
    public function setemail( $email) {
        $this->email = $email;
    }
    public function getmdp() {
        return $this->mdp;
    }
    public function setmdp( $mdp) {
        $this->mdp = $mdp;
    }
}


?>