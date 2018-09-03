<?php
include_once 'IRequest.php';

// HTTP 요청에 대한 정보가 들어있는 객체를 초기화

class Request implements IRequest
{
    function __construct()
    {
        $this->bootstrapSelf();
    }
    
    private function bootstrapSelf()
    {
        foreach($_SERVER as $key => $value)
        {
            // 슈퍼 변수인 서버를 풀어서 캐멀케이스로 변환 후 클래스의 프로퍼티에 전부 저장
            $this->{$this->toCamelCase($key)} = $value;
        }
    }

    private function toCamelCase($string)
    {
        // 전달받은 슈퍼 변수 서버 키를 소문자로 변경
        $result = strtolower($string);

        // 정규 표현식 snake_case 필터링
        preg_match_all('/_[a-z]', $result, $matches);
        
        foreach($matches[0] as $match)
        {
            
        }
    }
    
}
    

