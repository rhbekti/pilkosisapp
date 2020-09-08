<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_pilkosis extends CI_Model
{
    public function get_json_petugas()
    {
        $this->datatables->select('id,nama,username,role,foto,nama_level');
        $this->datatables->from('administrator');
        $this->datatables->join('level','level.id_level = administrator.level');
        $this->datatables->add_column('foto','<img src="'.base_url('/upload/images/').'$1" class="img-fluid" height="50" width="50">','foto');

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
}