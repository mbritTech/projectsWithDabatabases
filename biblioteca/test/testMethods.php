<?php
require("../app/Config/constants.php");
require_once('../vendor/autoload.php');
use App\Models\Book;
use App\Models\Loan;
use App\Models\User;

$bookObj = Book::getInstancia();
$userObj = User::getInstancia();
$loanObj = Loan::getInstancia();

//$data = $bookObj->getAll();
//$userObj->setUser("antonio");
//$userObj->setPassword("antonio");
//$data = $userObj->login();

//$loanObj->set($userId, 6, "2000-03-10", "2000-04-11");
//$loanObj->set(2, 5, "2000-03-10", "2000-04-11");

//$data = $bookObj->get(2);
//echo "<pre>",print_r($data),"</pre>";

//$data = $bookObj->getBooksByUser(1);
//echo "<pre>",print_r($data),"</pre>";

$loanObj->delete(4);