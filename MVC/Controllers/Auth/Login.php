<?php

class Login extends Controller
{

    public function loginCheck() {

        // 공백 포함 x, 외부 POST 공격 방어, 유효성 검사 필요


        // ...


        // 비밀번호, 비밀번호 확인 비교 //
        if ( $_POST['pw'] != $_POST['pwCheck'] ) {
            echo "<script>
                    alert('비밀번호와 확인 비밀번호가 다릅니다.');
                    location.href='/login'
                </script>";
            exit;
        }

        // 입력한 POST 값을 DB에서 조회하여 있으면 세션 생성


        // .. DB 로직


        // 테스트 코드
    
        // foreach ($_POST as $key => $value) {
        //     echo $key . " / " . $value;
        //     echo "<br>";
        // }


        // 세션 생성 후 리다이렉트

        @session_start();
        $_SESSION['id'] = 'Mvc';
        $_SESSION['auth'] = 'User';
                
        echo "<script>
                location.href='/'
            </script>";
    }

    public function logOut() {

        @session_destroy();

        echo "<script>
                location.href='/'
            </script>";

    }
}