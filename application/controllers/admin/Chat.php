<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model(['M_chat','M_pilkosis','M_user']);
        $this->session->set_userdata('menu','data_chat');
        cek_login();
    }
    public function index()
    {
        $data['judul'] = 'Chatingku';
        $data['user'] = $this->M_user->get_admin($this->session->userdata('id'))->row_array();
		$this->load->view('template/header');
		$this->load->view('template/navbar',$data);
		$this->load->view('template/sidebar');
		$this->load->view('user/v_chat_user',$data);
		$this->load->view('template/footer');
		$this->load->view('user/end_chat');
    }
    public function get_chat()
    {
        echo json_encode($this->M_chat->get_all()->result());
    }
    public function total_pesan()
    {
        echo json_encode(count($this->M_chat->get_all()->result()));
    }
    public function submit_pesan()
    {
        $this->form_validation->set_rules('pesan', 'Pesan', 'trim|required');
        
        if($this->form_validation->run() == FALSE){
            echo "Ada Error";
        }else{
            $arr = [
              'id_user' =>  $this->input->post('nama',True),
              'pesan' => $this->input->post('pesan',True),
              'waktu' =>  date('Y-m-d H:i:s')
            ];
            $this->db->insert('komentar',$arr);
            $sql = $this->M_pilkosis->get_petugas($this->input->post('nama'))->row();
            $arr['nama'] = $sql->nama;
            $arr['foto'] = $sql->foto;
            $arr['success'] = true;
        }
        echo json_encode($arr);
        
    }
   
    
}