<?php 
	class Kode_m extends CI_Model{
		public function kode(){ 
		    $query = $this->db->query("SELECT MAX(order_id) as order_id from transaksi");
        $hasil = $query->row();
       return $hasil->order_id;
		 }
		 
}