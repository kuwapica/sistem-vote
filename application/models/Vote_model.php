<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vote_model extends CI_Model
{
    public function has_voted($user_id)
    {
        return $this->db->get_where('votes', ['user_id' => $user_id])->num_rows() > 0;
    }

    public function insert_vote($user_id, $candidate_id)
    {
        return $this->db->insert('votes', [
            'user_id' => $user_id,
            'candidate_id' => $candidate_id
        ]);
    }

    public function get_vote_by_user($user_id)
    {
        $this->db->select('candidates.*');
        $this->db->from('votes');
        $this->db->join('candidates', 'votes.candidate_id = candidates.id');
        $this->db->where('votes.user_id', $user_id);
        return $this->db->get()->row();
    }

    public function get_vote_count()
    {
        $this->db->select('candidates.nama_kandidat, COUNT(votes.id) as total');
        $this->db->from('votes');
        $this->db->join('candidates', 'votes.candidate_id = candidates.id');
        $this->db->group_by('votes.candidate_id');
        return $this->db->get()->result();
    }
}
