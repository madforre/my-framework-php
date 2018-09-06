<?php

include_once __DIR__.'/Request.php';
include_once __DIR__.'/Router.php';


// $router = new Router($request);

// $router->get('about','../resources/views/about');

$router = new Router(new Request);

$router->get('/', function(){
    return "<script>location.href='test2.php'</script>";
});


$router->get('/about', function(){
    echo "me";
});

$router->get('/profile', function() {
    echo "profile";
    // header("Location: ".__DIR__."resources/views/index.php");
});

$router->get('/hou', function() {});

// $router->post('/data', function($request) {
    
// });
