<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Panduan_user extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model(['M_user']);
		$this->session->set_userdata('menu','user_panduan');
		cek_login();
	}

	public function index()
	{
        $data['judul'] = 'Panduan Pilkosis';
		// untuk mencetak id pada navbar
		$data['user'] = $this->M_user->get($this->session->userdata('id'))->row_array();
		$this->load->view('template/header');
		$this->load->view('template/navbar',$data);
		$this->load->view('template/sidebar');
		$this->load->view('user/v_panduan',$data);
		$this->load->view('template/footer');
		$this->load->view('user/end_user');
	}
	
}
