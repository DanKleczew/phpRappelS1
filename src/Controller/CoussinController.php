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

        }
        else{
            $this->render('createCoussin.html.twig', []);
        }
    }

    public function update(){

    }

    public function delete(){

    }
}
?>