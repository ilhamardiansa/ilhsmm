<?php
class Api {

	private function _request($url, $head, $data)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		// curl_setopt($ch, CURLOPT_HEADER, 1);
		// curl_setopt($ch, CURLINFO_HEADER_OUT, true);
		$result = curl_exec($ch);

		return $result;
	}

	function __construct() {
		$this->_head = array(
			'Content-Type:application/json'
		);
		$this->CI =& get_instance();

		$key = 'dev-bb531460-dfe1-11ec-b011-1d5e2dafb82c';
        $username = 'zilexugqw5nD';
		
		$this->username = $username;
		$this->key 		= $key;
	}

	public function daftarharga() {

		$url = "https://api.digiflazz.com/v1/price-list";

		$sign = $this->username.$this->key.'pricelist';

		$data = json_encode( array( 
		    'username'=> $this->username,
		    'sign'=> md5($sign)
		) );
		$exec = $this->_request($url, $this->_head, $data);
		return $exec;
	}

}

$api = new Api();

$listharga = $api->daftarharga();
$data = json_decode($listharga, true);
foreach($data["data"] as $row){

$rate = (5/100)*$row["price"];
$subcat =  $row["brand"];
$produkname = $row["product_name"];
$note = $row["product_name"];
$harga = $row["price"] + $rate;
$status = $row["seller_product_status"];
$providerid = 1;
$providerlayananid = $row["buyer_sku_code"];

$check_data = $this->db->get_where('produk', ['provider_layanan_id' => $providerlayananid])->num_rows();

if($check_data > 0){
	echo "Layanan ID : $providerlayananid Sudah ada <br>";
}else{
    
$providerlayananid = $row["buyer_sku_code"];
$s = "INSERT produk (subcat_id, produk_name, note, harga, status, provider_id, provider_layanan_id) VALUES ('$subcat','$produkname','$note','$harga','$status','$providerid','$providerlayananid')";
$insert =$this->db->query($s);

echo "Sukses Insert Layanan : $providerlayananid <br>";
}

}
