<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mgmt extends BT_Controller {

    function __construct () {
        parent::__construct();
        $this->__require_admin_login();
    }

    function index()
    {
        redirect('/mgmt/dashboard');
    }

    function dashboard()
    {
        $this->load->model('qna_model');
        $this->load->model('reply_model');

        $qnas = $this->qna_model->gets();
        $replies = $this->reply_model->gets();

        $this->__mgmt_get_views('_MGMT/dashboard', array ('qnas' => $qnas, 'replies' => $replies));
    }

    function user()
    {
        $this->load->model('user_model');
        $users = $this->user_model->gets();

        $this->__mgmt_get_views('_MGMT/user', array ('items' => $users));
    }

    function qna()
    {
        $this->load->model('qna_model');

        $qnas = $this->qna_model->gets();

        $this->__mgmt_get_views('_MGMT/qna', array ('items' => $qnas));
    }

    function qna_detail()
    {
        $this->load->model('qna_model');
        $this->load->model('reply_model');

        $qnaid = $this->input->get('qnaid');
        $qna = $this->qna_model->get_qna_by_id($qnaid);
        $replies = $this->reply_model->gets_by_qnaid($qnaid);

        $this->__mgmt_get_views('_MGMT/qna_detail', array ('item' => $qna, 'replies' => $replies));
    }

    function reply()
    {
        $this->load->model('reply_model');

        $replies = $this->reply_model->gets();

        $this->__mgmt_get_views('_MGMT/reply', array ('items' => $replies));
    }

    function update_reply()
    {
        $this->load->model('reply_model');

        $replyid = $this->input->get('replyid');
        $reply = $this->reply_model->get_reply_by_id($replyid);

        $this->__mgmt_get_views('_MGMT/update_reply', array ('data' => $reply));
    }

    function submit_update_reply()
    {
        $this->load->model('reply_model');
        $data = array (
            'content' => $this->input->post('content'),
            'replyid' => $this->input->post('replyid')
        );

        $rtv = $this->reply_model->update($data);

        if ($rtv > 0) {
            $this->session->set_flashdata('message', '답변 수정이 완료되었습니다.');
        } else {
            $this->session->set_flashdata('message', '답변 수정에 실패하였습니다.');
        }

        redirect('/mgmt/reply');
    }
}
