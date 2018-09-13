<?php
@session_start();

$show = "";

if (isset($_SESSION['id'])) {
  $show = $_SESSION['id'] . ' 님 접속 중';
}

else {
  $show = '손님으로 접속중';
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="css/join.css">
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="css/footer.css">
</head>
<body>
  <div class="nav">
    <ul class ="gnb">
      <li><h1><a href="/">Home</a></h1></li>
      <li><h1><a href="/news">News</a></h1></li>
      <li>　</li>
      <li>　</li>
      <li>　</li>
      <?php
      if (isset($_SESSION['auth'])) {
        echo "<li>권한 : " .$_SESSION['auth']. "</li>";
      } else {
        echo "<li>권한 : Guest</li>";
      }
      ?>
      <li><a href="/join">회원가입</a></li>
      <?php
      if (isset($_SESSION['id'])) {
        echo "<li><a href='/logout'>로그아웃</a></li>";
      } else {
        echo "<li><a href='/login'>로그인</a></li>";
      }
      ?>
      <li><?=$show?></li>
    </ul>
    </div>
  </div>