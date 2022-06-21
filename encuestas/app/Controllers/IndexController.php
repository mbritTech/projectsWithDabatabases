<?php

namespace App\Controllers;

use App\Models\User;

class IndexController extends BaseController
{

    public function IndexAction()
    {
        $this->renderHtml("../views/index_view.php");
        $objUser = User::getInstancia();

        $processForm = false;
        $user = "";
        $pass = "";

        if (isset($_POST["log-in"])) {
            $processForm = true;
            $user = $_POST["user"];
            $pass = $_POST["pass"];
        }

        if ($processForm) {
            $objUser->setUser($user);
            $objUser->setPassword($pass);
            $loggedUser = $objUser->login();
            
            if (!$loggedUser) {
                header('Location: ./?loginError=true');
            }else{
                $_SESSION['usuario'] = $loggedUser;
                $_SESSION['profileEnc'] = $_SESSION['usuario']["perfil"];
                $_SESSION['name'] = $_SESSION['usuario']["nombre"];
                echo "<br>Inicio de sesión correcto";
            }

        }
    }

    public function LogoutAction(){
        unset($_SESSION);
        session_destroy();
        header("location: ./");
    }
}