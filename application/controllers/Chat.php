<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model(['M_chat','M_user']);
        cek_login();
    }
    public function index()
    {
        $data['judul'] = 'Live Chat';
        $data['chatku'] = $this->M_chat->get_all();
		// untuk mencetak id pada navbar
        $data['user'] = $this->M_user->get($this->session->userdata('id'))->row_array();
		$this->load->view('template/header');
		$this->load->view('template/navbar',$data);
		$this->load->view('template/sidebar');
		$this->load->view('user/v_chat_user',$data);
		$this->load->view('template/footer');
		$this->load->view('user/end_chat');
    }
    public function get_pesan_baru()
    {
        echo json_encode($this->M_chat->get_all()->result());
    }
    public function submit_pesan()
    {
        $this->form_validation->set_rules('pesan', 'Pesan', 'trim|required');
       
        if($this->form_validation->run() == FALSE){
            echo "Ada Error";
        }else{
            $arr = [
              'id_user' =>  $this->input->post('nama'),
              'pesan' => $this->input->post('pesan'),
              'waktu' =>  date('Y-m-d H:i:s')
            ];
            $this->db->insert('komentar',$arr);
            $sql = $this->M_user->get($this->input->post('nama'))->row();
            $arr['nama'] = $sql->nama;
            $arr['success'] = true;
        }
        echo json_encode($arr);
    }
    public function user_list()
    {
        // if($this->session->userdata('level') !== 1){
        //     redirect('/Dashboard');
        // }else{
        $user = $this->session->userdata('id');
        $data = $this->M_user->get($user)->row_array();
        $sort = $this->M_chat->get_user_kelas($data['kodekelas'])->result();
        echo json_encode($sort);
        // }
    }
    
}