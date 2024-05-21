<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tiket extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('M_admin');
        $this->load->model('Webconfig');
        $this->load->model('M_transaksi');
        $this->load->library('form_validation');
    }
public function reply($id){
  $this->form_validation->set_rules('pesan', 'Pesan', 'required|trim');
 
  if ( $this->form_validation->run() == false) {
  $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
  $data['tiket'] = $this->db->get_where('tiket', ['id' => $id])->row_array();
  $this->db->order_by('create_at', 'ASC');
  $data['replys'] = $this->db->get_where('tiket_replies', ['ticket_id' => $id])->result();
  
  //cekjoin
  $tiket = $this->db->get_where('tiket', ['id' => $id])->row_array();
   $this->db->select('*');
      $this->db->from('tiket');
      $this->db->join('users','users.id = tiket.users_id');      
      $this->db->where('users_id', $tiket['users_id']);
     $data['join'] =  $query = $this->db->get()->row_array();
     
  $config = $this->Webconfig->config();
  $data['title'] = $config['title'];
  $data['meta_description'] = $config['meta_description'];
  $data['keyword'] = $config['keyword'];
  $data['favion'] = $config['favion'];
  $data['logo'] = $config['logo'];

  $this->load->view('layout/head', $data);
  $this->load->view('layout/menuheadl');
  $this->load->view('tiket/reply');
  $this->load->view('layout/footers');
  }else{
    $data = [
      'ticket_id' => $this->input->post('id'),
      'is_admin' => '0',
      'pesan' => htmlspecialchars($this->input->post('pesan', TRUE)),
    ];
    $data2 = [
      'status' => 'CustomerReply',
    ];
    $data = $this->security->xss_clean($data);
    $data2 = $this->security->xss_clean($data2);

    $this->db->where('id', $this->input->post('id'));
    $this->db->update('tiket', $data2);
    $this->db->insert('tiket_replies', $data);
    redirect('tiket/reply/'.$this->input->post('id'));
  }
}
}