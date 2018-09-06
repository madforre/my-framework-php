<?php

/* 
* 라우터 사용법 
*   
* - 첫번째 파라미터에 /url 입력
* - 두번째 클로저에 CreateView 메소드 사용하여 뷰 페이지 설정 (인자에 랜더링 할 페이지를 적어주자.)
*
*/

Router::get('/', function(){
    Controller::CreateView('home');
});

Router::get('/home', function(){
    Controller::CreateView('home');
});

Router::get('/about', function(){
    About::CreateView('about');
});

Router::get('/contact', function(){
    Contact::CreateView('contact');
});
