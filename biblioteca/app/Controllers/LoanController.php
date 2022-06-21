<?php

namespace App\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Loan;

class LoanController extends BaseController
{

    public function makeLoanAction()
    {
        $loanObj = Loan::getInstancia();
        $bookObj = Book::getInstancia();

        $userId = $_SESSION["userId"];
        $urlId = explode("/", $_SERVER["REQUEST_URI"]);
        $bookIdSelLoan = end($urlId);

        //$_SESSION["loanStatus"] = "OK";

        $data = $bookObj->get($bookIdSelLoan);

        $this->renderHtml("../views/confLoan_view.php", $data);

        $processForm = false;

        if (isset($_POST)) {
            $processForm = true;
        }
        
        if ($processForm) {
            if (isset($_POST['yes'])) {
                $loanObj->set($userId, $bookIdSelLoan, "2000-03-10", "2000-04-11");
                //header('Location: ./');
            } else {
                //header('Location: ./');
            }
        }
    }

    public function showMyLoansAction(){
        $bookObj = Book::getInstancia();
        $data = $bookObj->getBooksByUser($_SESSION['userId']);
        $this->renderHtml("../views/myLoans_view.php", $data);
    }

    public function cancelLoanAction(){
        $bookObj = Book::getInstancia();
        $loanObj = Loan::getInstancia();

        $urlId = explode("/", $_SERVER["REQUEST_URI"]);
        $bookIdSelLoan = end($urlId);

        $data = $bookObj->get($bookIdSelLoan);

        $data = array("author" => $data[0]["author"],
                      "name" => $data[0]["title"]);

        $this->renderHtml("../views/cancelLoan_view.php", $data);
        
        // access control user_id
        if (isset($_POST["acept"])) {
            $loanObj->delete($bookIdSelLoan);
        }

    }
}
