<?php
class Contact_model extends CI_Model {
    private $table;
    function __construct()
    {
        parent::__construct();
        $this->table = 'bt_contact';
    }

    function add($data)
    {
        $input_data = array(
            'name' => $data['name'],
            'email' => $data['email'],
            'content' => $data['content'],
            'checked' => null,
            'isdeprecated' => FALSE,
        );

        $this->db->insert($this->table, $input_data);
        return $this->db->insert_id();
    }
}