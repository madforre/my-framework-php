<?php

class Join extends Controller
{
    public function joinCheck()
    {
        @session_start();
        $_SESSION['id'] = '관리자';
        $_SESSION['auth'] = 'Admin';

        echo "<script>
                location.href='/'
            </script>";
    }
}
