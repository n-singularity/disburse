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
            $params = self::compare($routePath, $_SERVER['REQUEST_URI']);
    
            if(is_array($params)){
                $params = array_merge($params, $_GET);
                $controller($params);
                exit();
            }
        }

    }
    
    public static function POST($routePath, $controller)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $params = self::compare($routePath, $_SERVER['REQUEST_URI']);

            if(is_array($params)){
                $params = array_merge($params, $_POST);
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
            if (strlen($component) > 0 && $component[0] == ':') { // check if it is a named param.
                $params[substr($component, 1)] = $urlComponents[$key];
            } elseif ($component != $urlComponents[$key]) {
                return false;
            }
        }
        
        return $params;
    }
}