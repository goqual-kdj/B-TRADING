$(document).ready(function () {
    var url = $('#btrading-url').val();
    var dirName = $('#sg-create-date').val();
    var $summernote = $('#summernote');
    $summernote.summernote({
        height: 300,                 // set editor height
        minHeight: null,             // set minimum height of editor
        maxHeight: null,             // set maximum height of editor
        focus: true,                 // set focus to editable area after initializing summernote
        onImageUpload: function (files) {
            if (files.length > 5) {
                alert('사진은 총 5장 까지만 부탁드립니다.');
            } else {
                for(var i=0; i < files.length; i++) {
                    sendFile(files[i], $(this));
                }
            }
        },
        onMediaDelete : function($target, editor, $editable) {
            console.log($target[0].src); // img
        }
    });

    function sendFile(file, editor) {
        data = new FormData();
        data.append("image", file);
        data.append("dir_name", dirName);

        $.ajax({
            data: data,
            type: "POST",
            url: url + "API/qna/upload_image",
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                console.log(data);
                var rtv = jQuery.parseJSON(data);
                if (rtv.state) {
                    editor.summernote('insertImage', rtv.content);
                } else {
                    alert(rtv.content);
                }
            }
        });
    }

    // submit form
    $('#ng-submit').click(function () {
        var title = $('#title').val();
        var content = $('.note-editable').html();

        if (title.length > 0) {
            if (content.length > 0) {
                $('#frm').submit();
            } else {
                alert('내용을 입력해주세요.');
            }
        } else {
            alert('제목을 입력해주세요.');
        }
    });
});
