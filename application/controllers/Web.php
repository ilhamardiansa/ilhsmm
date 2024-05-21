<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {


	function __construct(){
		parent::__construct();
		is_logged_in();
		$this->load->model('Webconfig');
	}

	public function kontak()
	{
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		
		$config = $this->Webconfig->config();
        $data['title'] = $config['title'];
        $data['meta_description'] = $config['meta_description'];
        $data['keyword'] = $config['keyword'];
        $data['favion'] = $config['favion'];
        $data['logo'] = $config['logo'];
        
        $kontak = $this->Webconfig->kontak();
        $data['whatsapp'] = $kontak['whatsapp'];
        $data['instagram'] = $kontak['instagram'];
        $data['telegram'] = $kontak['telegram'];

        $this->load->view('layout/head', $data);
        $this->load->view('layout/menuheadl');
        $this->load->view('page/kontak');;
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
        $this->load->view('layout/menuheadl');
        $this->load->view('page/ketentuan');;
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
        $this->load->view('layout/menuheadl');
        $this->load->view('page/pertanyaan');;
        $this->load->view('layout/footers');
	}
}
