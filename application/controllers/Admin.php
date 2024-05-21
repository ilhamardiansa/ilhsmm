<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        checkadmin();
        $this->load->model('M_admin');
        $this->load->model('Webconfig');
        $this->load->model('M_transaksi');
        $this->load->library('form_validation');
    }

    public function index(){

      $config = $this->Webconfig->config();
      $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
      $data['webconfig'] = $this->db->get('webconfig')->result();
      $data['kontak'] = $this->db->get('kontak')->result();
      $data['countusers'] = $this->M_admin->countusers();
      $data['sumpemesanan'] = $this->M_admin->sumpemesanan();
      $data['sumdeposit'] = $this->M_admin->sumdeposit();
      $data['sumsaldousers'] = $this->M_admin->sumsaldousers();
      $data['countpemesanan'] = $this->M_admin->countorderr();
      $data['countdeposit'] = $this->M_admin->countdeposit();
  
      $data['title'] = $config['title'];
      $data['meta_description'] = $config['meta_description'];
      $data['keyword'] = $config['keyword'];
      $data['favion'] = $config['favion'];
      $data['logo'] = $config['logo'];

       
      $this->load->view('layout/head', $data);
      $this->load->view('layout/menuheadd');
      $this->load->view('admin/index');
      $this->load->view('layout/footers');
    }
    
    public function transfer()
    {
  
      $user = $this->db->get_where('users', ['email' => $this->input->post('email')])->row_array();
      $users = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
  
      $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
      $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim');
      $this->form_validation->set_rules('pin', 'Pin', 'required|trim|min_length[6]|max_length[6]', [
          'min_length' => 'PIN minimal 6 karakter',
          'max_length' => 'PIN maximal 6 karakter'
      ]);
  
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
          $this->load->view('page/transfersaldo');
          $this->load->view('layout/footers');
    }else{
          if($this->input->post('email') != $user['email']){
              $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
             Email tidak ditemukan !
              </div>');
              redirect('admin/transfer');
          }else{
              if($users['pin'] != $this->input->post('pin')){
              $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
              PIN Account salah !
              </div>');
              redirect('admin/transfer');
          }else{
              $user = $this->db->get_where('users', ['email' => $this->input->post('email')])->row_array();
              $users = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

              if($users['saldo'] < $this->input->post('jumlah', TRUE)){
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Saldo Tidak Mencukupi Untuk Transfer Saldo !
                </div>');
                redirect('admin/transfer');
              }else{
              $saldopengirim = $users['saldo'] - $this->input->post('jumlah', true);
              $saldopenerima = $user['saldo'] + $this->input->post('jumlah', true);
      
              $total = $this->input->post('jumlah',TRUE);
              $c = "INSERT balance_logs (users_id, type, amount, note) VALUES ('".$users['id']."', 'minus', '".$total."', 'Transfer Saldo. Penerima : ".$user['name']."')";
              $d = "INSERT balance_logs (users_id, type, amount, note) VALUES ('".$user['id']."', 'plus', '".$total."', 'Transfer Saldo. Pengirim : ".$users['name']."')";
              $this->db->query($c);
              $this->db->query($d);
  
              $data1 = [
                  'saldo' => $saldopenerima
              ];
  
              $data2 = [
                  'saldo' => $saldopengirim
              ];
              
               $data1 = $this->security->xss_clean($data1);
                $data2 = $this->security->xss_clean($data2);
  
            $this->db->where('id', $users['id']);
            $this->db->update('users', $data2);
  
            $this->db->where('id', $user['id']);
            $this->db->update('users', $data1);
      
              $this->session->set_flashdata('message', "<div class='alert alert-success' role='alert'>
              Berhasil transfer saldo : ".$total." ke ".$user['name']."
            </div>");
            redirect('admin/transfer');
          }
        }
          }
      }
      }
    public function datausers(){

        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['users'] = $this->db->get('users')->result();

        $config = $this->Webconfig->config();
        $data['title'] = $config['title'];
        $data['meta_description'] = $config['meta_description'];
        $data['keyword'] = $config['keyword'];
        $data['favion'] = $config['favion'];
        $data['logo'] = $config['logo'];

        $this->load->view('layout/head', $data);
        $this->load->view('layout/menuheadd');
        $this->load->view('admin/users');
        $this->load->view('layout/footers');
    }

    public function datalayanan(){
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['layanan'] = $this->db->get('produk')->result();

        $config = $this->Webconfig->config();
        $data['title'] = $config['title'];
        $data['meta_description'] = $config['meta_description'];
        $data['keyword'] = $config['keyword'];
        $data['favion'] = $config['favion'];
        $data['logo'] = $config['logo'];

        $this->load->view('layout/head', $data);
        $this->load->view('layout/menuheadd');
        $this->load->view('admin/layanan');
        $this->load->view('layout/footers');
    }

    public function datacategori(){
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['categori'] = $this->db->get('categoris')->result();

        $config = $this->Webconfig->config();
        $data['title'] = $config['title'];
        $data['meta_description'] = $config['meta_description'];
        $data['keyword'] = $config['keyword'];
        $data['favion'] = $config['favion'];
        $data['logo'] = $config['logo'];

        $this->load->view('layout/head', $data);
        $this->load->view('layout/menuheadd');
        $this->load->view('admin/categori');
        $this->load->view('layout/footers');
    }
    public function dataorder(){
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['orders'] = $this->db->get('transaksi')->result();

        $config = $this->Webconfig->config();
        $data['title'] = $config['title'];
        $data['meta_description'] = $config['meta_description'];
        $data['keyword'] = $config['keyword'];
        $data['favion'] = $config['favion'];
        $data['logo'] = $config['logo'];

        $this->load->view('layout/head', $data);
        $this->load->view('layout/menuheadd');
        $this->load->view('admin/order');
        $this->load->view('layout/footers');
    }

    public function datadeposit(){
      $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
      $data['deposit'] = $this->db->get('deposit')->result();

      $config = $this->Webconfig->config();
      $data['title'] = $config['title'];
      $data['meta_description'] = $config['meta_description'];
      $data['keyword'] = $config['keyword'];
      $data['favion'] = $config['favion'];
      $data['logo'] = $config['logo'];

      $this->load->view('layout/head', $data);
      $this->load->view('layout/menuheadd');
      $this->load->view('admin/deposit');
      $this->load->view('layout/footers');
  }

    public function deleteusers(){
      $id = $this->uri->segment(3);
      $this->db->delete('users', ['id' => $id]);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
      Data berhasil dihapus !
     </div>');
    redirect('/admin/datausers');
    }

    public function deletelayanan(){
      $id = $this->uri->segment(3);
      $this->db->delete('produk', ['id' => $id]);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
      Data berhasil dihapus !
     </div>');
    redirect('/admin/datalayanan');
    }

    public function deletecat(){
      $id = $this->uri->segment(3);
      $this->db->delete('categoris', ['id' => $id]);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
      Data berhasil dihapus !
     </div>');
    redirect('/admin/datacategori');
    }
    public function deleteorder(){
      $id = $this->uri->segment(3);
      $this->db->delete('transaksi', ['id' => $id]);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
      Data berhasil dihapus !
     </div>');
    redirect('/admin/dataorder');
    }
    

    public function deletedeposit(){
      $id = $this->uri->segment(3);
      $this->db->delete('deposit', ['id' => $id]);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
      Data berhasil dihapus !
     </div>');
    redirect('admin/datadeposit');
    }

    public function deleteinformasi(){
      $id = $this->uri->segment(3);
      $this->db->delete('informasi', ['id' => $id]);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
      Data berhasil dihapus !
     </div>');
    redirect('admin/datainformasi');
    }

    public function deletemetode(){
      $id = $this->uri->segment(3);
      $this->db->delete('deposit_method', ['id' => $id]);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
      Data berhasil dihapus !
     </div>');
    redirect('admin/metodedeposit');
    }

  public function balance_logs(){
  
  $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['logs'] = $this->db->get('balance_logs')->result();

        $config = $this->Webconfig->config();
        $data['title'] = $config['title'];
        $data['meta_description'] = $config['meta_description'];
        $data['keyword'] = $config['keyword'];
        $data['favion'] = $config['favion'];
        $data['logo'] = $config['logo'];

      $this->load->view('layout/head', $data);
      $this->load->view('layout/menuheadd');
      $this->load->view('admin/logs');
      $this->load->view('layout/footers');
  }

  public function datainformasi(){

          $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
          $data['informasi'] = $this->db->get('informasi')->result();
  
          $config = $this->Webconfig->config();
          $data['title'] = $config['title'];
          $data['meta_description'] = $config['meta_description'];
          $data['keyword'] = $config['keyword'];
          $data['favion'] = $config['favion'];
          $data['logo'] = $config['logo'];
  
      $this->load->view('layout/head', $data);
      $this->load->view('layout/menuheadd');
      $this->load->view('admin/informasi');
      $this->load->view('layout/footers');
    }

    public function metodedeposit(){

      $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
      $data['method'] = $this->db->get('deposit_method')->result();

      $data['users'] = $this->M_admin->getDepositMethod();

      $config = $this->Webconfig->config();
      $data['title'] = $config['title'];
      $data['meta_description'] = $config['meta_description'];
      $data['keyword'] = $config['keyword'];
      $data['favion'] = $config['favion'];
      $data['logo'] = $config['logo'];

      $this->load->view('layout/head', $data);
      $this->load->view('layout/menuheadd');
      $this->load->view('admin/metodedeposit');
      $this->load->view('layout/footers');
  }

  public function tiket(){

    $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
    
    $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
    $data['tiket'] = $this->db->get('tiket')->result();

    $config = $this->Webconfig->config();
    $data['title'] = $config['title'];
    $data['meta_description'] = $config['meta_description'];
    $data['keyword'] = $config['keyword'];
    $data['favion'] = $config['favion'];
    $data['logo'] = $config['logo'];

    $this->load->view('layout/head', $data);
    $this->load->view('layout/menuheadd');
    $this->load->view('admin/tiket');
    $this->load->view('layout/footers');
}

public function replytiket($id){
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
  $this->load->view('layout/menuheadd');
  $this->load->view('admin/tiket/reply');
  $this->load->view('layout/footers');
  }else{
    $data = [
      'ticket_id' => $this->input->post('id'),
      'is_admin' => '1',
      'pesan' => htmlspecialchars($this->input->post('pesan', TRUE)),
    ];
    $data2 = [
      'status' => 'Reply',
    ];
    $data = $this->security->xss_clean($data);
    $data2 = $this->security->xss_clean($data2);

    $this->db->where('id', $this->input->post('id'));
    $this->db->update('tiket', $data2);
    $this->db->insert('tiket_replies', $data);
    redirect('admin/replytiket/'.$this->input->post('id'));
  }
}

public function ubahstatustiket(){
  $id = $this->uri->segment(3);
  $data = [
    'status' => 'Closed',
  ];
  $this->db->where('id', $id);
  $this->db->update('tiket', $data);
  $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
  Status Tiket berhasil diubah !
</div>');
  redirect('admin/tiket');
}
}