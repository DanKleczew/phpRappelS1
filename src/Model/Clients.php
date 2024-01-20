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

    public function addNewUser($user){
        $this->name = $user->getname();
        $this->firstName = $user->getfirstName();
        $this->email = $user->getemail();
        $this->mdp = $user->getmdp();
        $this->dateNaissance = $user->getdateNaissance();
        $this->numTel = $user->getnumTel();
        //$SQL = $this->connexion->prepare("INSERT INTO CLIENTS (Nom,Prenom,DateNaissance,NumeroTel,Mail,MDP) VALUES ($this->name,$this->firstName,$this->dateNaissance,$this->numTel,$this->email,$this->mdp)");
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
}


?>