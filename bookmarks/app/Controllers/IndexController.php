<?php

namespace App\Controllers;

use App\Models\User;

class IndexController extends BaseController
{

    public function IndexAction()
    {
        $this->renderHtml("../views/index_view.php");
        $userObj = User::getInstancia();

        $processForm = false;
        $user = "";
        $password = "";

        if (isset($_POST["login"])) {
            $processForm = true;
            $user = $_POST["user"];
            $password = $_POST["password"];
        }

        if ($processForm) {
            $loggedUser = $userObj->login($user, $password);

            if (!$loggedUser) {
                //header('Location: ./?loginError=true');
                echo "<br>Ha introducido unos datos erróneos, vuelva a intentarlo.";
            } else {
                $_SESSION['user'] = $loggedUser;
                $_SESSION['profile'] = $_SESSION['user']['perfil'];
                $_SESSION['name'] = $_SESSION['user']['nombre'];
                $_SESSION['userId'] = $_SESSION['user']['id'];
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
