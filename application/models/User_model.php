<?php
class User_model extends CI_Model
{

    public function get_by_username($username)
    {
        return $this->db->get_where('users', ['username' => $username])->row();
    }

    public function insert_user($data)
    {
        return $this->db->insert('users', $data);
    }
}
