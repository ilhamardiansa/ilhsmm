<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mutasi extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
    }
	
	public function mutasibank(){
$apiKey = '99b14b968603c326de2d410a188525396296ee991f53d';
$data = [
    'search' => [
        'date' => [
            'from' => date('Y-m-d') . ' 00:00:00',
            'to'   => date('Y-m-d') . ' 23:59:59',
        ],
        'type' => 'credit',
        'service_code'   => 'bca',
        'account_number' => '8161640603',
    ],
];


$ch = curl_init();
curl_setopt_array($ch, [
    CURLOPT_URL            => 'https://api.cekmutasi.co.id/v1/bank/search',
    CURLOPT_POST           => true,
    CURLOPT_POSTFIELDS     => http_build_query($data),
    CURLOPT_HTTPHEADER     => ['Api-Key: ' . $apiKey, 'Accept: application/json'],
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HEADER         => false,
    CURLOPT_IPRESOLVE      => CURL_IPRESOLVE_V4,
]);

$result = curl_exec($ch);
curl_close($ch);

$data = json_decode($result, true);
foreach($data["response"] as $row){
    $bank = $row["service_code"];
    $type = $row["type"];
    $amount = $row["amount"];
    $description = $row["description"];
if($data["success"] == false){
    print_r($data["error_message"]);
}elseif($data["success"] == true){
    if($bank == null || $type == null || $amount == null || $description == null){
        echo "TIDAK ADA MUTASI MASUK";
    }else{
    $tgl    = date('Y-m-d');
    $sews = "SELECT * FROM bank_mutasi WHERE amount = '".$amount."' AND create_At = '".$tgl."'";
    $check_mutasi = $this->db->query($sews)->num_rows();
    if($check_mutasi > 0){
        echo "Mutasi dengan amount :  '".$amount."', sudah di tambah ke database";
    }else{
        print_r($row);
    $sql = "INSERT bank_mutasi (bank, type, amount, description, status, create_at) VALUES ('$bank', '$type', '$amount', '$description', '0', '$tgl')";
    $insert =$this->db->query($sql);
    if($insert == true){
        echo "MUTASI TELAH DI TAMBAHKAN AMOUNT : '$amount'";
    }else{
        echo "MUTASI GAGAL DITAMBAHKAN";
    }
    }
    }
    }
		    
}
	}
	
	public function updatedeposit(){
	    $deposit = $this->db->query("SELECT * FROM deposit WHERE status = 'pending' AND type='auto' AND method_name='BCA' AND DATE(create_at) = '".date('Y-m-d')."' ORDER BY id ASC LIMIT 50");
	    if($deposit->num_rows() == 0){
	        echo "TIDAK ADA PERMINTAAN DEPOSIT HARI INI";
	    }else{
	        $data = $deposit->result_array();
	        foreach ($data as $data)
           {
               
	          $user = $this->db->query("SELECT * FROM users WHERE id = '".$data['users_id']."' ")->result_array();
	       foreach ($user as $row2){
	                
	    $check_data = $this->db->query("SELECT * FROM bank_mutasi WHERE amount = '".$data['amount']."' AND type = 'credit' AND status = '0'");
	    if($check_data->num_rows() == 0){
	        echo "DATA TIDAK DITEMUKAN ID : ".$data['id']." AMOUNT ".$data['amount']."";
	    }else{
	        $saldo = $row2['saldo'] + $data['amount'];
	        $checks_data = $check_data->result_array();
	          foreach ($checks_data as $checks_data){
	        $update = $this->db->query("UPDATE bank_mutasi SET status = '1' WHERE id = '".$checks_data['id']."'");
	        $update = $this->db->query("UPDATE deposit SET status = 'sukses' WHERE id = '".$data['id']."'");
	        $update = $this->db->query("UPDATE users SET saldo = '".$saldo."' WHERE id = '".$data['users_id']."' ");
	        $update = $this->db->query("INSERT balance_logs (users_id, type, amount, note) VALUES ('".$data['users_id']."','plus','".$data['amount']."','Deposit Saldo ID Deposit :".$data['id']."')");
	        if($update == true){
	            echo "DEPOSIT BERHASIL, ID Deposit : ".$data['id']." <br>";
	        }else{
	             echo "DEPOSIT GAGAL, ID Deposit : ".$data['id']." <br>";
	        }
	    }
	}
	       }
           }
	    }
	}
    
}