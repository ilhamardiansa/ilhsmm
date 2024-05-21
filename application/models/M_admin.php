<?php 
class M_admin extends CI_Model
{
    function countusers(){
        return $this->db->get('users')->num_rows();
    }

    function getUsers($limit, $start){

        return $this->db->get('users', $limit, $start)->result();
    }

    function countdepositmethod(){
        return $this->db->get('deposit_method')->num_rows();
    }

    function getDepositMethod(){

        return $this->db->get('deposit_method')->result();
    }

    function countlayanan(){
        return $this->db->get('produk')->num_rows();
    }

    function getLayanan($limit, $start){

        return $this->db->get('produk', $limit, $start)->result();
    }

    function countcategori(){
        return $this->db->get('categoris')->num_rows();
    }

    function getCategori($limit, $start){

        return $this->db->get('categoris', $limit, $start)->result();
    }
    function countsubcat(){
        return $this->db->get('subcategori')->num_rows();
    }

    function getSubcat($limit, $start){

        return $this->db->get('subcategori', $limit, $start)->result();
    }

    function countorder(){
        return $this->db->get('transaksi')->num_rows();
    }

    function getOrder($limit, $start){
$this->db->order_by('create_at', 'DESC');
        return $this->db->get('transaksi', $limit, $start)->result();
    }
    
     function countorderpasca(){
        return $this->db->get('transaksi_pasca')->num_rows();
    }

    function getOrderpasca($limit, $start){
$this->db->order_by('create_at', 'DESC');
        return $this->db->get('transaksi_pasca', $limit, $start)->result();
    }

    function countdeposits(){
        return $this->db->get('deposit')->num_rows();
    }

    function getDeposit($limit, $start){
$this->db->order_by('create_at', 'DESC');
        return $this->db->get('deposit', $limit, $start)->result();
    }

    function countdeposit(){
        return $this->db->get_where('deposit', ['status' => 'sukses'])->num_rows();
    }

    function countorderr(){
        return $this->db->get('transaksi')->num_rows();
    }

    public function sumpemesanan(){
        $sql = "SELECT sum(harga) as total FROM transaksi";
        $result = $this->db->query($sql);
        return $result->row()->total;
    }

    public function sumdeposit(){
        $sql = "SELECT sum(amount) as total FROM deposit WHERE status = 'sukses'";
        $result = $this->db->query($sql);
        return $result->row()->total;
    }

    public function sumsaldousers(){
        $sql = "SELECT sum(saldo) as total FROM users";
        $result = $this->db->query($sql);
        return $result->row()->total;
    }

    function countlogs(){
        return $this->db->get('balance_logs')->num_rows();
    }

    function getLogs($limit, $start){
        $this->db->order_by('create_at', 'DESC');
        return $this->db->get('balance_logs', $limit, $start)->result();
    }

    function countInformasi(){
        return $this->db->get('informasi')->num_rows();
    }

    function getInformasi($limit, $start){
        $this->db->order_by('date', 'DESC');
        return $this->db->get('informasi', $limit, $start)->result();
    }
}