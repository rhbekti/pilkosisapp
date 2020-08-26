<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_vote extends CI_Model 
{
    public function list_set()
    {
        $this->db->join('administrator','administrator.id = setting.id_admin');
        return $this->db->get('setting');
    }
    public function insert_set($post)
    {
        $data = [
            'id' => 1,
            'tglawal' => htmlspecialchars(date('Y-m-d',strtotime($post['tglmulai']))),
            'tglakhir' => htmlspecialchars(date('Y-m-d',strtotime($post['tgltutup']))),
            'jambuka' => $post['jambuka'],
            'jamtutup' => $post['jamtutup'],
            'id_admin' => htmlspecialchars(date('H-i-s',strtotime($post['idadmin'])))
        ];
        $this->db->insert('setting',$data);
    }
    public function delete_set($post)
    {
        $this->db->where('id',$post);
        $this->db->delete('setting');
    }
    public function insert_vote($post,$query,$waktu)
    {
        $data = [
            'id' => '',
            'id_user' => $query->id,
            'no_kandidat' => $post['vote'],
            'waktu' => $waktu
        ];
        $this->db->insert('data_voting',$data);
    }
    public function update_kandidat_suara($post)
    {
        $data = [
            'jumlah_suara' => $post->jumlah_suara + 1
        ];
        $this->db->where('id',$post->id);
        $this->db->update('kandidat',$data);
    }
    public function update_status_user($param)
    {
        $data = [
            'status' => 2
        ];
        $this->db->where('id',$param);
        $this->db->update('user',$data);
    }
    public function cek_sdah_voting($post = null)
    {
        if($post != null){
            $this->db->where('id_user',$post);
        }
        return $this->db->get('data_voting');
    }

}