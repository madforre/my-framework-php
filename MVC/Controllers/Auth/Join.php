<?php

class Join extends Controller
{
    public function joinCheck()
    {
        // NULL 입력 방지 + 유효성 검사

        Check::formValidation('/join');

        // 비밀번호, 비밀번호 확인 비교

        Check::passwordConfirm('/join');

        // 조회 -> 행이 있으면 리다이렉트, 없으면 데이터 생성

        $user_email = $_POST['email'];
        $user_id = $_POST['id'];
        $user_pw = $_POST['pw'];

        $query = "SELECT * FROM users WHERE email=? OR name=?";
        $place_holder = [$user_email, $user_id];
        $result = Self::stmt($query, $place_holder)->fetch();

        if ($result) {

            echo "<script>
                alert('이미 존재하는 아이디나 이메일입니다.');
                location.href='/join'
            </script>";
            exit;

        }

        $query = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
        $place_holder = [$user_id, $user_email, $user_pw];
        Self::stmt($query, $place_holder);

        echo "<script>
            alert('계정이 생성되었습니다! 로그인 후 이용하세요.');
            location.href='/login'
            </script>";
    }
}