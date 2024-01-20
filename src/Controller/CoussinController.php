<?php
namespace App\Controller;
use App\Controller\BaseController;
use App\Model\Coussin;


class CoussinController extends BaseController{

    public function Read(){
        $coussin = new Coussin();
        $answer = $coussin->getAllCoussins();
        
        echo $this-> render('/post/listeCoussins.html.twig', ['myArray' => $answer]);
    }

    public function create(){
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $coussin = new Coussin();
            $coussin->createCoussin($_POST['Nom'], $_POST['Prix'], $_POST['Quantité'], $_GET['IDadmin']);
        }
        else{
            $this->render('createCoussin.html.twig', []);
        }
    }

    public function update(){
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $coussin = new Coussin();
            $coussin->updateCoussin($_POST['Nom'], $_POST['Prix'], $_POST['Quantité']);
        }
        else{
            $this -> render('updateCoussin.html.twig', ['IDCoussin' => $_GET["IDCoussin"]]);
        }
    }

    public function delete(){
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $coussin = new Coussin();
            $coussin->deleteCoussin($_GET['IDadmin']);
        }
        else{
            $this->render('deleteCoussin.html.twig', ['IDCoussin' => $_GET["IDCoussin"]]);
        }
    }
}
?>