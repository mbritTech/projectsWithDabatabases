<?php
require("../app/Config/constants.php");
require_once('../vendor/autoload.php');
use App\Models\User;
use App\Models\Bookmark;

$userObj = User::getInstancia();
//$bmkObj = Bookmark::getInstancia();


//echo "<pre>",print_r($userObj->login("franc45","francisco")),"</pre>";
//echo "<pre>",print_r($userObj->login("pepe","pepillo")),"</pre>";
//echo "<pre>",print_r($userObj->login("felixpax","felipa")),"</pre>";

//$data = $bmkObj->getBookmarksByIdUsuario(2);
//echo "<pre>",print_r($data),"</pre>";
//$bmkObj->set("www.micasa.es", "web de casas", 1);
//$bmkObj->set("www.micasa.es", "web de casas", 2);

//$bmkObj->edit("www.prueba.com", "otra descp", 7);
//$bmkObj->delete(7);
//$bmkObj->delete(9);

$data = $userObj->getAll();
echo "<pre>",print_r($data),"</pre>";
