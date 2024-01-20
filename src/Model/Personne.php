<?php

namespace App\Model;

class Personne{
    private $name;
    private $firstName;
    private $dateNaissance;
    private $Ville;
    private $CodePostal;
    private $numTel;
    private $email;
    private $mdp;

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