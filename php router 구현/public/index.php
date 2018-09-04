<?php

// 출력 테스트용 페이지



class MethodOverloading

{

    public function __call($name, $arguments)

    {

        echo join(", ", $arguments)."에서 접근 불가 메소드를 호출합니다!";

    }

    public static function __callStatic($name, $arguments)

    {

        echo join(", ", $arguments)."에서 접근 불가 메소드를 호출합니다!";

    }

}

 

$obj = new MethodOverloading();             // MethodOverloading 객체 생성

$obj->testMethod("클래스 영역"); // 클래스 영역에서 접근 불가 메소드 호출
MethodOverloading::testMethod("정적 영역");


foreach($_SERVER as $key => $value){
    echo 'key : '.$key.' /// value : '.$value.'<br>';
}

echo "<br>";

$test = 'test_case_go_for_it';

function toCamelCase($string)
{
    // 전달받은 슈퍼 변수 서버 키를 소문자로 변경
    $result = strtolower($string);

    // 정규 표현식 snake_case 필터링
    preg_match_all('/_[a-z]/', $result, $matches);
    
    // var_dump($matches);

    foreach($matches[0] as $match)
    {
        // 찾은 snake_case 들을 소문자를 대문자로 변환후 _ 를 공백으로 대체
        $c = str_replace('_','',strtoupper($match));
        // camelCase 가공 후 원래의 snake_case 변수에 덮어쓰기
        $result = str_replace($match, $c, $result);
    }

    return $result;
}

echo toCamelCase($test);

// array_slice(array,start,length)

$info = array('coffee', 'brown', 'caffeine');

// Listing all the variables
list($drink, $color, $power) = $info;
echo "$drink is $color and $power makes it special.\n";