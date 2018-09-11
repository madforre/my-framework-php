<?php

Router::post('/joinOk', function(){

    Join::joinCheck();
    
});

Router::post('/loginOk', function(){

    Login::loginCheck();
    
});

Router::get('/logout', function(){

    Login::logOut();
    
});