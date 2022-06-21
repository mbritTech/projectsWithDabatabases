<?php
namespace App\Controllers;

class BaseController{
    public function renderHtml($filename, $data=[], $loginErrorMessage=''){
        include($filename);
    }

}