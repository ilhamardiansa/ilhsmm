<?php 
class M_edit extends CI_Model
{
    function getUsersID($id){
        return $this->db->get_where('users', ['id' => $id])->row_array();
    }

    function ubahUsers(){
        $id = $this->input->post('id');
        $data = [
            'name' => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'nohp' => htmlspecialchars($this->input->post('nohp', true)),
            'pin' => htmlspecialchars($this->input->post('pin', true)),
            'role_id' => $this->input->post('role'),
            'saldo' => $this->input->post('saldo')
        ];
         $data = $this->security->xss_clean($data);

        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }

    function getOrderID($id){
        return $this->db->get_where('transaksi', ['id' => $id])->row_array();
    }

    function ubahOrder(){
        $id = $this->input->post('id');
        $data = [
            'status' => $this->input->post('statuss'),
            'is_refund' => $this->input->post('refund')
        ];
         $data = $this->security->xss_clean($data);

        $this->db->where('id', $id);
        $this->db->update('transaksi', $data);
    }
    
     function getOrderIDpasca($id){
        return $this->db->get_where('transaksi', ['id' => $id])->row_array();
    }

    function ubahOrderpasca(){
        $id = $this->input->post('id');
        $data = [
            'status' => $this->input->post('status'),
            'is_refund' => $this->input->post('refund')
        ];
         $data = $this->security->xss_clean($data);

        $this->db->where('id', $id);
        $this->db->update('transaksi', $data);
    }

    function getLayananID($id){
        return $this->db->get_where('produk', ['id' => $id])->row_array();
    }

    function ubahLayanan(){
        $id = $this->input->post('id');
        $data = [
            'categori' => $this->input->post('categori'),
            'produk_name' => $this->input->post('produk'),
            'note' => $this->input->post('note'),
            'harga' => $this->input->post('harga'),
            'min' => $this->input->post('min'),
            'max' => $this->input->post('max'),
            'status' => $this->input->post('statuss'),
            'provider_id' => $this->input->post('providerid'),
            'provider_layanan_id' => $this->input->post('providerprodukid')
        ];
         $data = $this->security->xss_clean($data);

        $this->db->where('id', $id);
        $this->db->update('produk', $data);
    }

    function getDepositID($id){
        return $this->db->get_where('deposit', ['id' => $id])->row_array();
    }

    function ubahDeposit(){
        $id = $this->input->post('id');
        $data = [
            'status' => $this->input->post('statuss')
        ];
         $data = $this->security->xss_clean($data);

        $this->db->where('id', $id);
        $this->db->update('deposit', $data);
    }

    function getConfigID($id){
        return $this->db->get_where('webconfig', ['id' => $id])->row_array();
    }

    function ubahconfig(){
        $id = $this->input->post('id');
        $data = [
            'value' => htmlspecialchars($this->input->post('value', true))
        ];
         $data = $this->security->xss_clean($data);

        $this->db->where('id', $id);
        $this->db->update('webconfig', $data);
    }

    function getKontakID($id){
        return $this->db->get_where('kontak', ['id' => $id])->row_array();
    }

    function ubahKontak(){
        $id = $this->input->post('id');
        $data = [
            'value' => htmlspecialchars($this->input->post('value', true))
        ];
         $data = $this->security->xss_clean($data);

        $this->db->where('id', $id);
        $this->db->update('kontak', $data);
    }

    function getInformasiID($id){
        return $this->db->get_where('informasi', ['id' => $id])->row_array();
    }

    function ubahInformasi(){
        $id = $this->input->post('id');
        $data = [
            'tipe' => htmlspecialchars($this->input->post('tipe', true)),
            'isi' => $this->input->post('isi')
        ];

        $this->db->where('id', $id);
        $this->db->update('informasi', $data);
    }
    
     function getMetodeID($id){
        return $this->db->get_where('deposit_method', ['id' => $id])->row_array();
    }

    function ubahMetode(){
        $id = $this->input->post('id');
        $data = [
            'payment' => $this->input->post('payment'),
            'type' => $this->input->post('type'),
            'bank' => $this->input->post('bank'),
            'norek' => $this->input->post('norek'),
            'name' => $this->input->post('name'),
            'note' => $this->input->post('note'),
            'min_amount' => $this->input->post('min'),
            'rate' => $this->input->post('rate'),
            'status' => '1'
        ];

        $this->db->where('id', $id);
        $this->db->update('deposit_method', $data);
    }
}