<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_chat extends CI_Model
{
    public function get_all()
    {
        $this->db->select('komentar.id as idkomen,waktu,pesan,user.nama');
        $this->db->from('komentar');
        $this->db->order_by('idkomen','asc');
        $this->db->join('user','user.id = komentar.id_user');
        return $this->db->get();
    }
    public function insert_komen($post)
    {
        $data = [
            'id' => '',
            'pesan' => htmlspecialchars($post['pesan']),
            'waktu' => date('Y-m-d H:i:s'),
            'id_user' => htmlspecialchars($post['id_user'])
        ];
        $sql = $this->db->insert('komentar',$data);
        if($this->db->affected_rows($sql) < 1){
            $this->session->set_flashdata('error','input komentar error');
        }
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