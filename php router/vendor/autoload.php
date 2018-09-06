<?php

// 오토로더 클래스 정의

class MyClassLoader
{
    public static function RouterLoader($class)
    {
        if (file_exists(__DIR__."/modules/php-router/".$class.".php")) 
        {
            require_once __DIR__."/modules/php-router/".$class.".php";
        } 
    }

    public static function ControllerLoader($class)
    {
        if (file_exists(__DIR__."/../Controllers/".$class.".php")) 
        {
            require_once __DIR__."/../Controllers/".$class.".php";
        }
    }
}

// 오토로더 클래스 등록 (컨트롤러, 라우터 모듈)

spl_autoload_register('MyClassLoader::RouterLoader');
spl_autoload_register('MyClassLoader::ControllerLoader');

// 라우터 등록------------------------------------------------

// HTTP 요청 관련된 서버 변수들 프레임워크의 전역 변수로 설정

// $request = new Request();

// var_dump($request->requestUri);

// 사용자 정의한 라우터 불러오기

require_once __DIR__."/../routes/web.php";

// 사용자 정의한 라우터에 uri 없을시 뷰 404 처리

new NotFound();

// -------------------------------------------------------