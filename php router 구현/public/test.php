<?php

header("404 Not Found");

class MethodTest
{
    public function __call($name, $arguments)
    {
        // 주의: $name 의 값은 대소를 구분합니다.
        echo "Calling object method '$name' "
             . implode(', ', $arguments). "\n";

        list($route, $method) = $arguments;
        $this->{strtolower($name)}[$route] = $method;
    }

    /**  PHP 5.3.0 이후  */
    public static function __callStatic($name, $arguments)
    {
        // 주의: $name 의 값은 대소를 구분합니다.
        echo "Calling static method '$name' "
             . implode(', ', $arguments). "\n";
    }
}

$obj = new MethodTest;
$obj->runTest('in object context');
$obj->runTest('hou','woh');

echo '<br>';
// MethodTest::hou('real');
// $obj::runTest('hou','wow');

echo $obj->runtest['hou'];

echo '<br>';
echo '<br>';

$str = "Hellod d World!";
echo $str . "<br>";
echo rtrim($str,"World!");

