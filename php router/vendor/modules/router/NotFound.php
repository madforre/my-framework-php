<?php

class NotFound
{
    function __destruct()
    {
        $value = $_SERVER['REQUEST_URI'];
        
        $list = Router::$getRoutes;

        if (!in_array($value, $list))
        {   
            header("Location:404.php");
        }
    }
}