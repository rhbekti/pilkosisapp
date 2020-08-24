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
        $data['judul'] = 'Menu Kandidat';
        // untuk mencetak id pada navbar
		$data['user'] = $this->M_user->get($this->session->userdata('id'))->row_array();
		$this->load->view('template/header');
		$this->load->view('template/navbar',$data);
		$this->load->view('template/sidebar');
		$this->load->view('user/v_voting',$data);
		$this->load->view('template/footer');
		$this->load->view('user/end_voting');
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
           if($tglakhir < $tglmulai){
                $data['user'] = $this->M_user->get($this->session->userdata('id'))->row_array();
                $this->load->view('template/header');
                $this->load->view('template/navbar',$data);
                $this->load->view('template/sidebar');
                $this->load->view('user/v_detail',$data);
                $this->load->view('template/footer');
                $this->load->view('user/end_voting');
           }else{
            echo "maaf pemilihan telah berakhir";
           }
        }else{
            echo "maaf pemilihan masih ditutup";
        }
    }
}
