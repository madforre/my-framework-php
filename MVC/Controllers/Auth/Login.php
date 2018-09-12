<?php

class Login extends Controller
{
    public function loginCheck() 
    {
        // NULL 입력 방지 + 유효성 검사

        Check::formValidation('/login');

        // 비밀번호, 비밀번호 확인 비교 //

        Check::passwordConfirm('/login');

        // 조회시 PDO - 플레이스 홀더 사용하여 SQL Injection 방어

        $user_id = $_POST['id'];
        $user_pw = $_POST['pw'];
        $query = "SELECT * FROM users WHERE name=? AND password=?";
        $place_holder = [$user_id,$user_pw];

        $result = Self::stmt($query, $place_holder)->fetch();

        if ($result) {
            echo "로그인 성공"; 
        } else {
            echo "<script>
                    alert('아이디와 비밀번호를 다시 확인해주세요.');
                    location.href='/login'
                </script>";
            exit;
        };

        // 세션 생성 후 리다이렉트

        @session_start();

        $_SESSION['id'] = $user_id;
        $_SESSION['auth'] = "User";
                
        echo "<script>
                location.href='/'
            </script>";
    }

    public function logOut()
    {
        @session_destroy();

        echo "<script>
                location.href='/'
            </script>";

    }
}