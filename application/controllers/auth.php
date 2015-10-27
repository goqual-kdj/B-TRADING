<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends BT_Controller {

    function __construct () {
        parent::__construct();
        $this->load->model('user_model');
    }

    function index()
    {
        redirect('auth/logoin');
    }

    function login()
    {
        if ($this->__is_logined()) {
            redirect('/home/index');
        }

        $this->__get_auth_view('_AUTH/login');
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('/auth/login');
    }

    function join()
    {
        $this->__get_auth_view('_AUTH/join');
    }

    function signup()
    {
        $this->__get_auth_view('_AUTH/signup');
    }

    function findpass()
    {
        $this->__get_auth_view('_AUTH/findpass');
    }






    function submit_signup()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $username = explode('@', $email);

        $input_data = array(
            'email' => $email,
            'username' => $username[0],
            'password' => password_hash($password, PASSWORD_BCRYPT)
        );

        $rtv = $this->user_model->add($input_data);

        if ($rtv != null && $rtv > 0) {
            $this->session->set_flashdata('message', '회원을 성공적으로 저장하였습니다.');
            redirect('auth/login');
        } else {
            $this->session->set_flashdata('message', '회원 추가하는데 오류가 발생했습니다. 개발자에게 문의하세요.');
            redirect('auth/join');
        }
    }

    function submit_login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->user_model->get_user_by_email($email);

        if ($user != null && $user->email == $email && password_verify($password, $user->password)) {
            $this->handle_login($user);
        } else {
            $this->session->set_flashdata('message', '로그인에 실패하였습니다.');
            redirect('auth/login');
        }
    }
    function handle_login($user)
    {
        $this->user_model->logined($user);

        //$this->session->set_flashdata('message', '로그인에 성공하였습니다.');
        $this->session->set_userdata('userid', $user->_userid);
        $this->session->set_userdata('email', $user->email);
        $this->session->set_userdata('username', $user->username);
        $this->session->set_userdata('is_login', TRUE);
        $this->session->set_userdata('is_admin', $user->is_admin);

        if ($user->is_admin == 1) {
            redirect('/mgmt/dashboard');
        }

        $returnURL = $this->input->get('returnURL');

        if ($returnURL === false || $returnURL === "") {
            redirect('home/index');
        }

        redirect($returnURL);
    }
}
