<?php
class Reply_model extends CI_Model {
    private $table;
    function __construct()
    {
        parent::__construct();
        $this->table = 'bt_reply';
        $this->user_table = 'bt_user';
        $this->qna_table = 'bt_qna';
    }

    function gets()
    {
        $this->db->select($this->table.'.*,'.$this->user_table.'.username');
        $this->db->from($this->table);
        $this->db->join($this->user_table, $this->user_table.'._userid ='. $this->table.'.for_userid');
        return $this->db->get()->result();
    }

    function get_reply_by_id($replyid)
    {
        $where_clause = array(
            $this->table.'._replyid' => $replyid,
        );
        $this->db->select($this->table.'.*');
        $this->db->from($this->table);
        $this->db->where($where_clause);
        return $this->db->get()->row();
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

    function gets_by_qnaid($qnaid)
    {
        $where_clause = array(
            $this->table.'.for_qnaid' => $qnaid,
        );
        $this->db->select($this->table.'.*,'.$this->user_table.'.username');
        $this->db->from($this->table);
        $this->db->where($where_clause);
        $this->db->join($this->user_table, $this->user_table.'._userid ='. $this->table.'.for_userid');
        return $this->db->get()->result();
    }

    function gets_by_qnaid_non_deprecated($qnaid)
    {
        $where_clause = array(
            $this->table.'.for_qnaid' => $qnaid,
            $this->table.'.isdeprecated' =>FALSE
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
            'title' => "",
            'content' => $data['content'],
            'for_userid' => $data['userid'],
            'for_qnaid' => $data['qnaid'],
            'created' => date("Y-m-d"),
            'isdeprecated' => FALSE,
        );

        $this->db->insert($this->table, $input_data);
        return $this->db->insert_id();
    }

    function update($data)
    {
        $input_data = array(
            'content' => $data['content']
        );
        $this->db->where('_replyid', $data['replyid']);
        $this->db->update($this->table, $input_data);
        return $this->db->affected_rows();
    }

    function change_isdeprecated($replyid, $isdeprecated)
    {
        $input_data = array(
            'isdeprecated' => $isdeprecated
        );
        $this->db->where('_replyid', $replyid);
        $this->db->update($this->table, $input_data);
        return $this->db->affected_rows();
    }
}