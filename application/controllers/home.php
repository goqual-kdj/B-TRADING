<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends BT_Controller {

    function __construct () {
        parent::__construct();
    }

    function index()
    {
        $this->__get_views('_HOME/index');
    }

    function submit_contact_us()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $content = $_POST['content'];

        $this->load->model('contact_model');
        $rtv = $this->contact_model->add(array (
            'name' => $name,
            'email' => $email,
            'content' => $content
        ));

        if ($rtv > 0) {
            $receiver = $email;    // 받는 사람
            $subject = $name."님께서 보낸 문의사항입니다."; // 제목
            $content =  $content;
            $headers = "From: " . strip_tags('contact@superstring.kr') . "\r\n";
            $headers .= "Reply-To: ". strip_tags('contact@superstring.kr') . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

            // 보낸시각, 보낸메세지는 mysql에 저장한다.
            mail($receiver, $subject, $content, $headers);

            echo json_encode(TRUE, JSON_PRETTY_PRINT);
        } else {
            echo json_encode(FALSE, JSON_PRETTY_PRINT);
        }
    }
}
