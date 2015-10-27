<?php

class User_model extends CI_Model
{
    private $table;

    function __construct()
    {
        parent::__construct();
        $this->table = 'bt_user';
    }

    function gets()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        return $this->db->get()->result();
    }

    function get_user_by_email($email)
    {
        return $this->db->get_where($this->table, array('email' => $email))->row();
    }

    function logined($user)
    {
        $user->logined = date("Y-m-d H:i:sa");
        $this->db->update($this->table, $user, array('_userid' => $user->_userid));
    }

    function add($data)
    {
        $input_data = array(
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => $data['password'],
            'is_admin' => FALSE,
            'created' => date("Y-m-d"),
            'isdeprecated' => FALSE,
        );

        $this->db->insert($this->table, $input_data);
        return $this->db->insert_id();
    }

    function add_user_by_fb($data)
    {
        $input_data = array(
            'username' => $data['name'],
            'email' => $data['email'],
            'password' => password_hash($data['id'], PASSWORD_BCRYPT),
            'is_admin' => FALSE,
            'created' => date("Y-m-d"),
            'isdeprecated' => FALSE,
        );

        $this->db->insert($this->table, $input_data);
        $result = $this->db->insert_id();

        return $result;
    }

    function get_user_by_id($userid)
    {
        return $this->db->get_where($this->table, array('_userid' => $userid))->row();
    }

    function change_password($userid, $pwd)
    {
        try {
            $input_data = array(
                'password' => $pwd,
            );

            $this->db->where('_userid', $userid);
            $this->db->update($this->table, $input_data);

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    function change_info($userid, $username, $email)
    {
        try {
            $input_data = array(
                'username' => $username,
                'email' => $email
            );

            $this->db->where('_userid', $userid);
            $this->db->update($this->table, $input_data);

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    function change_password_by_email($email, $pass)
    {
        try {
            $input_data = array(
                'password' => password_hash($pass, PASSWORD_BCRYPT),
            );

            $this->db->where('email', $email);
            $this->db->update($this->table, $input_data);

            return $this->db->affected_rows();
        } catch (Exception $e) {
            return false;
        }
    }

    function change_isdeprecated($userid, $isdeprecated)
    {
        $input_data = array(
            'isdeprecated' => $isdeprecated
        );
        $this->db->where('_userid', $userid);
        $this->db->update($this->table, $input_data);
        return $this->db->affected_rows();
    }

    function change_admin($userid, $is_admin)
    {
        $input_data = array(
            'is_admin' => $is_admin
        );
        $this->db->where('_userid', $userid);
        $this->db->update($this->table, $input_data);
        return $this->db->affected_rows();
    }
}