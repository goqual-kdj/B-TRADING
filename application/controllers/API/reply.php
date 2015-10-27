<?php
class Reply extends BT_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('reply_model');
    }

    function submit()
    {
        $input_data = array(
            'content' => $this->input->post('content'),
            'userid' => $this->input->post('userid'),
            'qnaid' => $this->input->post('qnaid'),
        );

        echo json_encode($this->reply_model->add($input_data), JSON_PRETTY_PRINT);
    }

    function change_isdeprecated()
    {
        $qnaid = $this->input->get('replyid');
        $isdeprecated = filter_var($this->input->get('isdeprecated'), FILTER_VALIDATE_BOOLEAN);
        $return_url = $this->input->get('rt_url');

        $rtv = $this->reply_model->change_isdeprecated($qnaid, $isdeprecated);

        if ($rtv > 0) {
            $this->session->set_flashdata('message', '상태변경에 성공했습니다.');
        } else {
            $this->session->set_flashdata('message', '상태변경에 실패했습니다.');
        }

        if (!$return_url) {
            redirect('/mgmt/reply');
        } else {
            redirect('/mgmt/qna_detail?qnaid='.$return_url);
        }
    }
}