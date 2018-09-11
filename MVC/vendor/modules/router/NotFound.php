<?php

class NotFound
{
    function __destruct()
    {
        $value = $_SERVER['REQUEST_URI'];
        
        $getList = Router::$getRoutes;
        $postList = Router::$postRoutes;

        if (!in_array($value, $getList) && !in_array($value, $postList))
        {   
            header("Location:404.php");
        }
    }
}