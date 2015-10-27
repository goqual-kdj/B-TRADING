$(document).ready(function () {
    var url = $('#btrading-url').val();

    // main slider
    $('.bt-main-slider').bxSlider({
        mode: 'fade',
        captions: true,
        auto: true,
        onSliderLoad: function () {
            var sliderHeight = $('.bx-viewport').height();
            $('.text-container').css('height', sliderHeight);
        }
    });

    // item img
    if ($(window).width() > 700) {
        var summaryHeight = $('.summary').outerHeight();
        $('.img > img').width(summaryHeight);
    } else {
        var summaryHeight = $($('.summary')[4]).outerHeight();
        $('.img > img').width(summaryHeight);
    }


    // img hover
    $( ".quotation-img" ).mouseover(function() {
        $(this).attr('src', url + 'static/img/quotation_full.png');
    });
    $( ".quotation-img" ).mouseleave(function() {
        $(this).attr('src', url + 'static/img/quotation.png');
    });
    $( ".auction-img" ).mouseover(function() {
        $(this).attr('src', url + 'static/img/auction_full.png');
    });
    $( ".auction-img" ).mouseleave(function() {
        $(this).attr('src', url + 'static/img/auction.png');
    });
    $( ".equity-img" ).mouseover(function() {
        $(this).attr('src', url + 'static/img/equity_full.png');
    });
    $( ".equity-img" ).mouseleave(function() {
        $(this).attr('src', url + 'static/img/equity.png');
    });
});
