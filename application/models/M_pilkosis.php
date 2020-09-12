<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_pilkosis extends CI_Model
{
    public function get_json_petugas()
    {
        $this->datatables->select('id,nama,username,role,foto,nama_level');
        $this->datatables->from('administrator');
        $this->datatables->join('level','level.id_level = administrator.level');
        $this->datatables->add_column('foto','<img src="'.base_url('/uploads/images/').'$1" class="img-fluid" height="50" width="50">','foto');
        $this->datatables->add_column('hapus','<button class="btn-hapus btn btn-danger" data-id="$1"><i class="fas fa-trash"></i></button>','id');
        return $this->datatables->generate();
    }
    public function get_suara()
    {
        $this->db->select('id,jumlah_suara');
        $query = $this->db->get('kandidat');
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    public function total_suara()
    {
        $this->db->select('SUM(jumlah_suara) as total_suara');
        $this->db->from('kandidat');
        return $this->db->get();
    }
    public function insert_petugas($post)
    {
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama')),
            'username' => htmlspecialchars($this->input->post('username')),
            'password' => htmlspecialchars(sha1($this->input->post('password'))),
            'level' => htmlspecialchars($this->input->post('level')),
            'role' => htmlspecialchars($this->input->post('role')),
            'foto' => $post['foto']
        ];
        $this->db->insert('administrator',$data);
    }
    public function get_petugas($post)
    {
        return $this->db->get_where('administrator',['id' => $post]);
    } 
    public function delete($post)
    {
        $this->db->where('id',$post);
        $this->db->delete('administrator');
    }
}