<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('Kode_m');
        $this->load->model('M_transaksi');
        $this->load->model('Webconfig');
    }
    
     private function connect($end_point, $post) {
	$_post = array();
	if (is_array($post)) {
		foreach ($post as $name => $value) {
			$_post[] = $name.'='.urlencode($value);
		}
	}
	$ch = curl_init($end_point);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	if (is_array($post)) {
		curl_setopt($ch, CURLOPT_POSTFIELDS, join('&', $_post));
	}
	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)');
	$result = curl_exec($ch);
	if (curl_errno($ch) != 0 && empty($result)) {
		$result = false;
	}
	curl_close($ch);
	return $result;
}
	
    public function order(){
        $users = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('produk', 'Produk', 'trim|required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
        $this->form_validation->set_rules('data', 'Data', 'trim|required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required');
        $this->form_validation->set_rules('totalharga', 'Totalharga', 'trim|required');
        $this->form_validation->set_rules('pin', 'Pin', 'required|trim|min_length[6]|max_length[6]', [
            'min_length' => 'PIN minimal 6 karakter',
            'max_length' => 'PIN maximal 6 karakter'
        ]);

        if ($this->form_validation->run() == false){
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['categoris'] = $this->db->get_where('categoris')->result();
          $dariDB = $this->Kode_m->kode();
        $nourut = substr($dariDB, 3, 4);
        $kodeBarangSekarang = "ILH".$nourut + 1;
        $data['kode'] = $kodeBarangSekarang;

        $config = $this->Webconfig->config();
        $data['title'] = $config['title'];
        $data['meta_description'] = $config['meta_description'];
        $data['keyword'] = $config['keyword'];
        $data['favion'] = $config['favion'];
        $data['logo'] = $config['logo'];

        $this->load->view('layout/head', $data);
        $this->load->view('layout/menuheadl');
        $this->load->view('page/order');
        $this->load->view('layout/footers');
    }else{
          $produk = $this->db->get_where('produk', ['id' => $this->input->post('produk')])->row_array();
          $min = $produk['min'];
          $max = $produk['max'];
          $jumlah = htmlspecialchars($this->input->post('jumlah'), TRUE);
        $rate = $produk['harga']/1000;
        $total = $jumlah * $rate;
        if($users['saldo'] < $total || $users['saldo'] < $this->input->post('totalharga')){
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Saldo tidak mencukupi !
            </div>');
            redirect(base_url('transaksi/order'));
    }else{
         if($total != $this->input->post('totalharga')){
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Orders Gagal !
            </div>');
            redirect(base_url('transaksi/order'));
    }else{
        if($users['pin'] != $this->input->post('pin')){
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            PIN Account salah !
            </div>');
              redirect(base_url('transaksi/order'));
        }else{
        if($this->input->post('jumlah') < $produk['min']){
            $this->session->set_flashdata('message', "<div class='alert alert-danger' role='alert'>
          Jumlah minimal order :  $min !
            </div>");
              redirect(base_url('transaksi/order'));
        }elseif($this->input->post('jumlah') > $produk['max']){
            $this->session->set_flashdata('message', "<div class='alert alert-danger' role='alert'>
            Jumlah maximal order : $max !
             </div>");
               redirect(base_url('transaksi/order'));
        }
        
        $dataprovider = $this->db->get_where('provider', ['id' => 1])->row();
        $api_url = $dataprovider->url;
        $post_data = array(
            'api_key' => $dataprovider->apikey,
            'service' => $produk['provider_layanan_id'],
            'target' => htmlspecialchars($this->input->post('data', true)),
            'quantity' => htmlspecialchars($this->input->post('jumlah', true)),
            );
            $api = json_decode($this->connect($api_url, $post_data), true);
		if ($api["status"] == false){
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            '.$api["data"]["message"].'
            </div>');
              redirect(base_url('transaksi/order')."/".$this->input->post('id',TRUE));
		}else{
                $users = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();	
                $saldousers = $users['saldo'] - $total;	
                $data = [
                    'order_id' => $this->input->post('orderid',TRUE),
                    'produk_name' => $produk['produk_name'],
                    'users_id' => $users['id'],
                    'data' => htmlspecialchars($this->input->post('data', true)),
                    'quantity' => htmlspecialchars($this->input->post('jumlah', true)),
                    'harga' => $total,
                    'start_count' => '0',
                    'remains' => '0',
                    'provider_id' => '1',
                    'provider_order_id' => $api["data"]["id"],
                    'api' => 0,
                    'status' => 'Pending',
                    'is_refund' => '0'
                ];
                 $data = $this->security->xss_clean($data);
                 
                $data1 = [
                    'saldo' => $saldousers
                ];
                 $data1 = $this->security->xss_clean($data1);

            $orderid = $this->input->post('orderid');
            $c = "INSERT balance_logs (users_id, type, amount, note) VALUES ('".$users['id']."', 'minus', '".$total."', 'Membuat Pesanan. ID Pesanan : ".$orderid."')";
            $this->db->query($c);
            
          $this->db->insert('transaksi', $data);
    
          $this->db->where('id', $users['id']);
          $this->db->update('users', $data1);
    
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Orderan Berhasil dibuat <br />
            Order ID : '.$this->input->post('orderid').'<br />
            DATA : '.$this->input->post('data').'
          </div>');
         redirect(base_url('transaksi/order'));
	}
        }
    }
}
}
    }
    
    
     private function _suksesorder()
     {
        
        // $orderid = $this->input->post('orderid',TRUE);
        // $tujuan = $this->input->post('tujuan',TRUE);
        // $providerlayananid = $this->input->post('posiid',TRUE);
        // $data = $this->getorders($orderid, $tujuan, $providerlayananid);
		// $results = json_decode($data, true);

// 		foreach($results as $row){
// 			$status = $row["status"];
// 			$message =  $row["message"];
// 		}
// 		if ($status == false){
// 			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
//             '.$message.'
//             </div>');
//               redirect(base_url('transaksi/order')."/".$this->input->post('id',TRUE));
// 		}else{

		
	//	}
     }
    
    public function histori(){

        $users = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
      
        $data['histori'] = $this->db->get_where('transaksi', ['users_id' => $users['id']])->result();

         $config = $this->Webconfig->config();
        $data['title'] = $config['title'];
        $data['meta_description'] = $config['meta_description'];
        $data['keyword'] = $config['keyword'];
        $data['favion'] = $config['favion'];
        $data['logo'] = $config['logo'];
        
        $this->load->view('layout/head', $data);
        $this->load->view('layout/menuheadl');
        $this->load->view('page/historiorder');
        $this->load->view('layout/footers');
    }
    

    
    public function produkid()
    {
        $categori = $this->input->post('id',TRUE);
        $subcat = $this->db->get_where('produk', ['categori' => $categori, 'status' => 1])->result();
        echo json_encode($subcat);
     }

     public function dataproduk()
     {
       $id = $this->input->get('id');
       $data = $this->db->get_where('produk', ['id' => $id])->result();
       echo json_encode($data);
      }

     public function depositid()
     {
         $tipe = $this->input->post('id',TRUE);
         $pembayran = $this->db->get_where('deposit_method', ['type' => $tipe])->result();
         echo json_encode($pembayran);
      }

      public function getmethod()
      {
        $type = $this->input->post('type');
        $payment = $this->input->post('payment');
        $method = $this->db->get_where('deposit_method', ['type' => $type,'payment' => $payment])->result();
          echo json_encode($method);
       }
       
       
       public function getorders($orderid, $tujuan, $providerlayananid) {

		$url = "https://api.digiflazz.com/v1/transaction";

		$sign = $this->username.$this->key.$orderid;
		
		$data = json_encode( array( 
		    'username'=> $this->username,
		    'buyer_sku_code'=> $providerlayananid,
    		'customer_no'=> $tujuan,
    		'ref_id'=> $orderid,
		    'sign'=> md5($sign),
		    'msg'=>''
		) );
		 $data = $this->security->xss_clean($data);
		$exec = $this->_request($url, $this->_head, $data);
		return $exec;
	}
}