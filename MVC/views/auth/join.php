<div id="wrap">
  <div class="box">
    <form action="/joinOk" method="post">
      <div class="top">
        <h1>회원가입</h1>
      </div>
      <div class="mid">
        <ul>
          <li>
            <label for="email"></label>
            <input type="text" id="email" name="email" placeholder="이메일">
            <span class="alert"></span>
          </li>
          <li class="common">
            <label for="id"></label>
            <input type="text" id="id" name="id" placeholder="아이디">
            <span class="alert"></span>
          
            <label for="pw"></label>
            <input type="password" id="pw" name="pw" placeholder="비밀번호">
            <span class="alert"></span>
          
            <label for="pwCheck"></label>
            <input type="password" id="pwCheck" name="pwCheck" placeholder="비밀번호 확인">
            <span class="alert"></span>
          </li>
        </ul>
      </div>
      <div class="bottom">
        <button class="join" type="button">가입하기</button>
        <span class="alert"></span>
      </div>
    </form>
  </div>
</div>
<script type="text/javascript" src= "js/join.js"></script>