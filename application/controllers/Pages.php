<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {


	function __construct(){
		parent::__construct();
        $this->load->model('Webconfig');
        $this->load->model('M_transaksi');
	}

	public function produk()
	{
        $data['produk'] = $this->db->get('produk')->result();
        $data['categoris'] = $this->db->get('categoris')->result();

       $config = $this->Webconfig->config();
        $data['title'] = $config['title'];
        $data['meta_description'] = $config['meta_description'];
        $data['keyword'] = $config['keyword'];
        $data['favion'] = $config['favion'];
        $data['logo'] = $config['logo'];

        $this->load->view('layout/head', $data);
        $this->load->view('layout/menuhead');
        $this->load->view('public/produk');
        $this->load->view('layout/footers');
	}

     public function kontak()
     {
         $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
         $kontak = $this->Webconfig->kontak();
        $data['whatsapp'] = $kontak['whatsapp'];
        $data['instagram'] = $kontak['instagram'];
        $data['telegram'] = $kontak['telegram'];
         $config = $this->Webconfig->config();
         $data['title'] = $config['title'];
         $data['meta_description'] = $config['meta_description'];
         $data['keyword'] = $config['keyword'];
         $data['favion'] = $config['favion'];
         $data['logo'] = $config['logo'];
 
         $this->load->view('layout/head', $data);
         $this->load->view('layout/menuhead');
         $this->load->view('page/kontak');
         $this->load->view('layout/footers');
     }
 
     public function ketentuan()
     {
         $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
         
         $config = $this->Webconfig->config();
         $data['title'] = $config['title'];
         $data['meta_description'] = $config['meta_description'];
         $data['keyword'] = $config['keyword'];
         $data['favion'] = $config['favion'];
         $data['logo'] = $config['logo'];
 
         $this->load->view('layout/head', $data);
         $this->load->view('layout/menuhead');
         $this->load->view('page/ketentuan');
         $this->load->view('layout/footers');
     }
 
     public function pertanyaan()
     {
         $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
         
         $config = $this->Webconfig->config();
         $data['title'] = $config['title'];
         $data['meta_description'] = $config['meta_description'];
         $data['keyword'] = $config['keyword'];
         $data['favion'] = $config['favion'];
         $data['logo'] = $config['logo'];
 
         $this->load->view('layout/head', $data);
         $this->load->view('layout/menuhead');
         $this->load->view('page/pertanyaan');
         $this->load->view('layout/footers');
     }
}
