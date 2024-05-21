<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->helper('html');
        $this->load->model('M_transaksi');
        $this->load->model('Webconfig');
        $this->load->library('form_validation');
    }

    public function index(){
        $info = $this->db->query("SELECT * FROM `informasi` ORDER BY date DESC LIMIT 5")->result();
        $infos = $this->db->query("SELECT * FROM `informasi` LIMIT 5")->result();
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
                             $this->db->limit(7);
        $data['categoris'] = $this->db->get('categoris')->result();
        $data['informasi'] = $info;
        $data['modalinfo'] = $infos;
        $data['sumtransaksi'] = $this->M_transaksi->sumtransaksi();
        $data['counttransaksi'] = $this->M_transaksi->counttransaksii();
        $data['sumdeposit'] = $this->M_transaksi->sumdeposit();
        $data['countdeposit'] = $this->M_transaksi->countdeposit();

        $config = $this->Webconfig->config();
        $data['title'] = $config['title'];
        $data['meta_description'] = $config['meta_description'];
        $data['keyword'] = $config['keyword'];
        $data['favion'] = $config['favion'];
        $data['logo'] = $config['logo'];

        $this->load->view('layout/head', $data);
        $this->load->view('layout/menuheadl');
        $this->load->view('page/index');
        $this->load->view('layout/footers');
    }
    
    public function produk(){
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['produk'] = $this->db->get('produk')->result();
        $data['categoris'] = $this->db->get('categoris')->result();

       $config = $this->Webconfig->config();
        $data['title'] = $config['title'];
        $data['meta_description'] = $config['meta_description'];
        $data['keyword'] = $config['keyword'];
        $data['favion'] = $config['favion'];
        $data['logo'] = $config['logo'];

        $this->load->view('layout/head', $data);
        $this->load->view('layout/menuheadl');
        $this->load->view('page/daftarproduk');
        $this->load->view('layout/footers');
    }
    

    public function subcatid()
    {
          $categoriid = $this->input->get('id',TRUE);
        $data = $this->db->get_where('subcategori', ['categori_id' => $categoriid])->result();
  
   ?> <option value="0">Pilih Produk</option> <?php
            foreach($data as $subcat) {
                ?>
            <option value="<?= $subcat->name; ?>"><?= $subcat->name; ?></option>
             <?php } ?> <?php
     }

     public function load_filter(){
         $subcat = $this->input->get('subcat',TRUE);
         $data = $this->db->get_where('produk', ['subcat_id' => $subcat])->result();
         if(!empty($data)){
            foreach($data as $pdk) {
                ?>
             <tr>
             <th scope="row"><?= $pdk->id; ?></th>
             <td><?= $pdk->subcat_id; ?></td>
               <td><?= $pdk->produk_name; ?></td>
               <td><?= $pdk->note; ?></td>
               <td>Rp <?= number_format($pdk->harga,0,',','.'); ?></td>
               <td>
                   <?php
                   if($pdk->status == '1'){
                       echo '<span class="badge badge-success">Aktif</span>';
                   }elseif($pdk->status == '0'){
                       echo '<span class="badge badge-danger">Tidak Aktif</span>';
                   }
               ?>
               </td>
             </tr>
             <?php } ?> <?php
         }else{
             ?>
             <tr><td align="center" colspan="6">Tidak ada produk</td></tr>
             <?php
         }
     }

 
    
     public function dokumentasi(){

        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $config = $this->Webconfig->config();
        $data['title'] = $config['title'];
        $data['meta_description'] = $config['meta_description'];
        $data['keyword'] = $config['keyword'];
        $data['favion'] = $config['favion'];
        $data['logo'] = $config['logo'];

        $this->load->view('layout/head', $data);
        $this->load->view('layout/menuheadl');
        $this->load->view('page/documentapi');
        $this->load->view('layout/footers');
    }

    public function profile(){

        $this->form_validation->set_rules('name', 'Name', 'required|trim');

        if ( $this->form_validation->run() == false) {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $config = $this->Webconfig->config();
        $data['title'] = $config['title'];
        $data['meta_description'] = $config['meta_description'];
        $data['keyword'] = $config['keyword'];
        $data['favion'] = $config['favion'];
        $data['logo'] = $config['logo'];

        $this->load->view('layout/head', $data);
        $this->load->view('layout/menuheadl');
        $this->load->view('page/profile');
        $this->load->view('layout/footers');
    }else{
        $id = $this->input->post('id');
       $data = [
           'nohp' => htmlspecialchars($this->input->post('nohp', true))
       ];
        $data = $this->security->xss_clean($data);

       $this->db->where('id', $id);
       $this->db->update('users', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    Data berhasil diubah !
  </div>');
    redirect('user/profile');
    }
}

public function apigenerate(){
    $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
    $token = substr(md5(time()), 0, 40);
    
    $update = $this->db->query("UPDATE users SET api_key = '".$token."' WHERE id = '".$user['id']."'");
    if($update == true){
         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    Api key berhasil di generate ulang !
  </div>');
    redirect('user/profile');
    }else{
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
    Api key gagal generate !
  </div>');
    redirect('user/profile');
    }
}

public function changePassword(){

    $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|matches[password2]', [
        'matches' => 'Password tidak sama!',
        'min_length' => 'Password minimal 8 karakter'
    ]);
    $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]');

    if ( $this->form_validation->run() == false) {
    $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

    $config = $this->Webconfig->config();
    $data['title'] = $config['title'];
    $data['meta_description'] = $config['meta_description'];
    $data['keyword'] = $config['keyword'];
    $data['favion'] = $config['favion'];
    $data['logo'] = $config['logo'];

    $this->load->view('layout/head', $data);
    $this->load->view('layout/menuheadl');
    $this->load->view('page/changepass');
    $this->load->view('layout/footers');
}else{
    $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
    $data = [
       'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
      ];
       $data = $this->security->xss_clean($data);

    $this->db->where('id', $user['id']);
    $this->db->update('users', $data);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    Data berhasil diubah !
    </div>');
    redirect('user/changePassword');

}
}

public function changepin(){

    $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
    $this->form_validation->set_rules('pin', 'Pin', 'required|trim|min_length[6]|max_length[6]|matches[pin2]', [
        'matches' => 'PIN tidak sama!',
        'min_length' => 'PIN minimal 6 karakter',
        'max_length' => 'PIN maximal 6 karakter'
    ]);
    $this->form_validation->set_rules('pin2', 'Pin', 'required|trim|min_length[6]|max_length[6]|matches[pin]', [
        'min_length' => 'PIN minimal 6 karakter',
        'max_length' => 'PIN maximal 6 karakter'
    ]);
    $this->form_validation->set_rules('pinold', 'Pinold', 'required|trim|min_length[6]|max_length[6]', [
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
    $this->load->view('layout/menuheadl');
    $this->load->view('page/changepin');
    $this->load->view('layout/footers');
}else{
    if($user['pin'] != $this->input->post('pinold')){
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
    PIN LAMA SALAH !
    </div>');
    redirect('user/changepin');
    }else{
    $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
    $data = [
       'pin' => $this->input->post('pin',TRUE)
      ];
       $data = $this->security->xss_clean($data);

    $this->db->where('id', $user['id']);
    $this->db->update('users', $data);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    Data berhasil diubah !
    </div>');
    redirect('user/changepin');
    }
}
}

public function deposit(){
    $users = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
    $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
    $data['deposits'] = $this->db->get_where('deposit', ['users_id' => $users['id']])->result();
    $data['depositmethod'] = $this->db->get('deposit_method')->result();



    $this->form_validation->set_rules('type', 'Type', 'required|trim');
    $this->form_validation->set_rules('payment', 'Payment', 'required|trim');
    $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim');
    $this->form_validation->set_rules('metode', 'Metode', 'required|trim');

        if ( $this->form_validation->run() == false) {

    $config = $this->Webconfig->config();
    $data['title'] = $config['title'];
    $data['meta_description'] = $config['meta_description'];
    $data['keyword'] = $config['keyword'];
    $data['favion'] = $config['favion'];
    $data['logo'] = $config['logo'];

    $this->load->view('layout/head', $data);
    $this->load->view('layout/menuheadl');
    $this->load->view('page/deposit');
    $this->load->view('layout/footers');
        }else{
            $depositt = $this->db->get_where('deposit', ['users_id' => $users['id'], 'status' => 'pending'])->num_rows();
            if($depositt > 0){
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
   Silakan selesaikan deposit sebelumnya ! klik hapus untuk membuat deposit baru.
    </div>');
    redirect('user/deposit');
            }else{
                $min =  $this->input->post('min');
                $jumlah = $this->input->post('jumlah');
                if($jumlah < $min){
                    $this->session->set_flashdata("message", "<div class='alert alert-danger' role='alert'>
    Jumlah deposit minimal : $min</div>");
    redirect('user/deposit');
                }else{
                    $users = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
                    $method = $this->db->get_where('deposit_method', ['id' =>  $this->input->post('id')])->row_array();
                    $rand = rand(50, 300);
                    $amount = $this->input->post('jumlah',TRUE) + $rand;
                    $postamount = $amount * $method['rate'];
                    $data = [
                        'users_id' => $users['id'],
                        'payment' => $this->input->post('payment',TRUE),
                        'type' => $this->input->post('type',TRUE),
                        'method_name' => $this->input->post('metode',TRUE),
                        'amount' =>  $amount,
                        'postamount' => $postamount,
                        'deposit_method_id' => $this->input->post('id',TRUE),
                        'status' => 'pending'
                    ];
                    
                    $data = $this->security->xss_clean($data);
                    $this->db->insert('deposit', $data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                   Silakan Melakukan Pembayaran di menu dibawah!
                    </div>');
                    redirect('user/deposit');
                }
            }
           
        }
}

public function bayar($id){
    $depo = $this->db->get_where('deposit', ['id' => $id])->row_array();
   $data['deposits'] = $this->db->get_where('deposit', ['id' => $id])->result();
    $data['depositmethod'] = $this->db->get_where('deposit_method', ['id' => $depo['deposit_method_id']])->result();
    $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

    $config = $this->Webconfig->config();
    $data['title'] = $config['title'];
    $data['meta_description'] = $config['meta_description'];
    $data['keyword'] = $config['keyword'];
    $data['favion'] = $config['favion'];
    $data['logo'] = $config['logo'];
    
    $this->load->view('layout/head', $data);
    $this->load->view('layout/menuheadl');
    $this->load->view('page/bayardeposit');
    $this->load->view('layout/footers');
}

public function deletedeposit(){
    $id = $this->uri->segment(3);
    $this->db->delete('deposit', ['id' => $id]);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    Data berhasil dihapus !
   </div>');
  redirect('user/deposit');
  }

    public function balance_logs(){

        $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['logs'] = $this->db->get_where('balance_logs', ['users_id' => $user['id']])->result();

        $config = $this->Webconfig->config();
        $data['title'] = $config['title'];
        $data['meta_description'] = $config['meta_description'];
        $data['keyword'] = $config['keyword'];
        $data['favion'] = $config['favion'];
        $data['logo'] = $config['logo'];

        $this->load->view('layout/head', $data);
        $this->load->view('layout/menuheadl');
        $this->load->view('page/logs');
        $this->load->view('layout/footers');
    }

    
    public function iplog(){

        $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['logs'] = $this->db->get_where('iplog', ['users_id' => $user['id']])->result();

        $config = $this->Webconfig->config();
        $data['title'] = $config['title'];
        $data['meta_description'] = $config['meta_description'];
        $data['keyword'] = $config['keyword'];
        $data['favion'] = $config['favion'];
        $data['logo'] = $config['logo'];
        
        $this->load->view('layout/head', $data);
        $this->load->view('layout/menuheadl');
        $this->load->view('page/iplogs');
        $this->load->view('layout/footers');
    }

    public function informasi(){

        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['informasi'] = $this->db->get('informasi')->result();

        $this->load->library('pagination');
        $config['base_url'] = base_url('user/informasi');
        $config['total_rows'] = $this->M_transaksi->countInformasi();
        $config['per_page'] = 5;

      $config['first_link']       = 'First';
      $config['last_link']        = 'Last';
      $config['next_link']        = 'Next';
      $config['prev_link']        = 'Prev';
      $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
      $config['full_tag_close']   = '</ul></nav></div>';
      $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
      $config['num_tag_close']    = '</span></li>';
      $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
      $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
      $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
      $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
      $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
      $config['prev_tagl_close']  = '</span>Next</li>';
      $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
      $config['first_tagl_close'] = '</span></li>';
      $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
      $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['informasi'] = $this->M_transaksi->getInformasi($config['per_page'], $data['start']);

        $config = $this->Webconfig->config();
        $data['title'] = $config['title'];
        $data['meta_description'] = $config['meta_description'];
        $data['keyword'] = $config['keyword'];
        $data['favion'] = $config['favion'];
        $data['logo'] = $config['logo'];

        $this->load->view('layout/header', $data);
        $this->load->view('layout/starthead');
        $this->load->view('page/informasi');
        $this->load->view('layout/footer');
        $this->load->view('layout/footer2');
    }

    public function tiket(){
        $users = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('judul', 'Judul', 'trim|required');
        $this->form_validation->set_rules('pesan', 'Pesan', 'trim|required');

        if ($this->form_validation->run() == false){
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $config = $this->Webconfig->config();
        $data['title'] = $config['title'];
        $data['meta_description'] = $config['meta_description'];
        $data['keyword'] = $config['keyword'];
        $data['favion'] = $config['favion'];
        $data['logo'] = $config['logo'];

        $this->load->view('layout/head', $data);
        $this->load->view('layout/menuheadl');
        $this->load->view('page/ticket');
        $this->load->view('layout/footers');
    }else{
       $data = [
        'users_id' => $users['id'],
        'judul' => htmlspecialchars($this->input->post('judul', TRUE)),
        'pesan' => htmlspecialchars($this->input->post('pesan', TRUE)),
        'status' => 'pending',
       ];

       $data = $this->security->xss_clean($data);

       $this->db->insert('tiket', $data);
       $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
       Tiket Berhasil dibuat
     </div>');
    redirect(base_url('user/tiket'));
    }
    }
    
    public function historitiket(){

        $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['tiket'] = $this->db->get_where('tiket', ['users_id' => $user['id']])->result();

        $config = $this->Webconfig->config();
        $data['title'] = $config['title'];
        $data['meta_description'] = $config['meta_description'];
        $data['keyword'] = $config['keyword'];
        $data['favion'] = $config['favion'];
        $data['logo'] = $config['logo'];

        $this->load->view('layout/head', $data);
        $this->load->view('layout/menuheadl');
        $this->load->view('page/historitiket');
        $this->load->view('layout/footers');
    }

}