<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pilkosis extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model(['M_user','M_vote']);
        $this->session->set_userdata('menu','pilkosis');
        cek_login();
    }
    public function index()
    {
        $data['judul'] = 'Pilkosis Menu';
        $data['user'] = $this->M_user->get_admin($this->session->userdata('id'))->row_array();
        $this->load->view('template/header');
		$this->load->view('template/navbar',$data);
		$this->load->view('template/sidebar');
		$this->load->view('administrator/v_pilkosis',$data);
		$this->load->view('template/footer');
		$this->load->view('administrator/end_admin');
    }
    public function setting()
    {
        $post = $this->input->post(null,True);
        $query = $this->M_user->get_admin($post['id']);
        if($query->num_rows() < 1){
            $this->session->set_flashdata('aksi','error');
            $this->session->set_flashdata('info','Maaf Anda Tidak Berhak Mengakses pengaturan Ini!!');
            redirect('/Login');
        }
        if($post['tglmulai'] > $post['tgltutup']){
            $this->session->set_flashdata('aksi','error');
            $this->session->set_flashdata('info','Maaf Input Tanggal Salah!!');
            redirect('/admin/pilkosis');
        }
        $this->M_vote->insert_set($post);
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('aksi','sukses');
            $this->session->set_flashdata('info','Berhasil Di Simpan');
        }else{
            $this->session->set_flashdata('aksi','error');
            $this->session->set_flashdata('info','Gagal Di Simpan');
        }
        redirect('/admin/pilkosis');
    }
    public function get_setting()
    {
        $data = $this->M_vote->list_set()->result();
        echo json_encode($data);
    }
    public function hapus()
    {
        $id = $this->uri->segment(4,0);
        $this->M_vote->delete_set($id);
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('aksi','sukses');
            $this->session->set_flashdata('info','Berhasil Di Hapus');
        }else{
            $this->session->set_flashdata('aksi','error');
            $this->session->set_flashdata('info','Gagal Di Hapus');
        }
        redirect('/admin/pilkosis');
    }

}