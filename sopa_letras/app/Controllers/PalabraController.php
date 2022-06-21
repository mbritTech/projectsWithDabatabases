<?php

namespace App\Controllers;

use App\Models\Palabra;

class PalabraController extends BaseController
{

    public function addAction()
    {
        $data["msg"] = "Bienvenido, Usted está como ".$_SESSION['perfil'];

        $this->renderHtml("../views/addWordForm_view.php",$data);
        
        $word = Palabra::getInstancia();

        $processForm = false;
        $newWord = "";

        if (isset($_POST["addBt"])) {
            $processForm = true;
            $newWord = $_POST["addWord"];
        }

        if ($processForm) {
            $word->setPalabra($newWord);
            $word->set();
            echo "<br>".$word->getMsg()."<br>";
        }

    }

    public function editAction()
    {   
        $word = Palabra::getInstancia();
        $data = array();

        $processForm = false;
        $newWord = "";

        if (isset($_POST["send"])) {
            $processForm = true;
            $newWord = $_POST["newWord"];
        }

        $urlSplit = explode("/",$_SERVER["REQUEST_URI"]);
        $idSelWord = end($urlSplit);

        $data = $word->get($idSelWord);

        $data["msg"] = "Bienvenido, Usted está como ".$_SESSION['perfil']; // variable de sesión
        $data["word"] = $data[0]["palabra"];


        $this->renderHtml("../views/editForm_view.php", $data);

        if ($processForm) {
            $word->setPalabra($newWord);
            $word->setId($idSelWord);
            $word->edit();
            echo "<br>".$word->getMsg()."<br>";
        }

    }

    public function getAction()
    {
        $data = array();

        $word = Palabra::getInstancia();

        $data = $word->get(5);

        $this->renderHtml("../views/index_view.php", $data);
    }


    public function delAction(){

        $processForm = false;
        $answer = "";

        if (isset($_POST["send"])) {
            $processForm = true;
            $answer = $_POST["ans"];
        }
        
        $data = array();
        
        $word = Palabra::getInstancia();
        
        $urlSplit = explode("/",$_SERVER["REQUEST_URI"]);
        $idSelWord = end($urlSplit);
        
        $data = $word->get($idSelWord);

        $data["msg"] = "Bienvenido, Usted está como ".$_SESSION['perfil'];
        $data["word"] = $data[0]["palabra"];
        
        $this->renderHtml("../views/del_view.php", $data);

        if ($processForm) {
            if ($answer == "s") {
                $word->delete($idSelWord);
                echo "<br>".$word->getMsg()."<br>";
            }
        }
    }

    //public function getWordByFilterAction()
    //{
    //    $data = array();
//
    //    $word = Palabra::getInstancia();
//
    //    $data = $word->getWordByFilter("melbourne");
//
    //    $this->renderHtml("../views/index_view.php", $data);
    //}

    public function getLastWordsAction()
    {
        $data = array();

        $word = Palabra::getInstancia();

        $data = $word->getLastWords();

        $this->renderHtml("../views/index_view.php", $data);
    }

}
