<?php

class Router
{
    public static $getRoutes = array();

    public static function get($route, $function) {

        self::$getRoutes[] = $route;

        if ($_SERVER['REQUEST_URI'] == $route && $_SERVER['REQUEST_METHOD'] == "GET")
        {
            // 클로져 호출
            $function->__invoke();
        }

    }
}