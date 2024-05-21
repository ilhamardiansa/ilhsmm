<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tambah extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        checkadmin();
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        $this->load->model('M_tambah');
        $this->load->model('Webconfig');
    }

    public function addusers(){
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]', [
            'is_unique' => 'Email telah digunakan!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]', [
            'min_length' => 'Password minimal 8 karakter'
        ]);
        $this->form_validation->set_rules('nohp', 'Nohp', 'required|trim|min_length[10]|is_unique[users.nohp]', [
            'is_unique' => 'Nomer Hp telah digunakan!',
            'min_length' => 'Nomer Hp minimal 10 Angkah!'
        ]);
        $this->form_validation->set_rules('pin', 'Pin', 'required|trim|min_length[6]|max_length[6]', [
            'min_length' => 'PIN minimal 6 karakter',
            'max_length' => 'PIN maximal 6 karakter'
        ]);
        $this->form_validation->set_rules('roleid', 'Roleid', 'required|trim');
        if ( $this->form_validation->run() == false) {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $config = $this->Webconfig->config();
        $data['title'] = $config['title'];
        $data['meta_description'] = $config['meta_description'];
        $data['keyword'] = $config['keyword'];
        $data['favion'] = $config['favion'];
        $data['logo'] = $config['logo'];

        $this->load->view('layout/head', $data);
        $this->load->view('layout/menuheadd');
        $this->load->view('admin/tambah/addusers');
        $this->load->view('layout/footers');
        }else{
            $this->M_tambah->addUsers();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data berhasil ditambah !
      </div>');
        redirect('admin/datausers');
        }
    }

    public function addlayanan(){
        $this->form_validation->set_rules('categori', 'Categori', 'required|trim');
        $this->form_validation->set_rules('produk', 'Produk', 'required|trim');
        $this->form_validation->set_rules('note', 'Note', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim');
        $this->form_validation->set_rules('min', 'Min', 'required|trim');
        $this->form_validation->set_rules('max', 'Max', 'required|trim');
        $this->form_validation->set_rules('providerid', 'Providerid', 'required|trim');
        $this->form_validation->set_rules('providerprodukid', 'Providerprodukid', 'required|trim');

        if ( $this->form_validation->run() == false) {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['subcat'] = $this->db->get('categoris')->result();

        $config = $this->Webconfig->config();
        $data['title'] = $config['title'];
        $data['meta_description'] = $config['meta_description'];
        $data['keyword'] = $config['keyword'];
        $data['favion'] = $config['favion'];
        $data['logo'] = $config['logo'];

        $this->load->view('layout/head', $data);
        $this->load->view('layout/menuheadd');
        $this->load->view('admin/tambah/addlayanan');
        $this->load->view('layout/footers');
        }else{
            $this->M_tambah->addLayanan();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data berhasil ditambah !
      </div>');
        redirect('admin/datalayanan');
        }
    }

    public function addmetode(){
        $this->form_validation->set_rules('payment', 'Payment', 'required|trim');
        $this->form_validation->set_rules('type', 'Type', 'required|trim');
        $this->form_validation->set_rules('norek', 'Norek', 'required|trim');
        $this->form_validation->set_rules('bank', 'Bank', 'required|trim');
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('note', 'Note', 'required|trim');
        $this->form_validation->set_rules('min', 'Min', 'required|trim');
        $this->form_validation->set_rules('rate', 'Rate', 'required|trim');

        if ( $this->form_validation->run() == false) {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $config = $this->Webconfig->config();
        $data['title'] = $config['title'];
        $data['meta_description'] = $config['meta_description'];
        $data['keyword'] = $config['keyword'];
        $data['favion'] = $config['favion'];
        $data['logo'] = $config['logo'];

        $this->load->view('layout/head', $data);
        $this->load->view('layout/menuheadd');
        $this->load->view('admin/tambah/addmetode');
        $this->load->view('layout/footers');
        }else{
            $this->M_tambah->addmetode();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data berhasil ditambah !
      </div>');
        redirect('admin/metodedeposit');
        }
    }

    public function addcategori(){
        $this->form_validation->set_rules('categori', 'Categori', 'required|trim');

        if ( $this->form_validation->run() == false) {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $config = $this->Webconfig->config();
        $data['title'] = $config['title'];
        $data['meta_description'] = $config['meta_description'];
        $data['keyword'] = $config['keyword'];
        $data['favion'] = $config['favion'];
        $data['logo'] = $config['logo'];

        $this->load->view('layout/head', $data);
        $this->load->view('layout/menuheadd');
        $this->load->view('admin/tambah/addcat');
        $this->load->view('layout/footers');
        }else{
            $this->M_tambah->addcat();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data berhasil ditambah !
      </div>');
        redirect('admin/datacategori');
        }
    }

    public function addinformasi(){
        $this->form_validation->set_rules('tipe', 'Tipe', 'required|trim');
        $this->form_validation->set_rules('isi', 'Isi', 'required|trim');

        if ( $this->form_validation->run() == false) {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $config = $this->Webconfig->config();
        $data['title'] = $config['title'];
        $data['meta_description'] = $config['meta_description'];
        $data['keyword'] = $config['keyword'];
        $data['favion'] = $config['favion'];
        $data['logo'] = $config['logo'];

        $this->load->view('layout/head', $data);
        $this->load->view('layout/menuheadd');
        $this->load->view('admin/tambah/addinformasi');
        $this->load->view('layout/footers');
        }else{
            $this->M_tambah->addInformasi();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data berhasil ditambah !
      </div>');
        redirect('admin/datainformasi');
        }
    }
}
