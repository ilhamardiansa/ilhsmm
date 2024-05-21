<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lib extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
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

public function profile(){
    $dataprovider = $this->db->get_where('provider', ['id' => 1])->row();
    $api_url = $dataprovider->url;
    $post_data = array(
	'api_key' => $dataprovider->apikey,
	'action' => 'profile'
);
$api = json_decode($this->connect($api_url, $post_data));
print_r($api);
}

public function getlayanan(){
    // false = gagal
    // 1 = sukses
    $dataprovider = $this->db->get_where('provider', ['id' => 1])->row();
    $api_url = "https://smmtermurah.com/api/services";
    $post_data = array(
	'api_key' => $dataprovider->apikey
);
$api = json_decode($this->connect($api_url, $post_data), true);
// print_r($api["data"]);
foreach((array)$api["data"] as $data){
 if($data["category"] == '*ASIK ADA LAYANAN PROMO*'){
     $profit = 0;
 }elseif($data["category"] == 'Instagram Likes Indonesia' || $data["category"] == 'Instagram Likes' || $data["category"] == 'Facebook Video Views / Live Stream' || $data["category"] == 'Instagram Followers [ Refill / Guaranteed ]' ||  $data["category"] == 'Instagram Followers [ No Refill / No Guaranteed ]' ||  $data["category"] == 'Instagram Likes [ REKOMENDASI ]' || $data["category"] == 'Instagram Impressions / Saves' || $data["category"] == 'Instagram Reach / Highlights / Profile Visits' ||
  $data["category"] == 'Instagram Likes Comments' ||  $data["category"] == 'Instagram Comments' ||  $data["category"] == 'Facebook Followers / Friends' ||  $data["category"] == 'Facebook Likes / Post Likes'){
      $profit = 500;
  }elseif($data["category"] == 'Instagram Views' || $data["category"] == 'Instagram TV' || $data["category"] == 'Instagram Story Views' || $data["category"] == 'Tiktok Views' || $data["category"] == 'Instagram Followers/Likes/Views [ Garansi 1 Tahun ]'){
      $profit = (10/100)*$data["price"] ;
      }else{
      $profit = 3000;
  }
    $harga = $data["price"] + $profit;
    
    
    $provider_layanan_id = $data["id"];
    $produk_name = $data["name"];
    $min = $data["min"];
    $max = $data["max"];
    $note = $data["description"];
    $categori = $data["category"];
    
    $data = [
    'status' => '1',
    'provider_id' => '1',
    'provider_layanan_id' => $provider_layanan_id,
    'produk_name' => $produk_name,
    'harga' => $harga,
    'min' => $min,
    'max' =>  $max,
    'note' =>  $note,
    'categori' =>  $categori,
        ];
        
//   $data2 = [
//         'name' =>  $categori
//       ];
    $check_data = $this->db->get_where('produk', ['provider_layanan_id' =>  $provider_layanan_id])->num_rows();
   //$check_data = $this->db->get_where('categoris', ['name' => $categori])->num_rows();
    
    if($check_data > 0){
		        echo "Layanan ID :  $provider_layanan_id Sudah ada <br>";
		      
	}else{
	    $this->db->insert('produk', $data);
	   // $this->db->insert('categoris', $data2);
	    echo "Sukses Insert Layanan : $produk_name <br>";
	    // echo "Sukses Insert Categori :  $categori <br>";
		    }
}
}

public function status(){
    $status = array('Pending', 'Processing');
    $this->db->select('*');
    $this->db->from('transaksi');
    $this->db->where_in('status', $status);
    $this->db->limit(40);
    $query = $this->db->get();
    
    if($query->num_rows() > 0){
         $result = $query->result();
    foreach ($result as $row){
        $providerorderid = $row->provider_order_id;
    $dataprovider = $this->db->get_where('provider', ['id' => 1])->row();
    $api_url = "https://smmtermurah.com/api/status";
    $post_data = array(
	'api_key' => $dataprovider->apikey,
	'id' => $providerorderid
);
$api = json_decode($this->connect($api_url, $post_data), true);
if($api["status"] == false){
    echo $api["data"]["msg"];
}else{
    $data = [
        'status' => $api["data"]["status"],
        'start_count' => $api["data"]["start_count"],
        'remains' => $api["data"]["remains"],
        ];
        $this->db->where('provider_order_id', $providerorderid);
        $this->db->update('transaksi', $data);
        echo "Status Layanan ID : $providerorderid Berhasil diubah! <br />";
}
    }
    }else{
        echo "TIDAK ADA ORDERAN PENDING / PROSES";
    }
}


    public function refund(){
        $query = $this->db->query("SELECT * FROM transaksi WHERE status = 'Error' AND is_refund = '0' ORDER BY id ASC LIMIT 50"); 
        if($query->num_rows() > 0){
           $result = $query->result_array();
           foreach ($result as $row)
           {
               $user = $this->db->query("SELECT * FROM users WHERE id = '".$row['users_id']."'")->result_array();
               foreach ($user as $row2){
                    $refund = $row['harga'];
                    
                    $a = "UPDATE transaksi SET is_refund = '1' WHERE id = '".$row['id']."'";
                      $b = "UPDATE users SET saldo = '".($row2['saldo'] + $refund)."'  WHERE id = '".$row['users_id']."'";
                      $c = "INSERT balance_logs (users_id, type, amount, note) VALUES ('".$row2['id']."', 'plus', '".$refund."', 'Pengembalian Dana. ID Pesanan : ".$row['order_id']."')";
                      $this->db->query($a);
                       $this->db->query($b);
                       $this->db->query($c);
                        echo "BERHASIL ID : ".$row['id']." , NAME : ".$row2['name']." , AMOUNT : $refund<br>";
                     }
                     }
                     }else{
                         echo 'TIDAK ADA DATA YANG HARUS DI REFUND';
                         }
                         }
                         
                         public function partialrefund(){
                              $query = $this->db->query("SELECT * FROM transaksi WHERE status = 'Partial' AND is_refund = '0' ORDER BY id ASC LIMIT 50"); 
                               if($query->num_rows() > 0){
                                    $result = $query->result_array();
                                    foreach ($result as $row){
                                          $user = $this->db->query("SELECT * FROM users WHERE id = '".$row['users_id']."'")->result_array();
                                          foreach ($user as $row2){
                                        $layanan = $this->db->get_where('produk', ['produk_name' => $row['produk_name']])->row_array();
                                       $rate = $layanan['harga']/1000;
                                       $refund = $row['remains'] * $rate;
                                       $hargas = $row['harga'] - $refund;
                                       
                                       $data = [
                                           'is_refund' => 1,
                                           'harga' => $hargas
                                           ];
                                           
                                           $this->db->where('id', $row['id']);
                                           $this->db->update('transaksi', $data);
                      $b = "UPDATE users SET saldo = '".($row2['saldo'] + $refund)."'  WHERE id = '".$row['users_id']."'";
                      $c = "INSERT balance_logs (users_id, type, amount, note) VALUES ('".$row2['id']."', 'plus', '".$refund."', 'Pengembalian Dana. ID Pesanan : ".$row['order_id']."')";
                       $this->db->query($b);
                       $this->db->query($c);
                        echo "BERHASIL ID : ".$row['id']." , NAME : ".$row2['name']." , AMOUNT : $refund<br>";
                     }
                                    }
                     }else{
                         echo 'TIDAK ADA DATA YANG HARUS DI REFUND';
                         }
                                    }
                               }
                         
                     
	
                        