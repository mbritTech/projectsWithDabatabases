<?php
namespace App\Core;

class Router{
    
    private $routes = array();
    
    public function add($route){
        $this->routes[] = $route;

    }

    public function match(string $request){
        $matches = array();
        foreach ($this->routes as $route) {
            $pattern = $route['path'];
            if (preg_match($pattern, $request)) {
                $matches = $route;
            }        
        }
        
        return $matches;
        
    }
}