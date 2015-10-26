$(document).ready(function () {
    $($('.slide-pane')[0]).css('background', 'url("/BTRADING/static/img/home_img_01.jpg")')
    $($('.slide-pane')[1]).css('background', 'url("/BTRADING/static/img/home_img_02.jpg")')
    $($('.slide-pane')[2]).css('background', 'url("/BTRADING/static/img/home_img_03.jpg")')
    $($('.slide-pane')[0]).css('background-size', 'cover');
    $($('.slide-pane')[1]).css('background-size', 'cover');
    $($('.slide-pane')[2]).css('background-size', 'cover');
    // main slider
    // img size: 2000 x 875
    $('.bt-main-slider').bxSlider({
        mode: 'fade',
        captions: true,
        onSliderLoad: function () {
            var sliderHeight = $('.bx-viewport').height();
            $('.text-container').css('height', sliderHeight);
        }
    });

    // item img
    var summaryHeight = $('.summary').outerHeight();
    $('.img > img').width(summaryHeight);

    // img hover
    $( ".quotation-img" ).mouseover(function() {
        $(this).attr('src', '/BTRADING/static/img/quotation_full.png');
    });
    $( ".quotation-img" ).mouseleave(function() {
        $(this).attr('src', '/BTRADING/static/img/quotation.png');
    });
    $( ".auction-img" ).mouseover(function() {
        $(this).attr('src', '/BTRADING/static/img/auction_full.png');
    });
    $( ".auction-img" ).mouseleave(function() {
        $(this).attr('src', '/BTRADING/static/img/auction.png');
    });
    $( ".equity-img" ).mouseover(function() {
        $(this).attr('src', '/BTRADING/static/img/equity_full.png');
    });
    $( ".equity-img" ).mouseleave(function() {
        $(this).attr('src', '/BTRADING/static/img/equity.png');
    });
});
