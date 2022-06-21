<?php

namespace App\Controllers;

use App\Models\Palabra;
use App\Models\Usuario;

class IndexController extends BaseController
{
    public function indexAction()
    {
        $data = array();

        $processForm = false;
        $user = "";
        $pass = "";

        if (isset($_POST["log-in"])) {
            $processForm = true;
            $user = $_POST["user"];
            $pass = $_POST["pass"];
        }

        $word = Palabra::getInstancia();
        $objUser = Usuario::getInstancia();

        if ($processForm) {
            $objUser->setUser($user);
            $objUser->setPassword($pass);
            $loggedUser = $objUser->login();
            
            if (!$loggedUser) {
                header('Location: ./?loginError=true');
            }else{
                $_SESSION['usuario'] = $loggedUser;
                $_SESSION['perfil'] = $_SESSION['usuario']["perfil"];
            }

        }

        $searchWord = "";

        if ($_GET) {
            $searchWord = $_GET["searchText"];
            $dataWord = $word->getWordByFilter($searchWord);
        } else {
            $dataWord = $word->getLastWords();
        }

        $data = array("msg" => "Bienvenido, Usted está como ".$_SESSION['perfil'],
                      "infWord" => $dataWord);

        $this->renderHtml("../views/index_view.php", $data);
    }

    public function logoutAction(){
        unset($_SESSION);
        session_destroy();
        header("location: ./");
    }
}
