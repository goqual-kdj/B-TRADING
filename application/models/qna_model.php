<?php
class Qna_model extends CI_Model {
    private $table;
    function __construct()
    {
        parent::__construct();
        $this->table = 'bt_qna';
    }

    function gets()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('bt_user', 'bt_user._userid = bt_qna.for_userid');
        return $this->db->get()->result();
    }
}