<?php
final class Connexion
{
    private PDO $pdo;
    public function __construct()
    {
        $username = 'root';
        $password = '';
        $this->pdo = new PDO("mysql:host=localhost;dbname=mabdd", $username, $password);
}
    public function getPDO(){
        return $this->pdo;
    }

    public function getNumero(int $idUtilisateur){
        $request = $this->pdo->query("SELECT NumeroTel FROM clients WHERE ID=$idUtilisateur");
        foreach ($request as $row) {
            var_dump($row);
        }
    }
}

?>