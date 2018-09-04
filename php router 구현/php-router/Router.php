<?php

// Router 클래스를 포함

class Router
{
    private $request;
    private $httpMethods = array(
        "GET",
        "POST"
    );


    // 의존성에 대한 참조 유지
    function __construct(IRequest $request)
    {
        $this->request = $request;
    }

    // 연관배열을 프로퍼티에 동적으로 오버로딩한다. (호출한 메서드 : 라우터의 메서드)
    function __call($name, $args)
    {
        // 라우터의 경로와 메서드를 각각 변수에 담음
        list($route, $method) = $args;

        // 배열인 프로퍼티 httpMethods 안에 호출한 라우터 메서드가 없으면 405 랜더링
        if(!in_array(strtoupper($name), $this->httpMethods))
        {
            $this->invalidMethodHandler();
        }

        // 대문자로 메서드를 호출한 경우 해당 메서드의 이름을 소문자로 변환하고 연관배열의 키로 한다.
        // 호출한 메서드의 이름(get, post)에 해당하는 연관배열 키의 값에 해당 라우터의 메서드를 저장한다.
        // 인스턴스에서 부른 메서드의 이름[슬래쉬 제거된 경로 키] = 값으로 콜백함수 주입
        $this->{strtolower($name)}[$this->formatRoute($route)] = $method;
    }

    // 경로의 슬래쉬 제거
    private function formatRoute($route)
    {
        $result = rtrim($route, '/');
        if ($result === '')
        {
            return '/';
        }

        return $result;
    }

    private function invalidMethodHandler()
    {
        header("{$this->request->serverProcotol} 405 Method Not Allowed");
    }

    private function defaultRequestHandler()
    {
        header("{$this->request->serverProtocol} 404 Not Found");
    }

    // 라우터 해결
    function resolve()
    {
        // Request 에서 동적 프로퍼티인 requestMethod를 소문자로 변환 후 해당 HTTP 요청에 해당하는 
        // 요청한 HTTP 방식에 따라 라우터의 메서드를 변수에 저장한다.

        $methodDictionary = $this->{strtolower($this->request->requestMethod)};
        $formatedRoute = $this->formatRoute($this->request->requestUri);
        $method = $methodDictionary[$formatedRoute];

        if(is_null($method))
        {
            $this->defaultRequestHandler();
            return;
        }

        // 라우터 get(),post() 메소드 인자인 콜백함수 실행 (함수의 인수가 불확실한 길이의 배열일 때의 함수 호출)
        // 콜백함수는 두번째 인자인 익명함수를 의미.
        echo call_user_func_array($method, array($this->request));
    }

    // 스크립트의 끝에서 함수들이 전부 호출된다. ? 소멸자 쓰임새 다시 볼 것
    function __destruct()
    {
        $this->resolve();
    }

}

