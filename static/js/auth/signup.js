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

// signup
$('.sg-auth-btn-signup').click(function () {
    var email = $('#sg-email').val();
    var password = $('#sg-password').val();
    var confirmPassword = $('#sg-confirm-password').val();

    if(validateEmail(email)) {
        if (password.length > 0) {
            if(confirmPassword.length > 0) {
                if (password === confirmPassword) {
                    $('.sg-signup-form').submit();
                } else {
                    $('.sg-auth-message').text("비밀번호를 올바르게 다시 한번 입력해주세요.");
                }
            } else {
                $('.sg-auth-message').text("비밀번호를 다시 한번 입력해주세요");
            }
        } else {
            $('.sg-auth-message').text("비밀번호를 입력해주세요");
        }
    } else {
        $('.sg-auth-message').text("올바른 이메일을 입력해주세요");
    }
});

// validate email
function validateEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}