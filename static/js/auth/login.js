var isMobile = $(window).width() > 700 ? false : true;
var window_height = $(window).height();
var footer = $('.sg-auth-footer').outerHeight();
var elementHeight = $('.sg-auth-container').outerHeight();


if (isMobile) {
    console.log('test');
    $('.sg-auth-section').css('min-height', elementHeight + footer);
} else {
    $('.sg-auth-section').css('min-height', window_height - footer);
}

$('.sg-body-container').css('min-height', window_height - footer);



// login
$('.sg-auth-btn-login').click(function () {
    var email = $('#sg-email').val();

    if(validateEmail(email)) {
        $('.sg-login-form').submit();
    } else {
        $('.sg-auth-message').text("올바른 이메일을 입력해주세요");
    }
});

// validate email
function validateEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}