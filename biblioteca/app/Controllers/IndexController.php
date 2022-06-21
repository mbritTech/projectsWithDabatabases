<?php

namespace App\Controllers;

use App\Models\Book;
use App\Models\User;

class IndexController extends BaseController
{

    public function IndexAction()
    {   
        $data = array();

        $bookObj = Book::getInstancia();
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
            $userObj->setUser($user);
            $userObj->setPassword($password);
            $loggedUser = $userObj->login();

            if (!$loggedUser) {
                //header('Location: ./?loginError=true');
            }else{
                $_SESSION['user'] = $loggedUser;
                $_SESSION['profileLib'] = $_SESSION['user']["profile"];
                $_SESSION['name'] = $_SESSION['user']['name'];
                $_SESSION['userId'] = $_SESSION['user']['id'];
                $_SESSION['surname'] = $_SESSION['user']['surname'];
            }
        }
        
        $books = $bookObj->getAll();

        $data = array("books" => $books);

        $this->renderHtml("../views/index_view.php", $data);
    }

    public function logoutAction(){
        unset($_SESSION);
        session_destroy();
        header("location: ./");
    }
}
