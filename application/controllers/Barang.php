<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->load->model('barang_model');
	}

	public function index() {
		
		$this->data['title'] = 'Barang';
		$this->data['barang'] = $this->barang_model->getDataBarang();
		
		$this->load->view('barang/Barang_list', $this->data);
	}

	public function add(){
		$this->data['title'] = 'Tambah Barang';
		$this->load->view('barang/barang_add',$this->data);
	}

	public function add_save(){

		$config['upload_path'] = './upload/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 5000;

		// load library upload
		$this->load->library('upload',$config);

		// do_upload
		$upload = $this->upload->do_upload('gambar');

		if($upload){

			$nama_file = $this->upload->data()['file_name'];
			$data = array(
				'Nama_Barang' => $this->input->post('nama_barang'),
				'Harga_Barang' => $this->input->post('harga_barang'),
				'file_gambar' => $nama_file
			);
	
			$simpan = $this->barang_model->simpan_data($data);
	
			if($simpan){
				redirect("barang");
			}
		}
		else {echo 'salah';}

		
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

	public function hapus($no_barang){
		$del = $this->barang_model->delete($no_barang);
		if($del){
			redirect('barang');
		}
	}
}
?>