<?php

class Connexion{

private $username = "root";
private $password = "";

protected \PDO $connexionBDD;

public function __construct()
    {
        $this->connexionBDD = $this->getConnection();
    }

public function getConnection(): \PDO
{
    try {
        $this->connexionBDD = new \PDO(
            'mysql:dbname=mabdd;host=localhost;charset=utf8',
            $this->username,
            $this->password, 
            [
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
            ]);

            return $this->connexionBDD;
    } catch(\PDOException $exception) {
        echo $$exception->getMessage();
    }
}
}

?>