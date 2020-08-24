<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();		
		$this->load->model(['M_user']);
	}
	public function index()
	{
		sudah_login();
		$this->load->view('user/v_login');
	}
	public function validasi()
	{
		$this->form_validation->set_rules('username','Username','required|trim',[
			'required' => '%s tidak boleh kosong'
		]);
		$this->form_validation->set_rules('password','Password','required|trim',[
			'required' => '%s tidak boleh kosong'
		]);
		
		if($this->form_validation->run() == FALSE){
			$this->load->view('user/v_login');
		}else{
			$this->_auth();
		}
	}
	private function _auth()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->M_user->verifi($username);
		if($user->num_rows() > 0){
			$user = $user->row();
			if($password == $user->password ){
				$param = [
					'id' => $user->id,
					'username' => $user->username,
					'level' => $user->level,
					'kelas' => $user->namakelas,
				];
				$this->session->set_userdata($param);
				redirect('/Dashboard');
			}else{
				$this->session->set_flashdata('info','<div class="alert alert-danger" role="alert">Password salah silakan ulang kembali</div>');
				redirect('/Login');
			}
		}else{
			$this->session->set_flashdata('info','<div class="alert alert-danger" role="alert">Nis/Username tidak ditemukan</div>');
			redirect('/Login');
		}
	}
	public function logout()
	{
		$param = ['id','username','level','kelas'];
		$this->session->unset_userdata($param);
		redirect('/Login');
	}
}
