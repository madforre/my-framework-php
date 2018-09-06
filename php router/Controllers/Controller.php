<?php

class Controller {

    public static function CreateView($viewName) {

        if(file_exists(__DIR__."/../views/".$viewName.".php")){
            require_once __DIR__."/../views/".$viewName.".php";
        }
        
    }
}
