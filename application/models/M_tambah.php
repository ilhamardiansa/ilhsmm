<?php 
class M_tambah extends CI_Model
{

    function addUsers(){
        $apikey = substr(md5(time()), 0, 40);
        $data = [
            'name' => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'api_key' => $apikey,
            'nohp' => htmlspecialchars($this->input->post('nohp', true)),
            'pin' => htmlspecialchars($this->input->post('pin', true)),
            'role_id' => $this->input->post('roleid'),
            'saldo' => 0,
            'is_active' => 1,
        ];
         $data = $this->security->xss_clean($data);

        $this->db->insert('users', $data);
    }

    function addLayanan(){

        $data = [
            'categori' => $this->input->post('categori'),
            'produk_name' => $this->input->post('produk'),
            'note' => $this->input->post('note'),
            'harga' => $this->input->post('harga'),
            'min' => $this->input->post('min'),
            'max' => $this->input->post('max'),
            'status' => 1,
            'provider_id' => $this->input->post('providerid'),
            'provider_layanan_id' => $this->input->post('providerprodukid')
        ];
         $data = $this->security->xss_clean($data);

        $this->db->insert('produk', $data);
    }

    function addcat(){

        $data = [
            'name' => $this->input->post('categori')
        ];
         $data = $this->security->xss_clean($data);


        $this->db->insert('categoris', $data);
    }

    function addmetode(){

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
        


        $this->db->insert('deposit_method', $data);
    }

    function addInformasi(){

        $data = [
            'tipe' => $this->input->post('tipe'),
            'isi' => $this->input->post('isi')
        ];
         $data = $this->security->xss_clean($data);


        $this->db->insert('informasi', $data);
    }
}