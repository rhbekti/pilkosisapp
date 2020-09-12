<?php defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['M_user', 'M_pilkosis']);
        $this->session->set_userdata('menu', 'dashboard');
        cek_login();
    }
    public function index()
    {
        $data['judul'] = 'Dashboard';
        $data['user'] = $this->M_user->get_admin($this->session->userdata('id'))->row_array();
        $data['grafik'] = $this->M_pilkosis->get_suara();
        $this->load->view('template/header');
        $this->load->view('template/navbar', $data);
        $this->load->view('template/sidebar');
        $this->load->view('administrator/v_dashboard', $data);
        $this->load->view('template/footer');
        $this->load->view('administrator/end_admin');
    }
    public function total_user()
    {
        $data = $this->M_user->get()->result();
        echo json_encode(count($data));
    }
    public function get_total_suara()
    {
        $data = $this->M_pilkosis->get_suara();
        echo json_encode($data);
    }
    public function get_persen_pemilih()
    {
        $data = $this->db->get('data_voting')->result();
        echo json_encode(count($data));
    }
    public function belum_memilih()
    {
        $pemilih = $this->db->get('data_voting')->result();
        $user = $this->db->get('user')->result();
        $data = count($user) - count($pemilih);
        echo json_encode($data);
    }
    public function get_jumlah_suara()
    {
        $data = $this->M_pilkosis->total_suara()->result();
        echo json_encode($data);
    }
}
