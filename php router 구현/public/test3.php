<?php
function foobar($arg, $arg2) {
    echo __FUNCTION__, " got $arg and $arg2\n";
}
class foo {
    function bar($arg, $arg2) {
        echo __METHOD__, " got $arg and $arg2\n";
    }
    function __destruct()
    {
        echo 'destruct';
    }
}

// 함수 호출하고 인수에 배열 전달

// Call the foobar() function with 2 arguments
call_user_func_array("foobar", array("one", "two"));

echo '<br>';
echo '<br>';

// 객체안의 함수를 호출하고 인수에 배열 전달

// Call the $foo->bar() method with 2 arguments
$foo = new foo;
call_user_func_array(array($foo, "bar"), array("three", "four"));

echo '<br>';
$i = 1;
echo $i;
// echo '<br>';
// $i+=1;
// echo $i;
?>