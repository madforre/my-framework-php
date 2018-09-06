<?php


// $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

echo PHP_URL_PATH;

// 오토로더 함수 정의

function autoloader($className){
    if (file_exists(__DIR__."/modules/php-router/".$className.".php")) {
        require_once __DIR__."/modules/php-router/".$className.".php";
    } 
    else if (file_exists(__DIR__."/../Controllers/".$className.".php")) {
        require_once __DIR__."/../Controllers/".$className.".php";
    }
    
}

// 클래스 등록

spl_autoload_register('autoloader');

// 라우터 설정파일 불러오기

require_once __DIR__."/../routes/web.php";

// 라우터 없을 시 뷰 404 처리

new NotFound();