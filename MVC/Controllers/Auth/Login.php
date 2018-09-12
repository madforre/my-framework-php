<?php

class Login extends Controller
{
    public function loginCheck() {

        // NULL 입력 방지 + 유효성 검사

        foreach ( $_POST as $key => $value ) {   

            if (empty($value)) {

                echo "<script>
                        alert('모든 내용을 입력해야 합니다.')
                        location.href='/login'
                    </script>";
                exit;

            }

            if (!preg_match("/\w/", $value)) {

                echo "<script>
                        alert('특수문자와 공백을 제외하고 입력 가능합니다.')
                        location.href='/login'
                    </script>";
                exit;

            }
        }

        // 비밀번호, 비밀번호 확인 비교 //

        if ( $_POST['pw'] != $_POST['pwCheck'] ) {

            echo "<script>
                    alert('비밀번호와 확인 비밀번호가 다릅니다.');
                    location.href='/login'
                </script>";
            exit;

        }

        // 입력한 POST 값을 DB에서 조회

        $user_id = $_POST['id'];
        $user_pw = $_POST['pw'];

        // PDO - 플레이스 홀더 사용하여 SQL Injection 방어

        $query = "SELECT * FROM users WHERE name=? AND password=?";
        $placeHolder = [$user_id,$user_pw];

        $result = Self::stmt($query, $placeHolder)->fetch();

        if ($result) {

            echo "로그인 성공"; 

        } else {

            echo "<script>
                    alert('아이디와 비밀번호를 다시 확인해주세요.');
                    location.href='/login'
                </script>";
            exit;

        }

        // 세션 초기화 및 생성 후 리다이렉트

        @session_start();

        $_SESSION['id'] = $user_id;
        $_SESSION['auth'] = "User";
                
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