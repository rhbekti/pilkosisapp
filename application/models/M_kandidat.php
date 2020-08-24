<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kandidat extends CI_Model
{
    public function get($id = null)
    {
        if($id != null)
        {
            $this->db->where('id',$id);
        }
        return $this->db->get('kandidat');
    }
    public function get_data_kandidat($id = null)
    {
        $this->db->select('biodata.id,nama,tgl_lahir,alamat,riwayat,sosmed,biodata.foto,kandidat.visi,kandidat.misi,kandidat.proker,datakelas.namakelas');
        if($id != null)
        {
            $this->db->where('nama',$id);
        }
        $this->db->join('kandidat','kandidat.id = biodata.id_kandidat');
        $this->db->join('datakelas','datakelas.kodekelas = biodata.kelas');
        return $this->db->get('biodata');
    }
    public function get_data_bio($id = null)
    {
        $this->db->select('biodata.id,nama,tgl_lahir,kelas,alamat,riwayat,sosmed,id_kandidat,biodata.foto,kandidat.visi,kandidat.misi,kandidat.proker');
        if($id != null)
        {
            $this->db->where('biodata.id',$id);
        }
        $this->db->join('kandidat','kandidat.id = biodata.id_kandidat');
        return $this->db->get('biodata');
    }
    public function get_json()
    {
        $this->datatables->select('id,ketua,wakil,visi,misi,foto,jumlah_suara');
        $this->datatables->from('kandidat');
        $this->datatables->add_column('gambar','<img src="'.base_url('/uploads/images/').'$1" width="90">','foto');
        $this->datatables->add_column('edit','<form action="'.site_url('/admin/Kandidat/edit').'" method="post"><button name="edit" class="btn_edit btn btn-warning" value="$1"><i class="fas fa-pen"></i></button></form>','id');
        $this->datatables->add_column('hapus','<button class="hapus_data btn btn-danger" data-no="$1" data-foto="$2"><i class="fas fa-trash"></i></button>','id,foto');
        return $this->datatables->generate();
    }
    public function insert($post)
    {
        $data =  [
            'id' => htmlspecialchars($post['no']),
            'ketua' => htmlspecialchars($post['ketua']),
            'wakil' => htmlspecialchars($post['wakil']),
            'visi' => $post['visi'],
            'misi' => $post['misi'],
            'proker' => $post['proker'],
            'foto' => $post['gambar']
         ];
         $this->db->insert('kandidat',$data);
    }
    public function update($post)
    {
        $data =  [
            'ketua' => htmlspecialchars($post['ketua']),
            'wakil' => htmlspecialchars($post['wakil']),
            'visi' => $post['visi'],
            'misi' => $post['misi'],
            'proker' => $post['proker'],
            'foto' => $post['gambar']
         ];
         $this->db->where('id',$post['no']);
         $this->db->update('kandidat',$data);
    }
    public function delete($post)
    {
        $this->db->where('id',$post);
        $this->db->delete('kandidat');
    }
    public function delete_bio($post)
    {
        $this->db->where('id',$post);
        $this->db->delete('biodata');
    }
    public function get_biodata()
    {
        $this->datatables->select('id,nama,concat(substr(tgl_lahir,9,2),"-",substr(tgl_lahir,6,2),"-",substr(tgl_lahir,1,4)) as tanggal,alamat,sosmed,foto,riwayat,datakelas.namakelas');
        $this->datatables->from('biodata');
        $this->datatables->join('datakelas','datakelas.kodekelas = biodata.kelas');
        $this->datatables->add_column('gambar','<img src="'.base_url('/uploads/images/').'$1" width="90">','foto');
        $this->datatables->add_column('edit','<form action="'.site_url('/admin/Kandidat/edit_bio').'" method="post"><button name="edit" class="btn_edit btn btn-warning" value="$1"><i class="fas fa-pen"></i></button></form>','id');
        $this->datatables->add_column('hapus','<button class="hapus_data btn btn-danger" data-id="$1" data-foto="$2"><i class="fas fa-trash"></i></button>','id,foto');
        return $this->datatables->generate();
    }
    public function insert_bio($post)
    {
        $data =  [
            'id' => '',
            'nama' => htmlspecialchars($post['nama']),
            'tgl_lahir' => date('Y-m-d',strtotime($post['tgllahir'])),
            'kelas' => htmlspecialchars($post['kelas']),
            'alamat' => htmlspecialchars($post['alamat']),
            'riwayat' => htmlspecialchars($post['riwayat']),
            'id_kandidat' => htmlspecialchars($post['nokandidat']),
            'sosmed' => $post['sosmed'],
            'foto' => $post['gambar']
         ];
         $this->db->insert('biodata',$data);
    }
    public function update_bio($post)
    {
        $data =  [
            'nama' => htmlspecialchars($post['nama']),
            'tgl_lahir' => date('Y-m-d',strtotime($post['tgllahir'])),
            'kelas' => htmlspecialchars($post['kelas']),
            'alamat' => htmlspecialchars($post['alamat']),
            'riwayat' => $post['riwayat'],
            'id_kandidat' => htmlspecialchars($post['nokandidat']),
            'sosmed' => $post['sosmed'],
            'foto' => $post['gambar']
         ];
         $this->db->where('id',$post['id']);
         $this->db->update('biodata',$data);
    }
    public function get_kelas()
    {
        $this->db->order_by('namakelas','ASC');
        return $this->db->get('datakelas');
    }
}