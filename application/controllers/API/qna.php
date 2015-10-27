<?php
class Qna extends BT_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('qna_model');
    }

    function submit()
    {
        $input_data = array(
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content'),
            'dir_name' => $this->input->post('dir_name'),
            'userid' => $this->input->post('userid'),
        );

        $rtv = $this->qna_model->add($input_data);

        if ($rtv > 0) {
            $this->session->set_flashdata('message', '소중한 의견 감사합니다.');
            redirect('/qna/index');
        } else {
            $this->session->set_flashdata('message', '글작성에 실패하였습니다. 관리자에게 문의하세요.');
            redirect('/qna/create');
        }
    }

    function upload_image()
    {
        $file = $_FILES['image'];
        $rtv = array('state' => FALSE, 'content' => "");

        $root_path = $_SERVER["DOCUMENT_ROOT"] . "/BTRADING/upload/";
        $dir_name = $_POST['dir_name'];
        $dir_path = $root_path . $dir_name;

        if (!is_dir($dir_path)) {
            mkdir($dir_path, 0777, true);
        }

        $file_error = $file['error'];
        if ($file_error === 0) {
            $upload_file = $dir_path . "/" . basename($file['name']);

            if (is_dir($dir_path)) {
                if (file_exists($upload_file)) {
                    $return_url = '/upload/'.$dir_name.'/'.basename($file['name']);
                    $rtv['state'] = TRUE;
                    $rtv['content'] = $return_url;
                } else {
                    if (move_uploaded_file($file['tmp_name'], $upload_file)) {
                        $return_url = '/BTRADING/upload/'.$dir_name.'/'.basename($file['name']);
                        $rtv['state'] = TRUE;
                        $rtv['content'] = $return_url;
                    } else {
                        $rtv['content'] = "사진을 저장하는데 오류가 발생했습니다. 010-6233-8509 개발자에게 연락주세요.";
                    }
                }
            } else {
                $rtv['content'] = "폴더가 존재하지 않습니다. 010-6233-8509 개발자에게 연락주세요.";
            }

        } else if ($file_error === 2) {
            $rtv['content'] = "사진이 너무 큽니다.";
        } else if ($file_error === 3) {
            $rtv['content'] = "사진 중 일부만 전송되었습니다.";
        } else if ($file_error === 4) {
            $rtv['content'] = "사진을 설정해주세요.";
        } else {
            $rtv['content'] = "사진을 저장하는데 예상하지 못한 오류가 발생했습니다. 010-6233-8509 개발자에게 연락주세요.";
        }
        echo json_encode($rtv, JSON_PRETTY_PRINT);
    }

    function change_isdeprecated()
    {
        $qnaid = $this->input->get('qnaid');
        $isdeprecated = filter_var($this->input->get('isdeprecated'), FILTER_VALIDATE_BOOLEAN);
        $rtv = $this->qna_model->change_isdeprecated($qnaid, $isdeprecated);

        if ($rtv > 0) {
            $this->session->set_flashdata('message', '상태변경에 성공했습니다.');
        } else {
            $this->session->set_flashdata('message', '상태변경에 실패했습니다.');
        }

        redirect('/mgmt/qna');
    }
}