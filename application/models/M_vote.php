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
    public function cek_vote_login()
    {
        $post = $this->input->post(null,True);
        var_dump($post);
    }

}