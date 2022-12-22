<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->load->model('mahasiswa_model');
	}

	public function index() {
		
		$this->data['title'] = 'Mahasiswa';
		$this->data['mahasiswa'] = $this->mahasiswa_model->getData();
		
		$this->load->view('mahasiswa/mahasiswa_list', $this->data);
	}

	public function mahasiswakuliah(){
		$this->data['mahasiswa'] = $this->mahasiswa_model->mhs_kuliah();
		// $this->data['mahasiswa'] = $this->mahasiswa_model->right_join();
		
		$this->load->view('mahasiswa/mhs_kuliah',$this->data);
	}

    
	public function add(){
		$this->data['title'] = 'Tambah Barang';
		$this->load->view('barang/barang_add',$this->data);
	}

	public function add_save(){
		$data = array(
			'Nama_Barang' => $this->input->post('nama_barang'),
			'Harga_Barang' => $this->input->post('harga_barang')
		);

		$simpan = $this->barang_model->simpan_data($data);

		if($simpan){
			redirect("barang");
		}
	}

	public function edit($no_barang){
		$this->data['title'] = 'Edit Barang';
		$this->data['barang'] = $this->barang_model->find($no_barang);

		$this->load->view('barang/barang_edit',$this->data);
	}

	public function edit_save(){
		$no_barang = $this->input->post('no_barang');
		$data = array(
			'nama_barang' => $this->input->post('nama_barang'),
			'harga_barang' => $this->input->post('harga_barang')
		);

		$edit = $this->barang_model->edit_data($data,$no_barang);
		if($edit){
			redirect('barang');
		}
	}

	public function hapus($nim){
		$del = $this->mahasiswa_model->delete($nim);
		if($del){
			redirect('mahasiswa');
		}
	}

	
}
?>