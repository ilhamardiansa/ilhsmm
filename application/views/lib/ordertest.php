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

  public function cekstatuspra() {
      $orderid = 'ILH012';
      $tujuan = '1013226';
      $providerlayananid =  'ILH4';
		$url = "https://api.digiflazz.com/v1/transaction";

		$sign = $this->username.$this->key.$orderid;
		
		$data = json_encode( array( 
		    'commands' => 'inq-pasca',
		    'username'=> $this->username,
		    'buyer_sku_code'=> $providerlayananid,
    		'customer_no'=> $tujuan,
    		'ref_id'=> $orderid,
		    'sign'=> md5($sign),
		    'testing'=>true,
		    'msg'=>''
		) );
		$exec = $this->_request($url, $this->_head, $data);
		return $exec;
	}

}

$api = new Api();

$order = $api->cekstatuspra();
print_r($order);