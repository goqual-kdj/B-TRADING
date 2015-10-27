$(document).ready(function () {
   var url = $('#btrading-url').val();

   $('#bt-submit').click(function () {
      var url = window.location.origin + '/BTRADING';

      var name = $('#ft-name').val();
      var email = $('#ft-email').val();
      var content = $('#ft-content').val();

      if (name.length > 0) {
         if (email.length > 0 && validateEmail(email)) {
            if (content.length > 0) {
               getJson(url + "/home/submit_contact_us",
                   {
                      name: name,
                      email: email,
                      content: content
                   },
                  function (data) {
                     if (data) {
                        alert('소중한 의견 감사합니다.');
                        $('#ft-name').val("");
                        $('#ft-email').val("");
                        $('#ft-content').val("");
                     } else {
                        alert('문의사항을 보내는데 오류가 발생했습니다. 관리자에게 문의하세요.');
                     }
                  }, function (arg) {
                     alert('문의사항을 보내는데 오류가 발생했습니다. 관리자에게 문의하세요.');
                   },'json');
            } else {
               alert('메세지를 입력해주세요.');
            }
         } else {
            alert('올바른 이메일을 입력해주세요.');
         }
      } else {
         alert('이름을 입력해주세요.');
      }
   });


   // validate email
   function validateEmail(email) {
      var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      return regex.test(email);
   }

   var currentUrl = window.location.href;

   $('ul.nav a').filter(function() {
      return this.href == currentUrl;
   }).parent().addClass('active');
   /*
   $('ul.nav a[href="'+ url +'"]').parent().addClass('active');

   */
});
