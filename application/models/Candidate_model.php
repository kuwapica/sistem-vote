<?php
class Candidate_model extends CI_Model
{

    public function get_all()
    {
        return $this->db->get('candidates')->result();
    }

    public function get($id)
    {
        return $this->db->get_where('candidates', ['id' => $id])->row();
    }

    public function insert($data)
    {
        return $this->db->insert('candidates', $data);
    }

    public function update($id, $data)
    {
        return $this->db->where('id', $id)->update('candidates', $data);
    }

    public function delete($id)
    {
        return $this->db->delete('candidates', ['id' => $id]);
    }
}
