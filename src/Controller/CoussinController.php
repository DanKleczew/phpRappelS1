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
            $success = $coussin->createCoussin($_POST['Nom'], $_POST['Prix'], $_POST['Quantite'], $_POST['mail']);
            if ($success){
            echo $this-> render('post/workDone.html.twig', []);
            }
            else{
                echo $this -> render('post/problemOccured.html.twig', ['Mail' => $_POST['mail']]);
            }
        }
        else{
            echo $this->render('post/createCoussin.html.twig', []);
        }
    }

    public function update(){
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $coussin = new Coussin();
            $coussin->updateCoussin($_POST['Nom'], $_POST['Prix'], $_POST['Quantite'], $_GET['IDCoussin']);
            echo $this-> render('post/workDone.html.twig', []);
        }
        else{
            echo $this -> render('post/updateCoussin.html.twig', ['IDCoussin' => $_GET["IDCoussin"]]);
        }
    }

    public function delete(){
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $coussin = new Coussin();
            $coussin->deleteCoussin($_GET['IDCoussin']);
            echo $this-> render('post/workDone.html.twig', []);
        }
        else{
            echo $this->render('post/deleteCoussin.html.twig', ['IDCoussin' => $_GET["IDCoussin"]]);
        }
    }
}
?>