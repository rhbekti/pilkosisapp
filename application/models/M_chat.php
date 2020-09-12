<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_chat extends CI_Model
{
    public function get_all()
    {
        $this->db->select('komentar.id as idkomen,waktu,pesan,administrator.nama,administrator.foto');
        $this->db->from('komentar');
        $this->db->order_by('idkomen','asc');
        $this->db->join('administrator','administrator.id = komentar.id_user');
        return $this->db->get();
    }
    public function insert_komen($idpemilih,$nama)
    {
        $data = [
            'id' => '',
            'pesan' => htmlspecialchars($idpemilih),
            'waktu' => date('Y-m-d H:i:s'),
            'id_user' => htmlspecialchars($nama)
        ];
        $sql = $this->db->insert('komentar',$data);
        
    }
    public function get_user_kelas($post)
    { 
        // $this->db->select('user.*,datakelas.namakelas');
        $this->db->where('kelas',$post);
        // $this->db->join('datakelas','datakelas.kodekelas = user.kelas');
        $this->db->join('status','status.id_status = user.status');
        $this->db->order_by('id','asc');
        return $this->db->get('user');
    }
}