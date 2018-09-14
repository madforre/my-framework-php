<br>
<br>
<br>
<br>
<br>
<br>
<!-- <h2>　This is Home Page</h2> -->
<h2>　[ Mouse Move in Me! ]</h2>
<h3 class="no">　Count (no throttle) <p>0</p></h3>
<h3 class="yes">　Count (throttle) <p>0</p></h3>
<br>
<br>
<p>　News를 읽으려면 회원가입이 필요합니다.<p>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<script>

// -----------------------------

var h2 = document.querySelector("h2");
var count = document.querySelector(".no>p");
var count_two = document.querySelector(".yes>p");

// 함수표현식으로 콜백 생성
var counter = function() {
    count.innerText = parseInt(count.innerText) + 1
};

var counter_two = function() {
    count_two.innerText = parseInt(count_two.innerText) + 1
};

// 함수표현식으로 쓰로틀 생성
var throttle = function (callback, limit) {
    var wait = false;
    // addEventListener 에는 실행시킬 함수를 돌려줘야 한다.
    // return으로 함수를 돌려준다. 
    // * 이벤트 리스너의 두번째인수는 콜백이어야한다. 두번째 인자의 콜백에
    // ()를 쓰거나 인자를 넣는 순간 호출한다는 의미이므로
    // return 으로 익명함수를 전달해야 한다.
    // 이벤트 리스너는 전달받은 익명함수를 DOM에 바인딩한다.
    return function () {
        if (!wait) {
            callback();
            wait = true;
            setTimeout( function () {
                wait = false;
            }, limit);
        }
    }
}

// 쓰로틀 안쓰고 이벤트 호출
h2.addEventListener('mousemove', counter);

// 쓰로틀 쓰고 이벤트 호출
h2.addEventListener('mousemove', throttle(counter_two, 100));

</script>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>