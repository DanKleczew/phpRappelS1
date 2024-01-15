<?php
namespace App\View;
use App\View\Connexion;

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
        include '../src/View/Connexion.php';
        var_dump($connexionBDD);
        $this->connexion = $connexionBDD;
    }

    public function addNewUser($user){
        $this->name = $user->getname();
        $this->firstName = $user->getfirstName();
        $this->email = $user->getemail();
        $this->mdp = $user->getmdp();
        $this->dateNaissance = $user->getdateNaissance();
        $this->numTel = $user->getnumTel();
        var_dump($this->numTel);
        //$SQL = $this->connexion->prepare("INSERT INTO CLIENTS (Nom,Prenom,DateNaissance,NumeroTel,Mail,MDP) VALUES ($this->name,$this->firstName,$this->dateNaissance,$this->numTel,$this->email,$this->mdp)");
        $SQL = $this->connexion->prepare("INSERT INTO CLIENTS (Nom,Prenom,DateNaissance,NumeroTel,Mail,MDP) VALUES (:name1,:firstName,:dateNaissance,:numTel,:email,:mdp)");
        $requeteTest = $SQL->execute(array("name1"=>$this->name,"firstName"=>$this->firstName,"dateNaissance"=>$this->dateNaissance,"numTel"=>$this->numTel,"email"=>$this->email,"mdp"=>$this->mdp));
        

        if($requeteTest){
            echo"compte crée";
        }
    
    }   
}


?>