<?php 
class M_transaksi extends CI_Model
{
    
    function counttransaksi(){
        $users = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        return $this->db->get_where('transaksi', ['users_id' => $users['id']])->num_rows();
    }

    function getTransaksi($limit, $start){
        $users = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->db->order_by('create_at', 'DESC');
        return $this->db->get_where('transaksi', ['users_id' => $users['id']], $limit, $start)->result();
    }

    function counttiket(){
        $users = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        return $this->db->get_where('tiket', ['users_id' => $users['id']])->num_rows();
    }

    function getTiket($limit, $start){
        $users = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->db->order_by('create_at', 'DESC');
        return $this->db->get_where('tiket',['users_id' => $users['id']], $limit, $start)->result();
    }
    
    function tiketjoin(){
    $users = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
      $this->db->select('*');
      $this->db->from('tiket');
      $this->db->join('users','users.id = tiket.users_id');      
      $this->db->where('users_id', $users['id']);
      $query = $this->db->get();
      return $query;
   }
   
   function counttiketadmin(){
        $users = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        return $this->db->get_where('tiket')->num_rows();
    }
    
     function getTiketadmin($limit, $start){
        $users = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->db->order_by('create_at', 'DESC');
        return $this->db->get('tiket', $limit, $start)->result();
    }
    

    function countlogs(){
        $users = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        return $this->db->get_where('balance_logs', ['users_id' => $users['id']])->num_rows();
    }

    function getLogs(){
        $users = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        
       $this->db->order_by('create_at', 'DESC');
       $query = $this->db->get_where('balance_logs', ['users_id' => $users['id']])->result();
       return $query;
    }

    function ipcountlogs(){
        $users = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        return $this->db->get_where('iplog', ['users_id' => $users['id']])->num_rows();
    }

    function ipgetLogs(){
        $users = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

$this->db->order_by('create_at', 'DESC');
        return $this->db->get_where('iplog', ['users_id' => $users['id']])->result();
    }

    function countproduk(){
        return $this->db->get('produk')->num_rows();
    }

    function getProduk($limit, $start){
        return $this->db->get('produk', $limit, $start)->result();
    }
   

    function countInformasi(){
        return $this->db->get('informasi')->num_rows();
    }

    function getInformasi($limit, $start){
        $this->db->order_by('date', 'DESC');
        return $this->db->get('informasi', $limit, $start)->result();
    }

    public function sumtransaksi(){
        $users = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $usersid = $users['id'];
        $sql = "SELECT sum(harga) as total FROM transaksi where users_id ='$usersid'";
        $result = $this->db->query($sql);
        return $result->row()->total;
    }

    public function sumdeposit(){
        $users = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $usersid = $users['id'];
        $sql = "SELECT sum(amount) as total FROM deposit WHERE users_id = '$usersid' AND status = 'sukses'";
        $result = $this->db->query($sql);
        return $result->row()->total;
    }

    function countdeposit(){
        $users = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        return $this->db->get_where('deposit', ['users_id' => $users['id'],'status' => 'sukses'])->num_rows();
    }

    function counttransaksii(){
        $users = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        return $this->db->get_where('transaksi', ['users_id' => $users['id']])->num_rows();
    }

    function countdeposits(){
        return $this->db->get('deposit')->num_rows();
    }

    function countdepositt(){
        $users = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $usersid = $users['id'];
        $sql = "SELECT count(status) as total FROM deposit WHERE users_id = '$usersid' & status = 'proses'";
        $result = $this->db->query($sql);
        return $result->row()->total;
    }

    function getDeposit($limit, $start){
        $users = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

$this->db->order_by('create_at', 'DESC');
        return $this->db->get_where('deposit', $limit, $start)->result();
    }

   
}