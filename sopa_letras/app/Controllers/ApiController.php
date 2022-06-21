<?php

namespace App\Controllers;

use App\Models\Palabra;

class ApiController extends BaseController
{

    public function apiAction(){
        $word = Palabra::getInstancia();

        $response = $word->getAll($word);

        $this->renderHtml("../views/api_view.php", $response);

    }

    private function getAll($obj){
        $result = $obj->getLastWords();
        $response["status_code_header"] = "HTTP/1.1 200 OK";
        $response["body"] = json_encode($result);
        return $response;

    }
    
}
