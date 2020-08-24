<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model 
{
    public function verifi($user)
    {
        $this->db->where('username',$user);
        $this->db->join('datakelas','datakelas.kodekelas = user.kelas');
        return $this->db->get('user');
    }
    public function get($id = null){
        if($id != null){
            $this->db->where('id',$id);
        }
        $this->db->join('datakelas','datakelas.kodekelas = user.kelas');
        return $this->db->get('user');
    }
    public function get_admin($id = null)
    {
        if($id != null){
            $this->db->where('id',$id);
        }
        $this->db->join('level','level.id_level = administrator.level');
        return $this->db->get('administrator');
    }
    public function get_json_user()
    {
        $this->datatables->select('id,nama,username,datakelas.namakelas,level.nama_level as level,status.nama_status as status');
        $this->datatables->from('user');
        $this->datatables->join('datakelas','datakelas.kodekelas = user.kelas');
        $this->datatables->join('status','status.id_status = user.status');
        $this->datatables->join('level','level.id_level = user.level');
        $this->datatables->add_column('edit','<button class="btn btn-warning" data-id="$1"><i class="fas fa-edit"></i></button>','id');
        $this->datatables->add_column('hapus','<button class="btn btn-danger" data-id="$1"><i class="fas fa-trash"></i></button>','id');
        return $this->datatables->generate();
    }
}