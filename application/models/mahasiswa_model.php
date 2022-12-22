<?php
defined ('BASEPATH') or exit('No Allowed Direct Access');

class mahasiswa_model extends CI_Model{
    
    public function __construct(){
        
        parent:: __construct();
        $this->db2 = $this->load->database('kampus',TRUE);
    }

    public function getData(){
        $data = $this->db2->get('mahasiswa')->result();
        return $data;
    }

    public function delete($nim){
        $this->db2->where('nim',$nim);
        $this->db2->delete('mahasiswa');
        return $this;
    }

    public function mhs_kuliah(){
        $this->db2->join('mahasiswa','ambil_mk.nim = mahasiswa.nim','LEFT');
        $this->db2->select('distinct(mahasiswa.nim) as nim, mahasiswa.nama');
        //$this->db2->group_by('mahasiswa.nim');
        $this->db2->where("mahasiswa.nim !='' ");
        $data = $this->db2->get('ambil_mk')->result();
        return $data;
    }

    public function right_join(){
        $this->db2->join('ambil_mk','mahasiswa.nim=ambil_mk.nim','RIGHT');
        $this->db2->select('distinct(mahasiswa.nim) as nim, mahasiswa.nama');
        $this->db2->where("mahasiswa.nim !=''");
        $data = $this->db2->get('ambil_mk')->result();
        return $data;
    }
}


?>