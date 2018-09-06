<?php
// 추 후 spl_autoload_register로 변경할 것
include_once __DIR__.'/IRequest.php';

// HTTP 요청에 대한 정보가 들어있는 객체를 초기화하기 위한 Request 클래스
// HTTP 요청에 대한 정보들이 가공된 형태로 들어있음.

class Request implements IRequest
{
    function __construct()
    {
        // 생성자와 동시에 실행되는 메서드 bootstrapSelf(), toCamelCase()
        $this->bootstrapSelf();
    }
    
    private function bootstrapSelf()
    {
        // 슈퍼 변수인 서버를 풀어서 캐멀케이스로 변환 후 클래스의 프로퍼티에 전부 저장
        foreach($_SERVER as $key => $value)
        {
            $this->{$this->toCamelCase($key)} = $value;
        }
    }

    private function toCamelCase($string)
    {
        // 전달받은 슈퍼 변수 서버 키를 소문자로 변경
        $result = strtolower($string);

        // 정규 표현식 snake_case 필터링
        preg_match_all('/_[a-z]', $result, $matches);
        
        // camelCase로 가공한 다음 snake_case에 덮어쓰기
        foreach($matches[0] as $match)
        {
            $c = str_replace('_','',strtoupper($match));

            $result = str_replace($match, $c, $result);
        }

        // bootstrapSelf() 메소드에 값을 반환
        return $result;
    }
    
    public function getBody()
    {
        // 요청이 GET 방식인 경우
        if($this->requestMethod == "GET")
        {
            return;
        }
        // 요청이 POST 방식인 경우
        if($this->requestMethod == "POST")
        {
            $result = array();
            // filter_input 내장 메소드로 POST 값들 유효성 검사
            foreach($_POST as $key => $value)
            {
                $result[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }

            return $result;
        }

        // ?
        // return $body;
    }

}

