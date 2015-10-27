<?php
class Qna_model extends CI_Model {
    private $table;
    function __construct()
    {
        parent::__construct();
        $this->table = 'bt_qna';
        $this->user_table = 'bt_user';
    }

    function gets()
    {
        $this->db->select($this->table.'.*,'.$this->user_table.'.username');
        $this->db->from($this->table);
        $this->db->join($this->user_table, $this->user_table.'._userid ='. $this->table.'.for_userid');
        return $this->db->get()->result();
    }

    function gets_non_isdeprecated()
    {
        $where_clause = array(
            $this->table.'.isdeprecated' => FALSE,
        );
        $this->db->select($this->table.'.*,'.$this->user_table.'.username');
        $this->db->from($this->table);
        $this->db->where($where_clause);
        $this->db->join($this->user_table, $this->user_table.'._userid ='. $this->table.'.for_userid');
        return $this->db->get()->result();
    }

    function add($data)
    {
        $input_data = array(
            'title' => $data['title'],
            'content' => $data['content'],
            'for_userid' => $data['userid'],
            'hit' => 0,
            'created' => date("Y-m-d"),
            'checked' => NULL,
            'isdeprecated' => FALSE,
        );

        $this->db->insert($this->table, $input_data);
        return $this->db->insert_id();
    }

    function get_qna_by_id($qnaid)
    {
        $this->checked($qnaid);

        $where_clause = array(
            $this->table.'._qnaid' => $qnaid,
            $this->table.'.isdeprecated' => FALSE
        );

        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where($where_clause);
        $this->db->join($this->user_table, $this->user_table.'._userid = '.$this->table.'.for_userid');
        $qna = $this->db->get()->row();

        $input_data = array(
            'hit' => $qna->hit + 1
        );
        $this->db->where('_qnaid', $qnaid);
        $this->db->update($this->table, $input_data);

        return $qna;
    }

    function checked($qnaid)
    {
        $input_data = array(
            'checked' => date("Y-m-d"),
        );
        $this->db->where('_qnaid', $qnaid);
        $this->db->update($this->table, $input_data);
        return $this->db->affected_rows();
    }

    function change_isdeprecated($qnaid, $isdeprecated)
    {
        $input_data = array(
            'isdeprecated' => $isdeprecated
        );
        $this->db->where('_qnaid', $qnaid);
        $this->db->update($this->table, $input_data);
        return $this->db->affected_rows();
    }
}