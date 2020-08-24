<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kandidat extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model(['M_kandidat','M_user']);
        $this->session->set_userdata('menu','kandidat');
        cek_login();
    }
    public function index()
    {
        $data['judul'] = "Data Kandidat";
        $data['user'] = $this->M_user->get_admin($this->session->userdata('id'))->row_array();
        $this->load->view('template/header');
        $this->load->view('template/navbar',$data);
        $this->load->view('template/sidebar');
        $this->load->view('administrator/v_kandidat',$data);
        $this->load->view('template/footer');
        $this->load->view('administrator/end_kandidat');
    }
    public function total_kandidat()
    {
        $data = $this->M_kandidat->get()->result();
        echo json_encode(count($data));
    }
    public function get_data()
    {
        header('Content-Type: application/json');
        echo $this->M_kandidat->get_json();
    }
    public function get_data_kandidat()
    {
        header('Content-Type: application/json');
        echo $this->M_kandidat->get_biodata();
    }
    public function add()
    {
        $data['judul'] = 'Tambah Kandidat';
        $data['user'] = $this->M_user->get_admin($this->session->userdata('id'))->row_array();
        $this->load->view('template/header');
        $this->load->view('template/navbar',$data);
        $this->load->view('template/sidebar');
        $this->load->view('administrator/v_tambah_kandidat',$data);
        $this->load->view('template/footer');
        $this->load->view('administrator/end_kandidat',$data);
    }
    public function save()
    {
        $this->form_validation->set_rules('no','No','required|trim|is_unique[kandidat.id]',[
            'required' => 'Field %s harus diisi',
            'is_unique' => 'No tidak boleh sama'
        ]);
        $this->form_validation->set_rules('ketua','Ketua','required|trim',[
            'required' => 'Field %s harus diisi'
        ]);
        $this->form_validation->set_rules('wakil','Wakil','required|trim',[
            'required' => 'Field %s harus diisi'
        ]);
        $this->form_validation->set_rules('misi','Misi','required|trim',[
            'required' => 'Field %s harus diisi'
        ]);
        $this->form_validation->set_rules('proker','Proker','required|trim',[
            'required' => 'Field %s harus diisi'
        ]);
        $this->form_validation->set_rules('visi','Visi','required|trim',[
            'required' => 'Field %s harus diisi'
        ]);
        $post = $this->input->post(null,True);
        if($this->form_validation->run() == FALSE){
            $data['judul'] = 'Tambah Kandidat';
            $data['user'] = $this->M_user->get_admin($this->session->userdata('id'))->row_array();
            $this->load->view('template/header');
            $this->load->view('template/navbar',$data);
            $this->load->view('template/sidebar');
            $this->load->view('administrator/v_tambah_kandidat',$data);
            $this->load->view('template/footer');
            $this->load->view('administrator/end_kandidat',$data);
        }else{
            $config['upload_path']      = './uploads/images/';
            $config['allowed_types']    = 'jpg|png';
            $config['max_size']         = '4096'; //satuan kb
            $config['file_name']        = 'foto'.date('ymd').'-'.substr(md5(rand()),0,10);
            $this->load->library('upload',$config);

            if(@$_FILES['gambar']['name'] != null){
                if($this->upload->do_upload('gambar')){
                    $post['gambar'] = $this->upload->data('file_name');
                    $this->M_kandidat->insert($post);
                    if($this->db->affected_rows() > 0){
                        $this->session->set_flashdata('aksi','sukses');
                        $this->session->set_flashdata('info','Ditambahkan');
                    }else{
                        $this->session->set_flashdata('aksi','error');
                        $this->session->set_flashdata('info','Ditambahkan');
                    }
                    redirect('/admin/kandidat');
                }else{
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error',$error);
                    redirect('/admin/kandidat/add');
                }
            }else{
                $post['gambar'] = 'default.png';
                $this->M_kandidat->insert($post);
                if($this->db->affected_rows() > 0){
                    $this->session->set_flashdata('aksi','sukses');
                    $this->session->set_flashdata('info','Ditambahkan');
                }else{
                    $this->session->set_flashdata('aksi','error');
                    $this->session->set_flashdata('info','Ditambahkan');
                }
                redirect('/admin/kandidat');
            }
        }
    }
    public function edit()
    {
        $id =  $this->input->post('edit');
        $data['rs'] = $this->M_kandidat->get($id)->row();
        $data['user'] = $this->M_user->get_admin($this->session->userdata('id'))->row_array();
        $data['judul'] = 'Edit Kandidat';
        $this->load->view('template/header');
        $this->load->view('template/navbar',$data);
        $this->load->view('template/sidebar');
        $this->load->view('administrator/v_edit_kandidat',$data);
        $this->load->view('template/footer');
        $this->load->view('administrator/end_kandidat',$data);
    }
    public function update()
    {
        $this->form_validation->set_rules('ketua','Ketua','required|trim',[
            'required' => 'Field %s harus diisi'
        ]);
        $this->form_validation->set_rules('wakil','Wakil','required|trim',[
            'required' => 'Field %s harus diisi'
        ]);
        $this->form_validation->set_rules('misi','Misi','required|trim',[
            'required' => 'Field %s harus diisi'
        ]);
        $this->form_validation->set_rules('proker','Proker','required|trim',[
            'required' => 'Field %s harus diisi'
        ]);
        $this->form_validation->set_rules('visi','Visi','required|trim',[
            'required' => 'Field %s harus diisi'
        ]);
        $post = $this->input->post(null,True); 
        if($this->form_validation->run() == FALSE){
            $id =  $post['no'];
            $data['rs'] = $this->M_kandidat->get($id)->row();
            $data['user'] = $this->M_user->get_admin($this->session->userdata('id'))->row_array();
            $data['judul'] = 'Edit Kandidat';
            $this->load->view('template/header');
            $this->load->view('template/navbar',$data);
            $this->load->view('template/sidebar');
            $this->load->view('administrator/v_edit_kandidat',$data);
            $this->load->view('template/footer');
            $this->load->view('administrator/end_kandidat',$data);
        }
        else{
            $config['upload_path']      = './uploads/images/';
            $config['allowed_types']    = 'jpg|png';
            $config['max_size']         = '4096'; //satuan kb
            $config['file_name']        = 'foto'.date('ymd').'-'.substr(md5(rand()),0,10);
            $this->load->library('upload',$config);

            if(@$_FILES['gambar']['name'] != null){
                if($this->upload->do_upload('gambar')){
                    $data = $this->M_kandidat->get($post['no'])->row();
                    if($data->foto != null){
                        $hapus_foto = './uploads/images/'.$data->foto;
                        unlink($hapus_foto);
                    }
                    $post['gambar'] = $this->upload->data('file_name');
                    $this->M_kandidat->update($post);
                    if($this->db->affected_rows() > 0){
                        $this->session->set_flashdata('aksi','sukses');
                        $this->session->set_flashdata('info','Di Update');
                    }else{
                        $this->session->set_flashdata('aksi','error');
                        $this->session->set_flashdata('info','Di Update');
                    }
                    redirect('/admin/kandidat');
                }else{
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error',$error);
                    redirect('/admin/kandidat/add');
                }
            }else{
                $post['gambar'] = $this->input->post('gambarlama');
                $this->M_kandidat->update($post);
                if($this->db->affected_rows() > 0){
                    $this->session->set_flashdata('aksi','sukses');
                    $this->session->set_flashdata('info','Di Update');
                }else{
                    $this->session->set_flashdata('aksi','error');
                    $this->session->set_flashdata('info','Di Update');
                }
                redirect('/admin/kandidat');
            }
        }
    }
    public function hapus()
    {
        $id = $this->input->post('no');
        $data = $this->M_kandidat->get($id)->row();
        if($data->foto != null){
            $hapus_foto = './uploads/images/'.$data->foto;
            unlink($hapus_foto);
        }
        $this->M_kandidat->delete($id);
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('aksi','sukses');
            $this->session->set_flashdata('info','Di Hapus');
        }else{
            $this->session->set_flashdata('aksi','error');
            $this->session->set_flashdata('info','Di Hapus');
        }
        redirect('/admin/kandidat');
    }
    public function hapus_bio()
    {
        $id = $this->input->post('id');
        $data = $this->M_kandidat->get_data_bio($id)->row();
        if($data->foto != null){
            $hapus_foto = './uploads/images/'.$data->foto;
            unlink($hapus_foto);
        }
        $this->M_kandidat->delete_bio($id);
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('aksi','sukses');
            $this->session->set_flashdata('info','Di Hapus');
        }else{
            $this->session->set_flashdata('aksi','error');
            $this->session->set_flashdata('info','Di Hapus');
        }
        redirect('/admin/kandidat/biodata');
    }
    public function biodata()
    {
        $data['judul'] = "Biodata Kandidat";
        $data['user'] = $this->M_user->get_admin($this->session->userdata('id'))->row_array();
        $this->load->view('template/header');
        $this->load->view('template/navbar',$data);
        $this->load->view('template/sidebar');
        $this->load->view('administrator/v_bio_kandidat',$data);
        $this->load->view('template/footer');
        $this->load->view('administrator/end_kandidat');
    }
    public function tbh_bio()
    {
        $data['judul'] = 'Tambah Bio Kandidat';
        $data['rs_kelas'] = $this->M_kandidat->get_kelas()->result();
        $data['user'] = $this->M_user->get_admin($this->session->userdata('id'))->row_array();
        $this->load->view('template/header');
        $this->load->view('template/navbar',$data);
        $this->load->view('template/sidebar');
        $this->load->view('administrator/v_tambah_bio',$data);
        $this->load->view('template/footer');
        $this->load->view('administrator/end_kandidat',$data);
    }
    public function simpan_bio()
    {
        $this->form_validation->set_rules('nokandidat','Nokandidat','required|trim',[
            'required' => 'Field %s harus diisi'
        ]);
        $this->form_validation->set_rules('nama','Nama','required|trim',[
            'required' => 'Field %s harus diisi'
        ]);
        $this->form_validation->set_rules('kelas','Kelas','required|trim',[
            'required' => 'Field %s harus diisi'
        ]);
        $this->form_validation->set_rules('tgllahir','Tgllahir','required|trim',[
            'required' => 'Field %s harus diisi'
        ]);
        $this->form_validation->set_rules('alamat','Alamat','required|trim',[
            'required' => 'Field %s harus diisi'
        ]);
        $this->form_validation->set_rules('riwayat','Riwayat','required|trim',[
            'required' => 'Field %s harus diisi'
        ]);
        $this->form_validation->set_rules('sosmed','Sosmed','required|trim',[
            'required' => 'Field %s harus diisi'
        ]);
        $post = $this->input->post(null,True);

        if($this->form_validation->run() == FALSE){
            $data['judul'] = 'Tambah Bio Kandidat';
            $data['rs_kelas'] = $this->M_kandidat->get_kelas()->result();
            $data['user'] = $this->M_user->get_admin($this->session->userdata('id'))->row_array();
            $this->load->view('template/header');
            $this->load->view('template/navbar',$data);
            $this->load->view('template/sidebar');
            $this->load->view('administrator/v_tambah_bio',$data);
            $this->load->view('template/footer');
            $this->load->view('administrator/end_kandidat',$data);
        }else{
            $config['upload_path']      = './uploads/images/';
            $config['allowed_types']    = 'jpg|png';
            $config['max_size']         = '4096'; //satuan kb
            $config['file_name']        = 'foto'.date('ymd').'-'.substr(md5(rand()),0,10);
            $this->load->library('upload',$config);

            if(@$_FILES['gambar']['name'] != null){
                if($this->upload->do_upload('gambar')){
                    $post['gambar'] = $this->upload->data('file_name');
                    $this->M_kandidat->insert_bio($post);
                    if($this->db->affected_rows() > 0){
                        $this->session->set_flashdata('aksi','sukses');
                        $this->session->set_flashdata('info','Ditambahkan');
                    }else{
                        $this->session->set_flashdata('aksi','error');
                        $this->session->set_flashdata('info','Ditambahkan');
                    }
                    redirect('/admin/kandidat/biodata');
                }else{
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error',$error);
                    redirect('/admin/kandidat/tbh_bio');
                }
            }else{
                $post['gambar'] = 'default.png';
                $this->M_kandidat->insert($post);
                if($this->db->affected_rows() > 0){
                    $this->session->set_flashdata('aksi','sukses');
                    $this->session->set_flashdata('info','Ditambahkan');
                }else{
                    $this->session->set_flashdata('aksi','error');
                    $this->session->set_flashdata('info','Ditambahkan');
                }
                redirect('/admin/kandidat/biodata');
            }
        }
    }
    public function edit_bio()
    {
        $id =  $this->input->post('edit');
        $data['rs'] = $this->M_kandidat->get_data_bio($id)->row();
        $data['rs_kelas'] = $this->M_kandidat->get_kelas()->result();
        $data['user'] = $this->M_user->get_admin($this->session->userdata('id'))->row_array();
        $data['judul'] = 'Edit Kandidat';
        $this->load->view('template/header');
        $this->load->view('template/navbar',$data);
        $this->load->view('template/sidebar');
        $this->load->view('administrator/v_edit_bio',$data);
        $this->load->view('template/footer');
        $this->load->view('administrator/end_kandidat',$data);
    }
    public function update_bio()
    {
        $this->form_validation->set_rules('nokandidat','Nokandidat','required|trim',[
            'required' => 'Field %s harus diisi'
        ]);
        $this->form_validation->set_rules('nama','Nama','required|trim',[
            'required' => 'Field %s harus diisi'
        ]);
        $this->form_validation->set_rules('kelas','Kelas','required|trim',[
            'required' => 'Field %s harus diisi'
        ]);
        $this->form_validation->set_rules('tgllahir','Tgllahir','required|trim',[
            'required' => 'Field %s harus diisi'
        ]);
        $this->form_validation->set_rules('alamat','Alamat','required|trim',[
            'required' => 'Field %s harus diisi'
        ]);
        $this->form_validation->set_rules('riwayat','Riwayat','required|trim',[
            'required' => 'Field %s harus diisi'
        ]);
        $this->form_validation->set_rules('sosmed','Sosmed','required|trim',[
            'required' => 'Field %s harus diisi'
        ]);
        $post = $this->input->post(null,True); 
        if($this->form_validation->run() == FALSE){
            $id =  $post['id'];
            $data['rs'] = $this->M_kandidat->get_data_bio($id)->row();
            $data['rs_kelas'] = $this->M_kandidat->get_kelas()->result();
            $data['user'] = $this->M_user->get_admin($this->session->userdata('id'))->row_array();
            $data['judul'] = 'Edit Kandidat';
            $this->load->view('template/header');
            $this->load->view('template/navbar',$data);
            $this->load->view('template/sidebar');
            $this->load->view('administrator/v_edit_bio',$data);
            $this->load->view('template/footer');
            $this->load->view('administrator/end_kandidat',$data);
        }
        else{
            $config['upload_path']      = './uploads/images/';
            $config['allowed_types']    = 'jpg|png';
            $config['max_size']         = '4096'; //satuan kb
            $config['file_name']        = 'foto'.date('ymd').'-'.substr(md5(rand()),0,10);
            $this->load->library('upload',$config);

            if(@$_FILES['gambar']['name'] != null){
                if($this->upload->do_upload('gambar')){
                    $data = $this->M_kandidat->get_data_bio($post['id'])->row();
                    if($data->foto != null){
                        $hapus_foto = './uploads/images/'.$data->foto;
                        unlink($hapus_foto);
                    }
                    $post['gambar'] = $this->upload->data('file_name');
                    $this->M_kandidat->update_bio($post);
                    if($this->db->affected_rows() > 0){
                        $this->session->set_flashdata('aksi','sukses');
                        $this->session->set_flashdata('info','Di Update');
                    }else{
                        $this->session->set_flashdata('aksi','error');
                        $this->session->set_flashdata('info','Di Update');
                    }
                    redirect('/admin/kandidat/biodata');
                }else{
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error',$error);
                    redirect('/admin/kandidat/edit_bio');
                }
            }else{
                $post['gambar'] = $this->input->post('gambarlama');
                $this->M_kandidat->update_bio($post);
                if($this->db->affected_rows() > 0){
                    $this->session->set_flashdata('aksi','sukses');
                    $this->session->set_flashdata('info','Di Update');
                }else{
                    $this->session->set_flashdata('aksi','error');
                    $this->session->set_flashdata('info','Di Update');
                }
                redirect('/admin/kandidat/biodata');
            }
        }
    }
}