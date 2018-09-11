<?php

class Router
{
    public static $getRoutes = array();
    public static $postRoutes = array();

    public static function get($route, $function) {

        // array_push 와 같은 기능
        
        self::$getRoutes[] = $route;

        if ($_SERVER['REQUEST_URI'] == $route && $_SERVER['REQUEST_METHOD'] == "GET")
        {
            // 클로져 호출
            call_user_func($function);
        }
    }

    public static function post($route, $function) {

        // array_push 와 같은 기능
        
        self::$postRoutes[] = $route;

        if ($_SERVER['REQUEST_URI'] == $route && $_SERVER['REQUEST_METHOD'] == "POST")
        {
            // 클로져 호출
            call_user_func($function);
        }
    }
}