<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model(['M_user']);
        $this->session->set_userdata('menu','dashboard');
        cek_login();
    }
    public function index()
    {
        $data['judul'] = 'Dashboard';
        $data['user'] = $this->M_user->get_admin($this->session->userdata('id'))->row_array();
        $this->load->view('template/header');
		$this->load->view('template/navbar',$data);
		$this->load->view('template/sidebar');
		$this->load->view('administrator/v_dashboard',$data);
		$this->load->view('template/footer');
		$this->load->view('administrator/end_admin');
    }
    public function total_user()
	{
		$data = $this->M_user->get()->result();
		echo json_encode(count($data));
	}
}