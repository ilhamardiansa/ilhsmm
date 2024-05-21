<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        checkadmin();
        $this->load->library('form_validation');
        $this->load->model('M_edit');
        $this->load->model('Webconfig');
    }

    public function edituser($id){
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('saldo', 'Saldo', 'required|trim');
        $this->form_validation->set_rules('role', 'Role', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('nohp', 'Nohp', 'required|trim|min_length[10]', [
            'min_length' => 'Nomer Hp minimal 10 Angkah!'
        ]);
        $this->form_validation->set_rules('pin', 'Pin', 'required|trim|min_length[6]|max_length[6]', [
            'min_length' => 'PIN minimal 6 karakter',
            'max_length' => 'PIN maximal 6 karakter'
        ]);
        if ( $this->form_validation->run() == false) {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['edituser'] = $this->db->get_where('users', ['id' => $id])->result();
        $data['users'] = $this->M_edit->getUsersID($id);

        $config = $this->Webconfig->config();
        $data['title'] = $config['title'];
        $data['meta_description'] = $config['meta_description'];
        $data['keyword'] = $config['keyword'];
        $data['favion'] = $config['favion'];
        $data['logo'] = $config['logo'];

        $this->load->view('layout/head', $data);
        $this->load->view('layout/menuheadd');
        $this->load->view('admin/edit/editusers', $data);
        $this->load->view('layout/footers');
        }else{
            $this->M_edit->ubahUsers();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data berhasil diubah !
      </div>');
        redirect('admin/datausers');
        }
    }

    public function editorders($id){

        $this->form_validation->set_rules('statuss', 'Statuss', 'required|trim');
        $this->form_validation->set_rules('refund', 'Refund', 'required|trim');

        if ( $this->form_validation->run() == false) {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['editorders'] = $this->db->get_where('transaksi', ['id' => $id])->result();
        $data['users'] = $this->M_edit->getOrderID($id);

        $config = $this->Webconfig->config();
        $data['title'] = $config['title'];
        $data['meta_description'] = $config['meta_description'];
        $data['keyword'] = $config['keyword'];
        $data['favion'] = $config['favion'];
        $data['logo'] = $config['logo'];

        $this->load->view('layout/head', $data);
        $this->load->view('layout/menuheadd');
        $this->load->view('admin/edit/editorders', $data);
        $this->load->view('layout/footers');
        }else{
            $this->M_edit->ubahOrder();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data berhasil diubah !
      </div>');
        redirect('admin/dataorder');
        }
    }
    
    public function editlayanan($id){

        $this->form_validation->set_rules('produk', 'Produk', 'required|trim');
        $this->form_validation->set_rules('note', 'Note', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim');
        $this->form_validation->set_rules('min', 'Min', 'required|trim');
        $this->form_validation->set_rules('max', 'Max', 'required|trim');
        $this->form_validation->set_rules('providerid', 'Providerid', 'required|trim');
        $this->form_validation->set_rules('providerprodukid', 'Providerprodukid', 'required|trim');
        $this->form_validation->set_rules('statuss', 'Statuss', 'required|trim');

        if ( $this->form_validation->run() == false) {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['editlayanan'] = $this->db->get_where('produk', ['id' => $id])->result();
        $data['categori'] = $this->db->get_where('categoris')->result();
        $data['users'] = $this->M_edit->getOrderID($id);

        $config = $this->Webconfig->config();
        $data['title'] = $config['title'];
        $data['meta_description'] = $config['meta_description'];
        $data['keyword'] = $config['keyword'];
        $data['favion'] = $config['favion'];
        $data['logo'] = $config['logo'];

        $this->load->view('layout/head', $data);
        $this->load->view('layout/menuheadd');
        $this->load->view('admin/edit/editlayanan', $data);
        $this->load->view('layout/footers');
        }else{
            $this->M_edit->ubahLayanan();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data berhasil diubah !
      </div>');
        redirect('admin/datalayanan');
        }
    }

    public function editdeposit($id){

        $this->form_validation->set_rules('statuss', 'Statuss', 'required|trim');

        if ( $this->form_validation->run() == false) {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['editdeposit'] = $this->db->get_where('deposit', ['id' => $id])->result();
        $data['users'] = $this->M_edit->getDepositID($id);

        $config = $this->Webconfig->config();
        $data['title'] = $config['title'];
        $data['meta_description'] = $config['meta_description'];
        $data['keyword'] = $config['keyword'];
        $data['favion'] = $config['favion'];
        $data['logo'] = $config['logo'];

        $this->load->view('layout/head', $data);
        $this->load->view('layout/menuheadd');
        $this->load->view('admin/edit/editdeposit', $data);
        $this->load->view('layout/footers');
        }else{
            $this->M_edit->ubahDeposit();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data berhasil diubah !
      </div>');
        redirect('admin/datadeposit');
        }
    }

    public function editconfig($id){

        $this->form_validation->set_rules('value', 'value', 'required|trim');

        if ( $this->form_validation->run() == false) {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['webconfig'] = $this->db->get_where('webconfig', ['id' => $id])->result();
        $data['users'] = $this->M_edit->getConfigID($id);

        $config = $this->Webconfig->config();
        $data['title'] = $config['title'];
        $data['meta_description'] = $config['meta_description'];
        $data['keyword'] = $config['keyword'];
        $data['favion'] = $config['favion'];
        $data['logo'] = $config['logo'];

        $this->load->view('layout/head', $data);
        $this->load->view('layout/menuheadd');
        $this->load->view('admin/edit/editconfig', $data);
        $this->load->view('layout/footers');
        }else{
            $this->M_edit->ubahconfig();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data berhasil diubah !
      </div>');
        redirect('admin');
        }
    }

    public function editkontak($id){

        $this->form_validation->set_rules('value', 'value', 'required|trim');

        if ( $this->form_validation->run() == false) {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['kontak'] = $this->db->get_where('kontak', ['id' => $id])->result();
        $data['users'] = $this->M_edit->getKontakID($id);

        $config = $this->Webconfig->config();
        $data['title'] = $config['title'];
        $data['meta_description'] = $config['meta_description'];
        $data['keyword'] = $config['keyword'];
        $data['favion'] = $config['favion'];
        $data['logo'] = $config['logo'];

        $this->load->view('layout/head', $data);
        $this->load->view('layout/menuheadd');
        $this->load->view('admin/edit/editkontak', $data);
        $this->load->view('layout/footers');
        }else{
            $this->M_edit->ubahKontak();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data berhasil diubah !
      </div>');
        redirect('admin');
        }
    }

    public function editinformasi($id){

        $this->form_validation->set_rules('tipe', 'Tipe', 'required|trim');
        $this->form_validation->set_rules('isi', 'Isi', 'required|trim');

        if ( $this->form_validation->run() == false) {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['informasi'] = $this->db->get_where('informasi', ['id' => $id])->result();
        $data['users'] = $this->M_edit->getInformasiID($id);

        $config = $this->Webconfig->config();
        $data['title'] = $config['title'];
        $data['meta_description'] = $config['meta_description'];
        $data['keyword'] = $config['keyword'];
        $data['favion'] = $config['favion'];
        $data['logo'] = $config['logo'];

        $this->load->view('layout/head', $data);
        $this->load->view('layout/menuheadd');
        $this->load->view('admin/edit/editinformasi', $data);
        $this->load->view('layout/footers');
        }else{
            $this->M_edit->ubahInformasi();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data berhasil diubah !
      </div>');
        redirect('admin/datainformasi');
        }
    }
    
     public function editmetode($id){

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
        $data['metode'] = $this->db->get_where('deposit_method', ['id' => $id])->result();
        $data['users'] = $this->M_edit->getMetodeID($id);

        $config = $this->Webconfig->config();
        $data['title'] = $config['title'];
        $data['meta_description'] = $config['meta_description'];
        $data['keyword'] = $config['keyword'];
        $data['favion'] = $config['favion'];
        $data['logo'] = $config['logo'];

        $this->load->view('layout/head', $data);
        $this->load->view('layout/menuheadd');
        $this->load->view('admin/edit/editmetode', $data);
        $this->load->view('layout/footers');
        }else{
            $this->M_edit->ubahMetode();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data berhasil diubah !
      </div>');
        redirect('admin/metodedeposit');
        }
    }

}