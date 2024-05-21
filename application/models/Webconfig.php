<?php 
class Webconfig extends CI_Model
{
    function config(){
       
        $config = array(
            'title' => $this->db->get_where('webconfig', ['name' => 'title'])->row('value'),
            'meta_description' => $this->db->get_where('webconfig', ['name' => 'meta_description'])->row('value'),
            'keyword' => $this->db->get_where('webconfig', ['name' => 'keyword'])->row('value'),
            'favion' => $this->db->get_where('webconfig', ['name' => 'favicon'])->row('value'),
            'logo' => $this->db->get_where('webconfig', ['name' => 'logo'])->row('value')
        );

        return $config;
    }

    function editconfig(){
       
        $config = array(
            'title' => $this->db->get_where('webconfig', ['name' => 'title'])->row('value'),
            'meta_description' => $this->db->get_where('webconfig', ['name' => 'meta_description'])->row('value'),
            'keyword' => $this->db->get_where('webconfig', ['name' => 'keyword'])->row('value'),
            'favion' => $this->db->get_where('webconfig', ['name' => 'favicon'])->row('value'),
            'logo' => $this->db->get_where('webconfig', ['name' => 'logo'])->row('value')
        );

        return $config;
    }

    function kontak(){

        $kontak = array(
            'whatsapp' => $this->db->get_where('kontak', ['name' => 'whatsapp'])->row('value'),
            'instagram' => $this->db->get_where('kontak', ['name' => 'instagram'])->row('value'),
            'telegram' => $this->db->get_where('kontak', ['name' => 'telegram'])->row('value')
        );

        return $kontak;
    }

}