<?php defined('BASEPATH') or exit('No direct script access allowed');

class Petugas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['M_user', 'M_pilkosis']);
        $this->session->set_userdata('menu', 'data_petugas');
        cek_login();
    }
    public function index()
    {
        $data['judul'] = 'Data Petugas';
        $data['user'] = $this->M_user->get_admin($this->session->userdata('id'))->row_array();
        $this->load->view('template/header');
        $this->load->view('template/navbar', $data);
        $this->load->view('template/sidebar');
        $this->load->view('administrator/v_petugas', $data);
        $this->load->view('template/footer');
        $this->load->view('administrator/end_petugas');
    }
    public function get_data()
    {
        header('Content-Type: application/json');
        echo $this->M_pilkosis->get_json_petugas();
    }
    public function tambah()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', ['required' => '%s tidak boleh kosong']);
        $this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[5]|is_unique[administrator.username]', ['required' => '%s harus di isi', 'min_length' => '%s minimal 5 karakter', 'is_unique' => '%s telah di gunakan']);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]', ['required' => '%s harus di isi', 'min_length' => '%s min 8 karakter']);
        $post = $this->input->post(null,True);
        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = 'Data Petugas';
            $data['user'] = $this->M_user->get_admin($this->session->userdata('id'))->row_array();
            $this->load->view('template/header');
            $this->load->view('template/navbar', $data);
            $this->load->view('template/sidebar');
            $this->load->view('administrator/v_petugas', $data);
            $this->load->view('template/footer');
            $this->load->view('administrator/end_petugas');
        } else {
            $config['upload_path']      = './uploads/images/';
            $config['allowed_types']    = 'jpg|png';
            $config['max_size']         = '4096'; //satuan kb
            $config['file_name']        = 'admin'.date('ymd').'-'.substr(md5(rand()),0,10);
            $this->load->library('upload',$config);
            
            if(@$_FILES['foto']['name'] != null){
                if($this->upload->do_upload('foto')){
                    $post['foto'] = $this->upload->data('file_name');
                    $this->M_pilkosis->insert_petugas($post);
                    if($this->db->affected_rows() > 0){
                        $this->session->set_flashdata('aksi','sukses');
                        $this->session->set_flashdata('info','Ditambahkan');
                    }else{
                        $this->session->set_flashdata('aksi','error');
                        $this->session->set_flashdata('info','Ditambahkan');
                    }
                    redirect('/admin/Petugas');  
                }else{
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error',$error);
                    redirect('/admin/kandidat/add');
                }
            }else{
                $post['foto'] = 'default.png';
                $this->M_pilkosis->insert_petugas($post);
                if($this->db->affected_rows() > 0){
                    $this->session->set_flashdata('aksi','sukses');
                    $this->session->set_flashdata('info','Ditambahkan');
                }else{
                    $this->session->set_flashdata('aksi','error');
                    $this->session->set_flashdata('info','Ditambahkan');
                }
                redirect('/admin/Petugas');
            }
        }
    }
    public function delete()
    {
        $id = $this->input->post('idpetugashapus');
        $data = $this->M_pilkosis->get_petugas($id)->row();
        if($data->foto != null){
            $hapus_foto = './uploads/images/'.$data->foto;
            unlink($hapus_foto);
        }
        $this->M_pilkosis->delete($id);
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('aksi','sukses');
            $this->session->set_flashdata('info','Di Hapus');
        }else{
            $this->session->set_flashdata('aksi','error');
            $this->session->set_flashdata('info','Di Hapus');
        }
        redirect('/admin/petugas');
    }
}
