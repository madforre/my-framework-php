<?php

include_once 'Request.php';
include_once 'Router.php';

// 라우터를 초기화하고 경로를 정의

// 매개변수가 많아서 객체를 넘긴듯하다.
$router = new Router(new Request);

$router->get('/', function(){
});

$router->get('', function ($request) {

});

$router->post('', function($request) {

});

