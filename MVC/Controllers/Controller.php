<?php

class Controller extends DB
{
    public static $userName = DB_USER;
    public static $dbType = DB_TYPE;
    public static $host = DB_HOST;
    public static $dbName = DB_NAME;
    public static $password = DB_PASS;

    public static function CreateView($viewName) 
    {

        if (file_exists(__DIR__."/../views/".$viewName.".php")) {
            require_once __DIR__."/../views/".$viewName.".php";
        }

        if (file_exists(__DIR__."/../views/auth/".$viewName.".php")) {
            require_once __DIR__."/../views/auth/".$viewName.".php";
        }
    }
}
