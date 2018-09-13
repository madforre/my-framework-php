
// 조회 결과 할당
var ul = document.querySelector(".mid ul");
var formInputs = document.querySelectorAll(".mid input");
var loginBtn = document.querySelector(".login");

// 정규표현식
var regex = /[^\w]/gi;

// 흐름 : 버튼 이벤트 -> pwConfirm() -> beforeValidation() -> validation() -> submission()

// 실시간 감시
ul.addEventListener('keyup', watch);

// 로그인 시 유효성 검사
addEventListener('keyup', function(event){
    if(event.keyCode == 13)
    {
        pwConfirm();
    }
});

loginBtn.addEventListener('click', pwConfirm);


function watch(event)
{
    event.target.nextElementSibling.innerText ="";
    
    if ( event.target.value.match(regex) ) {

        // keyup한 인풋 태그 다음에 있는 형제노드인 span 태그 보이게
        event.target.nextElementSibling.innerText ="특수문자, 공백 x 영문자와 숫자만 가능";
        event.target.nextElementSibling.style.display = "block";
        loginBtn.type = "button";

    } else {

        // keyup한 인풋 태그 다음에 있는 형제노드인 span 태그 안보이게
        event.target.nextElementSibling.style.display = "none";

    }
}

function pwConfirm()
{
    beforeValidation();
}

function beforeValidation()
{
    // 인풋 리스트를 콜백으로 부터 받는다. 빠진값이 있으면 그대로 종료된다.
    var callback = function () {
        list = [];

        // forEach 는 return 값을 무조건 undefined로 반환한다. 반환할거면 기본적인 반복문 사용할 것
        formInputs.forEach(function(key) {
            if (key.value == "") {
                key.focus();
                key.nextElementSibling.innerText = key.placeholder+"란을 입력하세요.";
                key.nextElementSibling.style.display = "block";
            } else {
                list.push(key.value);
            }
        });
        return list;
    };

    if ( callback().length == formInputs.length ) {
        validation();
    }

    return;
}

function validation() {

    // 정규표현식으로 유효성 검사
    var regexBool = function () {
        for (var i = 0; i<formInputs.length; i++)
        {
            if (formInputs[i].value.match(regex)) {
                return true;
            }
        }
        return false;
    }

    if (regexBool()) {
        // 유효하지 않은 데이터
        loginBtn.type ="button";
    } else {
        // 유효한 데이터
        loginBtn.type ="submit";
        submission();
    }
}

function submission()
{
    window.document.forms[0].submit()
}