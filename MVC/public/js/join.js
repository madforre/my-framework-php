
// 조회 결과 할당
var mailInput = document.querySelector(".mid>ul input");
var formInputs = document.querySelectorAll(".mid input");
var commonInputs = document.querySelectorAll(".mid .common input");
var common = document.querySelector(".mid .common");
var joinBtn = document.querySelector(".join");

// 정규표현식
var regex = /[^\w]/gi;
var mailRegex = /[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*\.[a-zA-Z]{2,3}/i;

// 흐름 : 버튼 이벤트 -> pwConfirm() -> beforeValidation() -> validation() -> submission()

// 실시간 감시
common.addEventListener('keyup', watch);
mailInput.addEventListener('keyup', mailWatch);

// 가입 시 유효성 검사
addEventListener('keyup', function(event){
    if(event.keyCode == 13) {
        pwConfirm();
    }
});
joinBtn.addEventListener('click', pwConfirm);


function mailWatch(event)
{
    event.target.nextElementSibling.innerText ="";

    if ( event.target.value.match(mailRegex) ) {
        event.target.nextElementSibling.style.display = "none";
    } else {
        event.target.nextElementSibling.innerText ="이메일 주소만 가능합니다.";
        event.target.nextElementSibling.style.display = "block";
        joinBtn.type = "button";
    }
}

function watch(event)
{
    event.target.nextElementSibling.innerText ="";
    
    if ( event.target.value.match(regex) ) {
        event.target.nextElementSibling.innerText ="특수문자, 공백 x 영문자와 숫자만 가능";
        event.target.nextElementSibling.style.display = "block";
        joinBtn.type = "button";
    } else {
        event.target.nextElementSibling.style.display = "none";
    }
}

function pwConfirm()
{
    var pw = document.getElementById('pw').value;
    var pwCheck = document.getElementById('pwCheck').value;
    if ( pw != pwCheck ) {
        joinBtn.nextElementSibling.style.display = "block";
        joinBtn.nextElementSibling.innerText = "비밀번호와 비밀번호 확인란이 다릅니다.";
        return;
    } else {
        joinBtn.nextElementSibling.style.display = "none";
        joinBtn.nextElementSibling.innerText = "";
        beforeValidation();
    }
}

function beforeValidation()
{
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

    // 유효하지 않은 데이터이면 true반환
    var regexBool = function () {

        // mailInput 검사
        if (mailInput.value.match(mailRegex)) {
        }else {
            return true;
        }

        // commonInputs 검사
        for (var i = 0; i<commonInputs.length; i++)
        {
            if (commonInputs[i].value.match(regex)) {
                return true;
            }
        }
        return false;
    }

    if (regexBool()) {
        // 유효하지 않은 데이터 -> 제출 차단
        joinBtn.type ="button";
    } else {
        // 유효한 데이터 -> 제출 허용
        joinBtn.type ="submit";
        submission();
    }
}

function submission()
{
    window.document.forms[0].submit()
}