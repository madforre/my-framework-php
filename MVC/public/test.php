<?php

$start_time = array_sum(explode(' ', microtime()));

class Hou
{
    static $goal = 1;
    static $count;
    
    public static function shoot()
    {
        Self::$goal += 1;
        echo Self::$goal;
    }
}

Hou::$goal;
Hou::$goal;
Hou::$goal;
Hou::$goal;
Hou::$goal;


$end_time = array_sum(explode(' ', microtime()));
echo "TIME : ". ( $end_time - $start_time );