<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['M_user','M_pilkosis']);
        $this->session->set_userdata('menu','data_petugas');
        cek_login();
    }
    public function index()
    {
        $data['judul'] = 'Data Petugas';
        $data['user'] = $this->M_user->get_admin($this->session->userdata('id'))->row_array();
        $this->load->view('template/header');
		$this->load->view('template/navbar',$data);
		$this->load->view('template/sidebar');
		$this->load->view('administrator/v_petugas',$data);
		$this->load->view('template/footer');
		$this->load->view('administrator/end_petugas');
    }
    public function get_data()
    {
        header('Content-Type: application/json');
        echo $this->M_pilkosis->get_json_petugas();
    }
}