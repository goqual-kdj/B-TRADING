$(document).ready(function () {
    var url = $('#btrading-url').val();
    var isMobile = $(window).width() > 700 ? false : true;
    var replyTextareaHeight = $('.reply-content').outerHeight();
    var replyRegisterBtn = $('#reply-submit');

    if (!isMobile) {
        replyRegisterBtn.css('padding', 0);
        replyRegisterBtn.css('height', replyTextareaHeight);
        replyRegisterBtn.css('line-height', replyTextareaHeight + 'px');
    }

    replyRegisterBtn.click(function () {
        var content = $('.reply-content').val();
        var qnaid = $('#qnaid').val();
        var userid = $('#userid').val();

        if (content.length > 0) {
            getJson(url + 'API/reply/submit',
                {
                    content: content,
                    userid: userid,
                    qnaid: qnaid
                },
                function (data) {
                    if (data > 0) {
                        window.location.href = url + "qna/detail?qnaid=" + qnaid;
                    } else {
                        console.log(data);
                        alert('답변을 작성하는데 실패하였습니다.');
                    }
                }, function (arg) {
                    console.log(arg);
                    alert('답변을 작성하는데 실패하였습니다.');
                }, 'json');
        } else {
            alert('답변을 작성해주세요.');
        }
    });
});