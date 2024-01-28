<?php
namespace App\Model;
use Connexion;

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
        $co = new Connexion();
        $this->connexion = $co->getConnection();
    }

    public function addNewUser(){
        $SQL = $this->connexion->prepare("INSERT INTO CLIENTS (Nom,Prenom,DateNaissance,NumeroTel,Mail,MDP) VALUES (:name1,:firstName,:dateNaissance,:numTel,:email,:mdp)");
        $requeteTest = $SQL->execute(array("name1"=>$this->name,"firstName"=>$this->firstName,"dateNaissance"=>$this->dateNaissance,"numTel"=>$this->numTel,"email"=>$this->email,"mdp"=>$this->mdp));
        if($requeteTest){
            echo"compte crée";
        }
    
    }

    public function verifUser($mail,$mdp){
        if($SQL = $this->connexion->query("SELECT MDP,Prenom,ID FROM CLIENTS WHERE Mail='$mail'")->fetch()){
        if ($mdp == $SQL->MDP){
            $_SESSION['user'] = $SQL->Prenom;
            $_SESSION['id'] = $SQL->ID;
            return true;
        }
    }
        return false;
    }
    public function getHistoric($email){
        $mail = $email;
        $SQL = $this->connexion->query("SELECT c.*
        FROM coussin c
        JOIN clients cl ON c.IDCreateur = cl.ID
        WHERE cl.Mail = '$mail';")->fetchall();
        return $SQL;
    }

    public function getInformation($mail){
        $SQL = $this->connexion->query("SELECT Nom,Prenom,DateNaissance,NumeroTel FROM CLIENTS WHERE Mail='$mail'")->fetch();
        return $SQL;
    }

    public function updateInfo(){
        $id = $_SESSION["id"];
        $SQL = $this->connexion->query("UPDATE CLIENTS SET
        Nom = '$this->name',Prenom = '$this->firstName' ,DateNaissance = '$this->dateNaissance' ,NumeroTel = '$this->numTel',Mail = '$this->email',MDP = '$this->mdp' WHERE ID=$id ");

    }
    public function destroy($mail){
        $email = $mail;
        $SQL = $this->connexion->query("DELETE FROM CLIENTS WHERE Mail= '$email'");
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