<?php

namespace App\Controllers;
use App\Models\Palabra;

class DefaultController extends BaseController{

    public function IndexAction(){
        $data = array();

        $word = Palabra::getInstancia();

        $this->renderHtml("../views/showHelloWorld_view.php", $data);

    }



}