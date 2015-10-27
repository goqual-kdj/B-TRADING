<?php
class User extends BT_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    function change_isdeprecated()
    {
        $qnaid = $this->input->get('userid');
        $isdeprecated = filter_var($this->input->get('isdeprecated'), FILTER_VALIDATE_BOOLEAN);
        $rtv = $this->user_model->change_isdeprecated($qnaid, $isdeprecated);

        if ($rtv > 0) {
            $this->session->set_flashdata('message', '상태변경에 성공했습니다.');
        } else {
            $this->session->set_flashdata('message', '상태변경에 실패했습니다.');
        }

        redirect('/mgmt/user');
    }

    function change_admin()
    {
        $qnaid = $this->input->get('userid');
        $is_admin = filter_var($this->input->get('is_admin'), FILTER_VALIDATE_BOOLEAN);
        $rtv = $this->user_model->change_admin($qnaid, $is_admin);

        if ($rtv > 0) {
            $this->session->set_flashdata('message', '관리자 상태변경에 성공했습니다.');
        } else {
            $this->session->set_flashdata('message', '관리자 상태변경에 실패했습니다.');
        }

        redirect('/mgmt/user');
    }
}