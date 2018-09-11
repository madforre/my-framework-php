<?php

class News extends Controller
{
    
    public function index($request)
    {   
        // 정렬 및 페이지네이션 로직

        Check::user();

        $hou = Self::stmt('SELECT * FROM news');
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        
        foreach ($request as $key => $value) {
            echo $key . " / " . $value;
            echo "<br>";
        }
    }

    public function show($id)
    {
        // 페이지 별로 랜더링 할 로직
    }

    public function create()
    {
        // 글 작성자가 인증된 회원인지 확인하는 로직
    }

    public function store(Request $request)
    {
        // 확인이 끝나면 DB에 저장

        // $hou = Self::stmt("INSERT INTO `mvc`.`news` (`topic`, `content`) VALUES ('test', 'hou')");
    }

    public function edit()
    {
        // 글 수정자가 인증된 회원인지 확인하는 로직
    }

    public function update(Request $request, $id)
    {
        // 회원이면 DB에 업데이트
    }

    public function destory(Request $request, $id)
    {
        // 회원 && 작성자 == true 이면 글 삭제
    }
}