<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();		
		$this->load->model(['M_user']);
		sudah_login();
	}
	public function index()
	{
		$this->load->view('administrator/v_login');
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
			$this->load->view('administrator/v_login');
		}else{
			$this->_auth();
		}
	}
	private function _auth()
	{
		$username = $this->input->post('username');
        $password = sha1($this->input->post('password'));

        $user = $this->db->get_where('administrator',['username' => $username])->row_array();
		if($user){
			if($password == $user['password']){
				$data_admin = $this->M_user->get_admin($user['id'])->row_array();
				$param = [
					'id' => $data_admin['id'],
					'username' => $data_admin['username'],
					'level' => $data_admin['level']
				];
				$this->session->set_userdata($param);
				redirect('/admin/Dashboard');
			}else{
				$this->session->set_flashdata('info','<div class="alert alert-danger" role="alert">Password salah silakan ulang kembali</div>');
				redirect('/admin/Login');
			}
		}else{
			$this->session->set_flashdata('info','<div class="alert alert-danger" role="alert">Nis/Username tidak ditemukan</div>');
			redirect('/admin/Login');
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		redirect('/admin/login');
	}
}
