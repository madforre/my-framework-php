<?php

class Check extends Controller
{
    public function user() {
        if (!isset($_SESSION['auth']) || !isset($_SESSION['id'])) {
            echo "<script>
                    alert('회원만 열람 가능합니다.');
                    location.href='/';
                </script>";
            
            exit;
        }
    }

    public function admin() {

    }
}