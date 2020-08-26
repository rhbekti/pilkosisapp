<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model(['M_user','M_chat','M_vote']);
		$this->session->set_userdata('menu','user_menu');
		cek_login();
	}

	public function index()
	{
		$data['judul'] = 'Dashboard';
		// untuk mencetak id pada navbar
		$data['user'] = $this->M_user->get($this->session->userdata('id'))->row_array();
		$ck_user = $this->M_vote->cek_sdah_voting($this->session->userdata('id'));
		if($ck_user->num_rows() < 1){
			$this->session->set_userdata('status','<div class="alert alert-danger" role="alert">
			Belum Voting</div>');
		}else{
			$this->session->set_userdata('status','<div class="alert alert-success" role="alert">
			Sudah Voting</div>');
		}
		$this->load->view('template/header');
		$this->load->view('template/navbar',$data);
		$this->load->view('template/sidebar');
		$this->load->view('user/v_dashboard',$data);
		$this->load->view('template/footer');
		$this->load->view('user/end_user');
	}
	public function get_data_vote()
	{
		$data = $this->M_vote->cek_sdah_voting()->result();
		echo json_encode(count($data));
	}
	
	
}
