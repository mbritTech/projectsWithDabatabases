<?php
require("../app/Config/constants.php");
require_once('../vendor/autoload.php');

use App\Models\Palabra;
use App\Models\Usuario;

//$word = Palabra::getInstancia();
$user = Usuario::getInstancia();

//$word->setPalabra("brasilia");
//$word->set();
//echo $word->getMsg();

//$data = $word->get();
//echo "<pre>",print_r($data),"</pre>";
//echo $word->getMsg()."<br>";
//
//$word->setPalabra("guitarra");
//$word->setId("2");
//$word->edit();
//echo $word->getMsg()."<br>";
//
//$word->delete(1);
//echo $word->getMsg()."<br>";

//$data = $word->get(5);
//echo "<pre>",print_r($data),"</pre>";

//$data = $word->getAll();
//echo "<pre>",print_r($data),"</pre>";

//$data = $word->getWordByFilter("melbourne");
//echo "<pre>",print_r($data),"</pre>";

//$data = $word->getLastWords();
//echo "<pre>",print_r($data),"</pre>";
$user->setUser("invitado");
$user->setPassword("invitado");
$data = $user->login();
echo "<pre>",print_r($data),"</pre>";
