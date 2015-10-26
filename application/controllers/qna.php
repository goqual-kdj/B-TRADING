<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Qna extends BT_Controller {

    function __construct () {
        parent::__construct();
    }

    function index()
    {
        $this->load->model('qna_model');
        $qnas = $this->qna_model->gets();

        $this->__get_views('_QNA/index', array('items' => $qnas));
    }
}
