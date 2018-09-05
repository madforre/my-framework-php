<?php

$hello = function($hou){
    require $hou;
};

call_user_func_array($hello, array("test.php"));


// $hello = function()
// {
//      return "name: ";
// };

// echo $hello();



// $greet = function()
// {
//     echo "hello";
// };

// $greet('World');
// $greet('PHP');
