<div id="wrap">
  <div class="box">
    <form action="/loginOk" method="POST">
      <div class="top">
        <h1><a href="/">SEOULEAGUER</a></h1>
      </div>
      <div class="mid">
        <div class="left_mid">
            <ul>
                <li>
                    <label for="id"></label>
                    <input type="text" id="id" name="id" placeholder="아이디">
                    <span class="alert"></span>
                </li>
                <li>
                    <label for="pw"></label>
                    <input type="password" id="pw" name="pw" placeholder="비밀번호">
                    <span class="alert"></span>
                </li>
            </ul>
        </div>
        <div class="right_mid">
          <button class="login" type="button">로그인</button>
          <span class="alert"></span>
        </div>
      </div>
      <div class="bottom">
        <a href="/join">회원가입</a>
      </div>
    </form>
  </div>
</div>
<script type="text/javascript" src= "js/login.js"></script>
