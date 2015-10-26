$(document).ready(function () {
    var isMobile = $(window).width() > 700 ? false : true;
    var window_height = $(window).height();
    var footer = $('.sg-auth-footer').outerHeight();
    var elementHeight = $('.sg-auth-container').outerHeight();

    if (isMobile) {
        $('.sg-auth-section').css('height', elementHeight + footer);
    } else {
        $('.sg-auth-section').css('height', window_height - footer);
    }

    $('.sg-body-container').css('min-height', window_height - footer);

    $('.sg-auth-btn-findpass-email').click(function () {
        var email = $('#sg-findpass-email').val();
        if (email.length > 0 && validateEmail(email)) {
            findpass(email);

        } else {
            alert('올바른 이메일을 입력해주세요.');
        }
    });

    function findpass(email) {
        getJson('/BTRADING/API/auth/findpass', { email:  email },
            function (data) {
                if (data == 1) {
                    alert('새로운 비밀번호가 발생되었습니다.');
                    window.location = '/BTRADING/auth/login';
                }
            }, function (arg) {
                console.log(arg);
            }, 'json');
    }

    // validate email
    function validateEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }
});