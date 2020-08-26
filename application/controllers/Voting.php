<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Voting extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model(['M_user','M_vote','M_kandidat']);
        $this->session->set_userdata('menu','voting');
        cek_login();
    }
	public function index()
	{
        redirect('/Voting/voting_kandidat');
    }
    public function get_data_paslon()
    {
        $data = $this->M_vote->get()->result();
        echo json_encode($data);
    }
    public function detail()
    {
        $id = $this->uri->segment(3, 0);
        $query = $this->M_kandidat->get($id)->row();
        $data['ketua'] = $this->M_kandidat->get_data_kandidat($query->ketua)->row();
        $data['wakil'] = $this->M_kandidat->get_data_kandidat($query->wakil)->row();
        $data['judul'] = 'Menu Detail Kandidat';
        // untuk mencetak id pada navbar
		$data['user'] = $this->M_user->get($this->session->userdata('id'))->row_array();
		$this->load->view('template/header');
		$this->load->view('template/navbar',$data);
		$this->load->view('template/sidebar');
		$this->load->view('user/v_detail',$data);
		$this->load->view('template/footer');
		$this->load->view('user/end_voting');
    }
    public function voting_kandidat()
    {
        $post = $this->input->post(null,True);
        $seting_vote = $this->M_vote->list_set()->row();
        $tgl_sekarang = strtotime(date("Y-m-d H:i:s"));
        $tglmulai = strtotime(date($seting_vote->tglawal.$seting_vote->jambuka));
        $tglakhir = strtotime(date($seting_vote->tglakhir.$seting_vote->jamtutup));
        if($tgl_sekarang >= $tglmulai){
            $ck_user = $this->M_vote->cek_sdah_voting($this->session->userdata('id'));
            if($ck_user->num_rows() < 1){
                $data['judul'] = 'Menu Voting';
                // untuk mencetak id pada navbar
                $data['user'] = $this->M_user->get($this->session->userdata('id'))->row_array();
                $this->load->view('template/header');
                $this->load->view('template/navbar',$data);
                $this->load->view('template/sidebar');
                $this->load->view('user/v_voting',$data);
                $this->load->view('template/footer');
                $this->load->view('user/end_voting');
            }else{
                $this->session->set_flashdata('aksi','error');
                $this->session->set_flashdata('info','Anda Telah Melakukan Voting.');
                redirect('/Dashboard');
            }
        }else{
            $this->session->set_flashdata('aksi','error');
            $this->session->set_flashdata('info','Pemilihan Belum dibuka.silakan masuk sesuai jadwal.');
            redirect('/Dashboard');
        }
        
    }
    public function pilihanku()
    {
        $post = $this->input->post(null,true);
        $query = $this->M_user->get($post['user_id'])->row();
        $waktu = date("Y-m-d H:i:s");
        $this->M_vote->insert_vote($post,$query,$waktu);
        if($this->db->affected_rows() > 0){
            $data = $this->M_kandidat->get($post['vote'])->row();
            $this->M_vote->update_kandidat_suara($data);
            $this->M_vote->update_status_user($query->id);
            $this->session->set_flashdata('aksi','sukses');
            $this->session->set_flashdata('info','Terima Kasih Anda Telah Melakukan Voting');
        }else{
            $this->session->set_flashdata('aksi','error');
            $this->session->set_flashdata('info','Maaf Sepertinya Ada Error.Silakan ulangi.');
        }
        redirect('/Dashboard');
    }
}
