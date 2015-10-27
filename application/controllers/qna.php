<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Qna extends BT_Controller {

    function __construct () {
        parent::__construct();
        $this->load->model('qna_model');
    }

    function index()
    {
        $qnas = $this->qna_model->gets_non_isdeprecated();

        $this->__get_views('_QNA/index', array('items' => $qnas));
    }

    function create()
    {
        $this->__require_login();
        $this->__get_views('_QNA/create');
    }

    function detail()
    {
        $this->__require_login();
        $qnaid = $this->input->get('qnaid');
        $qna = $this->qna_model->get_qna_by_id($qnaid);

        if (count($qna) == 0) {
            $this->session->set_flashdata('message', '해당 문의사항이 존재하지 않습니다.');
            redirect('/qna/index');
        } else {
            $this->load->model('reply_model');
            $replies = $this->reply_model->gets_by_qnaid_non_deprecated($qnaid);

            $this->__get_views('_QNA/detail', array('item' => $qna, 'replies' => $replies));
        }
    }
}
