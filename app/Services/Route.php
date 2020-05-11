<?php

namespace App\Services;

class Route
{
    
    /**
     * Route constructor.
     */
    public function __construct()
    {
    
    }
    
    public static function GET($routePath, $controller)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $params = self::compare($_SERVER['REQUEST_URI'], $routePath);
    
            if(is_array($params)){
                $controller($params);
                exit();
            }
        }

    }
    
    public static function POST($routePath, $controller)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $params = self::compare($_SERVER['REQUEST_URI'], $routePath);
        
            if(is_array($params)){
                $controller($params);
                exit();
            }
        }
    }
    
    private static function compare($routePath, $urlPath)
    {
        $routeComponents = explode('/', $routePath);
        $urlComponents   = explode("/", $urlPath);
        
        
        if (count($routeComponents) != count($urlComponents)) {
            return false;
        }
        
        $params = [];
        
        foreach ($routeComponents as $key => $component) {
            if (count($component) > 0 && @$component[0] == ':') { // check if it is a named param.
                $params[substr($component, 1)] = $urlComponents[$key];
            } elseif ($component != $urlComponents[$key]) {
                return false;
            }
        }
        
        return $params;
    }
}