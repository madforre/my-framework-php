<?php

/* 오토로더 클래스 정의 */

class MyClassLoader
{

    /* 모듈 로더 */

    public static function RouterLoader($class)
    {
        if (file_exists(__DIR__."/modules/router/".$class.".php")) 
        {
            require_once __DIR__."/modules/router/".$class.".php";
        } 
    }

    public static function PdoLoader($class)
    {
        if (file_exists(__DIR__."/modules/pdo/".$class.".php")) 
        {
            require_once __DIR__."/modules/pdo/".$class.".php";
        } 
    }

    /* 모델, 컨트롤러 로더 */

    public static function ControllerLoader($class)
    {
        if (file_exists(__DIR__."/../Controllers/".$class.".php")) 
        {
            require_once __DIR__."/../Controllers/".$class.".php";
        }
    }

    public static function ModelLoader($class)
    {
        if (file_exists(__DIR__."/../Models/".$class.".php")) 
        {
            require_once __DIR__."/../Models/".$class.".php";
        }
    }
}

/* 오토로더 클래스 등록 */

spl_autoload_register('MyClassLoader::RouterLoader');
spl_autoload_register('MyClassLoader::PdoLoader');
spl_autoload_register('MyClassLoader::ControllerLoader');
spl_autoload_register('MyClassLoader::ModelLoader');

