<?php
defined('BASEPATH') OR exit('Not Allowed Access Direct');

class Barang_model extends CI_Model{
    public function getDataBarang(){
        $this->db->order_by('no_barang','DESC');
        $data = $this->db->get('barang')->result();
        // select * from barang

        return $data;
    }

    public function simpan_data($data){
        $this->db->insert('barang',$data);
        return $this;
    }

    public function find($no_barang){
        $this->db->where('no_barang',$no_barang);
        $data = $this->db->get('barang')->row();

        //select * from barang where no_barang='no_barang';
        return $data;
    }

    public function edit_data($data, $no_barang){
        // update barang set nama_barang='xxx', harga_barang='xxx' where no_barang='xxx'

        $this->db->where('no_barang',$no_barang);
        $this->db->update('barang',$data);
        return $this;
    }

    public function delete($no_barang){
        $this->db->where('no_barang',$no_barang);
        $this->db->delete('barang');
        return $this;
    }
}

?>