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
