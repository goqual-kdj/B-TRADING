<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends BT_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    function login_by_fb()
    {
        $data = array(
            'email' => $_POST['email'],
            'name' => $_POST['name'],
            'id' => $_POST['id'],
        );

        $user = $this->user_model->get_user_by_email($data['email']);

        if (count($user) == 0) {
            echo json_encode(-1, JSON_PRETTY_PRINT);
        } else {
            if ($user->email == $data['email'] && password_verify($data['id'], $user->password)) {
                $this->user_model->logined($user);

                $this->session->set_userdata('userid', $user->_userid);
                $this->session->set_userdata('email', $user->email);
                $this->session->set_userdata('username', $user->username);
                $this->session->set_userdata('is_login', TRUE);

                echo json_encode($user->_userid, JSON_PRETTY_PRINT);
            } else {
                echo json_encode(-2, JSON_PRETTY_PRINT);
            }
        }
    }

    function add_user_by_fb()
    {
        $data = array(
            'email' => $_POST['email'],
            'name' => $_POST['name'],
            'id' => $_POST['id'],
        );

        $user = $this->user_model->get_user_by_email($data['email']);

        if (count($user) > 0) {
            $this->user_model->logined($user);

            $this->session->set_userdata('userid', $user->_userid);
            $this->session->set_userdata('email', $user->email);
            $this->session->set_userdata('username', $user->username);
            $this->session->set_userdata('is_login', TRUE);

            echo json_encode(999, JSON_PRETTY_PRINT);
        } else {
            $rtv = $this->user_model->add_user_by_fb($data);

            if ($rtv > 0) {
                $this->session->set_userdata('userid', $rtv);
                $this->session->set_userdata('email', $data['email']);
                $this->session->set_userdata('username', $data['name']);
                $this->session->set_userdata('is_login', TRUE);
            }

            echo json_encode($rtv, JSON_PRETTY_PRINT);
        }
    }

    function change_password()
    {
        $pwd = $this->input->get('pwd');
        $userid = $this->input->get('userid');
        $rtv = $this->user_model->change_password($userid, password_hash($pwd, PASSWORD_BCRYPT));

        echo json_encode($rtv, JSON_PRETTY_PRINT);
    }

    function findpass()
    {
        $email = $_POST['email'];

        if (!$email) {
            echo json_decode(0, JSON_PRETTY_PRINT);
        } else {
            $random_num =  rand();
            $rtv = $this->user_model->change_password_by_email($email, $random_num);

            if ($rtv != 0) {
                $receiver = $email;    // 받는 사람
                $subject = "B-TRADING 에서의 새로운 비밀번호를 보내드립니다."; // 제목
                $content =  "<p>안녕하세요 B-TRADING 입니다.</p>".
                            "<p>새로운 비밀번호: <span style='font-weight:bold'>".  $random_num ."</span></p>".
                            "<p><a href='http://goqual.com/BTRADING/auth/login'>로그인하기</a></p>"; // 내용
                $headers = "From: " . strip_tags('contact@superstring.kr') . "\r\n";
                $headers .= "Reply-To: ". strip_tags('contact@superstring.kr') . "\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

                // 보낸시각, 보낸메세지는 mysql에 저장한다.
                mail($receiver, $subject, $content, $headers);
            }

            echo json_decode($rtv, JSON_PRETTY_PRINT);
        }
    }

    function change_info()
    {
        $userid = $this->input->get('userid');
        $username = $this->input->get('username');
        $email = $this->input->get('email');

        $rtv = $this->user_model->change_info($userid, $username, $email);

        if ($rtv) {
            $this->session->set_userdata('email', $email);
            $this->session->set_userdata('username', $username);
        }

        echo json_encode($rtv, JSON_PRETTY_PRINT);
    }
}
