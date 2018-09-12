<?php

class Check extends Controller
{
    public function user() 
    {
        if (!isset($_SESSION['auth']) || !isset($_SESSION['id'])) {
            echo "<script>
                    alert('회원만 열람 가능합니다.');
                    location.href='/';
                </script>";
            exit;   
        }
    }

    public function admin() 
    {

    }

    public function formValidation(string $redirect)
    {
        if (isset($_POST['email'])) {
            if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                echo "<script>
                        alert('이메일 주소 형식이 잘못되었습니다.');
                        location.href='$redirect'
                    </script>";
                exit;
            }
        }
        if (!isset($_POST['pw']) || !preg_match("/\w/", $_POST['pw'])) {
            echo "<script>
                        alert('패스워드 형식이 잘못되었습니다.');
                        location.href='$redirect'
                    </script>";
            exit;
        }
        if (!isset($_POST['id']) || !preg_match("/\w/", $_POST['id'])) {
            echo "<script>
                        alert('아이디 형식이 잘못되었습니다.');
                        location.href='$redirect'
                    </script>";
            exit;
        }
        foreach ( $_POST as $key => $value ) {
            if (empty($value)) {
                echo "<script>
                        alert('모든 내용을 입력해야 합니다.');
                        location.href='$redirect'
                    </script>";
                exit;
            }
        }
    }

    public function passwordConfirm(string $redirect)
    {
        if ( $_POST['pw'] != $_POST['pwCheck'] ) {
            echo "<script>
                    alert('비밀번호와 확인 비밀번호가 다릅니다.');
                    location.href='$redirect'
                </script>";
            exit;
        }
    }
}



